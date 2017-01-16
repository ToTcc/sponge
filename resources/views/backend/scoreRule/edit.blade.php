@extends('backend.layout.iframeMain')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>编辑表单</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="{{route('backend.scoreRule.update',['id'=>$data['rule_id']])}}">
                            @include('backend.layout.error')
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">规则名称</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="description" name="description"  value="{{$data['description']}}" disabled="disabled">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">扣除分数</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="score" name="score" placeholder="扣除分数" value="{{$data['score']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">退款比例（请输入0-1之间的实数）</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="refund_rate" name="refund_rate" placeholder="退款比例" value="{{$data['refund_rate']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="box-footer clearfix">
                                <a href="javascript:history.back(-1);" class="btn btn-white">
                                    <i class="fa fa-arrow-left"></i>
                                    返回
                                </a>
                                <button id="send" type="button" class="btn btn-success pull-right btn-flat">
                                    <i class="fa fa-edit"></i>
                                    修改
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
    <script type="text/javascript" src="/assets/backend/js/ajaxfileupload.js"></script>
    @include('UEditor::head');

    <script type="text/javascript">
        $(function () {

            $("button#send").click(function() {

                var score = $("input[name=score]").val();
                var refund_rate = $("input[name=refund_rate]").val();

                if(isNullOrEmpty(score) && score != 0) {
                    layer.msg("必须输入扣除分数");
                    return false;
                } else if (!score.match('^(0|[1-9]\d*)$')) {
                    layer.msg('扣除分数只能为非负整数!');
                    return false;
                }

                if(isNullOrEmpty(refund_rate) && refund_rate != 0) {
                    layer.msg("必须输入退款比例");
                    return false;
                } else if (!refund_rate.match('1|0|0[.]([0-9]+)')) {
                    layer.msg("退款比例只能为0-1之间的实数");
                    return false;
                }

                $("div.box-footer").hide();

                $("form").submit();

            });

            $("button#moveUpload").click(function() {
                //上传文件
                $.ajaxFileUpload({
                    url : '{{route("backend.common.uploadImage")}}',//处理图片脚本
                    secureuri :false,
                    fileElementId :'fileToUploadMovie',//file控件id
                    dataType : 'json',
                    success : function (data, status) {
                        $("input[name=qrcode_image]").val(data);
                        $("img[name=moviePreImage]").attr("src", data);
                    },
                    error: function(data, status, e){
                        alert(e);
                    }
                })

            });

            $("button#activityUpload").click(function() {
                //上传文件
                $.ajaxFileUpload({
                    url : '{{route("backend.common.uploadImage")}}',//处理图片脚本
                    secureuri :false,
                    fileElementId :'fileToUploadActivity',//file控件id
                    dataType : 'json',
                    success : function (data, status) {
                        $("input[name=activity_qrcode_image]").val(data);
                        $("img[name=activityPreImage]").attr("src", data);
                    },
                    error: function(data, status, e){
                        alert(e);
                    }
                })

            });
        });

    </script>
@endsection
