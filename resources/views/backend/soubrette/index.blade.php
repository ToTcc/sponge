@extends("backend.layout.iframeMain")
@inject('commonPresenter','App\Presenters\CommonPresenter')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.layout.success')
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>红娘信息</h5>
                        <div class="ibox-tools">
                            <a href="{{route('backend.soubrette.create')}}">
                                <i class="fa fa-plus"></i> <small>新增</small>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            {!! $commonPresenter->renderSearchForm($search) !!}
                        </div>
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th>红娘名称</th>
                                <th>手机号码</th>
                                <th>创建时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{$item->soubrette_id}}</td>
                                        <td>{{$item->soubrette_name}}</td>
                                        <td>{{$item->mobile}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>
                                            <a href="{{route('backend.activity.edit',['id'=>$item->activity_id])}}"
                                               class="btn btn-link btn-xs" style="margin-bottom: 0">查看会员</a> |
                                            <a href="{{route('backend.soubrette.edit',['id'=>$item->soubrette_id])}}"
                                               class="btn btn-link btn-xs" style="margin-bottom: 0">修改</a> |
                                            <button class="btn btn-link btn-xs" style="margin-bottom: 0"
                                                    data-url="{{route('backend.soubrette.destroy',['id'=>$item->soubrette_id])}}"
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
                            {!! $commonPresenter->renderPagination($data,$search) !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section("after.js")
    @include('backend.components.modal.delete',['title'=>'操作提示','content'=>'你确定要删除此红娘吗?'])
    <script>
        $(function () {
            $('a[name=viewJoin]').on('click' ,function(){
                var route = $(this).attr('route');
                layer.open({
                    type: 2,
                    title: '查看会员',
                    shade: [0],
                    area: ['800px', '550px'],
                    shift: 2,
                    maxmin: true,
                    content: [route] //iframe的url
                });
            });
        })
    </script>
@endsection