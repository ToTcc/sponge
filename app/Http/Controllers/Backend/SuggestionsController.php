<?php

namespace App\Http\Controllers\Backend;


use App\Facades\SuggestionsRepository;
use Illuminate\Http\Request;
use Input;

class SuggestionsController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $data = SuggestionsRepository::paginateWhere($request->get('where'), config('repository.page-limit'));
        return view('backend.suggestions.index', compact('data'));
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

    public function viewDescription($id) {
        $suggestion = SuggestionsRepository::find($id);
        return view('backend.suggestions.viewDescription',compact('suggestion'));
    }

}
