<?php

namespace App\Http\Controllers\Backend;

use App\Facades\ModuleRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Form\ModuleCreateForm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Input, Log;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectCreateForm $request)
    {
        try {
            $data = $request->except('_token', 'where');
            $data['lastest_update_number'] = 0;
            if (ProjectRepository::create($data)) {
                return $this->successRoutTo('backend.project.index', "新增项目成功");
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = ModuleRepository::find($id);

        return view('backend.module.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ModuleRepository::find($id);

        return view('backend.module.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ModuleCreateForm $request, $id)
    {
        $data = $request->except('_method', '_token', 'where');
        try {
            if (ModuleRepository::saveById($id, $data)) {
                return $this->successRoutTo('backend.project.index', '编辑模块成功');
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
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            if (ProjectRepository::destroy($id)) {

                return $this->successBackTo('删除项目成功');
            }
        }
        catch (\Exception $e) {
            return $this->errorBackTo(['error' => $e->getMessage()]);
        }
    }}
