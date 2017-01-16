@extends('backend.layout.iframeMain')

@section("content")
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.layout.success')
        <div class="row">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>操作列表</h5>

                        <div class="ibox-tools">
                            <a href="{{route('backend.action.create')}}">
                                <i class="fa fa-plus"></i> <small>新增</small>
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>操作ID</th>
                                <th>操作名称</th>
                                <th>操作描述</th>
                                <th>操作分组</th>
                                <th>操作标识</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->group}}</td>
                                    <td>{{$item->action}}</td>
                                    <td>
                                        <a href="{{route('backend.action.edit',['id'=>$item->id])}}" class="btn btn-primary btn-flat">编辑</a>
                                        <button class="btn btn-danger btn-flat"
                                                data-url="{{URL::to('backend/action/'.$item->id)}}"
                                                data-toggle="modal"
                                                data-target="#delete-modal"
                                        >
                                            删除
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
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
    @include('backend.components.modal.delete',['title'=>'操作提示','content'=>'你确定要删除这个操作吗?'])
@endsection
