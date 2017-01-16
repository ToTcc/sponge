@extends('backend.layout.iframeMain')

@section("content")
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>编辑操作</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="{{route('backend.action.update',['id'=>$data->id])}}">
                            @include('backend.layout.error')
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">操作分组</label>

                                <div class="col-sm-5">
                                    <select class="form-control select2" name="group">
                                        @foreach(config('cowcat.action-group') as $key => $group)
                                            <option value="{{$key}}"
                                                    @if($key == $data->group) selected @endif
                                            >{{$group}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">操作名称</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="操作名称" value="{{$data->name}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">操作描述</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="description" name="description" placeholder="操作描述" value="{{$data->description}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">操作标识</label>

                                <div class="col-sm-5">
                                    <select class="form-control select2" name="action">
                                        @foreach($actions as $key => $action)
                                            <option value="{{$action}}"
                                                    @if($action == $data->action) selected @endif
                                            >{{$action}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否禁用</label>

                                <div class="col-sm-5">
                                    <select class="form-control select2" name="state">
                                        <option selected="selected" value="0">禁用</option>
                                        <option value="1">启用</option>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="box-footer clearfix">
                                <a href="javascript:history.back(-1);" class="btn btn-white">
                                    <i class="fa fa-arrow-left"></i>
                                    返回
                                </a>
                                <button type="submit" class="btn btn-success pull-right btn-flat">
                                    <i class="fa fa-plus"></i>
                                    修改
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>