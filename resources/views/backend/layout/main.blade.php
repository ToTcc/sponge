<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SAME电影</title>
    <meta name="renderer" content="webkit">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    @yield('before.css')
    <link rel="shortcut icon" href="favicon.ico">
    <link href="/assets/backend/css/bootstrap.min14ed.css?v=3.3.6" rel="stylesheet">
    <link href="/assets/backend/css/font-awesome.min93e3.css?v=4.4.0" rel="stylesheet">
    <link href="/assets/backend/css/animate.min.css" rel="stylesheet">
    <link href="/assets/backend/css/style.min862f.css?v=4.1.0" rel="stylesheet">
    @yield('after.css')
</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
    <div id="wrapper">
        @inject('mainPresenter','App\Presenters\MainPresenter')
        @include('backend.layout.sidebar')
        @include('backend.layout.header')
    </div>

@yield('before.js')
    @include('backend.layout.js')
@yield('after.js')
</body>
</html>
