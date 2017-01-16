<?php

namespace App\Http\Controllers\Backend;

use App\Facades\ProjectRepository;
use App\Facades\ModuleRepository;
use App\Facades\InterfaceRepository;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\Form\ProjectCreateForm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Input;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.project.index');
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
        $data = ProjectRepository::find($id);
        $rateString = getRateOfTime($data['begin_time'], $data['end_time']);

        return view('backend.project.show', compact('data', 'rateString'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ProjectRepository::find($id);

        return view('backend.project.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectCreateForm $request, $id)
    {
        $data = $request->except('_method', '_token', 'where');
        try {
            if (ProjectRepository::saveById($id, $data)) {
                return $this->successRoutTo('backend.project.index', '编辑活动成功');
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
    }

    public function showTable(Request $request) {
        $id = $request->input('id');
//        return response()->json(['html' => $id]);
        $idArr = explode('-', $id);
        $flag = $idArr[1];
        $targetId = $idArr[0];
//        return response()->json(['html' => $idArr]);
        switch ($flag) {
            case 'P':
                $projectHtml = ProjectRepository::getTableData($targetId);
                $moduleHtml = '<td colspan="6" align="center">请选择模块</td>';
                $interfaceHtml = '<td colspan="10" align="center">请选择接口</td>';
                break;
            case 'M':
                $projectInfo = ModuleRepository::getProjectInfo($targetId);
                $projectHtml = ProjectRepository::getTableData($projectInfo['project_id']);
                $moduleHtml = ModuleRepository::getTableData($targetId);
                $interfaceHtml = '<td colspan="10" align="center">请选择接口</td>';
                break;
            default:
                $moduleInfo = InterfaceRepository::getModuleInfo($targetId);
                $projectInfo = ModuleRepository::getProjectInfo($moduleInfo['module_id']);
                $projectHtml = ProjectRepository::getTableData($projectInfo['project_id']);
                $moduleHtml = ModuleRepository::getTableData($moduleInfo['module_id']);
                $interfaceHtml = InterfaceRepository::getTableData($targetId);
        }
        $html['projectHtml'] = $projectHtml;
        $html['moduleHtml'] = $moduleHtml;
        $html['interfaceHtml'] = $interfaceHtml;
        $data['html'] = $html;
        $data['type'] = $flag;
        return response()->json(['data' => $data]);
    }

}
