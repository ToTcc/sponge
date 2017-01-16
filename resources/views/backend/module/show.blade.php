@extends("backend.layout.iframeMain")

@section('content')
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="m-b-md">
                            <h2>{{ $data['module_name'] }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <dl class="dl-horizontal">

                            <dt>所属项目：</dt>
                            <dd>{{ getProjectNameById($data['project_id']) }}</dd>
                        </dl>
                    </div>
                    <div class="col-sm-6" id="cluster_info">
                        <dl class="dl-horizontal">

                            <dt>创建时间：</dt>
                            <dd>{{ $data['created_at'] }}</dd>
                        </dl>
                    </div>
                </div>
                <div class="row">
                    <div class="text-center">
                        <h4>模块描述</h4>
                    </div>
                    <p>
                        <br>{{ $data['description'] }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection