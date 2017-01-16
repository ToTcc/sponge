@extends('backend.layout.iframeMain')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>编辑项目</h5>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="{{route('backend.project.update',['id'=>$data->project_id])}}">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                            <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                            </ul>
                            </div>
                        @endif
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">项目名称</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="project_name" name="project_name" placeholder="项目名称" value="{{$data->project_name}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">开始时间</label>

                            <div class="col-sm-5">
                                <div class="input-append date form_date">
                                    <input size="30" type="text" id="begin_time" name="begin_time" value="{{$data->begin_time}}" readonly>
                                    <span class="add-on"><i class="icon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">结束时间</label>

                            <div class="col-sm-5">
                                <div class="input-append date form_date">
                                    <input size="30" type="text" id="end_time" name="end_time" value="{{$data->end_time}}" readonly>
                                    <span class="add-on"><i class="icon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">网址</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="head_url" name="head_url" placeholder="网址" value="{{$data->head_url}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="box-footer clearfix">
                            <a href="javascript:history.back(-1);" class="btn btn-white">
                                <i class="fa fa-arrow-left"></i>
                                返回
                            </a>
                            <button type="submit" class="btn btn-success pull-right btn-flat">
                                <i class="fa fa-plus"></i>
                                修改
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('after.js')
    <script type="text/javascript" src="/assets/backend/js/ajaxfileupload.js"></script>
    <script type="text/javascript" src="/assets/backend/js/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/assets/backend/js/ueditor/ueditor.all.min.js"></script>

    <script type="text/javascript">
        $(function () {

            $(".form_datetime").datetimepicker({
                format: "yyyy-mm-dd hh:ii:ss",
                autoclose: true,
                todayBtn: true,
                minuteStep: 5
            });

        });
    </script>
@endsection
