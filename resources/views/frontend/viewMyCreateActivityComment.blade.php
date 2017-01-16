<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="telephone=no" name="format-detection"/>
		<meta content="email=no" name="format-detection"/>
		<link rel="stylesheet" type="text/css" href="/assets/frontend/css/weui.min.css">
		<title>反馈</title>
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
				.feed-back{
					padding: 0 22px;
					padding-bottom: 60px;
				}
				.title{
					position: relative;
					padding: 16px 0;
					border-bottom: 1px solid #dbdbdb;
				}
				.the-score{
					font-size: 18px;
				}
				.number{
					font-size: 26px;
				}
				.good,.middle,.bad {
					width: 75px;
					height: 27px;
					border-radius: 5px;
					position: absolute;
					top: 23px;
				}
				.good{
					background: #ff7d7d;
					margin-right: 5px;
					right: 155px;
				}
				.middle{
					background: #33cccc;
					margin-right: 5px;
					right: 75px;
				}
				.bad{
					background: #2c2c34;
					right: 0;
				}
				.word{
					font-size: 16px;
					color: #fff;
					padding: 0 5px;
				}
				.ten{
					position: absolute;
				    color: #fff;
				    top: 1px;
				    right: 8px;
				    font-size: 16px;
				}
				.choose-word{
					padding: 20px 0;
					border-bottom: 1px solid #dbdbdb;
					font-size: 13px;
				}
				.no-create-content{
					padding: 50px 0;
					text-align: center;
					font-size: 16px;
				}
			}
			@media(max-width: 375px){
				.feed-back{
					padding: 0 20px;
					padding-bottom: 60px;
				}
				.title{
					position: relative;
					padding: 16px 0;
					border-bottom: 1px solid #dbdbdb;
				}
				.the-score{
					font-size: 16px;
				}
				.number{
					font-size: 24px;
				}
				.good,.middle,.bad {
					width: 68px;
					height: 25px;
					border-radius: 5px;
					position: absolute;
					top: 23px;
				}
				.good{
					background: #ff7d7d;
					margin-right: 5px;
					right: 146px;
				}
				.middle{
					background: #33cccc;
					margin-right: 5px;
					right: 70px;
				}
				.bad{
					background: #2c2c34;
					right: 0;
				}
				.word{
					font-size: 15px;
					color: #fff;
					padding: 0 5px;
				}
				.ten{
					position: absolute;
				    color: #fff;
				    top: 1px;
				    right: 10px;
				    font-size: 15px;
				}
				.choose-word{
					padding: 20px 0;
					border-bottom: 1px solid #dbdbdb;
					font-size: 12px;
				}
				.no-create-content{
					padding: 50px 0;
					text-align: center;
					font-size: 14px;
				}
			}
			@media(max-width: 320px){
				.feed-back{
					padding: 0 15px;
					padding-bottom: 60px;
				}
				.title{
					position: relative;
					padding: 13px 0;
					border-bottom: 1px solid #dbdbdb;
				}
				.the-score{
					font-size: 14px;
				}
				.number{
					font-size: 22px;
				}
				.good,.middle,.bad {
					width: 60px;
					height: 20px;
					border-radius: 3px;
					position: absolute;
					top: 20px;
				}
				.good{
					background: #ff7d7d;
					margin-right: 5px;
					right: 130px;
				}
				.middle{
					background: #33cccc;
					margin-right: 5px;
					right: 62px;
				}
				.bad{
					background: #2c2c34;
					right: 0;
				}
				.word{
					font-size: 13px;
					color: #fff;
					padding: 0 5px;
				}
				.ten{
					position: absolute;
				    color: #fff;
				    top: 0px;
				    right: 5px;
				    font-size: 13px;
				}
				.choose-word{
					padding: 15px 0;
					border-bottom: 1px solid #dbdbdb;
					font-size: 10px;
				}
				.no-create-content{
					padding: 50px 0;
					text-align: center;
					font-size: 12px;
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
		<div class="feed-back">
			<div class="title">
				<div class="the-score">平均分：<span class="color-red bold number black-font">{{$data["average_point"]}}</span></div>
				<div class="bad">
					<div class="word bold">差</div>
					<div class="ten bold black-font">{{$data["bad_count"]}}</div>
				</div>
				<div class="middle">
					<div class="word bold">中</div>
					<div class="ten bold black-font">{{$data["normal_count"]}}</div>
				</div>
				<div class="good">
					<div class="word bold">好</div>
					<div class="ten bold black-font">{{$data["good_count"]}}</div>
				</div>
			</div>
			@if(count($data["list"]) == 0)
				<div class="no-create-content">
					暂无数据
				</div>
			@else
				@foreach($data["list"] as $item)
					<p class="choose-word bold">{{$item["content"]}}</p>
				@endforeach
			@endif
			
		</div>
		<div class="foot">
			<div class="item" onclick="week()"><div>本周</div></div>
			<div class="item" v-on:click="search"><div>电影订单</div></div>
			<div class="item" v-on:click="goToeventList"><div>活动订单</div></div>
			<div class="item" v-on:click="myLike"><div>我</div></div>
		</div>
	</body>
</html>