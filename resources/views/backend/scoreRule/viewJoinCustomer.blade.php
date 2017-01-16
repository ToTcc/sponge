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
                                <th>用户名</th>
                                <th>下单时间</th>
                                <th>手机号码</th>
                                <th>性别</th>
                                <th>状态</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$item['join_id']}}</td>
                                    <td>{{$item['nickname']}}</td>
                                    <td>{{$item['created_at']}}</td>
                                    <td>{{$item['mobile']}}</td>
                                    <td>{{$item['sex']}}</td>
                                    <td>{{getEnumString(config('enumerations.ACTIVITY_JOIN_STATUS'),$item['status'])}}</td>
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