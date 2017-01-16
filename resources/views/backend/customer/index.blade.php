@extends("backend.layout.iframeMain")
@inject('commonPresenter','App\Presenters\CommonPresenter')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.layout.success')
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>用户列表</h5>
                        <div class="ibox-tools">
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            {!! $commonPresenter->renderSearchForm($search) !!}
                        </div>
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>用户编号</th>
                                <th>用户名称</th>
                                <th>手机号码</th>
                                <th>性别</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{$item['customer_id']}}</td>
                                        <td>{{$item['nickname']}}</td>
                                        <td>{{$item['mobile']}}</td>
                                        <td>{{$item['sex']}}</td>
                                        <td>
                                            <button name="viewMovieLike" route="{{route('backend.customer.viewMovieLike',['id'=>$item['customer_id']])}}"
                                               class="btn btn-warning btn-xs" style="margin-bottom: 0">查看占座</button>
                                            <button name="viewActivityJoin" route="{{route('backend.customer.viewActivityJoin',['id'=>$item['customer_id']])}}"
                                               class="btn btn-danger btn-xs" style="margin-bottom: 0">查看订单</button>
                                            <button name="viewScoreRecord" route="{{route('backend.customer.viewScoreRecord',['id'=>$item['customer_id']])}}"
                                                    class="btn btn-info btn-xs" style="margin-bottom: 0">查看扣分</button>
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
            $('button[name=viewMovieLike]').on('click' ,function(){
                var route = $(this).attr('route');
                layer.open({
                    type: 2,
                    title: '查看占座',
                    area: ['80%', '90%'],
                    shadeClose: true, //点击遮罩关闭层
                    closeBtn: false,
                    content: [route] //iframe的url
                });
            });

            $('button[name=viewActivityJoin]').on('click' ,function(){
                var route = $(this).attr('route');
                layer.open({
                    type: 2,
                    title: '查看订单',
                    area: ['80%', '90%'],
                    shadeClose: true, //点击遮罩关闭层
                    closeBtn: false,
                    content: [route] //iframe的url
                });
            });

            $('button[name=viewScoreRecord]').on('click' ,function(){
                var route = $(this).attr('route');
                layer.open({
                    type: 2,
                    title: '查看扣分',
                    area: ['80%', '90%'],
                    shadeClose: true, //点击遮罩关闭层
                    closeBtn: false,
                    content: [route] //iframe的url
                });
            });
        })
    </script>
@endsection