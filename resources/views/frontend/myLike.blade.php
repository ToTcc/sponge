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
			.create-order{
				height: auto;
				margin-bottom: 40px;
			}
			.line{
				border-bottom: 1px solid #dbdbdb;
				margin-top: 20px;
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
					padding-top: 313px;
				}
				.create-order-details{
					padding: 20px 15px 0 15px;	
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
				    top: 1px;
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
					height: 230px;
					width: 165px;
					display: inline-block;
				}
				.content{
					margin-left: 15px;
					vertical-align: top;
					width: 50%;
					height: 230px;
					position: absolute;
				}
				.title{
					font-size: 20px;
					width: 100%;
					line-height: 1.5;
					font-weight: 600;
					display: -webkit-box;
					-webkit-box-orient: vertical;
					-webkit-line-clamp: 2;
					word-break: break-all;
					overflow: hidden; 
					margin-bottom: 10px;
				}
				.point{
					color: #999;
					font-size: 16px;
				}
				.score{
					color: #3399ff;
					font-size: 33px;
				}
				.time,.nation{
					margin-top: 12px;
					color: #999;
					font-size: 16px;
				}
				.person{
					position: absolute;
					bottom: 0;
					font-size: 18px;
					font-weight: 600;
				}
				.info{
					position: absolute;
					right: 10px;
					bottom: 0;
					color: #fff;
					border-radius: 5px;
					padding: 3px 8px;
					font-size: 16px;
					background: #a5d2ff;
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
					padding: 25px 15px 0 15px;				
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
					height: 200px;
					width: 150px;
					display: inline-block;
				}
				.content{
					margin-left: 15px;
					vertical-align: top;
					width: 50%;
					height: 200px;
					position: absolute;
				}
				.title{
					font-size: 18px;
					width: 100%;
					line-height: 1.5;
					font-weight: 600;
					margin-bottom: 10px;
					display: -webkit-box;
					-webkit-box-orient: vertical;
					-webkit-line-clamp: 2;
					word-break: break-all;
					overflow: hidden; 
				}
				.point{
					color: #999;
					font-size: 14px;
				}
				.score{
					color: #3399ff;
					font-size: 30px;
				}
				.time,.nation{
					margin-top: 11px;
					color: #999;
					font-size: 14px;
				}
				.person{
					position: absolute;
					bottom: 0;
					font-size: 16px;
					font-weight: 600;
				}
				.info{
					position: absolute;
					right: 10px;
					bottom: 0;
					color: #fff;
					border-radius: 5px;
					padding: 3px 8px;
					font-size: 16px;
					background: #a5d2ff;
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
					padding: 20px 15px 0 15px;				
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
					height: 180px;
					width: 135px;
					display: inline-block;
				}
				.content{
					margin-left: 10px;
					vertical-align: top;
					width: 45%;
					height: 180px;
					display: inline-block;
					position: absolute;
				}
				.title{
					font-size: 16px;
					width: 100%;
					line-height: 1.5;
					font-weight: 600;
					margin-bottom: 10px;
					display: -webkit-box;
					-webkit-box-orient: vertical;
					-webkit-line-clamp: 2;
					word-break: break-all;
					overflow: hidden; 
				}
				.point{
					color: #999;
					font-size: 12px;
				}
				.score{
					color: #3399ff;
					font-size: 25px;
					font-weight: 600;
				}
				.time,.nation{
					margin-top: 10px;
					color: #999;
					font-size: 12px;
				}
				.person{
					position: absolute;
					bottom: 0;
					font-size: 14px;
					font-weight: 600;
				}
				.info{
					position: absolute;
					right: 0;
					bottom: 0;
					color: #fff;
					border-radius: 5px;
					padding: 3px 5px;
					font-size: 14px;
					background: #a5d2ff;
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
						myPay: function() {
							window.location.href = "/myPay";
						},
						search: function() {
							window.location.href = "/search";
						},
						eventList: function() {
							window.location.href = "/eventList";
						},
						modifyInfo: function() {
							window.location.href = "/myInfo";
						},
						myCreateEvent: function() {
							window.location.href = "/myCreateEvent";
						},
						myJoinEvent: function() {
							window.location.href = "/myJoinEventList";
						},
						movieInfo: function(movieId) {
							window.location.href = "/movieInfo/" + movieId;
						},
						scoreDetail: function() {
							window.location.href = "/myScoreRecord";
						}
					}
				})

				var pageNum = 2;
				var isNeedRefresh = false;

				$(window).scroll(function(){
					var scrollTop = $(this).scrollTop();
					var scrollHeight = $(document).height();
					var windowHeight = $(this).height();
					if(!isNeedRefresh &&
							(scrollHeight - scrollTop - windowHeight <= 25)){
						isNeedRefresh = true;
						refreshPage(pageNum++);
					}
				});

				function refreshPage(pageNum) {
					$.ajax({
						url:"/myLikeForPage",
						type:"GET",
						data:{
							pageNum:pageNum,
						},
						dataType:"JSON",
						beforeSend:function(){
							$("#loadingToast").show();
						},
						complete:function(){
							$('#loadingToast').hide();
						},
						success:function(data){
							if(!isNullOrEmpty(data)) {
								if(pageNum == 2){
									app.movieList = data;
								}else{
									app.movieList = app.movieList.concat(data);
								}
								isNeedRefresh = false;
							}
						},
					})
				}

			});

		</script>
	</head>
	<body id="container">
		<div class="my-same">
			<div class="header">
				<div class="my-same-head">
					<div class="head-img" v-on:click="modifyInfo" style="z-index:99;background:url('{{$data["info"]["headimgurl"]}}') no-repeat center;background-size: cover;">
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
					<div class="item active"><div>我的电影订单</div></div>
					<div class="item" v-on:click="myJoinEvent"><div>我的活动订单</div></div>
				</div>
				<div class="nav-flex-2">
					<span class="item-2-line"></span>
					<div class="item-2 active"><div class="seated active"></div><div>已占座的</div></div>
					<div class="item-2" v-on:click="myPay"><div class="seated"></div><div>已付款的</div></div>
				</div>
				<div class="my-same-info">
					<div class="has-same">共占座<span class="color-blue color-bold font"> {{$data["total_counts"]}} </span>个</div>
					<div class="go-on color-red" v-on:click="search"><div class="icon-zanzuo"></div>继续去占座</div>
				</div>
			</div>
			<div class="create-content">

				@if($data["total_counts"] == 0)

					<div class="no-seat">
						<div class="no-seat-word">你还没有自己的电影订单，快来创建吧！</div>
						<div class="button" v-on:click="myPay">
							<p>查看电影订单</p>
						</div>
					</div>

				@else

					@foreach($data["list"] as $item)

						<div class="create-order-details" v-on:click="movieInfo({{$item['douban_id']}})">
							<div class="head-img-pic" style="background:url('{{$item["info"]["images"]["large"]}}') no-repeat center;background-size: cover;"></div><div class="content">
								<p class="title">{{$item["info"]["title"]}}</p>
								<p class="point">豆瓣评分：<span class="score color-bold">{{$item["info"]["rating"]["average"]}}</span></p>
								<p class="time">年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;份：{{$item["info"]["year"]}}年</p>
								<p class="nation">国家地区：{{$item["info"]["countries"][0]}}</p>
								<p class="person">{{$item["like_count"]}}人占座</p>
								@if($item["status"] == "4")
									<p class="info" style="background: #999">{{getEnumString(config("enumerations.MOVIE_STATUS"), $item["status"])}}</p>
								@elseif($item["status"] == "3")
									<p class="info" style="background: #ffcc99">{{getEnumString(config("enumerations.MOVIE_STATUS"), $item["status"])}}</p>
								@elseif($item["status"] == "2")
									<p class="info" style="background: #A5D2FF;">{{getEnumString(config("enumerations.MOVIE_STATUS"), $item["status"])}}</p>
								@endif
							</div>
							<div class="line"></div>
						</div>

					@endforeach

					<div v-for="item in movieList">
						<div class="create-order-details" v-on:click="movieInfo(item.douban_id)">
							<div class="head-img-pic" style="background:url('@{{item.info.images.large}}') no-repeat center;background-size: cover;"></div><div class="content">
								<p class="title">@{{item.info.title}}</p>
								<p class="point">豆瓣评分：<span class="score color-bold">@{{item.info.rating.average}}</span></p>
								<p class="time">年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;份：@{{item.info.year}}年</p>
								<p class="nation">国家地区：@{{item.info.countries[0]}}</p>
								<p class="person">@{{item.like_count}}人占座</p>
								<p class="info" v-if="(item.status == '4')" style="background: #999">无法放映</p>
								<p class="info" v-if="(item.status == '2')" style="background: #A5D2FF">售票中</p>
								<p class="info" v-if="(item.status == '3')" style="background: #ffcc99;">售罄</p>
							</div>
							<div class="line"></div>
						</div>
					</div>

				@endif

			</div>
		</div>
		<div class="foot">
			<div class="item1" onclick="week()"><div>本周</div></div>
			<div class="item1" v-on:click="search"><div>电影订单</div></div>
			<div class="item1" v-on:click="eventList"><div>活动订单</div></div>
			<div class="item1 active"><div>我</div></div>
		</div>
		<!-- loading toast -->
		<div id="loadingToast" class="weui_loading_toast" style="display: none;">
			<div class="weui_mask_transparent"></div>
			<div class="weui_toast small" style="z-index:10;">
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
				<p class="weui_toast_content">数据加载中</p>
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