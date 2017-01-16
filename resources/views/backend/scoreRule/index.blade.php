@extends("backend.layout.iframeMain")
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.layout.success')
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>积分规则列表</h5>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>规则编号</th>
                                <th>规则名称</th>
                                <th>扣除分数</th>
                                <th>退款比例</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{$item['rule_id']}}</td>
                                        <td>{{$item['description']}}</td>
                                        <td>{{$item['score']}}</td>
                                        <td>{{$item['refund_rate']}}</td>
                                        <td>
                                            <a href="{{route('backend.scoreRule.edit',['id'=>$item['rule_id']])}}"
                                                    class="btn btn-warning btn-xs" style="margin-bottom: 0">编辑</a>
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