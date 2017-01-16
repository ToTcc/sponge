@extends("backend.layout.iframeMain")

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>新增用户</h5>
                </div>
                <div class="ibox-content">
                    <form method="post" class="form-horizontal" action="{{route('backend.user.store')}}">
                        @include('backend.layout.error')
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="col-sm-2 control-label">用户角色</label>

                            <div class="col-sm-5">
                                <select class="form-control select2" multiple="multiple" name="role_id[]" style="width: 100%;">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->display_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">用户名或邮箱</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="email" name="email" placeholder="用户名" value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">姓名</label>

                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="name" name="name" placeholder="姓名" value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">用户密码</label>

                            <div class="col-sm-5">
                                <input type="password" class="form-control" id="password" name="password" placeholder="用户密码" value="{{old('password')}}">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">确认密码</label>

                            <div class="col-sm-5">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="确认密码" value="{{old('password_confirmation')}}">
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