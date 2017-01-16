@extends('backend.layout.iframeMain')

@section("content")
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>新增权限</h5>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="{{route('backend.permission.store')}}">
                        @include('backend.layout.error')
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">权限标识</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name" name="name" placeholder="权限标识"
                                       value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">权限分类</label>

                            <div class="col-sm-5">
                                <select name="type" id="type" class="select2 form-control" style="width:100%;">
                                    @foreach(config('cowcat.permission-type') as $key => $value)
                                        <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">权限名称</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="display_name" name="display_name"
                                       placeholder="权限名称" value="{{old('display_name')}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">权限描述</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="description" name="description"
                                       placeholder="权限描述" value="{{old('description')}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <a href="javascript:history.back(-1);" class="btn btn-default btn-flat">
                            <i class="fa fa-arrow-left"></i>
                            返回
                        </a>
                        <button type="submit" class="btn btn-success pull-right btn-flat">
                            <i class="fa fa-plus"></i>
                            新 增
                        </button>
                    </form>
                </div>
        </div>
    </div>
@endsection