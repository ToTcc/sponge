@extends("backend.layout.iframeMain")
@section('content')
    {!! QrCode::size(200)->generate($url) !!}
@endsection