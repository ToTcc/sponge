<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="telephone=no" name="format-detection"/>
		<meta content="email=no" name="format-detection"/>
		<link rel="stylesheet" type="text/css" href="/assets/frontend/css/weui.min.css">
		<title>筛选列表</title>
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
			.select-list{
				padding-bottom: 60px;
			}
			@media(max-width: 414px){
				.select-title{
					padding: 15px 20px;
					text-align: left;
					font-size: 16px;
				}
				.join-condition{
					background: #cee7ff;
					padding:20px 0;
				}
				.join-condition > p{
					padding: 0 20px;
					font-size: 16px;
				}
				.join-condition > p > span{
					font-size: 16px;
				}
				.select-nav{
					display: flex;
					width: 100%;
					background: #efefef;
				}
				.select-item{
					flex-grow:1;
					width: 27%;
					padding: 15px 0;
					text-align: center;
					border-right: 1px solid #dbdbdb;
					font-size: 16px;
				}
				.select-item.active{
					background: #3399ff;
					color: #fff;
				}
				.select-item:nth-child(2),.select-item:nth-child(3){
					width: 23%;
				}
				.select-item:last-child{
					border-right: none;
				}
				.user-list{
					padding: 15px;
					position: relative;
					border-bottom: 1px solid #dbdbdb;
				}
				.head-img{
					background: #ccc;
					background-size: cover;
					border-radius: 50%;
					width: 40px;
					height: 40px;
				}
				.user-info{
					position: absolute;
				    top: 15px;
				    left: 70px;
				    width: 78%;
				}
				.icon{
					background: url('/assets/frontend/image/down_03.png')no-repeat center;
					background-size: 28px;
					width: 28px;
					height: 28px;
					position: absolute;
					right: 8px;
					top: 8px;
				}
				.icon.active{
					background: url('/assets/frontend/image/up_03.png')no-repeat center;
					background-size: 28px;
					width: 28px;
					height: 28px;
					position: absolute;
					right: 8px;
					top: 8px;
				}
				.name{
					font-size: 14px;
					margin-bottom: 5px;
				}
				.info{
					font-size: 14px;
				}
				.some-problem{
					padding: 0 15px;
					background: #f6f6f6;
				}
				.one,.two{
					padding-top: 15px;
					border-bottom: 1px solid #dbdbdb;
				}
				.three{
					padding: 15px 0;
				}
				.problem-one,.answer{
					margin-bottom: 15px;
					font-size: 14px;
				}
				.button{
					padding-bottom: 20px;
				}
				.agree,.refuse{
					display: inline-block;
					width: 46%;
				}
				.agree{
					height: 50px;
					-webkit-box-shadow: #0281ff 0px 2px 1px;
					-moz-box-shadow: #0281ff 0px 2px 1px;
					box-shadow: #0281ff 0px 2px 1px;
					background: #3399ff;
					border-radius: 8px;
					margin-right: 20px;
				}
				.agree > p{
					color: #fff;
					font-size: 20px;
					text-align: center;
					font-weight: 600;
					letter-spacing: 2px;
					line-height: 50px;
				}
				.refuse{
					height: 50px;
					-webkit-box-shadow: #ff4444 0px 2px 1px;
					-moz-box-shadow: #ff4444 0px 2px 1px;
					box-shadow: #ff4444 0px 2px 1px;
					background: #ff7d7d;
					border-radius: 8px;
				}
				.refuse > p{
					color: #fff;
					font-size: 20px;
					text-align: center;
					font-weight: 600;
					letter-spacing: 2px;
					line-height: 50px;
				}
				.refuse-reason{
					padding: 15px;
					background: #ffe6e6;
				}
				.refuse-reason > p{
					font-size: 14px;
					color: #ff7d7d;
				}
				.icon-word{
					position: absolute;
					right: 10px;
					top: 10px;
					color: #ff7d7d;
					font-size: 14px;
				}
				.icon-pay{
					position: absolute;
					top: 0;
					right: 130px;
					color: #3399ff;
					font-size: 14px;
				}
				.icon-no-pay{
					position: absolute;
					top: 0;
					right: 130px;
					color: #ff7d7d;
					font-size: 14px;
				}
				.no-create-content{
					padding: 50px 0;
					text-align: center;
					font-size: 16px;
				}
			}
			@media(max-width: 375px){
				.select-title{
					padding: 15px 20px;
					text-align: left;
					font-size: 14px;
				}
				.join-condition{
					background: #cee7ff;
					padding:20px 0;
				}
				.join-condition > p{
					padding: 0 20px;
					font-size: 14px;
				}
				.join-condition > p > span{
					font-size: 14px;
				}
				.select-nav{
					display: flex;
					width: 100%;
					background: #efefef;
				}
				.select-item{
					flex-grow:1;
					width: 27%;
					padding: 15px 0;
					text-align: center;
					border-right: 1px solid #dbdbdb;
					font-size: 14px;
				}
				.select-item.active{
					background: #3399ff;
					color: #fff;
				}
				.select-item:nth-child(2),.select-item:nth-child(3){
					width: 23%;
				}
				.select-item:last-child{
					border-right: none;
				}
				.user-list{
					padding: 15px;
					position: relative;
					border-bottom: 1px solid #dbdbdb;
				}
				.head-img{
					background: #ccc;
					background-size: cover;
					border-radius: 50%;
					width: 40px;
					height: 40px;
				}
				.user-info{
					position: absolute;
				    top: 15px;
				    left: 70px;
				    width: 78%;
				}
				.icon{
					background: url('/assets/frontend/image/down_03.png')no-repeat center;
					background-size: 28px;
					width: 28px;
					height: 28px;
					position: absolute;
					right: 8px;
					top: 8px;
				}
				.icon.active{
					background: url('/assets/frontend/image/up_03.png')no-repeat center;
					background-size: 28px;
					width: 28px;
					height: 28px;
					position: absolute;
					right: 8px;
					top: 8px;
				}
				.name{
					font-size: 12px;
					margin-bottom: 5px;
				}
				.info{
					font-size: 12px;
				}
				.some-problem{
					padding: 0 15px;
					background: #f6f6f6;
				}
				.one,.two{
					padding-top: 15px;
					border-bottom: 1px solid #dbdbdb;
				}
				.three{
					padding: 15px 0;
				}
				.problem-one,.answer{
					margin-bottom: 15px;
					font-size: 12px;
				}
				.button{
					padding-bottom: 20px;
				}
				.agree,.refuse{
					display: inline-block;
					width: 46%;
				}
				.agree{
					height: 48px;
					-webkit-box-shadow: #0281ff 0px 2px 1px;
					-moz-box-shadow: #0281ff 0px 2px 1px;
					box-shadow: #0281ff 0px 2px 1px;
					background: #3399ff;
					border-radius: 8px;
					margin-right: 20px;
				}
				.agree > p{
					color: #fff;
					font-size: 18px;
					text-align: center;
					font-weight: 600;
					letter-spacing: 2px;
					line-height: 48px;
				}
				.refuse{
					height: 48px;
					-webkit-box-shadow: #ff4444 0px 2px 1px;
					-moz-box-shadow: #ff4444 0px 2px 1px;
					box-shadow: #ff4444 0px 2px 1px;
					background: #ff7d7d;
					border-radius: 8px;
				}
				.refuse > p{
					color: #fff;
					font-size: 18px;
					text-align: center;
					font-weight: 600;
					letter-spacing: 2px;
					line-height: 48px;
				}
				.refuse-reason{
					padding: 15px;
					background: #ffe6e6;
				}
				.refuse-reason > p{
					font-size: 12px;
					color: #ff7d7d;
				}
				.icon-word{
					position: absolute;
					right: 10px;
					top: 10px;
					color: #ff7d7d;
					font-size: 12px;
				}
				.icon-pay{
					position: absolute;
					top: 0;
					right: 125px;
					color: #3399ff;
					font-size: 12px;
				}
				.icon-no-pay{
					position: absolute;
					top: 0;
					right: 125px;
					color: #ff7d7d;
					font-size: 12px;
				}
				.no-create-content{
					padding: 50px 0;
					text-align: center;
					font-size: 14px;
				}
			}
			@media(max-width: 320px){
				.select-title{
					padding: 10px 15px;
					text-align: left;
					font-size: 12px;
				}
				.join-condition{
					background: #cee7ff;
					padding:15px 0;
				}
				.join-condition > p{
					padding: 0 15px;
					font-size: 12px;
				}
				.join-condition > p > span{
					font-size: 12px;
				}
				.select-nav{
					display: flex;
					width: 100%;
					background: #efefef;
				}
				.select-item{
					flex-grow:1;
					width: 27%;
					padding: 10px 0;
					text-align: center;
					border-right: 1px solid #dbdbdb;
					font-size: 12px;
				}
				.select-item.active{
					background: #3399ff;
					color: #fff;
				}
				.select-item:nth-child(2),.select-item:nth-child(3){
					width: 23%;
				}
				.select-item:last-child{
					border-right: none;
				}
				.user-list{
					padding: 15px;
					position: relative;
					border-bottom: 1px solid #dbdbdb;
				}
				.head-img{
					background: #ccc;
					background-size: cover;
					border-radius: 50%;
					width: 40px;
					height: 40px;
				}
				.user-info{
					position: absolute;
				    top: 15px;
				    left: 70px;
				    width: 73%;
				}
				.icon{
					background: url('/assets/frontend/image/down_03.png')no-repeat center;
					background-size: 25px;
					width: 25px;
					height: 25px;
					position: absolute;
					right: 0px;
					top: 8px;
				}
				.icon.active{
					background: url('/assets/frontend/image/up_03.png')no-repeat center;
					background-size: 25px;
					width: 25px;
					height: 25px;
					position: absolute;
					right: 0px;
					top: 8px;
				}
				.name{
					font-size: 10px;
					margin-bottom: 5px;
				}
				.info{
					font-size: 10px;
				}
				.some-problem{
					padding: 0 15px;
					background: #f6f6f6;
				}
				.one,.two{
					padding-top: 15px;
					border-bottom: 1px solid #dbdbdb;
				}
				.three{
					padding: 15px 0;
				}
				.problem-one,.answer{
					margin-bottom: 15px;
					font-size: 10px;
				}
				.button{
					padding-bottom: 20px;
				}
				.agree,.refuse{
					display: inline-block;
					width: 46%;
				}
				.agree{
					height: 43px;
					-webkit-box-shadow: #0281ff 0px 2px 1px;
					-moz-box-shadow: #0281ff 0px 2px 1px;
					box-shadow: #0281ff 0px 2px 1px;
					background: #3399ff;
					border-radius: 8px;
					margin-right: 15px;
				}
				.agree > p{
					color: #fff;
					font-size: 16px;
					text-align: center;
					font-weight: 600;
					letter-spacing: 2px;
					line-height: 43px;
				}
				.refuse{
					height: 43px;
					-webkit-box-shadow: #ff4444 0px 2px 1px;
					-moz-box-shadow: #ff4444 0px 2px 1px;
					box-shadow: #ff4444 0px 2px 1px;
					background: #ff7d7d;
					border-radius: 8px;
				}
				.refuse > p{
					color: #fff;
					font-size: 16px;
					text-align: center;
					font-weight: 600;
					letter-spacing: 2px;
					line-height: 43px;
				}
				.refuse-reason{
					padding: 15px;
					background: #ffe6e6;
				}
				.refuse-reason > p{
					font-size: 10px;
					color: #ff7d7d;
				}
				.icon-word{
					position: absolute;
					right: 0px;
					top: 10px;
					color: #ff7d7d;
					font-size: 10px;
				}
				.icon-pay{
					position: absolute;
					top: 0;
					right: 70px;
					color: #3399ff;
					font-size: 10px;
				}
				.icon-no-pay{
					position: absolute;
					top: 0;
					right: 70px;
					color: #ff7d7d;
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
						changeStatus: function(type) {
							window.location.href = "/viewMyCreateEventDetail/{{$data["event"]["event_id"]}}?type=" + type;
						},
						access: function(joinId) {

							$.ajax({
								url:"/accessEventJoin",
								type:"GET",
								data:{
									joinId: joinId,
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
									window.location.reload();
								},
							})

						},
						reject: function(joinId) {
							window.location.href = "/rejectEventJoinPage/" + joinId;
						}
					}
				})

				$(".user-list .icon").bind("click", function() {
					$(this).toggleClass("active");
					if ($(this).hasClass("active")) {
						$(this).parent().parent().next().show();
					}else{
						$(this).parent().parent().next().hide();
					}
				});

				$(".user-list .icon-word").bind("click", function() {
					var content = $(this).html();
					if(content == "收起") {
						$(this).html("拒绝理由");
					} else if(content == "拒绝理由") {
						$(this).html("收起");
					}
					$(this).parent().parent().next().toggle();
				});

			});

		</script>
	</head>
	<body id="container">
		<div class="select-list">
			<div class="select-title color-blue">
				请及时筛选用户，筛选后结果将不能调整，结果将及时发送给用户。
			</div>
			<div class="join-condition">
				<p>报名上限：<span class="color-blue bold black-font">{{$data["event"]["upper_limit"]}}</span>人&nbsp;&nbsp;报名人数：<span class="color-blue bold black-font">{{$data["event"]["join_number"]}}</span>人&nbsp;&nbsp;</p>
			</div>
			<div class="select-nav">
				@if($data["type"] == "waiting")
					<div class="select-item active">待筛选 {{$data["waiting_count"]}}</div>
					<div class="select-item" v-on:click="changeStatus('access')">通过 {{$data["access_count"]}}</div>
					<div class="select-item" v-on:click="changeStatus('reject')">拒绝 {{$data["reject_count"]}}</div>
					<div class="select-item" v-on:click="changeStatus('no')">不能到场 {{$data["no_count"]}}</div>
				@elseif($data["type"] == "access")
					<div class="select-item" v-on:click="changeStatus('waiting')">待筛选 {{$data["waiting_count"]}}</div>
					<div class="select-item active">通过 {{$data["access_count"]}}</div>
					<div class="select-item" v-on:click="changeStatus('reject')">拒绝 {{$data["reject_count"]}}</div>
					<div class="select-item" v-on:click="changeStatus('no')">不能到场 {{$data["no_count"]}}</div>
				@elseif($data["type"] == "reject")
					<div class="select-item" v-on:click="changeStatus('waiting')">待筛选 {{$data["waiting_count"]}}</div>
					<div class="select-item" v-on:click="changeStatus('access')">通过 {{$data["access_count"]}}</div>
					<div class="select-item active">拒绝 {{$data["reject_count"]}}</div>
					<div class="select-item" v-on:click="changeStatus('no')">不能到场 {{$data["no_count"]}}</div>
				@elseif($data["type"] == "no")
					<div class="select-item" v-on:click="changeStatus('waiting')">待筛选 {{$data["waiting_count"]}}</div>
					<div class="select-item" v-on:click="changeStatus('access')">通过 {{$data["access_count"]}}</div>
					<div class="select-item" v-on:click="changeStatus('reject')">拒绝 {{$data["reject_count"]}}</div>
					<div class="select-item active">不能到场 {{$data["no_count"]}}</div>
				@endif
			</div>

			@if(count($data["list"]) == 0)
				<div class="no-create-content">
					暂无数据
				</div>
			@else
				@if($data["type"] == "waiting")
					@foreach($data["list"] as $item)

						<div class="user-list">
							<div class="head-img" style="background:url('{{$item["headimgurl"]}}') no-repeat center;background-size: cover;"></div>
							<div class="user-info">
								<p class="name bold">{{$item["nickname"]}}</p>
								<p class="info">{{$item["year_type"]}}&nbsp;&nbsp;&nbsp;女&nbsp;&nbsp;&nbsp;{{$item["job"]}}&nbsp;&nbsp;&nbsp;{{$item["hour_gap"]}}小时前报名</p>
								<div class="icon"></div>
							</div>
						</div>
						<div class="some-problem" style="display:none;">
							<div class="one">
								<p class="problem-one bold">{{$item["question_one"]}}</p>
								<p class="color-blue answer">{{$item["answer_one"]}}</p>
							</div>
							<div class="two">
								<p class="problem-one bold">{{$item["question_two"]}}</p>
								<p class="color-blue answer">{{$item["answer_two"]}}</p>
							</div>
							<div class="three">
								<p class="problem-one bold">{{$item["question_three"]}}？</p>
								<p class="color-blue answer">{{$item["answer_three"]}}</p>
							</div>
							<div class="button">
								<div class="agree" v-on:click="access({{$item["join_id"]}})"><p>通过</p></div>
								<div class="refuse" v-on:click="reject({{$item["join_id"]}})"><p>拒绝</p></div>
							</div>
						</div>

					@endforeach
				@elseif($data["type"] == "access")
					@foreach($data["list"] as $item)

						@if($item["join_status"] == config("enumerations.EVENT_JOIN_STATUS.END_PAY"))
							<div class="user-list">
								<div class="head-img" style="background:url('{{$item["headimgurl"]}}') no-repeat center;background-size: cover;"></div>
								<div class="user-info">
									<p class="name bold">{{$item["nickname"]}}</p>
									<p class="info">{{$item["year_type"]}}&nbsp;&nbsp;&nbsp;女&nbsp;&nbsp;&nbsp;{{$item["job"]}}&nbsp;&nbsp;&nbsp;{{$item["hour_gap"]}}小时前报名</p>
									<div class="icon"></div>
									<div class="icon-pay">已付款</div>
								</div>
							</div>
						@elseif($item["join_status"] == config("enumerations.EVENT_JOIN_STATUS.WAITING_PAY"))
							<div class="user-list">
								<div class="head-img" style="background:url('{{$item["headimgurl"]}}') no-repeat center;background-size: cover;"></div>
								<div class="user-info">
									<p class="name bold">{{$item["nickname"]}}</p>
									<p class="info">{{$item["year_type"]}}&nbsp;&nbsp;&nbsp;女&nbsp;&nbsp;&nbsp;{{$item["job"]}}&nbsp;&nbsp;&nbsp;{{$item["hour_gap"]}}小时前报名</p>
									<div class="icon"></div>
									<div class="icon-no-pay">未付款</div>
								</div>
							</div>
						@endif
							<div class="some-problem" style="display:none;">
								<div class="one">
									<p class="problem-one bold">{{$item["question_one"]}}</p>
									<p class="color-blue answer">{{$item["answer_one"]}}</p>
								</div>
								<div class="two">
									<p class="problem-one bold">{{$item["question_two"]}}</p>
									<p class="color-blue answer">{{$item["answer_two"]}}</p>
								</div>
								<div class="three">
									<p class="problem-one bold">{{$item["question_three"]}}？</p>
									<p class="color-blue answer">{{$item["answer_three"]}}</p>
								</div>
							</div>
					@endforeach
				@elseif($data["type"] == "reject")
					@foreach($data["list"] as $item)
						<div class="user-list">
							<div class="head-img" style="background:url('{{$item["headimgurl"]}}') no-repeat center;background-size: cover;"></div>
							<div class="user-info">
								<p class="name bold">{{$item["nickname"]}}</p>
								<p class="info">{{$item["year_type"]}}&nbsp;&nbsp;&nbsp;女&nbsp;&nbsp;&nbsp;{{$item["job"]}}&nbsp;&nbsp;&nbsp;{{$item["hour_gap"]}}小时前报名</p>
								<div class="icon-word">拒绝理由</div>
							</div>
						</div>
						<div class="refuse-reason" style="display:none;">
							<p>{{$item["reject_reason"]}}</p>
						</div>
					@endforeach
				@elseif($data["type"] == "no")
					@foreach($data["list"] as $item)

						@if($item["join_status"] == config("enumerations.EVENT_JOIN_STATUS.REFUND"))
							<div class="user-list">
								<div class="head-img" style="background:url('{{$item["headimgurl"]}}') no-repeat center;background-size: cover;"></div>
								<div class="user-info">
									<p class="name bold">{{$item["nickname"]}}</p>
									<p class="info">{{$item["year_type"]}}&nbsp;&nbsp;&nbsp;女&nbsp;&nbsp;&nbsp;{{$item["job"]}}&nbsp;&nbsp;&nbsp;{{$item["hour_gap"]}}小时前报名</p>
									<div class="icon-word">已请假</div>
								</div>
							</div>
						@elseif($item["join_status"] == config("enumerations.EVENT_JOIN_STATUS.REJECT"))
							<div class="user-list">
								<div class="head-img" style="background:url('{{$item["headimgurl"]}}') no-repeat center;background-size: cover;"></div>
								<div class="user-info">
									<p class="name bold">{{$item["nickname"]}}</p>
									<p class="info">{{$item["year_type"]}}&nbsp;&nbsp;&nbsp;女&nbsp;&nbsp;&nbsp;{{$item["job"]}}&nbsp;&nbsp;&nbsp;{{$item["hour_gap"]}}小时前报名</p>
									<div class="icon-word">取消报名</div>
								</div>
							</div>
						@endif

					@endforeach

				@endif
			@endif

		</div>
		<div class="foot">
			<div class="item" onclick="week()"><div>本周</div></div>
			<div class="item" v-on:click="search"><div>电影订单</div></div>
			<div class="item" v-on:click="goToeventList"><div>活动订单</div></div>
			<div class="item" v-on:click="myLike"><div>我</div></div>
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
				<p class="weui_toast_content">正在提交</p>
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