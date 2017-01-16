@extends('backend.layout.iframeMain')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>编辑模块</h5>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="{{route('backend.module.update',['id'=>$data->module_id])}}">
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
                            <input type="hidden" name="project_id" value="{{ $data->project_id }}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">模块名称</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="module_name" name="module_name" placeholder="模块名称" value="{{$data->module_name}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="description">描述</label>

                            <div class="col-sm-5">
                                <textarea name="description" id="description" cols="30" rows="10">{{ $data->description }}</textarea>
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
