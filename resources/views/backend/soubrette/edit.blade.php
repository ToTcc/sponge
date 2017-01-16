@extends('backend.layout.iframeMain')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>编辑红娘</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="{{route('backend.soubrette.update',['id'=>$data->soubrette_id])}}">
                            @include('backend.layout.error')
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">手机号码</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="手机号码" value="{{$data->mobile}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">姓名</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="soubrette_name" name="soubrette_name" placeholder="姓名" value="{{$data->soubrette_name}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">性别</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="sex" name="sex" placeholder="性别" value="{{$data->sex}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">出生日期</label>

                                <div class="col-sm-5">
                                    <div class="input-append date form_date">
                                        <input size="30" type="text" id="birthday" name="birthday" value="{{$data->birthday}}" readonly>
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">院校</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="school" name="school" placeholder="院校" value="{{$data->school}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">个人经验</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="experience" name="experience" placeholder="个人经验" value="{{$data->experience}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">格言</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="motto" name="motto" placeholder="格言" value="{{$data->motto}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">红娘图片预览</label>

                                <div class="col-sm-5">
                                <img src="{{$data->image}}" name="preImage" style="width:168.5px;height:224px;" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">上传红娘图片</label>

                                <div class="col-sm-5">
                                    <input id="fileToUpload" type="file" name="fileToUpload" style="width:170px;">
                                    <br>
                                    <button class="btn" type="button" id="upload">上传</button>
                                    <input type="hidden" name="image" value="" />
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="box-footer clearfix">
                                <a href="javascript:history.back(-1);" class="btn btn-white">
                                    <i class="fa fa-arrow-left"></i>
                                    返回
                                </a>
                                <button type="submit" class="btn btn-success pull-right btn-flat">
                                    <i class="fa fa-plus"></i>
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

    <script type="text/javascript">
        $(function () {

            $("button#upload").click(function(){
                //上传文件
                $.ajaxFileUpload({
                    url : '{{route("backend.common.uploadImage")}}',//处理图片脚本
                    secureuri :false,
                    fileElementId :'fileToUpload',//file控件id
                    dataType : 'json',
                    success : function (data, status){
                        $("input[name=image]").val(data);
                        $("img[name=preImage]").attr("src", data);
                    },
                    error: function(data, status, e){
                        alert(e);
                    }
                })

            });

        });
    </script>
@endsection
