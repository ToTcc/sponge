@extends("backend.layout.iframeMain")

@section('content')
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="m-b-md">
                            <h2>{{ $data['interface_name'] }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <dl class="dl-horizontal">

                            <dt>所属模块：</dt>
                            <dd>{{ getModuleNameById($data['module_id']) }}</dd>
                            <dt>输入：</dt>
                            <dd>{{ $data['input'] }}</dd>
                            <dt>输出：</dt>
                            <dd>{{ $data['output'] }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-6" id="cluster_info">
                        <dl class="dl-horizontal">

                            <dt>路由：</dt>
                            <dd>{{ $data['route'] }}</dd>
                            <dt>创建时间：</dt>
                            <dd>{{ $data['created_at'] }}</dd>
                            <dt>更新时间：</dt>
                            <dd>{{ $data['updated_at'] }}</dd>
                        </dl>
                    </div>
                </div>
                <div class="row">
                    <div class="text-center">
                        <h4>接口描述</h4>
                    </div>
                    <p>
                        <br>{{ $data['description'] }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection