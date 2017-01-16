<!DOCTYPE html>
<html lang="zh">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <title>{{ $page_title or "SAME电影" }}</title>
    @yield('before.css')
    @include('backend.layout.css')
    @yield('after.css')
</head>

<body  class="gray-bg">
@yield('content')

@yield('before.js')
@include('backend.layout.js')
@yield('after.js')
</body>
</html>
