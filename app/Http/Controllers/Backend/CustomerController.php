<?php

namespace App\Http\Controllers\Backend;

use App\Facades\ActivityJoinRepository;
use App\Facades\ActivityRepository;
use App\Facades\CustomerInfoRepository;
use App\Facades\CustomerRepository;
use App\Facades\EventRepository;
use App\Facades\MovieLikeRepository;
use App\Facades\MovieRepository;
use App\Facades\ScoreRecordRepository;
use App\Facades\ScoreRuleRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Form\CustomerInfoCreateForm;

class CustomerController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $columns = ['customer_id', 'nickname', 'mobile', 'sex', 'score'];
        $data = CustomerRepository::paginateWhere($request->get('where'), config('repository.page-limit'), $columns);
        return view('backend.customer.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(CustomerInfoCreateForm $request)
    {
        //
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
        $data = CustomerRepository::find($id);

        return view('backend.customer.editUserInfo', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(CustomerInfoCreateForm $request, $id)
    {
        $customerData['customer_name'] = $request->input('customer_name');
        $customerNameEmpty = CustomerRepository::checkNameEmpty($customerData['customer_name']);
        if(! $customerNameEmpty) {
            return $this->errorBackTo(['error' => "该用户名已存在！"]);
        }

        $customerData['mobile'] = $request->input('mobile');
        $infoData = $request->except('_method', '_token', 'where', 'customer_name', 'mobile');

        try {
            if (CustomerInfoRepository::saveById($id, $infoData) && CustomerRepository::saveById($id, $customerData)) {
                return $this->successRoutTo('backend.customer.index', '编辑用户资料成功');
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

    }

    public function viewScoreRecord($id) {
        $data = ScoreRecordRepository::getScoreRecord($id);

        foreach ($data as &$item) {
            $map = null;
            if($item['type'] == config('enumerations.SCORE_RECORD_TYPE.ACTIVITY')) {
                $activity = ActivityRepository::find($item['refer_id']);
                $movie = MovieRepository::findMovieById($activity['movie_id']);
                $item['movie_name'] = unserialize($movie['info'])['title'];
            } else if($item['type'] == config('enumerations.SCORE_RECORD_TYPE.EVENT')) {
                $item['event_name'] = EventRepository::find($item['refer_id'])['title'];
            }
            $map[] = ['code', '=', $item['rule_code']];
            $item['reason'] = ScoreRuleRepository::getByWhere($map)->first()['description'];
        }
        return view('backend.customer.viewScoreRecord', compact('data'));
    }

    public function viewMovieLike($id) {
        $data = MovieLikeRepository::getByCustomerId($id);

        return view('backend.customer.viewMovieLike', compact('data'));
    }

    public function viewActivityJoin($id) {
        $data = ActivityJoinRepository::getByCustomerId($id);

        return view('backend.customer.viewActivityJoin', compact('data'));
    }
}
