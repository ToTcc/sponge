<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAME电影后台管理</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" type="text/css" href="{{ elixir('assets/backend/css/app.min.css') }}">
</head>
<body id="login" class="hold-transition login-page" style="background-image: url('{{array_random(config('cowcat.background-images'))}}');">
<div class="login-box">
    <div class="login-logo">
        <b>SAME电影</b> 后台管理
    </div>
    <div class="login-box-body">
        <form action="{{URL::to('/auth/login')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="用户名" name="email" value="{{old('email')}}">
                        <span class="fa fa-user form-control-feedback"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="密码" name="password" value="{{old('password')}}">
                        <span class="fa fa-lock form-control-feedback"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group has-feedback">
                            <input type="text" class="form-control" placeholder="验证码" name="checkCode" value="{{old('checkCode')}}">
                            <span class="fa fa-check-circle form-control-feedback"></span>
                            <br>
                            <img src="{{ action('Auth\AuthController@getCheckCode') }}" id="checkCode" name="checkCode" title="看不清，点击换一张" align="absmiddle">                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-4 pull-right">
                    <button type="submit" class="btn btn-success btn-block btn-flat">登 录</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="{{ elixir('assets/backend/js/app.min.js') }}"></script>
<script type="text/javascript">
    $("#checkCode").click(function(){
        $(this).attr("src",'{{ action('Auth\AuthController@getCheckCode') }}');
    });
</script>
</body>

</html>
