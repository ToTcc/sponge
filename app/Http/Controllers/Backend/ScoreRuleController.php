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
use App\Facades\ScoreRuleRepository;
use Illuminate\Http\Request;
use App\Http\Requests\Form\ActivityCreateForm;
use App\Http\Requests\Form\ActivityUpdateForm;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redis;
use Input;

class ScoreRuleController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $data = ScoreRuleRepository::all();

        return view('backend.scoreRule.index', compact('data'));
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
    public function store(ActivityCreateForm $request)
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
        $data = ScoreRuleRepository::find($id);

        return view('backend.scoreRule.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_url','_method', '_token', 'fileToUpload');

        try {
            if (ScoreRuleRepository::saveById($id, $data)) {
                return $this->successRoutTo('backend.scoreRule.index', '编辑规则成功');
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

}
