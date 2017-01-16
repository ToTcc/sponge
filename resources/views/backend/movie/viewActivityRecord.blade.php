@extends("backend.layout.iframeMain")
@inject('commonPresenter','App\Presenters\CommonPresenter')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.layout.success')
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th>报名人数</th>
                                <th>请假人数</th>
                                <th>总价</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$item['activity_id']}}</td>
                                    <td>{{$item['join_count']}} 人</td>
                                    <td>{{$item['refund_count']}} 人</td>
                                    <td>{{$item['total_money']}} 元</td>
                                    <td>
                                        <button name="viewJoinCustomer" route="{{route('backend.activity.viewJoinCustomer',['id'=>$item['activity_id']])}}"
                                                class="btn btn-danger btn-xs" style="margin-bottom: 0">查看报名</button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
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
                    shadeClose: true, //点击遮罩关
                    closeBtn: false,
                    content: [route] //iframe的url
                });
            });

        })
    </script>
@endsection