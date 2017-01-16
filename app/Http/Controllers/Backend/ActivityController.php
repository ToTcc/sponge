<?php

namespace App\Http\Controllers\Backend;

use App\Facades\ActivityJoinRepository;
use App\Facades\ActivityLeaveRepository;
use App\Facades\ActivityPriceRuleRepository;
use App\Facades\ActivityRepository;
use App\Facades\CustomerRepository;
use App\Facades\MovieLikeRepository;
use App\Facades\MovieRepository;
use App\Facades\PayRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Form\ActivityCreateForm;
use App\Http\Requests\Form\ActivityUpdateForm;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;
use Input;

class ActivityController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $data = ActivityRepository::paginateWhere($request->get('where'), config('repository.page-limit'));
        foreach($data as &$item) {
            $item['title'] = unserialize($item['info'])['title'];
        }
        return view('backend.activity.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $doubanId = $request->input('id');
        $movie = MovieRepository::findMovieById($doubanId);
        $movie['info'] = unserialize($movie['info']);
        return view('backend.activity.create',compact('movie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(ActivityCreateForm $request)
    {
        try {
            $data = $request->except('_url','_token', 'fileToUpload', 'ruleStartTime', 'ruleEndTime', 'rulePrice', 'is_continue');
            $data['status'] = config('enumerations.ACTIVITY_STATUS.WAITING_JOIN');

            $activity = ActivityRepository::getValidActivityById($data['movie_id']);
            if(!isNullOrEmpty($activity)) {
                return $this->errorBackTo(['error' => '您已创建该放映']);
            }

            $activity = ActivityRepository::create($data);
            if($activity) {

                MovieRepository::changeStatusById($request->input('movie_id'),config('enumerations.MOVIE_STATUS.WAITING_JOIN'));

                if($request->input('activity_type') == config('enumerations.ACTIVITY_TYPE.CASH')) {
                    $ruleStartTime = $request->input('ruleStartTime');
                    $ruleEndTime = $request->input('ruleEndTime');
                    $rulePrice = $request->input('rulePrice');
                    $ruleCount = count($ruleStartTime);
                    for($i=0;$i<$ruleCount;$i++) {
                        if(getCurrentDate() < $ruleStartTime[$i]) {
                            $status = config('enumerations.ACTIVITY_PRICE_RULE_STATUS.WAITING');
                        }

                        if(getCurrentDate() >= $ruleStartTime[$i] && getCurrentDate() <= $ruleEndTime[$i]) {
                            $status = config('enumerations.ACTIVITY_PRICE_RULE_STATUS.ONGOING');
                        }

                        if(getCurrentDate() > $ruleEndTime[$i]) {
                            $status = config('enumerations.ACTIVITY_PRICE_RULE_STATUS.END');
                        }

                        $priceRuleData[] = ['activity_id' => $activity['activity_id'], 'movie_id' => $activity['movie_id'], 'created_at' => getCurrentTime(),
                            'updated_at' => getCurrentTime(), 'begin_time' => $ruleStartTime[$i], 'end_time' => $ruleEndTime[$i], 'price' => $rulePrice[$i], 'status' => $status];
                    }
                    ActivityPriceRuleRepository::batchCreate($priceRuleData);
                }

                return $this->successRoutTo('backend.movie.index', "新增放映成功");
            }
        }
        catch (\Exception $e) {
            return $this->errorBackTo(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $data = ActivityRepository::find($id);
        $movie = MovieRepository::findMovieById($data['movie_id']);
        $movie['info'] = unserialize($movie['info']);

        return view('backend.activity.edit', compact('data','movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(ActivityUpdateForm $request, $id)
    {
        $data = $request->except('_url','_method', '_token', 'fileToUpload', 'is_continue');
        if($request->input('is_continue') == config('enumerations.DEFAULT_YN.YES')) {
            $data['qrcode_image'] = '';
        } else {
            $data['activity_qrcode_image'] = '';
        }
        try {
            if (ActivityRepository::saveById($id, $data)) {
                return $this->successRoutTo('backend.activity.index', '编辑放映成功');
            }
        }
        catch (\Exception $e) {
            return $this->errorBackTo(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        try {
            if (ActivityRepository::destroy($id)) {
                return $this->successBackTo('删除活动成功');
            }
        }
        catch (\Exception $e) {
            return $this->errorBackTo(['error' => $e->getMessage()]);
        }
    }


    public function viewJoinCustomer($id) {
        $data = ActivityJoinRepository::getCustomerListByActivityId($id);
        return view('backend.activity.viewJoinCustomer', compact('data'));
    }

    public function leave($id) {
        $activityJoin = ActivityJoinRepository::find($id);
        $pay = PayRepository::find($activityJoin['pay_id']);

        $wechat = app('wechat');
        $refundNo = time().rand(0, 999);
        $result = $wechat->payment->refund($pay['out_trade_no'],$refundNo,$pay['money']*100);

        if ($result->return_code == 'SUCCESS' && $result->result_code == 'SUCCESS'){
            $activityLeaveData['join_id'] = $id;
            $activityLeaveData['activity_id'] = $activityJoin['activity_id'];
            $activityLeaveData['refund_no'] = $refundNo;

            ActivityLeaveRepository::create($activityLeaveData);

            ActivityJoinRepository::changeStatusById($id,config('enumerations.ACTIVITY_JOIN_STATUS.REFUND'));

        } else {
            return $this->errorBackTo(['error' => '退款失败，请重试！']);
        }

    }

    public function cancel($id) {

        $activity = ActivityRepository::find($id);

        //更新活动状态
        $activityData["status"] = config("enumerations.ACTIVITY_STATUS.CANCEL");
        ActivityRepository::saveById($id, $activityData);

        $movie = MovieRepository::findMovieById($activity["movie_id"]);

        $movieData["status"] = config('enumerations.MOVIE_STATUS.WAITING_PLAY');
        MovieRepository::saveById($movie["movie_id"], $movieData);

        $activityJoinList = ActivityJoinRepository::findPayListByActivityId($id);
        $wechat = app("wechat");
        foreach($activityJoinList as $join) {
            $wechat->payment->refund($join["out_trade_no"], time().rand(0, 999), $join["money"]*100);

            $joinData['status'] = config('enumerations.ACTIVITY_JOIN_STATUS.ACTIVITY_CANCEL');
            ActivityJoinRepository::saveById($join['join_id'],$joinData);
        }

        return $this->successRoutTo('backend.activity.index', '已取消该活动并为报名用户退款');
    }



}
