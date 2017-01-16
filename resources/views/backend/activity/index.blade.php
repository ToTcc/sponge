@extends("backend.layout.iframeMain")
@inject('commonPresenter','App\Presenters\CommonPresenter')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.layout.success')
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>活动列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            {!! $commonPresenter->renderSearchForm($search) !!}
                        </div>
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>放映编号</th>
                                <th>电影名称</th>
                                <th>创建时间</th>
                                <th>放映类型</th>
                                <th>成本价格</th>
                                <th>报名人数</th>
                                <th>截止日期</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{$item['activity_id']}}</td>
                                        <td>{{$item['title']}}</td>
                                        <td>{{$item['created_at']}}</td>
                                        <td>{{getEnumString(config('enumerations.ACTIVITY_STATUS'),$item['status'])}}</td>
                                        <td>{{$item['cost']}}元</td>
                                        <td>{{$item['join_number']}}</td>
                                        <td>{{$item['deadline']}}</td>
                                        <td>
                                            @if($item['status'] == config('enumerations.ACTIVITY_STATUS.WAITING_PLAY'))
                                                <a href="javascript:void(0)" url="{{route('backend.activity.cancel',['id'=>$item['activity_id']])}}"
                                                   class="btn btn-danger btn-xs cancel" style="margin-bottom: 0">取消&退款</a>
                                            @endif
                                            <button name="viewJoinCustomer" route="{{route('backend.activity.viewJoinCustomer',['id'=>$item['activity_id']])}}"
                                                    class="btn btn-danger btn-xs" style="margin-bottom: 0">查看报名</button>
                                            <a href="{{route('backend.activity.edit',['id'=>$item['activity_id']])}}"
                                                    class="btn btn-warning btn-xs" style="margin-bottom: 0">编辑放映</a>
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
    <script>
        $(function () {
            $('button[name=viewJoinCustomer]').on('click' ,function(){
                var route = $(this).attr('route');
                layer.open({
                    type: 2,
                    title: '查看报名',
                    area: ['80%', '90%'],
                    shadeClose: true, //点击遮罩关闭层
                    closeBtn: false,
                    content: [route] //iframe的url
                });
            });

            $("a.cancel").click(function() {
                var url = $(this).attr("url");
                if(confirm("是否确认取消本次活动?")) {
                    window.location.href = url;
                }
            });

        })
    </script>
@endsection