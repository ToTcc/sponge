@extends("backend.layout.iframeMain")
@inject('commonPresenter','App\Presenters\CommonPresenter')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.layout.success')
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>发起人列表</h5>
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
                                <th>信用</th>
                                <th>状态</th>
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
                                        <td>{{$item['score']}} 分</td>
                                        <td>{{getEnumString(config('enumerations.CUSTOMER_AVAILABLE'),$item['available'])}}</td>
                                        <td>
                                            <button name="viewEventRecord" route="{{route('backend.sponsor.viewEventList',['id'=>$item['customer_id']])}}"
                                               class="btn btn-warning btn-xs" style="margin-bottom: 0">查看发起活动</button>
                                            @if($item['available'] == config('enumerations.CUSTOMER_AVAILABLE.BLACK'))
                                                <a href="{{route('backend.sponsor.enable',['id'=>$item['customer_id']])}}"
                                                        class="btn btn-success btn-xs" style="margin-bottom: 0">取消黑名单</a>
                                            @else
                                                <a href="{{route('backend.sponsor.disable',['id'=>$item['customer_id']])}}"
                                                        class="btn btn-danger btn-xs" style="margin-bottom: 0">加入黑名单</a>
                                            @endif
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
            $('button[name=viewEventRecord]').on('click' ,function(){
                var route = $(this).attr('route');
                layer.open({
                    type: 2,
                    title: '查看发起活动',
                    shade: [0],
                    area: ['80%', '90%'],
                    shift: 2,
                    maxmin: true,
                    content: [route] //iframe的url
                });
            });
        })
    </script>
@endsection