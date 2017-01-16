@extends("backend.layout.iframeMain")

@section('content')
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="m-b-md">
                            <h2>{{ $data['project_name'] }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <dl class="dl-horizontal">

                            <dt>启动时间：</dt>
                            <dd>{{ $data['begin_time'] }}</dd>
                            <dt>截止时间：</dt>
                            <dd>{{ $data['end_time'] }}</dd>
                            <dt>创建时间：</dt>
                            <dd>{{ $data['created_at'] }}</dd>
                            <dt>更新时间：</dt>
                            <dd>{{ $data['updated_at'] }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-6">
                        <dl class="dl-horizontal">

                            <dt>更新次数：</dt>
                            <dd>{{ $data['lastest_update_number'] }}</dd>
                            <dt>网址：</dt>
                            <dd>{{ $data['head_url'] }}</dd>
                            <dt>团队成员：</dt>
                            <dd>
                                <span>刘德华</span>
                                <span>张学友</span>
                                <span>黎明</span>
                                <span>郭富城</span>
                                <span>郭富城</span>
                                <span>郭富城</span>
                                <span>郭富城</span>
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <dl class="dl-horizontal">
                            <dt>时间进度</dt>
                            <dd>
                                <div class="progress progress-striped active m-b-sm">
                                    <div style="width: {{ $rateString }};" class="progress-bar"></div>
                                </div>
                                <small>项目时间已过去 <strong>{{ $rateString }}</strong></small>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection