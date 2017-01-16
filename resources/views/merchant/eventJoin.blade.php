@extends("backend.layout.iframeMain")
@inject('commonPresenter','App\Presenters\CommonPresenter')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.layout.success')
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        @if(isNullOrEmpty($data))
                            <div class="row">
                                <div class="col-sm-12" style="text-align: center">
                                    暂无报名用户
                                </div>
                            </div>
                        @else
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr>
                                    <th>编号</th>
                                    <th>用户名</th>
                                    <th>手机号码</th>
                                    <th>报名时间</th>
                                    <th>问题一回答</th>
                                    <th>问题二回答</th>
                                    <th>问题三回答</th>
                                    <th>签到时间</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{$item['join_id']}}</td>
                                        <td>{{$item['nickname']}}</td>
                                        <td>{{$item['mobile']}}</td>
                                        <td>{{$item['join_time']}}</td>
                                        <td>{{$item['answer_one']}}</td>
                                        <td>{{$item['answer_two']}}</td>
                                        <td>{{$item['answer_three']}}</td>
                                        <td>{{$item['sign_time'] or "未签到"}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("after.js")
@endsection