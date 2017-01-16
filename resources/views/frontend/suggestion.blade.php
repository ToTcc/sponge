<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="telephone=no" name="format-detection"/>
		<meta content="email=no" name="format-detection"/>
		<link rel="stylesheet" type="text/css" href="/assets/frontend/css/weui.min.css">
		<title>拍砖</title>
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
			.my-info{
				padding-bottom: 60px;
			}
			.my-info-body{
				padding: 20px 15px 20px 20px;
			}
			.my-info-body > p{
				color: #999;
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
			.my-info-body > input:focus{
				outline: none;
			}
			.start{
				height: 200px;
				width: 90%;
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
			.button{
				background: #3399ff;
				padding: 0 15px;
				height: 40px;
				border-radius: 8px;
				margin-top: 10px;
				width: 88%;
				-webkit-box-shadow: #0281ff 0px 2px 1px;
				-moz-box-shadow: #0281ff 0px 2px 1px;
				box-shadow: #0281ff 0px 2px 1px;
			}
			.button > p{
				color: #fff;
				font-size: 22px;
				line-height: 40px;
				text-align: center;
				font-weight: 600;
				letter-spacing: 2px;
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
						myLike: function() {
							window.location.href = "/myLike";
						},
						eventList: function() {
							window.location.href = "/eventList";
						},
						submit: function() {

							var nickname = $("input[name=nickname]").val();
							var mobile = $("input[name=mobile]").val();
							var email = $("input[name=email]").val();
							var content = $("textarea[name=content]").val();

							if(nickname == "") {
								alert("用户名不能为空");
								return false;
							}
							if(!(/^1[3|4|5|7|8]\d{9}$/.test(mobile))) {
								alert("请填写正确的手机号");
								return false;
							}
							if(!(/^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/).test(email)) {
								alert("请填写正确的邮箱");
								return false;
							}
							if(content == "") {
								alert("内容不能为空");
								return false;
							}

							$.ajax({
								url:"/goSuggestion",
								type:"GET",
								data:{
									nickname:nickname,
									mobile:mobile,
									email:email,
									content:content
								},
								dataType:"JSON",
								beforeSend:function(){
									$("#loadingToast").show();
								},
								complete:function(){
									$('#loadingToast').hide();
								},
								success:function(data){
									alert("拍砖成功");
									window.location.href = "/myLike";
								},
							})
						}
					}
				})

			});

		</script>
	</head>
	<body id="container">
		<div class="my-info">
			<div class="my-info-body">
				<p>用户名（微信ID）</p>
				<input type="text" class="name" name="nickname" value="{{$data["customer"]["nickname"]}}">
				<p>手机号（方便我们与你联系）</p>
				<input type="text" class="mobile" name="mobile" value="{{$data["customer"]["mobile"]}}">
				<p>E-mail</p>
				<input type="text" class="email" name="email">
				<p>开始拍砖</p>
				<textarea class="start" name="content"></textarea>
				<div class="button" v-on:click="submit">
					<p>提交</p>
				</div>
			</div>
		</div>
		<div class="foot">
			<div class="item" onclick="week()"><div>本周</div></div>
			<div class="item" v-on:click="search"><div>电影订单</div></div>
			<div class="item" v-on:click="eventList"><div>活动订单</div></div>
			<div class="item" v-on:click="myLike"><div>我</div></div>
		</div>
	</body>
</html>