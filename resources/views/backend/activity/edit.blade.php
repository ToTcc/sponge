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
                        <form method="post" class="form-horizontal" action="{{route('backend.activity.update',['id'=>$data['activity_id']])}}">
                            @include('backend.layout.error')
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">电影名称</label>
                                <div class="col-sm-5">
                                    <input type="hidden" class="form-control" id="movie_id" name="movie_id" value="{{$movie['douban_id']}}">
                                    <input type="text" class="form-control" id="title" name="title"  value="{{$movie['info']['title']}}" disabled="disabled">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">放映描述</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="description" />
                                    <script type="text/plain" id="description" name="description"></script>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">成本价格</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="cost" name="cost" placeholder="成本价格" value="{{$data['cost']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">人数上限</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="upper_limit" name="upper_limit" placeholder="人数上限" value="{{$data['upper_limit']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">地址</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="地址" value="{{$data['address']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">放映时间</label>
                                <div class="col-sm-5">
                                    <div class="input-append date form_datetime">
                                        <input size="30" type="text" class="form-control" id="show_time" name="show_time" value="{{$data['show_time']}}" readonly>
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">报名截止日期</label>
                                <div class="col-sm-5">
                                    <div class="input-append date form_datetime">
                                        <input size="30" type="text" class="form-control" id="deadline" name="deadline" value="{{$data['deadline']}}" readonly>
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否有后续活动</label>
                                <div class="col-sm-5">
                                    {!! getEnumSelectWidget(config('enumerations.DEFAULT_YN'), 'is_continue', !isNullOrEmpty($data['qrcode_image']) ? 1 : 2, 0) !!}
                                </div>
                            </div>
                            <div id="movieQRCode" style="display:none;">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">放映二维码预览</label>
                                    <div class="col-sm-5">
                                        <img src="{{$data['qrcode_image']}}" name="moviePreImage" style="width:168.5px;height:224px;" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">上传放映二维码</label>
                                    <div class="col-sm-5">
                                        <input id="fileToUploadMovie" type="file" name="fileToUpload" style="width:170px;">
                                        <br>
                                        <button class="btn" type="button" id="moveUpload">上传</button>
                                        <input type="hidden" name="qrcode_image" value="{{$data['qrcode_image']}}" />
                                    </div>
                                </div>
                            </div>
                            <div id="activityQRCode" style="display:none;">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">活动二维码预览</label>
                                    <div class="col-sm-5">
                                        <img src="{{$data['activity_qrcode_image']}}" name="activityPreImage" style="width:168.5px;height:224px;" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">上传活动二维码</label>

                                    <div class="col-sm-5">
                                        <input id="fileToUploadActivity" type="file" name="fileToUpload" style="width:170px;">
                                        <br>
                                        <button class="btn" type="button" id="activityUpload">上传</button>
                                        <input type="hidden" name="activity_qrcode_image" value="{{$data['activity_qrcode_image']}}" />
                                    </div>
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

            var selectedValue = $("select[name=is_continue]").val();

            if (selectedValue == "{{config('enumerations.DEFAULT_YN.NO')}}") {
                $("#movieQRCode").show();
            } else if(selectedValue == "{{config('enumerations.DEFAULT_YN.YES')}}") {
                $("#activityQRCode").show();
            }

            var ue = UE.getEditor('description',{
                initialFrameHeight:300,
                initialContent : '{!! $data['description'] !!}',
                serverUrl :'{{route('backend.ueditor.server')}}'
            });

            ue.ready(function() {
                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
            });

            $("select[name=is_continue]").change(function() {

                $("#movieQRCode").hide();
                $("#activityQRCode").hide();

                $("img[name=moviePreImage]").attr("src","");
                $("img[name=activityPreImage]").attr("src","");
                $("input[name=qrcode_image]").val("");
                $("input[name=activity_qrcode_image]").val("");

                var selectedValue = $("select[name=is_continue]").val();

                if (selectedValue == "{{config('enumerations.DEFAULT_YN.NO')}}") {
                    $("#movieQRCode").show();
                } else if(selectedValue == "{{config('enumerations.DEFAULT_YN.YES')}}") {
                    $("#activityQRCode").show();
                }
            });

            $("button#send").click(function() {

                $("input[name=description]").val(ue.getContent());

                var movieId = $("input[name=movie_id]").val();
                var qrcodeImage = $("input[name=qrcode_image]").val();
                var upperLimit = $("input[name=upper_limit]").val();
                var address = $("input[name=address]").val();
                var showTime = $("input[name=show_time]").val();
                var cost = $("input[name=cost]").val();
                var deadLine = $("input[name=deadline]").val();
                var description = $("input[name=description]").val();
                var activityQrcodeImage = $("input[name=activity_qrcode_image]").val();
                var isContinue = $("select[name=is_continue]").val();

                if(isNullOrEmpty(movieId)) {
                    layer.msg("电影信息丢失，请重新进入页面");
                    return false;
                }

                if(isNullOrEmpty(description)) {
                    layer.msg("必须输入描述");
                    return false;
                }

                if(isNullOrEmpty(cost)) {
                    layer.msg("必须填写成本价格");
                    return false;
                }

                if(isNullOrEmpty(upperLimit)) {
                    layer.msg("必须输入人数上限");
                    return false;
                }

                if(isNullOrEmpty(address)) {
                    layer.msg("必须输入地址");
                    return false;
                }

                if(isNullOrEmpty(showTime)) {
                    layer.msg("必须选择放映时间");
                    return false;
                }

                if(isNullOrEmpty(deadLine)) {
                    layer.msg("必须选择截止日期");
                    return false;
                }

                if(showTime < deadLine) {
                    layer.msg("放映时间必须大于报名截止时间");
                    return false;
                }

                if(isNullOrEmpty(isContinue)) {
                    layer.msg("必须选择是否有后续活动");
                    return false;
                }

                if(isContinue == "{{config('enumerations.DEFAULT_YN.YES')}}") {
                    if(isNullOrEmpty(activityQrcodeImage)) {
                        layer.msg("有后续活动时必须上传活动二维码");
                        return false;
                    }
                } else {
                    if(isNullOrEmpty(qrcodeImage)) {
                        layer.msg("无后续活动时必须上传放映二维码");
                        return false;
                    }
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
