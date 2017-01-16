<?php

namespace App\Http\Controllers\Backend;

use App\Facades\ActivityRepository;
use App\Facades\MovieLikeRepository;
use App\Facades\MovieRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Form\CustomerInfoCreateForm;
use DB;

class MovieController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $columns = ['movie_id', 'douban_id', 'created_at', 'like_count', 'status', 'info'];
        $data = MovieRepository::paginateWhere($request->get('where'), config('repository.page-limit'), $columns);
        foreach($data as &$item) {
            $item['title'] = unserialize($item['info'])['title'];
            $item['rating'] = unserialize($item['info'])['rating']['average'];
            $item['link'] = unserialize($item['info'])['alt'];
            $item['activity_count'] = ActivityRepository::getCountByMovieId($item['douban_id'],config('enumerations.ACTIVITY_STATUS.END'));
        }

        return view('backend.movie.index', compact('data'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {

    }

    public function viewLikeCustomer($id) {
        $data = MovieLikeRepository::getCustomerListByMovieId($id);
        return view('backend.movie.viewLikeCustomer', compact('data'));
    }

    public function disable($id) {
        try {
            if (MovieRepository::changeStatusById($id,config('enumerations.MOVIE_STATUS.UNABLE'))) {
                return $this->successBackTo('已设置该电影无法放映');
            }
        }
        catch (\Exception $e) {
            return $this->errorBackTo(['error' => $e->getMessage()]);
        }

    }

    public function enable($id) {
        try {
            if (MovieRepository::changeStatusById($id,config('enumerations.MOVIE_STATUS.INIT'))) {
                return $this->successBackTo('已恢复电影占座');
            }
        }
        catch (\Exception $e) {
            return $this->errorBackTo(['error' => $e->getMessage()]);
        }

    }

    public function viewActivityRecord($id) {

        $data = ActivityRepository::getListByMovieId($id);

        return view('backend.movie.viewActivityRecord', compact('data'));

    }

}
