<?php

namespace App\Http\Controllers\Backend;

use App\Facades\ActivityJoinRepository;
use App\Facades\CustomerInfoRepository;
use App\Facades\CustomerRepository;
use App\Facades\EventRepository;
use App\Facades\MovieLikeRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Form\CustomerInfoCreateForm;

class SponsorController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $columns = ['customer_id', 'nickname', 'mobile', 'sex', 'score', 'available'];
        $model = CustomerRepository::paginateWhere($request->get('where'), config('repository.page-limit'), $columns, true);

        if(isNullOrEmpty($request->input('available'))) {
            $data = $model
                ->whereIn('available', [config('enumerations.CUSTOMER_AVAILABLE.MERCHANT'),config('enumerations.CUSTOMER_AVAILABLE.BLACK')])
                ->paginate(config('repository.page-limit'), $columns);
        } else {
            $data = $model
                ->paginate(config('repository.page-limit'), $columns);
        }

        return view('backend.sponsor.index', compact('data'));
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
        $data = CustomerRepository::find($id);

        return view('backend.customer.editUserInfo', compact('data'));
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

    public function viewEventList($id) {
        $data = EventRepository::getMyCreateEventList($id);

        return view('backend.sponsor.viewEventList', compact('data'));
    }

    public function enable($id) {
        $data['available'] = config('enumerations.CUSTOMER_AVAILABLE.MERCHANT');
        CustomerRepository::saveById($id,$data);

        return $this->successRoutTo('backend.sponsor.index', '已恢复客户发起人身份');
    }

    public function disable($id) {
        $data['available'] = config('enumerations.CUSTOMER_AVAILABLE.BLACK');
        CustomerRepository::saveById($id,$data);

        return $this->successRoutTo('backend.sponsor.index', '已将该发起人拉黑');
    }
}
