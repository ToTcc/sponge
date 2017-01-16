<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="telephone=no" name="format-detection"/>
	<meta content="email=no" name="format-detection"/>
	<link rel="stylesheet" type="text/css" href="/assets/frontend/css/weui.min.css">
	<title>信用记录</title>
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
		.color-pink{
			color: #ff7d7d;
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
		@media (max-width: 414px){
			.font{
				font-size: 14px;
			}
			.credit-details{
				padding: 0 20px;
				padding-bottom: 60px;
			}
			.my-credit-info{
				padding: 28px 0;
				margin: 0 auto;
				position: relative;
			}
			.credit-score{
				font-size: 16px;
			}
			.credit-score > span{
				font-size: 16px;
			}
			.warnning{
				position: absolute;
				top: 29px;
				right: 0px;
			}
			.credit-details-list{
				padding: 18px 0;
				border-bottom: 1px solid #dbdbdb;
				position: relative;
			}
			.title{
				width: 200px;
				overflow: hidden;
				white-space: nowrap;
				text-overflow: ellipsis;
			}
			.other,.time{
				margin-top: 10px;
				width: 200px;
				overflow: hidden;
				white-space: nowrap;
				text-overflow: ellipsis;
			}
			.reason{
				position: absolute;
				top: 10px;
				right: 0;
				width: 140px;
			}
			.points{
				position: relative;
				border-radius: 50%;
				width: 45px;
				height: 45px;
				background: #3399ff;
				margin: 0 auto;
			}
			.points > span{
				position: absolute;
				color: #fff;
				top: 6px;
				right: 12px;
				z-index: 2;
				font-size: 20px;
			}
			.reason > p{
				margin-top: 5px;
				text-align: center;
			}
			.rule{
				position: absolute;
			    bottom: 70px;
			    width: 100%;
				text-align: center;
			}
			.no-credit-record{
				padding: 50px 0;
				text-align: center;
				font-size: 16px;
			}
		}
		@media (max-width: 375px){
			.font{
				font-size: 12px;
			}
			.credit-details{
				padding: 0 20px;
				padding-bottom: 60px;
			}
			.my-credit-info{
				padding: 25px 0;
				margin: 0 auto;
				position: relative;
			}
			.credit-score{
				font-size: 14px;
			}
			.credit-score > span{
				font-size: 14px;
			}
			.warnning{
				position: absolute;
				top: 26px;
				right: 0px;
			}
			.credit-details-list{
				padding: 15px 0;
				border-bottom: 1px solid #dbdbdb;
				position: relative;
			}
			.title{
				width: 200px;
				overflow: hidden;
				white-space: nowrap;
				text-overflow: ellipsis;
			}
			.other,.time{
				margin-top: 10px;
				width: 200px;
				overflow: hidden;
				white-space: nowrap;
				text-overflow: ellipsis;
			}
			.reason{
				position: absolute;
				top: 10px;
				right: 0;
				width: 130px;
			}
			.points{
				position: relative;
				border-radius: 50%;
				width: 40px;
				height: 40px;
				background: #3399ff;
				margin: 0 auto;
			}
			.points > span{
				position: absolute;
				color: #fff;
				top: 6px;
				right: 12px;
				z-index: 2;
				font-size: 18px;
			}
			.reason > p{
				margin-top: 5px;
				text-align: center;
			}
			.rule{
				position: absolute;
			    bottom: 70px;
			    width: 100%;
				text-align: center;
			}
			.no-credit-record{
				padding: 50px 0;
				text-align: center;
				font-size: 14px;
			}
		}
		@media (max-width: 320px){
			.font{
				font-size: 10px;
			}
			.credit-details{
				padding: 0 15px;
				padding-bottom: 60px;
			}
			.my-credit-info{
				padding: 20px 0;
				margin: 0 auto;
				position: relative;
			}
			.credit-score{
				font-size: 12px;
			}
			.credit-score > span{
				font-size: 12px;
			}
			.warnning{
				position: absolute;
				top: 20px;
				right: 0px;
			}
			.credit-details-list{
				padding: 15px 0;
				border-bottom: 1px solid #dbdbdb;
				position: relative;
			}
			.title{
				width: 200px;
				overflow: hidden;
				white-space: nowrap;
				text-overflow: ellipsis;
			}
			.other,.time{
				margin-top: 6px;
				width: 200px;
				overflow: hidden;
				white-space: nowrap;
				text-overflow: ellipsis;
			}
			.reason{
				position: absolute;
				top: 10px;
				right: 0;
				width: 120px;
			}
			.points{
				position: relative;
				border-radius: 50%;
				width: 35px;
				height: 35px;
				background: #3399ff;
				margin: 0 auto;
			}
			.points > span{
				position: absolute;
				color: #fff;
				top: 5px;
				right: 10px;
				z-index: 2;
				font-size: 16px;
			}
			.reason > p{
				margin-top: 5px;
				text-align: center;
			}
			.rule{
				position: absolute;
			    bottom: 70px;
			    width: 100%;
				text-align: center;
			}
			.no-credit-record{
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
		.item1{
			flex-grow:1;
			width: 25%;
			padding: 10px 0;
			text-align: center;
			border-right: 1px solid #dbdbdb;
		}
		.item1.active{
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
				}
			})

		});

	</script>

</head>
<body id="container">
<div class="credit-details">
	<div class="my-credit-info">
		<div class="credit-score">当前信用积分：<span class="color-pink bold black-font"> {{$data["info"]["score"]}} </span></div>
		@if($data["info"]["black"] == 1)
			<div class="warnning color-red font">还有{{calculateDateGap(date('Y-m-d'), $data["info"]["unlock_time"])}}天可以报名活动</div>
		@endif
	</div>
	<div class="line"></div>
	@if(count($data["list"]) == 0)
		<div class="no-credit-record">
			暂无信用记录
		</div>
	@else

		@foreach($data["list"] as $item)
			<div class="credit-details-list">
				<p class="title bold font">{{$item["event_title"]}}</p>
				<p class="other font">{{$item["event_second_title"]}}</p>
				<p class="time color-blue font">{{$item["time"]}}</p>
				<div class="reason">
					<div class="points"><span class="bold">-{{$item["score"]}}</span></div>
					<p class="font color-blue bold">{{$item["description"]}}</p>
				</div>
			</div>
		@endforeach

	@endif

</div>
<div class="rule color-red font">>了解[SAME]信用积分规则规则<</div>
<div class="foot">
	<div class="item1" onclick="week()"><div>本周</div></div>
	<div class="item1" v-on:click="search"><div>电影订单</div></div>
	<div class="item1" v-on:click="goToeventList"><div>活动订单</div></div>
	<div class="item1 active"><div>我</div></div>
</div>
</body>
</html>