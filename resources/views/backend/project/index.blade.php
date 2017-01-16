@extends("backend.layout.iframeMain")
@inject('projectPresenter','App\Presenters\ProjectPresenter')

@section('after.css')
    <link rel="stylesheet" href="/assets/backend/js/jsTree/themes/default/style.min.css" />
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.layout.success')
        <div class="row">
            <div class="col-sm-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>项目列表</h5>
                    </div>
                    <div class="ibox-content">
                        {!! $projectPresenter->renderProjectTreeForm($form) !!}
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>详情</h5>
                        <div class="ibox-tools">
                            <a href="{{route('backend.project.create')}}">
                                <i class="fa fa-plus"></i> <small>新增项目</small>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-primary">
                                    <div class="panel-heading">
                                        项目详情
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th>项目编号</th>
                                                <th>项目名称</th>
                                                <th>开始时间</th>
                                                <th>结束时间</th>
                                                <th>网址</th>
                                                <th>操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr id="projectTableContent">
                                                @if (!isset($projectHtml))
                                                    <td colspan="8" align="center">请选择项目</td>
                                                @endif
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        模块详情
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th>模块编号</th>
                                                <th>模块名称</th>
                                                <th>所属项目</th>
                                                <th>描述</th>
                                                <th>操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr id="moduleTableContent">
                                                @if (!isset($moduleHtml))
                                                    <td colspan="6" align="center">请选择模块</td>
                                                @endif
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        接口详情
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                            <tr>
                                                <th>接口编号</th>
                                                <th>接口名称</th>
                                                <th>所属模块</th>
                                                <th>路由</th>
                                                <th>更新时间</th>
                                                <th>操作</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr id="interfaceTableContent">
                                                @if (!isset($moduleHtml))
                                                    <td colspan="10" align="center">请选择接口</td>
                                                @endif
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section("after.js")
    <script src="/assets/backend/js/jsTree/jstree.min.js"></script>

    <script>
        $(function () {

            $projectTableContent = $('#projectTableContent');
            $projectTableContent.on('click', '#showProject' ,function(){
                var route = $('#showProject').attr('value');
                layer.open({
                    type: 2,
                    title: '查看项目详情',
                    shade: [0],
                    area: ['800px', '550px'],
                    shift: 2,
                    maxmin: true,
                    content: [route] //iframe的url
                });
            });

            $moduleTableContent = $('#moduleTableContent');
            $moduleTableContent.on('click', '#showModule' ,function(){
                var route = $('#showModule').attr('value');
                layer.open({
                    type: 2,
                    title: '查看模块详情',
                    shade: [0],
                    area: ['800px', '550px'],
                    shift: 2,
                    maxmin: true,
                    content: [route] //iframe的url
                });
            });

            $interfaceTableContent = $('#interfaceTableContent');
            $interfaceTableContent.on('click', '#showInterface' ,function(){
                var route = $('#showInterface').attr('value');
                layer.open({
                    type: 2,
                    title: '查看接口详情',
                    shade: [0],
                    area: ['800px', '550px'],
                    shift: 2,
                    maxmin: true,
                    content: [route] //iframe的url
                });
            });


            var jsTree = $('#jstree');
            jsTree.jstree({
                "plugins" : ["types"],
                "types" : {
                    "project" : {"icon" : "fa fa-sitemap"},
                    "module" : {"icon" : "fa fa-cogs"},
                    "interface" : {"icon" : "fa fa-unlink"}
                }
            });

            jsTree.on("changed.jstree", function (e, data) {
                var id = data.node.id;
                $.ajax({
                    url : '{{route("backend.project.showTable")}}',
                    data : {
                        'id' :  id
                    },
                    dataType : 'json',
                    type : 'post',
                    success : function ($data, $status) {
                        var type = $data['data']['type'];
                        var html = $data['data']['html'];

                        document.getElementById("projectTableContent").innerHTML=html['projectHtml'];
                        document.getElementById("moduleTableContent").innerHTML=html['moduleHtml'];
                        document.getElementById("interfaceTableContent").innerHTML=html['interfaceHtml'];
                    },
                    error : function ($e) {
                        console.log($e);
                    }
                })
            });

        });
    </script>
@endsection