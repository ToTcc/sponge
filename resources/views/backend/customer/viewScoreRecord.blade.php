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
                                <th>扣分时间</th>
                                <th>扣除分数</th>
                                <th>扣分类型</th>
                                <th>扣分项目</th>
                                <th>扣分原因</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{$item['created_at']}}</td>
                                        <td>{{$item['score']}} 分</td>
                                        <td>{{getEnumString(config('enumerations.SCORE_RECORD_TYPE'),$item['type'])}}</td>
                                        <td>
                                            @if($item['type'] == config('enumerations.SCORE_RECORD_TYPE.ACTIVITY'))
                                                {{$item['movie_name']}}
                                            @elseif($item['type'] == config('enumerations.SCORE_RECORD_TYPE.EVENT'))
                                                {{$item['event_name']}}
                                            @endif
                                        </td>
                                        <td>{{$item['reason']}}</td>
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