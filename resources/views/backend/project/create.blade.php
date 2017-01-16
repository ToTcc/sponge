@extends('backend.layout.iframeMain')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>新增项目</h5>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" name="addForm" action="{{route('backend.project.store')}}">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                            <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                            </ul>
                            </div>
                        @endif
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">项目名称</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="project_name" name="project_name" placeholder="项目名称" value="{{old('project_name')}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">开始时间</label>

                            <div class="col-sm-5">
                                <div class="input-append date form_date">
                                    <input size="30" type="text" id="begin_time" name="begin_time" value="{{old('begin_time')}}" readonly>
                                    <span class="add-on"><i class="icon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">结束时间</label>

                            <div class="col-sm-5">
                                <div class="input-append date form_date">
                                    <input size="30" type="text" id="end_time" name="end_time" value="{{old('end_time')}}" readonly>
                                    <span class="add-on"><i class="icon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">网址</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="head_url" name="head_url" placeholder="地址" value="{{old('head_url')}}">
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
                                新增
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
