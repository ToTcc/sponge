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
                                <th>占座时间</th>
                                <th>占座状态</th>
                                <th>豆瓣链接</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{$item['like_id']}}</td>
                                        <td>{{$item['title']}}</td>
                                        <td>{{$item['created_at']}}</td>
                                        <td>{{getEnumString(config('enumerations.MOVIE_STATUS'),$item['status'])}}</td>
                                        <td><a target="_blank" href="{{$item['link']}}">点击查看</a></td>
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