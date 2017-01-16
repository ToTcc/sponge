@extends('backend.layout.iframeMain')

@section('after.css')
    <link href="/assets/backend/js/fancybox/jquery.fancybox.css" rel="stylesheet">
@endsection

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>处理认证</h5>
                    </div>
                    @include('backend.layout.error')
                    <div class="ibox-content">
                        @foreach($data['imageUrl'] as $item)
                            <a class="fancybox" href="{{ $item }}" title="放大图">
                                <img alt="image" src="{{ $item }}" style="width:250px;height:140px;">
                            </a>
                        @endforeach
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="{{route('backend.verifyHouse.houseDetailPost',[ 'id'=>$data['id'] ])}}">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put">

                            <div class="box-footer clearfix">
                                <a href="javascript:history.back(-1);" class="btn btn-white">
                                    <i class="fa fa-arrow-left"></i>
                                    返回
                                </a>
                                <button type="submit" class="btn btn-success pull-right btn-flat">
                                    <i class="fa fa-plus"></i>
                                    认证成功
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('after.js')
    <script src="/assets/backend/js/fancybox/jquery.fancybox.js"></script>
    <script>
        $(document).ready(function(){$(".fancybox").fancybox({openEffect:"none",closeEffect:"none"})});
    </script>
@endsection