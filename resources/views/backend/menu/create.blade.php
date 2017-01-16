@extends('backend.layout.iframeMain')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>新增菜单</h5>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="{{route('backend.menu.store')}}">
                        @include('backend.layout.error')
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">父级菜单</label>

                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;" name="parent_id">
                                    <option selected="selected" value="0">顶级分类</option>
                                    @foreach($tree as $item)
                                        <option selected="selected" value="{{$item['id']}}">
                                            {{ $item['html'] }}{{ $item['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">菜单名称</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name" name="name" placeholder="菜单名称"
                                       value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">菜单描述</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="description" name="description"
                                       placeholder="菜单描述" value="{{old('description')}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">菜单路由</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="route" name="route" placeholder="菜单路由"
                                       value="{{old('route')}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">菜单图标</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="icon" name="icon" placeholder="菜单图标"
                                       value="{{old('icon')}}">

                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">菜单排序</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="sort" name="sort" placeholder="菜单排序"
                                       value="0" value="{{old('sort')}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">是否隐藏</label>

                            <div class="col-sm-10">
                                <select class="form-control select2" name="hide">
                                    <option selected="selected" value="0">显示</option>
                                    <option value="1">隐藏</option>
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
@endsection
