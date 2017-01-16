 <!DOCTYPE html>
<html>
@include("merchant.header")

<body class="gray-bg">
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>编辑</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="{{route('merchant.index.editPost',['id'=>$data['event_id']])}}">
                            @include('backend.layout.error')
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">活动标题</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="title" name="title"  value="{{$data['title']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">活动副标题</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="second_title" name="second_title"  value="{{$data['second_title']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">活动类型</label>
                                <div class="col-sm-5">
                                    {!! getEnumSelectWidget(config('enumerations.EVENT_TYPE'), 'event_type', $data['event_type'],0) !!}
                                </div>
                            </div>
                            <div id="priceSection">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">价格</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="price" name="price"  value="{{$data['price']}}">
                                    </div>
                                </div>
                            </div>
                            <div id="priceDescription">
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">价格描述</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" id="price_description" name="price_description"  value="{{$data['price_description']}}">
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">地址</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="address" name="address"  value="{{$data['address']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">人数上限</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="upper_limit" name="upper_limit"  value="{{$data['upper_limit']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">举办时间</label>
                                <div class="col-sm-5">
                                    <div class="input-append date form_datetime">
                                        <input size="30" type="text" class="form-control" id="open_time" name="open_time" value="{{$data['open_time']}}" readonly>
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">结束时间</label>
                                <div class="col-sm-5">
                                    <div class="input-append date form_datetime">
                                        <input size="30" type="text" class="form-control" id="end_time" name="end_time" value="{{$data['end_time']}}" readonly>
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">报名截止时间</label>
                                <div class="col-sm-5">
                                    <div class="input-append date form_datetime">
                                        <input size="30" type="text" class="form-control" id="deadline" name="deadline" value="{{$data['deadline']}}" readonly>
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">活动图片预览</label>
                                <div class="col-sm-5">
                                    <img src="{{$data['title_image']}}" name="titlePreImage" style="width:168.5px;height:224px;" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">上传活动图片</label>

                                <div class="col-sm-5">
                                    <input id="fileToUploadTitle" type="file" name="fileToUpload" style="width:170px;">
                                    <br>
                                    <button class="btn" type="button" id="titleUpload">上传</button>
                                    <input type="hidden" name="title_image" value="{{$data['title_image']}}" />
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">群二维码预览</label>
                                <div class="col-sm-5">
                                    <img src="{{$data['qrcode_image']}}" name="qrCodePreImage" style="width:168.5px;height:224px;" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">上传群二维码</label>
                                <div class="col-sm-5">
                                    <input id="fileToUploadQrCode" type="file" name="fileToUpload" style="width:170px;">
                                    <br>
                                    <button class="btn" type="button" id="qrCodeUpload">上传</button>
                                    <input type="hidden" name="qrcode_image" value="{{$data['qrcode_image']}}" />
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">活动描述</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="description" />
                                    <script type="text/plain" id="description" name="description"></script>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">调查问题一</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="question_one" name="question_one"  value="{{$data['question_one']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">调查问题二</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="question_two" name="question_two"  value="{{$data['question_two']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">调查问题三</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="question_three" name="question_three"  value="{{$data['question_three']}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div id="necessarySection">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">报名须知
                                        <button type="button" id="addMoreNecessaryRule" class="btn btn-info btn-xs">添加</button>
                                    </label>
                                    <div class="col-sm-10" id="necessary">
                                        @foreach($data['necessary'] as $key => $item)
                                            <div class="necessary" style="{{$key == 0 ? '' : 'margin-top: 10px;'}}">
                                                <span>须知{{$key+1}}：</span>
                                                <div style="display: inline-block;">
                                                    <input type="text" class="form-control" style="width: 400px" id="necessary_{{$key+1}}" name="necessary[]" value="{{$item}}">
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div id="noteSection">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">备注
                                        <button type="button" id="addMoreNoteRule" class="btn btn-info btn-xs">添加</button>
                                    </label>
                                    <div class="col-sm-10" id="note">
                                        @foreach($data['note'] as $key => $item)
                                            <div class="note" style="{{$key == 0 ? '' : 'margin-top: 10px;'}}">
                                                <span>备注{{$key+1}}：</span>
                                                <div style="display: inline-block;">
                                                    <input type="text" class="form-control" style="width: 400px" id="note_{{$key+1}}" name="note[]" value="{{$item}}">
                                                </div>
                                            </div>
                                        @endforeach
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
        <div class="modal inmodal" id="withdrawIndex" tabindex="-1" role="dialog" aria-hidden="false">
            <div class="modal-dialog">
                <div class="modal-content animated flipInY">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">预览二维码</h4>
                        <small>请用手机扫描二维码查看活动详情</small>
                    </div>
                    <div class="modal-body">
                        <div style="text-align: center">
                            {!! QrCode::size(200)->generate(route('merchant.index.eventDetail',['id' => $data['event_id']])) !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="cancel" type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
                        <button id="submit" type="button" class="btn btn-primary" onclick="window.location.href='{{route('merchant.index.event')}}'">返回</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/assets/backend/js/ajaxfileupload.js"></script>
    @include('UEditor::head')

    <script type="text/javascript">
        $(function () {

            @if($isPreview == 2)
                $('.modal').modal('show');
                $('.modal-backdrop').remove();
            @endif

            var ue = UE.getEditor('description',{
                initialFrameHeight:300,
                initialContent : '{!! $data['description'] !!}',
                serverUrl :'{{route('merchant.ueditor.server')}}'
            });

            ue.ready(function() {
                ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');//此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
            });

            if ($("select[name=event_type]").val() == "{{config('enumerations.EVENT_TYPE.CASH')}}") {
                $("#priceSection").show();
                $("#priceDescription").show();
            } else {
                $("input[name=price]").val('');
                $("#priceSection").hide();
                $("input[name=price_description]").val('');
                $("#priceDescription").hide();
            }

            $("select[name=event_type]").change(function() {
                var selectedValue = $("select[name=event_type]").val();

                if (selectedValue == "{{config('enumerations.EVENT_TYPE.CASH')}}") {
                    $("#priceSection").show();
                    $("#priceDescription").show();
                } else {
                    $("input[name=price]").val('');
                    $("#priceSection").hide();
                    $("input[name=price_description]").val('');
                    $("#priceDescription").hide();
                }
            });

            var necessaryRuleCount = eval("{{count($data['necessary'])}}");
            $("button#addMoreNecessaryRule").click(function() {
                necessaryRuleCount++;
                var html = "<div class='necessary' style='margin-top: 10px;'>"
                            +"<span>须知"+necessaryRuleCount+"： </span>"
                              +"<div style='display: inline-block;'>"
                                +"<input type='text' class='form-control' style='width: 400px' id='necessary_"+necessaryRuleCount+"' name='necessary[]' value=''>"
                              +"</div>"
                            +"<a href='#' class='removeNecessaryRule'> X</a>"
                          +"</div>";

                $("#necessary").append(html);
            });

            $("body").on("click",".removeNecessaryRule", function(){ //user click on remove text
                if($(".necessary").length > 1) {
                    $(this).parent('div').remove(); //remove text box
                    necessaryRuleCount--;
                }
                return false;
            });

            var noteRuleCount = eval("{{count($data['note'])}}");
            $("button#addMoreNoteRule").click(function() {
                noteRuleCount++;
                var html = "<div class='note' style='margin-top: 10px;'>"
                            +"<span>备注"+noteRuleCount+"： </span>"
                                +"<div style='display: inline-block;'>"
                                    +"<input type='text' class='form-control' style='width: 400px' id='note_"+noteRuleCount+"' name='note[]' value=''>"
                                +"</div>"
                                +"<a href='#' class='removeNoteRule'> X</a>"
                            +"</div>";

                $("#note").append(html);
            });

            $("body").on("click",".removeNoteRule", function(){ //user click on remove text
                if($(".note").length > 1) {
                    $(this).parent('div').remove(); //remove text box
                    noteRuleCount--;
                }
                return false;
            });

            $("button#send").click(function() {

                $("input[name=description]").val(ue.getContent());

                var title = $("input[name=title]").val();
                var secondTitle = $("input[name=second_title]").val();
                var eventType = $("select[name=event_type]").val();
                var price = $("input[name=price]").val();
                var priceDescription = $("input[name=price_description]").val();
                var address = $("input[name=address]").val();
                var upperLimit = $("input[name=upper_limit]").val();
                var openTime = $("input[name=open_time]").val();
                var endTime = $("input[name=end_time]").val();
                var deadline = $("input[name=deadline]").val();
                var titleImage = $("input[name=title_image]").val();
                var qrcodeImage = $("input[name=qrcode_image]").val();
                var description = $("input[name=description]").val();
                var questionOne = $("input[name=question_one]").val();
                var questionTwo = $("input[name=question_two]").val();
                var questionThree = $("input[name=question_three]").val();
                var necessary = $("input[name='necessary[]']").val();
                var note = $("input[name='note[]']").val();

                if(isNullOrEmpty(title)) {
                    layer.msg("请输入活动标题");
                    return false;
                }

                if(isNullOrEmpty(secondTitle)) {
                    layer.msg("请输入活动副标题");
                    return false;
                }

                if(isNullOrEmpty(eventType)) {
                    layer.msg("请选择活动类型");
                    return false;
                }

                if(eventType == "{{config('enumerations.EVENT_TYPE.CASH')}}") {
                    if(isNullOrEmpty(price)) {
                        layer.msg("请输入价格");
                        return false;
                    }

                    if(isNullOrEmpty(priceDescription)) {
                        layer.msg("请输入价格描述");
                        return false;
                    }
                }

                if(isNullOrEmpty(address)) {
                    layer.msg("请输入地址");
                    return false;
                }

                if(isNullOrEmpty(upperLimit)) {
                    layer.msg("请输入人数上限");
                    return false;
                }

                if(isNullOrEmpty(openTime)) {
                    layer.msg("请选择举办时间");
                    return false;
                }

                if(isNullOrEmpty(endTime)) {
                    layer.msg("请选择结束时间");
                    return false;
                }

                if(isNullOrEmpty(deadline)) {
                    layer.msg("请选择报名截止时间");
                    return false;
                }

                if(deadline > openTime) {
                    layer.msg("报名截止时间不能晚于举办时间");
                    return false;
                }

                if(openTime > endTime) {
                    layer.msg("活动举办时间不能晚于活动结束时间")
                    return false;
                }

                if(isNullOrEmpty(titleImage)) {
                    layer.msg("请上传活动图片");
                    return false;
                }

                if(isNullOrEmpty(qrcodeImage)) {
                    layer.msg("请上传群二维码图片");
                    return false;
                }

                if(isNullOrEmpty(description)) {
                    layer.msg("请填写描述");
                    return false;
                }

                if(isNullOrEmpty(questionOne)) {
                    layer.msg("请填写调查问题一");
                    return false;
                }

                if(isNullOrEmpty(questionTwo)) {
                    layer.msg("请填写调查问题二");
                    return false;
                }

                if(isNullOrEmpty(questionThree)) {
                    layer.msg("请填写调查问题三");
                    return false;
                }

                var necessaryEmpty = true;
                for(var i=1;i<=necessaryRuleCount;i++) {
                    if(!isNullOrEmpty($("#necessary_"+i).val())) {
                        necessaryEmpty = false;
                        break;
                    }
                }

                if(necessaryEmpty) {
                    layer.msg("请至少填写一个报名须知");
                    return false;
                }

                var noteEmpty = true;
                for(var i=1;i<=noteRuleCount;i++) {
                    if(!isNullOrEmpty($("#note_"+i).val())) {
                        noteEmpty = false;
                        break;
                    }
                }

                if(noteEmpty) {
                    layer.msg("请至少填写一个备注");
                    return false;
                }

                $("div.box-footer").hide();

                $("form").submit();

            });

            $("button#titleUpload").click(function() {
                //上传文件
                $.ajaxFileUpload({
                    url : '{{route("merchant.common.uploadImage")}}',//处理图片脚本
                    secureuri :false,
                    fileElementId :'fileToUploadTitle',//file控件id
                    dataType : 'json',
                    success : function (data, status) {
                        $("input[name=title_image]").val(data);
                        $("img[name=titlePreImage]").attr("src", data);
                    },
                    error: function(data, status, e){
                        alert(e);
                    }
                })

            });

            $("button#qrCodeUpload").click(function() {
                //上传文件
                $.ajaxFileUpload({
                    url : '{{route("merchant.common.uploadImage")}}',//处理图片脚本
                    secureuri :false,
                    fileElementId :'fileToUploadQrCode',//file控件id
                    dataType : 'json',
                    success : function (data, status) {
                        $("input[name=qrcode_image]").val(data);
                        $("img[name=qrCodePreImage]").attr("src", data);
                    },
                    error: function(data, status, e){
                        alert(e);
                    }
                })

            });
        });

    </script>
</body>
