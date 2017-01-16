@extends('backend.layout.iframeMain')

@section("content")
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.layout.success')
        <div class="row">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>权限列表</h5>

                        <div class="ibox-tools">
                            <a href="{{route('backend.permission.create')}}">
                                <i class="fa fa-plus"></i> <small>新增</small>
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content">
                        <table class="table table-hover table-striped">
                            <tr>
                                <th>权限ID</th>
                                <th>权限标识</th>
                                <th>权限类型</th>
                                <th>权限名称</th>
                                <th>权限描述</th>
                                <th>操作</th>
                            </tr>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->type}}</td>
                                    <td>{{$item->display_name}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>
                                        <a href="{{route('backend.permission.associate',['id'=>$item->id])}}" class="btn btn-info btn-flat">关联</a>
                                        <a href="{{route('backend.permission.edit',['id'=>$item->id])}}" class="btn btn-primary btn-flat">编辑</a>
                                        <button class="btn btn-danger btn-flat"
                                                data-url="{{URL::to('backend/permission/'.$item->id)}}"
                                                data-toggle="modal"
                                                data-target="#delete-modal"
                                        >
                                            删除
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    @if($data->render())
                        <div class="box-footer clearfix">
                            {!! $data->render() !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section("after.js")
    @include('backend.components.modal.delete',['title'=>'操作提示','content'=>'你确定要删除这个权限吗?'])
@endsection
