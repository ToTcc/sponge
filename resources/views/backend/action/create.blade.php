@extends('backend.layout.iframeMain')

@section("content")
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>新增操作</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="{{route('backend.action.store')}}">
                            @include('backend.layout.error')
                            {!! csrf_field() !!}
                            <div class="form-group">
                                <label class="col-sm-2 control-label">操作分组</label>

                                <div class="col-sm-5">
                                    <select class="form-control select2" name="group">
                                        @foreach(config('cowcat.action-group') as $key => $group)
                                            <option value="{{$key}}">{{$group}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">操作名称</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="操作名称" value="{{old('name')}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">操作描述</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="description" name="description" placeholder="操作描述" value="{{old('description')}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">操作标识</label>

                                <div class="col-sm-5">
                                    <select class="form-control select2" name="action">
                                        @foreach($actions as $key => $action)
                                            <option value="{{$action}}">{{$action}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否禁用</label>

                                <div class="col-sm-5">
                                    <select class="form-control select2" name="state">
                                        <option value="0">禁用</option>
                                        <option selected="selected" value="1">启用</option>
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
                                    新增
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection