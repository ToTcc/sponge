@extends('backend.layout.iframeMain')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>编辑菜单</h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal" action="{{route('backend.menu.update',['id'=>$data->id])}}" method="post">
                        @include('backend.layout.error')
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">父级菜单</label>

                            <div class="col-sm-5">
                                <select class="form-control select2" style="width: 100%;" name="parent_id">
                                    <option selected="selected" value="0">顶级分类</option>
                                    @foreach($tree as $item)
                                        <option value="{{$item['id']}}"
                                                @if($data['parent_id'] == $item['id']) selected="selected" @endif>
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
                                <input type="text" class="form-control" id="name" name="name" placeholder="菜单名称" value="{{$data->name}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">菜单描述</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="description" name="description"
                                       placeholder="菜单描述" value="{{$data->description}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">菜单路由</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="route" name="route" placeholder="菜单路由"
                                       value="{{$data->route}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">菜单图标</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="icon" name="icon" placeholder="菜单图标"
                                       value="{{$data->icon}}">

                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">菜单排序</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="sort" name="sort" placeholder="菜单排序"
                                       value="{{$data->sort}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">是否隐藏</label>

                            <div class="col-sm-10">
                                <select class="form-control select2" name="hide">
                                    <option
                                            @if($data->hide == 0)
                                            selected="selected"
                                            @endif
                                            value="0">显示
                                    </option>
                                    <option
                                            @if($data->hide == 1)
                                            selected="selected"
                                            @endif
                                            value="1">隐藏
                                    </option>
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
                                <i class="fa fa-edit"></i>
                                修改
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
