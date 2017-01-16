@extends('backend.layout.iframeMain')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>新增表单</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="{{route('backend.activity.store')}}">
                            @include('backend.layout.error')
                            {{csrf_field()}}
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
                                    <input type="text" class="form-control" id="cost" name="cost" placeholder="成本价格" value="{{old('cost')}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">人数上限</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="upper_limit" name="upper_limit" placeholder="人数上限" value="{{old('upper_limit')}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">地址</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="address" name="address" placeholder="地址" value="{{old('address')}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">放映时间</label>
                                <div class="col-sm-5">
                                    <div class="input-append date form_datetime">
                                        <input size="30" type="text" class="form-control" id="show_time" name="show_time" value="{{old('deadline')}}" readonly>
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">报名截止日期</label>
                                <div class="col-sm-5">
                                    <div class="input-append date form_datetime">
                                        <input size="30" type="text" class="form-control" id="deadline" name="deadline" value="{{old('deadline')}}" readonly>
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否有后续活动</label>
                                <div class="col-sm-5">
                                    {!! getEnumSelectWidget(config('enumerations.DEFAULT_YN'), 'is_continue', '',0) !!}
                                </div>
                            </div>
                            <div id="movieQRCode">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">放映二维码预览</label>
                                    <div class="col-sm-5">
                                        <img src="{{old('qrcode_image')}}" name="moviePreImage" style="width:168.5px;height:224px;" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">上传放映二维码</label>
                                    <div class="col-sm-5">
                                        <input id="fileToUploadMovie" type="file" name="fileToUpload" style="width:170px;">
                                        <br>
                                        <button class="btn" type="button" id="moveUpload">上传</button>
                                        <input type="hidden" name="qrcode_image" value="{{old('qrcode_image')}}" />
                                    </div>
                                </div>
                            </div>
                            <div id="activityQRCode" style="display:none;">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">活动二维码预览</label>
                                    <div class="col-sm-5">
                                        <img src="{{old('activity_qrcode_image')}}" name="activityPreImage" style="width:168.5px;height:224px;" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">上传活动二维码</label>

                                    <div class="col-sm-5">
                                        <input id="fileToUploadActivity" type="file" name="fileToUpload" style="width:170px;">
                                        <br>
                                        <button class="btn" type="button" id="activityUpload">上传</button>
                                        <input type="hidden" name="activity_qrcode_image" value="{{old('activity_qrcode_image')}}" />
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否收费</label>
                                <div class="col-sm-5">
                                    {!! getEnumSelectWidget(config('enumerations.ACTIVITY_TYPE'), 'activity_type', '',0) !!}
                                </div>
                            </div>
                            <div id="ruleSection">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">价格区间
                                        <button type="button" id="addMoreRule" class="btn btn-info btn-xs">添加</button>
                                    </label>
                                    <div class="col-sm-10" id="priceRule">
                                        <div class="priceRules">
                                            <span>开始日期：</span>
                                            <div class="input-append date form_date" style="display: inline-block;">
                                                <input type="text" class="form-control" id="ruleStartTime_1" name="ruleStartTime[]" value="{{getCurrentDate()}}" style="width: 200px;" readonly>
                                                <span class="add-on"><i class="icon-calendar"></i></span>
                                            </div>
                                            <span>结束日期：</span>
                                            <div class="input-append date form_date" style="display: inline-block;">
                                                <input type="text" class="form-control" id="ruleEndTime_1" name="ruleEndTime[]" value="" style="width: 200px;" readonly>
                                                <span class="add-on"><i class="icon-calendar"></i></span>
                                            </div>
                                            <span>价格：</span>
                                            <div style="display: inline-block;">
                                                <input type="text" class="form-control" style="width: 200px;" id="rulePrice_1" name="rulePrice[]" value="">
                                            </div>
                                        </div>
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
                                    <i class="fa fa-plus"></i>
                                    新增
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

            var maxInputs = 3;
            var ruleCount = 1;

            var ue = UE.getEditor('description',{
                initialFrameHeight:300,
                initialContent : '{!! old('description') !!}',
                serverUrl :'{{route('backend.ueditor.server')}}'
            });

            ue.ready(function() {
                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
            });

            $("button#addMoreRule").click(function() {

                if($(".priceRules").length < maxInputs) {
                    ruleCount++; //text box added increment
                    var startValue = '';
                    if(ruleCount > 1) {
                        startValue = isNullOrEmpty($("#ruleEndTime_"+(ruleCount-1)).val()) ? '' : getNextDay($("#ruleEndTime_"+(ruleCount-1)).val());
                    }
                    var html = "<div class='priceRules' style='margin-top: 10px;'>"
                                +"<span>开始日期： </span>"
                                +"<div class='input-append date form_date' style='display: inline-block;'>"
                                    +"<input type='text' class='form-control' id='ruleStartTime_"+ruleCount+"' name='ruleStartTime[]' value='"+startValue+"' style='width: 200px;' readonly>"
                                    +"<span class='add-on'><i class='icon-calendar'></i></span>"
                                +"</div>"
                                +"<span> 结束日期： </span>"
                                +"<div class='input-append date form_date' style='display: inline-block;'>"
                                    +"<input type='text' class='form-control' id='ruleEndTime_"+ruleCount+"' name='ruleEndTime[]' value='' style='width: 200px;' readonly>"
                                    +"<span class='add-on'><i class='icon-calendar'></i></span>"
                                +"</div>"
                                +"<span> 价格： </span>"
                                +"<div style='display: inline-block;'>"
                                    +"<input type='text' class='form-control' style='width: 200px;' id='rulePrice_"+ruleCount+"' name='rulePrice[]' value=''>"
                                    +"</div>"
                                +"<a href='#' class='removeRule'> X</a>"
                             +"</div>";

                    $("#priceRule").append(html);
                } else {
                    layer.msg("您最多只能添加3条规则！");
                }
            });

            $("body").on("click",".removeRule", function(){ //user click on remove text
                if($(".priceRules").length > 1) {
                    $(this).parent('div').remove(); //remove text box
                    ruleCount--;
                }
                return false;
            });

            $("body").on("focusin",".form_date", function(){
                $(this).datetimepicker({
                    format: "yyyy-mm-dd",
                    minView: 'month',
                    autoclose: true,
                    todayBtn: true,
                });
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

            $("select[name=activity_type]").change(function() {

                $("#ruleSection").hide();
                $("#ruleSection input").val("");

                var selectedValue = $("select[name=activity_type]").val();

                if (selectedValue == "{{config('enumerations.ACTIVITY_TYPE.CASH')}}") {
                    $("#ruleSection").show();
                }
            });

            function getNowFormatDate() {
                var date = new Date();
                var seperator1 = "-";
                var seperator2 = ":";
                var year = date.getFullYear();
                var month = date.getMonth() + 1;
                var strDate = date.getDate();
                if (month >= 1 && month <= 9) {
                    month = "0" + month;
                }
                if (strDate >= 0 && strDate <= 9) {
                    strDate = "0" + strDate;
                }
                var currentdate = year + seperator1 + month + seperator1 + strDate;

                return currentdate;
            }

            function getNextDay(d){
                d = new Date(d);
                d = +d + 1000*60*60*24;
                d = new Date(d);

                var year = d.getFullYear();
                var month = +d.getMonth()+1 > 9 ? +d.getMonth()+1 : "0"+(+d.getMonth()+1);
                var day = d.getDate() > 9 ? d.getDate() : "0"+d.getDate();

                return year+"-"+month+"-"+day;
            }

            $("button#send").click(function() {

                $("input[name=description]").val(ue.getContent());

                var movieId = $("input[name=movie_id]").val();
                var qrcodeImage = $("input[name=qrcode_image]").val();
                var upperLimit = $("input[name=upper_limit]").val();
                var address = $("input[name=address]").val();
                var showTime = $("input[name=show_time]").val();
                var activityType = $("select[name=activity_type]").val();
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

                if(isNullOrEmpty(activityType)) {
                    layer.msg("必须选择是否收费");
                    return false;
                }

                if(activityType == "{{config('enumerations.ACTIVITY_TYPE.CASH')}}") {
                    var ruleCount = $(".priceRules").length;

                    for(var i=1;i<=ruleCount;i++) {

                        if(isNullOrEmpty($("#ruleStartTime_"+i).val())) {
                            layer.msg("定价规则开始日期不能为空");
                            return false;
                        }

                        if(isNullOrEmpty($("#ruleEndTime_"+i).val())) {
                            layer.msg("定价规则结束日期不能为空");
                            return false;
                        }

                        if(isNullOrEmpty($("#rulePrice_"+i).val())) {
                            layer.msg("定价规则价格不能为空");
                            return false;
                        }

                        if($("#ruleStartTime_"+i).val() > $("#ruleEndTime_"+i).val()) {
                            layer.msg("定价规则开始日期不能大于结束日期");
                            return false;
                        }
                        if(i > 1) {
                            if($("#ruleStartTime_"+i).val() != getNextDay($("#ruleEndTime_"+(i-1)).val())) {
                                layer.msg("每个定价规则的开始日期必须是上一个定价规则结束日期的下一天");
                                return false;
                            }
                        }
                    }

                    if($("#ruleStartTime_1").val() != getNowFormatDate()) {
                        layer.msg("第一个定价规则的开始日期必须和现在的日期相同");
                        return false;
                    }

                    if($("input[name=deadline]").val().split(" ")[0] != $("#ruleEndTime_"+ruleCount).val()) {
                        layer.msg("最后一个定价规则的结束日期必须和放映截止日期相同");
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
