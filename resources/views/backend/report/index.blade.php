@extends("backend.layout.iframeMain")
@inject('commonPresenter','App\Presenters\CommonPresenter')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.layout.success')
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>举报列表</h5>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>编号</th>
                                <th>举报人</th>
                                <th>被举报人</th>
                                <th>举报类型</th>
                                <th>举报内容</th>
                                <th>举报时间</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{$item->report_id}}</td>
                                        <td>{{$item->customer_name}}</td>
                                        <td>{{$item->report_customer_name}}</td>
                                        <td>{{$item->report_type}}</td>
                                        <td>{{$item->content}}</td>
                                        <td>{{$item->created_at}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>
                                            <a href="{{route('backend.report.viewDetail',['id'=>$item->report_id])}}"
                                               class="btn btn-link btn-xs" style="margin-bottom: 0">处理举报</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($data->render())
                        <div class="box-footer clearfix">
                            {!! $commonPresenter->renderPagination($data) !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection