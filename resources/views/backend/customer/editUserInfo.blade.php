@extends('backend.layout.iframeMain')

@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>编辑用户资料</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" class="form-horizontal" action="{{route('backend.customer.update',['id'=>$data->info_id])}}">
                            @include('backend.layout.error')
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">性别</label><span style="color: red;line-height:34px;">*</span>
                            
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="sex" name="sex" placeholder="性别" value="{{$data->sex}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">身高</label><span style="color: red;line-height:34px;">*</span>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="height_type" name="height_type" placeholder="身高" value="{{$data->height_type}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">出生年份</label><span style="color: red;line-height:34px;">*</span>

                                <div class="col-sm-5">
                                    <div class="input-append date form_year">
                                        <input size="30" type="text" id="birthday" class="form-control" name="birthday" value="{{$data->birthday}}" readonly>
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">出生地</label><span style="color: red;line-height:34px;">*</span>
                            
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="birth_province" name="birth_province" placeholder="出生省份" value="{{$data->birth_province}}">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="birth_city" name="birth_city" placeholder="出生城市" value="{{$data->birth_city}}">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="birth_district" name="birth_district" placeholder="出生区" value="{{$data->birth_district}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">学校</label><span style="color: red;line-height:34px;">*</span>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="school" name="school" placeholder="学校" value="{{$data->school}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">专业</label><span style="color: red;line-height:34px;">*</span>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="major_type" name="major_type" placeholder="专业" value="{{$data->major_type}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">工作状态</label><span style="color: red;line-height:34px;">*</span>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="work_status" name="work_status" placeholder="目前状态" value="{{$data->work_status}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">行业</label><span style="color: red;line-height:34px;">*</span>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="career_type" name="career_type" placeholder="行业" value="{{$data->career_type}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">职位</label><span style="color: red;line-height:34px;">*</span>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="position_type" name="position_type" placeholder="职位" value="{{$data->position_type}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">年收入</label><span style="color: red;line-height:34px;">*</span>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="income_type" name="income_type" placeholder="收入" value="{{$data->income_type}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">优势</label><span style="color: red;line-height:34px;">*</span>
                            
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="advantage_type" name="advantage_type" placeholder="优势" value="{{$data->advantage_type}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">学历</label><span style="color: red;line-height:34px;">*</span>
                            
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="degree_type" name="degree_type" placeholder="学历" value="{{$data->degree_type}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">星座</label><span style="color: red;line-height:34px;">*</span>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="constellation_type" name="constellation_type" placeholder="星座" value="{{$data->constellation_type}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">血型</label><span style="color: red;line-height:34px;">*</span>
                            
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="blood_type" name="blood_type" placeholder="血型" value="{{$data->blood_type}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">体重</label><span style="color: red;line-height:34px;">*</span>
                            
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="weight_type" name="weight_type" placeholder="体重" value="{{$data->weight_type}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">民族</label><span style="color: red;line-height:34px;">*</span>
                            
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="nationality_type" name="nationality_type" placeholder="民族" value="{{$data->nationality_type}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">婚姻状况</label><span style="color: red;line-height:34px;">*</span>
                            
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="marriage_status" name="marriage_status" placeholder="婚姻状况" value="{{$data->marriage_status}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">期望发展城市</label><span style="color: red;line-height:34px;">*</span>
                            
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="work_expect_province" name="work_expect_province" placeholder="期望发展省份" value="{{$data->work_expect_province}}">
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" id="work_expect_city" name="work_expect_city" placeholder="期望发展城市" value="{{$data->work_expect_city}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">家庭类型</label><span style="color: red;line-height:34px;">*</span>
                            
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="family_type" name="family_type" placeholder="家庭类型" value="{{$data->family_type}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">城市等级</label><span style="color: red;line-height:34px;">*</span>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="city_level" name="city_level" placeholder="城市等级" value="{{$data->city_level}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">父亲职业</label><span style="color: red;line-height:34px;">*</span>
                            
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="father_career" name="father_career" placeholder="父亲职业" value="{{$data->father_career}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">母亲职业</label><span style="color: red;line-height:34px;">*</span>
                            
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="mother_career" name="mother_career" placeholder="母亲职业" value="{{$data->mother_career}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">生育状况</label><span style="color: red;line-height:34px;">*</span>
                            
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="birth_status" name="birth_status" placeholder="生育状况" value="{{$data->birth_status}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">兄妹数量</label><span style="color: red;line-height:34px;">*</span>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="relative_count" name="relative_count" placeholder="兄妹数量" value="{{$data->relative_count}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">感情经历</label><span style="color: red;line-height:34px;">*</span>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="emotional_experience" name="emotional_experience" placeholder="感情经历" value="{{$data->emotional_experience}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">是否接受异地恋</label><span style="color: red;line-height:34px;">*</span>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="long_distance_status" name="long_distance_status" placeholder="是否接受异地恋" value="{{$data->long_distance_status}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">昵称</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="昵称" value="{{$data->customer_name}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">真实姓名</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="real_name" name="real_name" placeholder="真实姓名" value="{{$data->real_name}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">联系电话</label>
                            
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="联系电话" value="{{$data->mobile}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">微信号</label>

                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="wechat" name="wechat" placeholder="微信号" value="{{$data->wechat}}">
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">简介</label>
                            
                                <div class="col-sm-5">
                                    <textarea name="description" class="form-control" id="description" rows="4" placeholder="简介">{{$data->description}}</textarea>
                                </div>
                                <h6>你还可以输入<span id="descriptionWord">{{70- mb_strlen($data->description)}}</span>个字</h6>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">爱好</label>

                                <div class="col-sm-5">
                                    <textarea name="interests" class="form-control" id="interests" rows="1" placeholder="爱好">{{$data->interests}}</textarea>
                                </div>
                                <h6>你还可以输入<span id="interestsWord">{{20- mb_strlen($data->interests)}}</span>个字</h6>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">择偶要求</label>

                                <div class="col-sm-5">
                                    <textarea name="demand_for_half" class="form-control" id="demand_for_half" rows="4" placeholder="择偶要求">{{$data->demand_for_half}}</textarea>
                                </div>
                                <h6>你还可以输入<span id="demandWord">{{ 70 - mb_strlen($data->demand_for_half) }}</span>个字</h6>
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
    <script type="text/javascript">
        $(function(){
            $("#interests").keyup(function(){
                var len = $(this).val().length;
                if(len > 19){
                    $(this).val($(this).val().substring(0,20));
                }
                var num = 20 - len;
                if(num < 0) {
                    num = 0;
                }
                $("#interestsWord").text(num);
            });

            $("#description").keyup(function(){
                var len = $(this).val().length;
                if(len > 69){
                    $(this).val($(this).val().substring(0,70));
                }
                var num = 70 - len;
                if(num < 0) {
                    num = 0;
                }
                $("#descriptionWord").text(num);
            });

            $("#demand_for_half").keyup(function(){
                var len = $(this).val().length;
                if(len > 69){
                    $(this).val($(this).val().substring(0,70));
                }
                var num = 70 - len;
                if(num < 0) {
                    num = 0;
                }
                $("#demandWord").text(num);
            });
        });
    </script>
@endsection
