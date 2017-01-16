@extends("backend.layout.iframeMain")
@inject('commonPresenter','App\Presenters\CommonPresenter')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.layout.success')
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>拍砖列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            {!! $commonPresenter->renderSearchForm($search) !!}
                        </div>
                        <table class="table table-hover table-striped" style="table-layout:fixed">
                            <thead>
                            <tr>
                                <th>拍砖编号</th>
                                <th>用户名称</th>
                                <th>微信号</th>
                                <th>手机号</th>
                                <th>邮箱</th>
                                <th>拍砖内容</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{$item['suggestion_id']}}</td>
                                        <td>{{$item['nickname']}}</td>
                                        <td>{{$item['wechat_id']}}</td>
                                        <td>{{$item['mobile']}}</td>
                                        <td>{{$item['email']}}</td>
                                        <td title="{{$item['description']}}" style="white-space:nowrap;overflow:hidden;text-overflow: ellipsis;">{{$item['description']}}</td>
                                        <td>
                                            <button name="viewDescription" route="{{route('backend.suggestions.viewDescription',['id'=>$item['suggestion_id']])}}"
                                                    class="btn btn-danger btn-xs" style="margin-bottom: 0">查看内容</button>
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
            $('button[name=viewDescription]').on('click' ,function(){
                var route = $(this).attr('route');
                layer.open({
                    type: 2,
                    title: '查看拍砖内容',
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