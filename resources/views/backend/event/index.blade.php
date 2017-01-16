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
                        <table class="table table-hover table-striped" style="table-layout:fixed">
                            <thead>
                            <tr>
                                <th>活动名称</th>
                                <th>发起人</th>
                                <th>手机号码</th>
                                <th>发布时间</th>
                                <th>举办时间</th>
                                <th>活动类型</th>
                                <th>价格</th>
                                <th>地点</th>
                                <th>人数限制</th>
                                <th>状态</th>
                                <th style="width:20%">操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td title="{{$item['title']}}" style="white-space:nowrap;overflow:hidden;text-overflow: ellipsis;">{{$item['title']}}</td>
                                        <td>{{$item['nickname']}}</td>
                                        <td title="{{$item['mobile']}}" style="white-space:nowrap;overflow:hidden;text-overflow: ellipsis;">{{$item['mobile']}}</td>
                                        <td title="{{$item['created_at']}}" style="white-space:nowrap;overflow:hidden;text-overflow: ellipsis;">{{$item['created_at']}}</td>
                                        <td title="{{$item['open_time']}}" style="white-space:nowrap;overflow:hidden;text-overflow: ellipsis;">{{$item['open_time']}}</td>
                                        <td>{{getEnumString(config('enumerations.EVENT_TYPE'),$item['event_type'])}}</td>
                                        <td>{{$item['price']}}</td>
                                        <td title="{{$item['address']}}" style="white-space:nowrap;overflow:hidden;text-overflow: ellipsis;">{{$item['address']}}</td>
                                        <td>{{$item['upper_limit']}}</td>
                                        <td>{{getEnumString(config('enumerations.EVENT_STATUS'),$item['status'])}}</td>
                                        <td>
                                            <a href="{{route('backend.event.edit',['id'=>$item['event_id']])}}" class="btn btn-xs btn-warning" style="margin-bottom: 0">编辑</a>
                                            <button name="viewEventList" route="{{route('merchant.index.eventJoin',['id'=>$item['event_id']])}}"
                                                    class="btn btn-danger btn-xs" style="margin-bottom: 0">查看报名</button>
                                        @if($item['status'] == config('enumerations.EVENT_STATUS.WAITING_VERIFY'))
                                                <a href="{{route('backend.event.enable',['id'=>$item['event_id']])}}" class="btn btn-xs btn-info" style="margin-bottom: 0">上架</a>
                                            @endif
                                            <button name="preview" route="{{route('backend.event.preview',['id'=>$item['event_id']])}}" class="btn btn-xs btn-success" style="margin-bottom: 0">预览</button>
                                            @if($item['status'] == config('enumerations.EVENT_STATUS.WAITING_JOIN') || $item['status'] == config('enumerations.EVENT_STATUS.FULL'))
                                                <a href="{{route('backend.event.cancel',['id'=>$item['event_id']])}}"
                                                   class="btn btn-danger btn-xs" style="margin-bottom: 0">取消&退款</a>
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
            $('button[name=preview]').on('click' ,function(){
                var route = $(this).attr('route');
                layer.open({
                    type: 2,
                    title: '活动预览二维码',
                    shadeClose: true, //点击遮罩关闭层
                    closeBtn: false,
                    area: ['20%', '45%'],
                    content: [route] //iframe的url
                });
            });
            $('button[name=viewEventList]').on('click' ,function(){
                var route = $(this).attr('route');
                layer.open({
                    type: 2,
                    title: '查看报名',
                    shadeClose: true, //点击遮罩关闭层
                    closeBtn: false,
                    area: ['80%', '90%'],
                    content: [route] //iframe的url
                });
            });
        })
    </script>
@endsection