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
                                <th>电影名称</th>
                                <th>发布时间</th>
                                <th>举办时间</th>
                                <th>活动类型</th>
                                <th>价格</th>
                                <th>参与人数</th>
                                <th>状态</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$item['event_id']}}</td>
                                    <td>{{$item['title']}}</td>
                                    <td>{{$item['created_at']}}</td>
                                    <td>{{$item['open_time']}}</td>
                                    <td>{{getEnumString(config('enumerations.EVENT_TYPE'),$item['event_type'])}}</td>
                                    <td>{{$item['price']}} 元</td>
                                    <td>{{$item['join_number']}}</td>
                                    <td>{{getEnumString(config('enumerations.EVENT_STATUS'),$item['status'])}}</td>
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
@endsection