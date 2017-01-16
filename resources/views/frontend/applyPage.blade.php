<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="telephone=no" name="format-detection"/>
		<meta content="email=no" name="format-detection"/>
		<link rel="stylesheet" type="text/css" href="/assets/frontend/css/weui.min.css">
		<title>成为发起人</title>
		<style type="text/css">
			html,body{
				height: 100%;
				font-family: "微软雅黑";
			}
			*{
				margin: 0;
				padding: 0;
				font-size: 14px;
			}
			.color-red{
				color: #ff9d9d;
			}
			.color-blue{
				color: #3399ff;
			}
			.color-999{
				color: #b6b6b6;
			}
			.bold{
				font-weight: bold;
			}
			.black-font{
				font-family: "黑体";
			}
			.line{
				border-bottom: 1px solid #dbdbdb;
			}
			@media(max-width: 414px){
				.sponsor-info{
					padding: 0 20px;
					padding-bottom: 60px;
				}
				.logo-bg{
					background: url('/assets/frontend/image/sponsor.png')no-repeat center;
					background-size: 100% 83px;
					width: 100%;
					height: 83px;
				}
				.sponsor-remind{
					padding: 15px 0;
					height: 174px;
					border-top: 1px solid #dbdbdb;
					border-bottom: 1px solid #dbdbdb;
				}
				.title{
					font-size: 20px;
					margin-bottom: 5px;
				}
				.my-info-body{
					padding: 25px 0;
				}
				.my-info-body > p{
					font-size: 18px;
				}
				.my-info-body > p > span{
					font-size: 15px;
				}
				textarea{
					height: 100px;
					width: 93%;
					margin: 20px auto;
					background: #efefef;
					padding: 10px;
					border: none;
					border-radius: 8px;
					line-height: 1.5;
					resize:none;
					font-family: "微软雅黑";
				}
				textarea:focus{
					outline: none;
				}
				.my-info-body > input{
					width: 93%;
					margin: 20px auto;
					background: #efefef;
					padding: 15px 10px;
					border: none;
					border-radius: 8px;
				}
			}
			@media(max-width: 375px){
				.sponsor-info{
					padding: 0 20px;
					padding-bottom: 60px;
				}
				.logo-bg{
					background: url('/assets/frontend/image/sponsor.png')no-repeat center;
					background-size: 100% 74px;
					width: 100%;
					height: 74px;
				}
				.sponsor-remind{
					padding: 15px 0;
					height: 174px;
					border-top: 1px solid #dbdbdb;
					border-bottom: 1px solid #dbdbdb;
				}
				.title{
					font-size: 18px;
					margin-bottom: 5px;
				}
				.my-info-body{
					padding: 25px 0;
				}
				.my-info-body > p{
					font-size: 16px;
				}
				.my-info-body > p > span{
					font-size: 15px;
				}
				textarea{
					height: 100px;
					width: 93%;
					margin: 20px auto;
					background: #efefef;
					padding: 10px;
					border: none;
					border-radius: 8px;
					line-height: 1.5;
					resize:none;
					font-family: "微软雅黑";
				}
				textarea:focus{
					outline: none;
				}
				.my-info-body > input{
					width: 93%;
					margin: 20px auto;
					background: #efefef;
					padding: 15px 10px;
					border: none;
					border-radius: 8px;
				}
			}
			@media(max-width: 320px){
				.sponsor-info{
					padding: 0 15px;
					padding-bottom: 60px;
				}
				.logo-bg{
					background: url('/assets/frontend/image/sponsor.png')no-repeat center;
					background-size: 100% 65px;
					width: 100%;
					height: 65px;
				}
				.sponsor-remind{
					padding: 15px 0;
					height: 174px;
					border-top: 1px solid #dbdbdb;
					border-bottom: 1px solid #dbdbdb;
				}
				.title{
					font-size: 16px;
					margin-bottom: 5px;
				}
				.my-info-body{
					padding: 25px 0;
				}
				.my-info-body > p{
					font-size: 14px;
				}
				.my-info-body > p > span{
					font-size: 13px;
				}
				textarea{
					height: 100px;
					width: 93%;
					margin: 20px auto;
					background: #efefef;
					padding: 10px;
					border: none;
					border-radius: 8px;
					line-height: 1.5;
					resize:none;
					font-family: "微软雅黑";
				}
				textarea:focus{
					outline: none;
				}
				.my-info-body > input{
					width: 93%;
					margin: 15px auto;
					background: #efefef;
					padding: 15px 10px;
					border: none;
					border-radius: 8px;
				}
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
				height: 40px;
				border-radius: 8px;
				margin-top: 10px;
				width: 100%;
				-webkit-box-shadow: #0281ff 0px 2px 1px;
				-moz-box-shadow: #0281ff 0px 2px 1px;
				box-shadow: #0281ff 0px 2px 1px;
			}
			.button > p{
				color: #fff;
				font-size: 20px;
				text-align: center;
				font-weight: 600;
				letter-spacing: 2px;
				line-height: 40px;
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
						search: function() {
							window.location.href = "/search";
						},
						goToeventList: function() {
							window.location.href = "/eventList";
						},
						myLike: function() {
							window.location.href = "/myLike";
						},
						submit: function() {

							var name = $("input[name=name]").val();
							var sex = $("input[name=sex]").val();
							var age = $("input.age").val();
							var mobile = $("input[name=mobile]").val();
							var email = $("input[name=email]").val();
							var job = $("input[name=job]").val();
							var wechatId = $("input[name=wechatId]").val();
							var wechatNickname = $("input[name=wechatNickname]").val();
							var wantedEvent = $("textarea[name=wantedEvent]").val();
							var reason = $("textarea[name=reason]").val();
							var sign = $("textarea[name=sign]").val();

							if(isNullOrEmpty(name)) {
								alert("请填写名号");
								return false;
							}

							if(isNullOrEmpty(age)) {
								alert("请填写年龄");
								return false;
							}

							if(isNullOrEmpty(mobile)) {
								alert("请填写手机号");
								return false;
							}

							if(isNullOrEmpty(email)) {
								alert("请填写邮箱");
								return false;
							}

							if(isNullOrEmpty(job)) {
								alert("请填写职业");
								return false;
							}

							if(isNullOrEmpty(wechatId)) {
								alert("请填写微信ID");
								return false;
							}

							if(isNullOrEmpty(wechatNickname)) {
								alert("请填写微信昵称");
								return false;
							}

							if(isNullOrEmpty(sign)) {
								alert("请填写个人宣言");
								return false;
							}

							if(isNullOrEmpty(wantedEvent)) {
								alert("请填写你想发起的活动");
								return false;
							}

							if(isNullOrEmpty(reason)) {
								alert("请填写理由");
								return false;
							}

							$.ajax({
								url:"/applySubmit",
								type:"GET",
								data:{
									name: name,
									mobile: mobile,
									sex: sex,
									job: job,
									age: age,
									email: email,
									wechatId: wechatId,
									wechatNickname: wechatNickname,
									wantedEvent: wantedEvent,
									reason: reason,
									sign: sign
								},
								dataType:"JSON",
								beforeSend:function(){
									$("#loadingToast").show();
								},
								complete:function(){
									$('#loadingToast').hide();
								},
								success:function(data){
									alert(data.msg);
									window.location.href = "/myCreateEvent";
								},
							})

						}
					}
				})

			});

		</script>

	</head>
	<body id="container">
		<div class="sponsor-info">
			<div class="logo-bg"></div>
			<div class="sponsor-remind">
				<p class="title bold">发起人须知：</p>
				<p class="content color-blue">哈德搜房哈佛哈是否会对</p>
			</div>
			<div class="my-info-body">
				<p class="bold">你的名号</p>
				<input type="text" class="name" name="name">
				<p class="bold">性别</p>
				<div class="choose-sex">
					<div>
						<input type="radio" id="radio-1" name="sex" value="男" checked class="regular-radio big-radio"><label for="radio-1"></label><label for="radio-1"><span class="radio-span">男</span></label>
					</div>
					<div>
						<input type="radio" id="radio-2" name="sex" value="女" class="regular-radio big-radio"><label for="radio-2"></label><label for="radio-2"><span class="radio-span">女</span></label>
					</div>
				</div>
				<p class="bold">职业</p>
				<input type="text" class="major" name="job">
				<p class="bold">年龄<span class="color-999">（放心，绝对机密）</span></p>
				<input type="text" class="age">
				<p class="bold">手机号<span class="color-999">（方便与你及时联系）</span></p>
				<input type="text" class="mobile" name="mobile">
				<p class="bold">邮箱<span class="color-999">（会收到发起人教程哦）</span></p>
				<input type="text" class="e-mail" name="email">
				<p class="bold">微信ID</p>
				<input type="text" class="wx-id" name="wechatId">
				<p class="bold">微信昵称</p>
				<input type="text" class="wx-name" name="wechatNickname">
				<p class="bold">个人宣言</p>
				<textarea name="sign"></textarea>
				<p class="bold">你想发起什么样的活动？</p>
				<textarea name="wantedEvent"></textarea>
				<p class="bold">给个理由呗，为什么你是个好发起人？</p>
				<textarea name="reason"></textarea>
				<div class="button" v-on:click="submit">
					<p>提交</p>
				</div>
			</div>
		</div>
		<div class="foot">
			<div class="item" onclick="week()"><div>本周</div></div>
			<div class="item" v-on:click="search"><div>电影订单</div></div>
			<div class="item" v-on:click="goToeventList"><div>活动订单</div></div>
			<div class="item" v-on:click="myLike"><div>我</div></div>
		</div>
	</body>
</html>