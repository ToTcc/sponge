<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="telephone=no" name="format-detection"/>
		<meta content="email=no" name="format-detection"/>
		<link rel="stylesheet" type="text/css" href="/assets/frontend/css/weui.min.css">
		<title>我的SAME</title>
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
			.font-16{
				font-size: 16px;
			}
			.hide{
				display: none;
			}
			.my-same{
				padding-bottom: 60px;
			}
			
			.my-same-head > p{
				text-align: center;
				font-size: 16px;
				margin-top: 10px;
			}

			.my-same-info{
				position: relative;
			}
			.color-blue{
				color: #3399ff;
			}
			.color-red{
				color: #ff9d9d;
			}
			.color-pink{
				color: #ff7d7d;
			}
			.color-bold{
				font-weight: bold;
				font-family: '黑体';
			}
			.go-on{
				position: absolute;
				top: 15px;
				right: 15px;
			}
			.create-order{
				height: auto;
				margin-bottom: 40px;
			}
			.line{
				border-bottom: 1px solid #dbdbdb;
			}
			.head-img-pic{
				background: #ccc;
				height: 250px;
				width: 48%;
				display: inline-block;
			}
			.content{
				margin-left: 15px;
				vertical-align: top;
				width: 45%;
				height: 250px;
				display: inline-block;
				position: relative;
			}
			@media (max-width: 414px){ 
				.font{
					font-size: 18px;
				}
				.create-content{
					padding-top: 315px;
				}
				.create-order-details{
					padding: 5px 15px 0 15px;	
					position: relative;			
				}
				.has-same{
					padding: 15px 0;
					margin: 0 15px;
					border-bottom: 1px solid #dbdbdb;
					position: relative;
					font-size: 18px;
				}
				.go-on{
					position: absolute;
					top: 15px;
					right: 15px;
					font-size: 18px;
				}
				.icon-zanzuo{
					background: url('/assets/frontend/image/zanzuo.png')no-repeat center;
					background-size: 20px;
					width: 20px;
					height: 20px;
					position: absolute;
				    left: -25px;
				    top: 3px;
				}
				.header{
					position: fixed;
					top: 0;
					left: 0;
					right: 0;
					background: #fff;
					z-index: 10;
				}
				.my-same-head{
					height: 130px;
				}
				.head-img{
					background: #efefef;
					background-size: cover;
					width: 100px;
					height: 100px;
					border-radius: 50%;
					margin: 15px;
					position: absolute;
				}
				.modify{
					background: url('/assets/frontend/image/modify.png')no-repeat center;
					background-size: 40px 39px;
					width: 40px;
					height: 39px;
					position: absolute;
					top: -1px;
					right: -15px;
				}
				.head-right{
					position: relative;
					padding-left: 145px;
				}
				.name{
					font-size: 25px;
				}
				.creidt-score{
					font-size: 16px;
				}
				.creidt-score > span{
					font-size: 16px;
				}
				.head-right > div > .ban{
					display: none;
				}
				.head-right > div{
					margin-top: 35px;
				}
				.head-right > div > .credit{
					position: absolute;
					right: 15px;
					bottom: 0px;
					color: #3399ff;
					font-size: 16px;
				}
				.head-right > div.active{
					margin-top: 16px;
				}

				.head-right > div.active > .credit{
					position: absolute;
					right: 15px;
					bottom: 31px;
					color: #3399ff;
					font-size: 16px;
				}
				.head-right > div.active > .ban{
					display: block;
					font-size: 14px;
					margin-top: 8px;
				}
				.nav-flex,.nav-flex-2{
					display: flex;
					position: relative;
				}
				.item{
					flex-grow:1;
					width: 50%;
					background: #fafafa;
					border-bottom: 3px solid #3399ff;
				}
				.item.active{
					background: #3399ff;
					color: #fff;
					font-weight: bold;
				}
				.item:nth-child(2){
					border-left: 1px solid #3399ff;
				}
				.item > div{
					width: 100%;
					padding: 18px 0;
					text-align: center;
					font-size: 16px;
				}
				.item-2{
					flex-grow:1;
					width: 50%;
					background: #cee7ff;
					color: #000;
					position: relative;
				}
				.item-2.active{
					color: #3399ff;
					font-weight: bold;
				}
				.item-2 >.seated{
					display: none;
				}
				.item-2.active > .seated.active{
					background: url('/assets/frontend/image/complete.png')no-repeat center;
					background-size: 20px;
					width: 20px;
					height: 20px;
					position: absolute;
					left: 40px;
					display: block;
				}
				.item-2-line{
					border-left: 1px solid #bfbfbf;
					height: 40px;
					position: absolute;
					left: 208px;
				    z-index: 10;
				    top: 10px;
				}
				.item-2 > div{
					width: 100%;
					padding: 18px 0;
					text-align: center;
					font-size: 16px;
				}
				.no-seat-word{
					padding: 50px 0;
					text-align: center;
				}
				.button{
					width: 90%;
					margin: 0 16px;
					border: 1px solid #3399ff;
					border-radius: 10px;
					background: #3399ff;
					position: relative;
					height: 40px;
					-webkit-box-shadow: #0281ff 0px 5px 1px;
					-moz-box-shadow: #0281ff 0px 5px 1px;
					box-shadow: #0281ff 0px 5px 1px;
				}
				.button > p{
					color: #fff;
					font-weight: 600;
					line-height: 40px;
					font-size: 20px;
					text-align: center;
					position: relative;
				}
				.head-img-pic{
					background: #ccc;
					width: 85px;
					height: 85px;
					background-size: cover;
					border-radius: 50%;
					margin: 10px 0 12px 0;
				}
				.has-pay-info{
					position: absolute;
					padding-left: 105px;
					top: 20px;
					width: 68%;
				}
				.pay-info-title{
					font-size: 14px;
					font-weight: bold;
					margin-bottom: 8px;
					width: 200px;
					overflow: hidden;
					white-space: nowrap;
					text-overflow: ellipsis;
				}
				.pay-info-other{
					font-size: 14px;
					margin-bottom: 8px;
					width: 200px;
					overflow: hidden;
					white-space: nowrap;
					text-overflow: ellipsis;
				}
				.pay-info-time{
					color: #3399ff;
					font-size: 14px;
				}
				.has-pay-info > div{
					font-size: 14px;
					position: absolute;
					top: 10px;
					right: 5px;
				}
				.moive-status-hascomemnt{
					color: #999;
				}
				.code{
					background: url('/assets/frontend/image/code.png')no-repeat center;
					background-size: 35px;
					width: 35px;
					height: 35px;
					position: absolute;
					top: 45px;
					right: 5px;
				}
				.join-num{
					font-size: 18px;
				}
				.no-create-content{
					padding: 50px 0;
					text-align: center;
					font-size: 16px;
				}
			}
			@media (max-width: 375px){ 
				.font{
					font-size: 16px;
				}
				.create-content{
					padding-top: 282px;
				}
				.create-order-details{
					padding: 5px 15px 0 15px;	
					position: relative;			
				}
				.has-same{
					padding: 15px 0;
					margin: 0 15px;
					border-bottom: 1px solid #dbdbdb;
					position: relative;
					font-size: 16px;
				}
				.go-on{
					position: absolute;
					top: 15px;
					right: 15px;
					font-size: 16px;
				}
				.icon-zanzuo{
					background: url('/assets/frontend/image/zanzuo.png')no-repeat center;
					background-size: 15px;
					width: 15px;
					height: 15px;
					position: absolute;
				    left: -20px;
				    top: 5px;
				}
				.header{
					position: fixed;
					top: 0;
					left: 0;
					right: 0;
					background: #fff;
					z-index: 10;
				}
				.my-same-head{
					height: 120px;
				}
				.head-img{
					background: #efefef;
					background-size: cover;
					width: 90px;
					height: 90px;
					border-radius: 50%;
					margin: 15px;
					position: absolute;
				}
				.modify{
					background: url('/assets/frontend/image/modify.png')no-repeat center;
					background-size: 40px 39px;
					width: 40px;
					height: 39px;
					position: absolute;
					top: -1px;
					right: -15px;
				}
				.head-right{
					position: relative;
					padding-left: 145px;
				}
				.name{
					font-size: 23px;
				}
				.creidt-score{
					font-size: 14px;
				}
				.creidt-score > span{
					font-size: 14px;
				}
				.head-right > div > .ban{
					display: none;
				}
				.head-right > div{
					margin-top: 35px;
				}
				.head-right > div > .credit{
					position: absolute;
					right: 15px;
					bottom: 0px;
					color: #3399ff;
					font-size: 14px;
				}
				.head-right > div.active{
					margin-top: 16px;
				}

				.head-right > div.active > .credit{
					position: absolute;
					right: 15px;
					bottom: 27px;
					color: #3399ff;
					font-size: 14px;
				}
				.head-right > div.active > .ban{
					display: block;
					font-size: 12px;
					margin-top: 8px;
				}
				.nav-flex,.nav-flex-2{
					display: flex;
					position: relative;
				}
				.item{
					flex-grow:1;
					width: 50%;
					background: #fafafa;
					border-bottom: 3px solid #3399ff;
				}
				.item.active{
					background: #3399ff;
					color: #fff;
					font-weight: bold;
				}
				.item:nth-child(2){
					border-left: 1px solid #3399ff;
				}
				.item > div{
					width: 100%;
					padding: 15px 0;
					text-align: center;
					font-size: 14px;
				}
				.item-2{
					flex-grow:1;
					width: 50%;
					background: #cee7ff;
					color: #000;
					position: relative;
				}
				.item-2.active{
					color: #3399ff;
					font-weight: bold;
				}
				.item-2 >.seated{
					display: none;
				}
				.item-2.active > .seated.active{
					background: url('/assets/frontend/image/complete.png')no-repeat center;
					background-size: 20px;
					width: 20px;
					height: 20px;
					position: absolute;
					left: 40px;
					display: block;
				}
				.item-2-line{
					border-left: 1px solid #bfbfbf;
					height: 30px;
					position: absolute;
					left: 188px;
				    z-index: 10;
				    top: 10px;
				}
				.item-2 > div{
					width: 100%;
					padding: 15px 0;
					text-align: center;
					font-size: 14px;
				}
				.no-seat-word{
					padding: 50px 75px;
				}
				.button{
					width: 90%;
					margin: 0 16px;
					border: 1px solid #3399ff;
					border-radius: 10px;
					background: #3399ff;
					position: relative;
					height: 40px;
					-webkit-box-shadow: #0281ff 0px 5px 1px;
					-moz-box-shadow: #0281ff 0px 5px 1px;
					box-shadow: #0281ff 0px 5px 1px;
				}
				.button > p{
					color: #fff;
					font-weight: 600;
					line-height: 40px;
					font-size: 20px;
					text-align: center;
					position: relative;
				}
				.head-img-pic{
					background: #ccc;
					width: 75px;
					height: 75px;
					background-size: cover;
					border-radius: 50%;
					margin: 10px 0 12px 0;
				}
				.has-pay-info{
					position: absolute;
					padding-left: 85px;
					top: 20px;
					width: 70%;
				}
				.pay-info-title{
					font-size: 12px;
					font-weight: bold;
					margin-bottom: 8px;
					width: 200px;
					overflow: hidden;
					white-space: nowrap;
					text-overflow: ellipsis;
				}
				.pay-info-other{
					font-size: 12px;
					margin-bottom: 8px;
					width: 200px;
					overflow: hidden;
					white-space: nowrap;
					text-overflow: ellipsis;
				}
				.pay-info-time{
					color: #3399ff;
					font-size: 12px;
				}
				.has-pay-info > div{
					font-size: 12px;
					position: absolute;
					top: 10px;
					right: 5px;
				}
				.moive-status-hascomemnt{
					color: #999;
				}
				.code{
					background: url('/assets/frontend/image/code.png')no-repeat center;
					background-size: 30px;
					width: 30px;
					height: 30px;
					position: absolute;
					top: 40px;
					right: 5px;
				}
				.join-num{
					font-size: 16px;
				}
				.no-create-content{
					padding: 50px 0;
					text-align: center;
					font-size: 14px;
				}
			}
			@media (max-width: 320px){
				.font{
					font-size: 14px;
				}
				.create-content{
					padding-top: 234px;
				}
				.create-order-details{
					padding: 5px 15px 0 15px;
					position: relative;
					z-index: 1;				
				}
				.has-same{
					padding: 15px 0;
					margin: 0 15px;
					border-bottom: 1px solid #dbdbdb;
					position: relative;
					font-size: 14px;
				}
				.go-on{
					position: absolute;
					top: 15px;
					right: 15px;
					font-size: 14px;
				}
				.icon-zanzuo{
					background: url('/assets/frontend/image/zanzuo.png')no-repeat center;
					background-size: 13px;
					width: 13px;
					height: 13px;
					position: absolute;
				    left: -20px;
				    top: 4px;
				}
				.header{
					position: fixed;
					top: 0;
					left: 0;
					right: 0;
					background: #fff;
					z-index: 10;
				}
				.my-same-head{
					height: 100px;
				}
				.head-img{
					background: #efefef;
					background-size: cover;
					width: 80px;
					height: 80px;
					border-radius: 50%;
					margin: 10px 12px;
					position: absolute;
				}
				.modify{
					background: url('/assets/frontend/image/modify.png')no-repeat center;
					background-size: 33px 33px;
					width: 33px;
					height: 33px;
					position: absolute;
					top: -1px;
					right: -15px;
				}
				.head-right{
					position: relative;
					padding-left: 125px;
				}
				.name{
					font-size: 20px;
				}
				.creidt-score{
					font-size: 12px;
				}
				.creidt-score > span{
					font-size: 12px;
				}
				.head-right > div > .ban{
					display: none;
				}
				.head-right > div{
					margin-top: 30px;
				}
				.head-right > div > .creidt-score{
					font-size: 12px;
				}
				.head-right > div > .credit{
					position: absolute;
					right: 15px;
					bottom: 0px;
					color: #3399ff;
					font-size: 12px;
				}
				.head-right > div.active{
					margin-top: 12px;
				}
				.head-right > div.active > .creidt-score{
					font-size: 12px;
				}
				.head-right > div.active > .credit{
					position: absolute;
					right: 15px;
					bottom: 25px;
					color: #3399ff;
					font-size: 12px;
				}
				.head-right > div.active > .ban{
					display: block;
					font-size: 10px;
					margin-top: 5px;
				}
				.nav-flex,.nav-flex-2{
					display: flex;
					position: relative;
				}
				.item{
					flex-grow:1;
					width: 50%;
					background: #fafafa;
					border-bottom: 3px solid #3399ff;
				}
				.item.active{
					background: #3399ff;
					color: #fff;
					font-weight: bold;
				}
				.item:nth-child(2){
					border-left: 1px solid #3399ff;
				}
				.item > div,.item-2 > div{
					width: 100%;
					padding: 10px 0;
					text-align: center;
					font-size: 12px;
				}
				.item-2{
					flex-grow:1;
					width: 50%;
					background: #cee7ff;
					color: #000;
					position: relative;
				}
				.item-2.active{
					color: #3399ff;
					font-weight: bold;
				}
				.item-2 >.seated{
					display: none;
				}
				.item-2.active > .seated.active{
					background: url('/assets/frontend/image/complete.png')no-repeat center;
					background-size: 16px;
					width: 16px;
					height: 16px;
					position: absolute;
					left: 35px;
					display: block;
				}
				.item-2-line{
					border-left: 1px solid #bfbfbf;
					height: 25px;
					position: absolute;
					left: 160px;
				    z-index: 10;
				    top: 6px;
				}
				.no-seat-word{
					padding: 45px 0;
					text-align: center;
				}
				.button{
					width: 90%;
					margin: 0 16px;
					border: 1px solid #3399ff;
					border-radius: 10px;
					background: #3399ff;
					position: relative;
					height: 35px;
					-webkit-box-shadow: #0281ff 0px 5px 1px;
					-moz-box-shadow: #0281ff 0px 5px 1px;
					box-shadow: #0281ff 0px 5px 1px;
				}
				.button > p{
					color: #fff;
					font-weight: 600;
					line-height: 35px;
					font-size: 18px;
					text-align: center;
					position: relative;
				}
				.head-img-pic{
					background: #ccc;
					width: 65px;
					height: 65px;
					background-size: cover;
					border-radius: 50%;
					margin: 7px 0 8px 0;
				}
				.has-pay-info{
					position: absolute;
					padding-left: 85px;
					top: 15px;
					width: 65%;
				}
				.has-pay-info > div{
					font-size: 10px;
					position: absolute;
					top: 10px;
					right: 5px;
				}
				.pay-info-title{
					font-size: 10px;
					font-weight: bold;
					margin-bottom: 5px;
					width: 150px;
					overflow: hidden;
					white-space: nowrap;
					text-overflow: ellipsis;
				}
				.pay-info-other{
					font-size: 10px;
					margin-bottom: 8px;
					width: 150px;
					overflow: hidden;
					white-space: nowrap;
					text-overflow: ellipsis;
				}
				.pay-info-time{
					color: #3399ff;
					font-size: 10px;
				}
				.moive-status-hascomemnt{
					color: #999;
				}
				.code{
					background: url('/assets/frontend/image/code.png')no-repeat center;
					background-size: 25px;
					width: 25px;
					height: 25px;
					position: absolute;
					top: 40px;
					right: 5px;
					z-index: 100;
				}
				.join-num{
					font-size: 14px;
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
						modifyInfo: function() {
							window.location.href = "/myInfo";
						},
						myCreateEvent: function() {
							window.location.href = "/myCreateEvent";
						},
						scoreDetail: function() {
							window.location.href = "/myScoreRecord";
						},
						viewDetail: function(id) {
							window.location.href = "/eventDetail/" + id;
						},
						viewRejectReason: function(id) {
							event.stopPropagation();
							window.location.href = "/viewRejectReason/" + id;
						},
						gotoComment: function(id) {
							event.stopPropagation();
							window.location.href = "/commentEventPage/" + id;
						},
						gotoSign: function(id) {
							event.stopPropagation();
							window.location.href = "/eventSignPage/" + id;
						},
						gotoPay: function(id) {
							event.stopPropagation();
							window.location.href = "/wechat/eventPay/" + id;
						}
					}
				})


			});

		</script>
	</head>
	<body id="container">
		<div class="my-same">
			<div class="header">
				<div class="my-same-head">
					<div class="head-img"  v-on:click="modifyInfo" style="z-index:99;background:url('{{$data["info"]["headimgurl"]}}') no-repeat center;background-size: cover;">
						<div class="modify"></div>
					</div>
					<div class="head-right">
						<p class="name">{{$data["info"]["nickname"]}}</p>
						@if($data["info"]["black"] == 1)
							<div class="active">
								<p class="creidt-score">信用积分：<span class="color-pink color-bold">{{$data["info"]["score"]}}</span></p>
								<p class="credit" v-on:click="scoreDetail">查看信用记录</p>
								<p class="color-red ban">还有{{calculateDateGap(date('Y-m-d'), $data["info"]["unlock_time"])}}天可以报名活动</p>
							</div>
						@else
							<div class="">
								@if($data["info"]["score"] <= 3)
									<p class="creidt-score">信用积分：<span class="color-pink color-bold">{{$data["info"]["score"]}}</span></p>
								@else
									<p class="creidt-score">信用积分：<span class="color-blue color-bold">{{$data["info"]["score"]}}</span></p>
								@endif
								<p class="credit" v-on:click="scoreDetail({{$data['info']['customer_id']}})">查看信用记录</p>
							</div>
						@endif
					</div>
				</div>
				<div class="nav-flex">
					<div class="item" v-on:click="myLike"><div>我的电影订单</div></div>
					<div class="item active"><div>我的活动订单</div></div>
				</div>
				<div class="nav-flex-2">
					<span class="item-2-line"></span>
					<div class="item-2 active"><div class="seated active"></div><div>我参加的</div></div>
					<div class="item-2" v-on:click="myCreateEvent"><div class="seated"></div><div>我发起的</div></div>
				</div>
				<div class="my-same-info">
					<div class="has-same">共参加<span class="color-blue color-bold font"> {{$data["total_counts"]}} </span>次，通过<span class="color-blue color-bold font"> {{$data["access_counts"]}} </span>次</div>
					<div class="go-on color-red" v-on:click="goToeventList">查看近期活动</div>
				</div>
			</div>
			<div class="create-content">
				@if($data["total_counts"] == 0)
					<div class="no-create-content">
						暂时没有参加活动
					</div>
				@else
					@foreach($data["list"] as $item)
						@if($item["status"] == config("enumerations.EVENT_JOIN_STATUS.WAITING_CHECK"))
							<div class="create-order-details" v-on:click="viewDetail({{$item["event_id"]}})">
								<div class="head-img-pic" style="background:url('{{$item["title_image"]}}') no-repeat center;background-size: cover;"></div>
								<div class="has-pay-info">
									<p class="pay-info-title">{{$item["title"]}}</p>
									<p class="pay-info-other">{{$item["second_title"]}}</p>
									<p class="pay-info-time">{{$item["time"]}}</p>
									<div class="moive-status-comemnt color-blue">待筛选</div>
								</div>
								<div class="line"></div>
							</div>
						@elseif($item["status"] == config("enumerations.EVENT_JOIN_STATUS.WAITING_PAY"))
							<div class="create-order-details" v-on:click="viewDetail({{$item["event_id"]}})">
								<div class="head-img-pic" style="background:url('{{$item["title_image"]}}') no-repeat center;background-size: cover;"></div>
								<div class="has-pay-info">
									<p class="pay-info-title">{{$item["title"]}}</p>
									<p class="pay-info-other">{{$item["second_title"]}}</p>
									<p class="pay-info-time">{{$item["time"]}}</p>
									<div class="moive-status-comemnt color-red" v-on:click="gotoPay({{$item["event_id"]}})" style="top:0;">筛选通过</div>
									<div class="moive-status-comemnt color-red" v-on:click="gotoPay({{$item["event_id"]}})" style="top:15px;">等待付款</div>
								</div>
								<div class="line"></div>
							</div>
						@elseif($item["status"] == config("enumerations.EVENT_JOIN_STATUS.END_PAY"))
							<div class="create-order-details" v-on:click="viewDetail({{$item["event_id"]}})">
								<div class="head-img-pic" style="background:url('{{$item["title_image"]}}') no-repeat center;background-size: cover;"></div>
								<div class="has-pay-info">
									<p class="pay-info-title">{{$item["title"]}}</p>
									<p class="pay-info-other">{{$item["second_title"]}}</p>
									<p class="pay-info-time">{{$item["time"]}}</p>
									@if(!$item["is_open"])
										<div class="moive-status-begin color-blue" style="top:0;">等待开始</div>
										<div class="moive-status-begin color-blue" style="top:15px;">加群活动</div>
									@else
										<div class="moive-status-begin color-blue" v-on:click="gotoSign({{$item["event_id"]}})">签到</div>
									@endif
									<p class="code" v-on:click="gotoSign({{$item["event_id"]}})" style="top:35px;"></p>
								</div>
								<div class="line"></div>
							</div>
						@elseif($item["status"] == config("enumerations.EVENT_JOIN_STATUS.END_COMMENT"))
							<div class="create-order-details" v-on:click="viewDetail({{$item["event_id"]}})">
								<div class="head-img-pic" style="background:url('{{$item["title_image"]}}') no-repeat center;background-size: cover;"></div>
								<div class="has-pay-info">
									<p class="pay-info-title">{{$item["title"]}}</p>
									<p class="pay-info-other">{{$item["second_title"]}}</p>
									<p class="pay-info-time">{{$item["time"]}}</p>
									<div class="moive-status-hascomemnt">已反馈</div>
								</div>
								<div class="line"></div>
							</div>
						@elseif($item["status"] == config("enumerations.EVENT_JOIN_STATUS.END_SIGN"))
							<div class="create-order-details" v-on:click="viewDetail({{$item["event_id"]}})">
								<div class="head-img-pic" style="background:url('{{$item["title_image"]}}') no-repeat center;background-size: cover;"></div>
								<div class="has-pay-info">
									<p class="pay-info-title">{{$item["title"]}}</p>
									<p class="pay-info-other">{{$item["second_title"]}}</p>
									<p class="pay-info-time">{{$item["time"]}}</p>
									<div class="moive-status-comment color-blue" v-on:click="gotoComment({{$item["event_id"]}})">请反馈</div>
								</div>
								<div class="line"></div>
							</div>
						@elseif($item["status"] == config("enumerations.EVENT_JOIN_STATUS.REJECT"))
							<div class="create-order-details" v-on:click="viewDetail({{$item["event_id"]}})">
								<div class="head-img-pic" style="background:url('{{$item["title_image"]}}') no-repeat center;background-size: cover;"></div>
								<div class="has-pay-info">
									<p class="pay-info-title">{{$item["title"]}}</p>
									<p class="pay-info-other">{{$item["second_title"]}}</p>
									<p class="pay-info-time">{{$item["time"]}}</p>
									<div class="moive-status-comment color-blue" v-on:click="viewRejectReason({{$item["event_id"]}})">已拒绝</div>
								</div>
								<div class="line"></div>
							</div>
						@elseif($item["status"] == config("enumerations.EVENT_JOIN_STATUS.REFUND"))
							<div class="create-order-details" v-on:click="viewDetail({{$item["event_id"]}})">
								<div class="head-img-pic" style="background:url('{{$item["title_image"]}}') no-repeat center;background-size: cover;"></div>
								<div class="has-pay-info">
									<p class="pay-info-title">{{$item["title"]}}</p>
									<p class="pay-info-other">{{$item["second_title"]}}</p>
									<p class="pay-info-time">{{$item["time"]}}</p>
									<div class="moive-status-comment color-blue">已请假</div>
								</div>
								<div class="line"></div>
							</div>
						@elseif($item["status"] == config("enumerations.EVENT_JOIN_STATUS.ABSENT"))
							<div class="create-order-details" v-on:click="viewDetail({{$item["event_id"]}})">
								<div class="head-img-pic" style="background:url('{{$item["title_image"]}}') no-repeat center;background-size: cover;"></div>
								<div class="has-pay-info">
									<p class="pay-info-title">{{$item["title"]}}</p>
									<p class="pay-info-other">{{$item["second_title"]}}</p>
									<p class="pay-info-time">{{$item["time"]}}</p>
									<div class="moive-status-comment color-blue">未到场</div>
								</div>
								<div class="line"></div>
							</div>
						@elseif($item["status"] == config("enumerations.EVENT_JOIN_STATUS.CANCEL"))
							<div class="create-order-details" v-on:click="viewDetail({{$item["event_id"]}})">
								<div class="head-img-pic" style="background:url('{{$item["title_image"]}}') no-repeat center;background-size: cover;"></div>
								<div class="has-pay-info">
									<p class="pay-info-title">{{$item["title"]}}</p>
									<p class="pay-info-other">{{$item["second_title"]}}</p>
									<p class="pay-info-time">{{$item["time"]}}</p>
									<div class="moive-status-comment color-blue">取消报名</div>
								</div>
								<div class="line"></div>
							</div>
						@elseif($item["status"] == config("enumerations.EVENT_JOIN_STATUS.EVENT_CANCEL"))
							<div class="create-order-details" v-on:click="viewDetail({{$item["event_id"]}})">
								<div class="head-img-pic" style="background:url('{{$item["title_image"]}}') no-repeat center;background-size: cover;"></div>
								<div class="has-pay-info">
									<p class="pay-info-title">{{$item["title"]}}</p>
									<p class="pay-info-other">{{$item["second_title"]}}</p>
									<p class="pay-info-time">{{$item["time"]}}</p>
									<div class="moive-status-comment color-blue">平台取消</div>
								</div>
								<div class="line"></div>
							</div>
						@endif

					@endforeach

				@endif
			</div>
		</div>
		<div class="foot">
			<div class="item1" onclick="week()"><div>本周</div></div>
			<div class="item1" v-on:click="search"><div>电影订单</div></div>
			<div class="item1" v-on:click="goToeventList"><div>活动订单</div></div>
			<div class="item1 active"><div>我</div></div>
		</div>
	</body>
</html>