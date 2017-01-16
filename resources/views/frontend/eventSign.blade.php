<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="telephone=no" name="format-detection"/>
		<meta content="email=no" name="format-detection"/>
		<link rel="stylesheet" type="text/css" href="/assets/frontend/css/weui.min.css">
		<title>签到</title>
		<style type="text/css">
			html,body{
				height: auto;
				font-family: "微软雅黑";
			}
			*{
				margin: 0;
				padding: 0;
				font-size: 14px;
			}
			.color-red{
				color: #ff7d7d;
			}
			.color-blue{
				color: #3399ff;
			}
			.bold{
				font-weight: bold;
			}
			.font-black{
				font-family: "黑体";
			}
			.hide{
				display: none;
			}
			@media(max-width: 414px){
				.head-img{
					background: #ccc;
					background-size: cover;
					width: 100px;
					height: 100px;
					margin: 65px auto 10px auto;
					border-radius: 50%;
				}
				.name{
					font-size: 25px;
					text-align: center;
				}
				.sign{
					font-size: 20px;
					margin-top: 75px;
					text-align: center;
				}
			}
			@media(max-width: 375px){
				.head-img{
					background: #ccc;
					background-size: cover;
					width: 90px;
					height: 90px;
					margin: 55px auto 10px auto;
					border-radius: 50%;
				}
				.name{
					font-size: 23px;
					text-align: center;
				}
				.sign{
					font-size: 18px;
					margin-top: 65px;
					text-align: center;
				}
			}
			@media(max-width: 320px){
				.head-img{
					background: #ccc;
					background-size: cover;
					width: 80px;
					height: 80px;
					margin: 45px auto 10px auto;
					border-radius: 50%;
				}
				.name{
					font-size: 21px;
					text-align: center;
				}
				.sign{
					font-size: 16px;
					margin-top: 65px;
					text-align: center;
				}
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
						eventList: [],
					},
					methods: {
						myLike: function() {
							window.location.href = "/myLike";
						},
						search: function() {
							window.location.href = "/search";
						},
						goToeventList: function() {
							window.location.href = "/eventList";
						},
					}
				})


			});

		</script>
	</head>
	<body id="container">
		<div class="sign-success">
			<div class="head-img" style="background:url('{{$data["info"]["headimgurl"]}}') no-repeat center;background-size: cover;"></div>
			<p class="name">{{$data["info"]["nickname"]}}</p>
			<p class="sign bold color-blue">
				@if($data["code"] == 200)
					签到成功 !
				@else
					{{$data["msg"]}}
				@endif
			</p>
		</div>
		<div class="foot">
			<div class="item" onclick="week()"><div>本周</div></div>
			<div class="item" v-on:click="search"><div>电影订单</div></div>
			<div class="item" v-on:click="goToeventList"><div>活动订单</div></div>
			<div class="item" v-on:click="myLike"><div>我</div></div>
		</div>
	</body>
</html>