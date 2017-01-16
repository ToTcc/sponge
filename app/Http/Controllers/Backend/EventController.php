<?php

namespace App\Http\Controllers\Backend;

use App\Facades\ActivityJoinRepository;
use App\Facades\CustomerInfoRepository;
use App\Facades\CustomerRepository;
use App\Facades\EventJoinRepository;
use App\Facades\EventRepository;
use App\Facades\MovieLikeRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Form\CustomerInfoCreateForm;

class EventController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $data = EventRepository::paginateWhere($request->get('where'), config('repository.page-limit'));

        return view('backend.event.index', compact('data'));
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
    public function store(Request $request)
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
        $data = EventRepository::find($id);

        $data['necessary'] = unserialize($data['necessary']);
        $data['note'] = unserialize($data['note']);

        return view('backend.event.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_url','_token','_method', 'fileToUpload');
        $data['necessary'] = serialize(array_filter($data['necessary']));
        $data['note'] = serialize(array_filter($data['note']));

        try {
            if (EventRepository::saveById($id, $data)) {
                return $this->successRoutTo('backend.event.index', '编辑活动成功');
            }
        } catch (\Exception $e) {
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

    public function preview($id) {
        $url = route('merchant.index.eventDetail',['id' => $id]);
        return view('merchant.eventPreview',compact('url'));
    }

    public function enable($id) {
        $data['status'] = config('enumerations.EVENT_STATUS.WAITING_JOIN');
        EventRepository::saveById($id,$data);

        return $this->successRoutTo('backend.event.index', '已上架该活动');
    }

    public function cancel($id) {
        //更新活动状态
        $eventData["status"] = config("enumerations.EVENT_STATUS.CANCEL");
        EventRepository::saveById($id, $eventData);

        $joinList = EventJoinRepository::findPayListByEventId($id);

        $wechat = app("wechat");

        foreach($joinList as $join) {
            $wechat->payment->refund($join["out_trade_no"], time().rand(0, 999), $join["money"]*100);

            $joinData['status'] = config('enumerations.EVENT_JOIN_STATUS.EVENT_CANCEL');
            EventJoinRepository::saveById($join['join_id'],$joinData);
        }

        return $this->successRoutTo('backend.event.index', '已取消该活动并为报名用户退款');
    }

}
