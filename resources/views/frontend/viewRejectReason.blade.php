<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="telephone=no" name="format-detection"/>
		<meta content="email=no" name="format-detection"/>
		<link rel="stylesheet" type="text/css" href="/assets/frontend/css/weui.min.css">
		<title>拒绝理由</title>
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
			@media(max-width: 414px){
				.refuse-reason{
					padding: 20px 20px 60px 20px;
				}
				.refuse-reason > p{
					font-weight: bold;
					font-size: 18px;
				}
				.info{
					margin-top: 20px;
					background: #deefff;
					height: 200px;
					border-radius: 10px;
					position: relative;
				}
				.triangle_border_up{
					width:0;
					height:0;
					border-width:0 15px 15px;
					border-style:solid;
					border-color:transparent transparent #deefff;/*透明 透明  灰*/
					top: -15px;
					left: 30px;
					position:absolute;
				}
				.info > p{
					padding: 20px;
					line-height: 1.6;
					font-size: 14px;
				}
			}
			@media(max-width: 375px){
				.refuse-reason{
					padding: 15px 15px 60px 15px;
				}
				.refuse-reason > p{
					font-weight: bold;
					font-size: 16px;
				}
				.info{
					margin-top: 20px;
					background: #deefff;
					height: 180px;
					border-radius: 10px;
					position: relative;
				}
				.triangle_border_up{
					width:0;
					height:0;
					border-width:0 12px 12px;
					border-style:solid;
					border-color:transparent transparent #deefff;/*透明 透明  灰*/
					top: -10px;
					left: 30px;
					position:absolute;
				}
				.info > p{
					padding: 20px;
					line-height: 1.6;
					font-size: 12px;
				}
			}
			@media(max-width: 320px){
				.refuse-reason{
					padding: 15px 15px 60px 15px;
				}
				.refuse-reason > p{
					font-weight: bold;
					font-size: 14px;
				}
				.info{
					margin-top: 20px;
					background: #deefff;
					height: 160px;
					border-radius: 10px;
					position: relative;
				}
				.triangle_border_up{
					width:0;
					height:0;
					border-width:0 12px 12px;
					border-style:solid;
					border-color:transparent transparent #deefff;/*透明 透明  灰*/
					top: -10px;
					left: 30px;
					position:absolute;
				}
				.info > p{
					padding: 15px;
					line-height: 1.6;
					font-size: 10px;
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
		<div class="refuse-reason">
			<p>拒绝理由</p>
			<div class="info">
				<div class="triangle_border_up"></div>
				<p>{{$data["info"]["reject_reason"]}}</p>
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