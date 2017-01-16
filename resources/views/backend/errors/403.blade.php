@extends('backend.layout.iframeMain')

@section('content')
    <div class="middle-box text-center animated fadeInDown">
        <h1>403</h1>
        <h3 class="font-bold">对不起，你没有权限操作这个页面！</h3>

        <div class="error-desc">
            如果需要访问这个页面，请与系统管理员联系。
            <form class="form-inline m-t" role="form">
                <a href="{{ $previousUrl }}" class="btn btn-primary">点击返回</a>
            </form>
        </div>
    </div>
@endsection