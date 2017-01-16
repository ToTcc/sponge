<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="telephone=no" name="format-detection"/>
		<meta content="email=no" name="format-detection"/>
		<link rel="stylesheet" type="text/css" href="/assets/frontend/css/weui.min.css">
		<title>个人资料</title>
		<style type="text/css">
			html,body{
				font-family: "微软雅黑";
				line-height: inherit;
			}
			*{
				margin: 0;
				padding: 0;
				font-size: 14px;
			}
			.my-info{
				padding-bottom: 60px;
			}
			.my-info-body{
				padding: 20px 15px 20px 20px;
			}
			.my-info-body > p{
				color: #333;
				font-size: 18px;
			}
			.my-info-body > input{
				width: 90%;
				margin: 20px auto;
				background: #efefef;
				padding: 15px 10px;
				border: none;
				border-radius: 8px;
				font-family: "微软雅黑";
			}
			input[name="sex"],input[name="age"]{
				width: 20px;
				height: 20px;
			}
			.regular-radio{
				display: none;
			}
			.regular-radio + label {
			    -webkit-appearance: none;
			    background-color: #fafafa;
			    border: 1px solid #cacece;
			    box-shadow: 0 1px 2px rgba(0,0,0,0.05), inset 0px -15px 10px -12px rgba(0,0,0,0.05);
			    padding: 9px;
			    border-radius: 50px;
			    display: inline-block;
			    position: absolute;
			    left: 0;
			}
			.regular-radio:checked + label:after {
			    content: ' ';
			    width: 12px;
			    height: 12px;
			    border-radius: 50px;
			    position: absolute;
			    top: 3px;
			    background: #3399ff;
			    box-shadow: inset 0px 0px 10px rgba(0,0,0,0.3);
			    text-shadow: 0px;
			    left: 3px;
			    font-size: 32px;
			}
			.radio-span{
				font-size: 16px;
				margin-left: 30px;
				vertical-align: top;
			}
			.my-info-body > input:focus{
				outline: none;
			}
			.button{
				background: #3399ff;
				padding: 0 15px;
				border-radius: 8px;
				margin-top: 10px;
				width: 88%;
				height: 40px;
				-webkit-box-shadow: #0281ff 0px 5px 1px;
				-moz-box-shadow: #0281ff 0px 5px 1px;
				box-shadow: #0281ff 0px 5px 1px;
			}
			.button > p{
				color: #fff;
				font-size: 22px;
				text-align: center;
				line-height: 40px;
				font-weight: 600;
				letter-spacing: 2px;
			}
			.choose-sex{
				display: flex;
				padding: 20px 0;
			}
			.choose-sex > div{
				position: relative;
				flex-grow:1;
				width: 33.3%;			
			}
			.choose-age{
				padding: 20px 0;
				position: relative;
			}
			.choose-age > div{
				position: relative;
				display: inline-block;
				margin-bottom: 15px;
				margin-right: 15px;
			}
			.foot{
				position: fixed;
				bottom: 0;
				z-index: 10;
				display: flex;
				width: 100%;
				border-top: 1px solid #dbdbdb;
				background: #fafafa;
			}
			.item{
				flex-grow:1;
				width: 25%;
				padding: 10px 0;
				text-align: center;
				border-right: 1px solid #dbdbdb;
			}
			.item.active{
				background: #cce4fb;
				border-top: 2px solid #3399ff;
			}
			.foot > div:last-child(){
				border-right: none;
			}
			.weui_toast.small{
				width: 5.6em;
				min-height: 5.6em;
				top: calc(180px + 1.2em);
				left: calc(50% + 1em);
			}
			.weui_toast.small .weui_loading{
				top: 50%;
			}
		</style>

		<script type="text/javascript" src="/assets/frontend/js/jquery.1.11.1.js"></script>
		<script type="text/javascript" src="/assets/frontend/js/vue.min.js"></script>
		<script type="text/javascript" src="/assets/frontend/js/common.js"></script>

		<script type="text/javascript">

			$(function() {

				var app = new Vue({
					el: '#container',
					data: {
						movieList: [],
					},
					methods: {
						myLike: function() {
							window.location.href = "/myLike";
						},
						search: function() {
							window.location.href = "/search";
						},
						eventList: function() {
							window.location.href = "/eventList";
						},
						submit: function() {

							var nickname = $("input[name=nickname]").val();
							var sex = $("input[name=sex]:checked").val();
							var job = $("input[name=job]").val();
							var yearType = $("input[name=yearType]:checked").val();
							var mobile = $("input[name=mobile]").val();

							if(nickname == "") {
								alert("姓名不能为空");
								return false;
							}

							if(job == "") {
								alert("请填写职业");
								return false;
							}

							if(!(/^1[3|4|5|7|8]\d{9}$/.test(mobile))) {
								alert("请填写正确的手机号");
								return false;
							}

							$.ajax({
								url:"/updateInfo",
								type:"GET",
								data:{
									mobile:mobile,
									nickname:nickname,
									yearType:yearType,
									sex:sex,
									job:job,
								},
								dataType:"JSON",
								beforeSend:function(){
									$("#loadingToast").show();
								},
								complete:function(){
									$('#loadingToast').hide();
								},
								success:function(data){
									alert("注册成功，欢迎来到[SAME]");
									window.location.href = "/myLike";
								},
							})

						},
					}
				})
			});

		</script>
	</head>
	<body id="container">
		<div class="my-info">
			<div class="my-info-body">
				<p>姓名</p>
				<input type="text" name="nickname" class="name" value="{{$data["info"]["nickname"]}}">
				<p>性别</p>
				<div class="choose-sex">
					<div>
						<input type="radio" id="radio-1" name="sex" value="男" @if($data["info"]["sex"] == "男" || !$data["info"]["sex"]) checked @endif class="regular-radio big-radio"><label for="radio-1"></label><label for="radio-1"><span class="radio-span">男</span></label>
					</div>
					<div>
						<input type="radio" id="radio-2" name="sex" value="女" @if($data["info"]["sex"] == "女") checked @endif class="regular-radio big-radio"><label for="radio-2"></label><label for="radio-2"><span class="radio-span">女</span></label>
					</div>
					<div>
						<input type="radio" id="radio-3" name="sex" value="保密" @if($data["info"]["sex"] == "保密") checked @endif class="regular-radio big-radio"><label for="radio-3"></label><label for="radio-3"><span class="radio-span">保密</span></label>
					</div>
				</div>
				<p>职业</p>
				<input type="text" class="name" name="job" value="{{$data["info"]["job"]}}">
				<p>年龄段</p>
				<div class="choose-age">
					<div>
						<input type="radio" id="radio-4" name="yearType" value="00后" @if($data["info"]["year_type"] == "00后") checked @endif class="regular-radio big-radio">
						<label for="radio-4"></label>
						<label for="radio-4"><span class="radio-span">00后</span></label>
					</div>
					<div>
						<input type="radio" id="radio-5" name="yearType" value="90后" @if($data["info"]["year_type"] == "90后"  || !$data["info"]["year_type"]) checked @endif class="regular-radio big-radio">
						<label for="radio-5"></label>
						<label for="radio-5"><span class="radio-span">90后</span></label>
					</div>
					<div>
						<input type="radio" id="radio-6" name="yearType" value="80后" @if($data["info"]["year_type"] == "80后") checked @endif class="regular-radio big-radio">
						<label for="radio-6"></label>
						<label for="radio-6"><span class="radio-span">80后</span></label>
					</div>
					<div>
						<input type="radio" id="radio-7" name="yearType" value="70后" @if($data["info"]["year_type"] == "70后") checked @endif class="regular-radio big-radio">
						<label for="radio-7"></label>
						<label for="radio-7"><span class="radio-span">70后</span></label>
					</div>
					<div>
						<input type="radio" id="radio-8" name="yearType" value="其他后" @if($data["info"]["year_type"] == "其他后") checked @endif class="regular-radio big-radio">
						<label for="radio-8"></label>
						<label for="radio-8"><span class="radio-span">其他后</span></label>
					</div>
				</div>
				<p>手机号</p>
				<input type="text" class="name" name="mobile" value="{{$data["info"]["mobile"]}}">
				<div class="button" v-on:click="submit">
					<p>提交</p>
				</div>
			</div>
		</div>
		<!-- loading toast -->
		<div id="loadingToast" class="weui_loading_toast" style="display: none;">
			<div class="weui_mask_transparent"></div>
			<div class="weui_toast small">
				<div class="weui_loading">
					<div class="weui_loading_leaf weui_loading_leaf_0"></div>
					<div class="weui_loading_leaf weui_loading_leaf_1"></div>
					<div class="weui_loading_leaf weui_loading_leaf_2"></div>
					<div class="weui_loading_leaf weui_loading_leaf_3"></div>
					<div class="weui_loading_leaf weui_loading_leaf_4"></div>
					<div class="weui_loading_leaf weui_loading_leaf_5"></div>
					<div class="weui_loading_leaf weui_loading_leaf_6"></div>
					<div class="weui_loading_leaf weui_loading_leaf_7"></div>
					<div class="weui_loading_leaf weui_loading_leaf_8"></div>
					<div class="weui_loading_leaf weui_loading_leaf_9"></div>
					<div class="weui_loading_leaf weui_loading_leaf_10"></div>
					<div class="weui_loading_leaf weui_loading_leaf_11"></div>
				</div>
				<!--<p class="weui_toast_content">数据加载中</p>-->
			</div>
		</div>
		<!--end loading toast-->
		<div id="toastNothing" style="display: none;">
			<div class="weui_mask_transparent"></div>
			<div class="weui_toast">
				<i class="weui_icon_toast"></i>
				<p class="weui_toast_content color-fff">已到最底部</p>
			</div>
		</div>
	</body>
</html>