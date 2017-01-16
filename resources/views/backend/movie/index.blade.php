@extends("backend.layout.iframeMain")
@inject('commonPresenter','App\Presenters\CommonPresenter')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.layout.success')
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>电影列表</h5>
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
                                <th>电影编号</th>
                                <th>电影名称</th>
                                <th>放映次数</th>
                                <th>状态</th>
                                <th>评分</th>
                                <th>豆瓣链接</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{$item['movie_id']}}</td>
                                        <td>{{$item['title']}}</td>
                                        <td>{{$item['activity_count']}}</td>
                                        <td>{{getEnumString(config('enumerations.MOVIE_STATUS'),$item['status'])}}</td>
                                        <td>{{$item['rating']}}</td>
                                        <td><a target="_blank" href="{{$item['link']}}">点击查看</a></td>
                                        <td>
                                            <button name="viewLikeCustomer" route="{{route('backend.movie.viewLikeCustomer',['id'=>$item['douban_id']])}}"
                                               class="btn btn-warning btn-xs" style="margin-bottom: 0">查看占座</button>
                                            <button name="viewLikeCustomer" route="{{route('backend.movie.viewActivityRecord',['id'=>$item['douban_id']])}}"
                                                    class="btn btn-info btn-xs" style="margin-bottom: 0">放映记录</button>
                                            @if($item['status'] == config('enumerations.MOVIE_STATUS.INIT'))
                                            <a href="{{route('backend.activity.create',['id'=>$item['douban_id']])}}"
                                               class="btn btn-success btn-xs" style="margin-bottom: 0">生成放映</a>
                                            <a href="{{route('backend.movie.disable',['id'=>$item['douban_id']])}}"
                                                   class="btn btn-danger btn-xs" style="margin-bottom: 0">无法放映</a>
                                            @elseif($item['status'] == config('enumerations.MOVIE_STATUS.UNABLE'))
                                            <a href="{{route('backend.movie.enable',['id'=>$item['douban_id']])}}"
                                                   class="btn btn-primary btn-xs" style="margin-bottom: 0">恢复占座</a>
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
            $('button[name=viewLikeCustomer]').on('click' ,function(){
                var route = $(this).attr('route');
                layer.open({
                    type: 2,
                    title: '放映记录',
                    area: ['80%', '90%'],
                    shadeClose: true, //点击遮罩关闭层
                    closeBtn: false,
                    content: [route] //iframe的url
                });
            });
        })
    </script>
@endsection