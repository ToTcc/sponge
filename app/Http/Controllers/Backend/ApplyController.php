<?php

namespace App\Http\Controllers\Backend;

use App\Facades\ApplyRepository;
use App\Facades\CustomerRepository;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ApplyController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $data = ApplyRepository::paginateWhere($request->get('where'), config('repository.page-limit'));

        return view('backend.apply.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {

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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {

    }


    public function viewDetail($id) {

        $data = ApplyRepository::find($id);
        return view('backend.apply.viewDetail', compact('data'));

    }

    public function approveApply(Request $request) {

        $applyId = $request->input('applyId');

        $apply = ApplyRepository::find($applyId);

        $applyData['status'] = config('enumerations.APPLY_STATUS.APPROVED');
        ApplyRepository::saveById($applyId,$applyData);

        $password = rand(000000,999999);

        $customerData['password'] = md5($password);
        $customerData['available'] = config('enumerations.CUSTOMER_AVAILABLE.MERCHANT');

        CustomerRepository::saveById($apply['customer_id'],$customerData);

        mms($apply["mobile"], "恭喜您顺利通过了发起人审核，用户名:"
            .$apply['mobile']."，密码:".$password
            ."，可通过PC端登陆发起人平台http://movie.mybabygo.cn/merchant/index，马上发起您感兴趣的活动。");

    }

    public function rejectApply(Request $request) {

        $applyId = $request->input('applyId');
        $reason = $request->input('reason');

        $applyData['status'] = config('enumerations.APPLY_STATUS.REJECTED');
        $applyData['reject_reason'] = $reason;

        ApplyRepository::saveById($applyId,$applyData);
    }

}
