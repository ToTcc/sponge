<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="telephone=no" name="format-detection"/>
		<meta content="email=no" name="format-detection"/>
		<link rel="stylesheet" type="text/css" href="/assets/frontend/css/weui.min.css">
		<title>请假</title>
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
				.ask-for-leave{
					padding: 25px 20px 60px 20px;
				}
				.title{
					text-align: center;
					font-size: 18px;
				}
				.dead-line{
					background: #deefff;
					border-radius: 10px;
					height: 140px;
					margin-top: 25px;
				}
				.cancel{
					text-align: center;
					padding-top: 55px;
					font-size: 18px;
				}
				.word{
					padding-top: 25px;
					text-align: center;
					font-size: 18px;
				}
				.time{
					padding-top: 25px;
					text-align: center;
					font-size: 32px;
				}
				.time > span{
					font-size: 16px;
				}
				.cancel-activity{
					padding: 45px 0 20px 0;
					text-align: center;
					color: #959595;
					font-size: 18px;
				}
				.score{
					padding: 45px 0 35px 0;
					text-align: center;
					color: #959595;
					font-size: 18px;
				}
				.score > span{
					font-size: 20px;
				}
				.money{
					font-size: 18px;
					text-align: center;
					color: #959595;
				}
				.money > span{
					font-size: 20px;
				}
				.same{
					padding: 30px 0;
					text-align: center;
					font-size: 16px;
				}
				.button-red{
					margin-top: 15px;
					border: 1px solid #ff7d7d;
					border-radius: 10px;
					background: #ff7d7d;
					position: relative;
					height: 40px;
					-webkit-box-shadow: #ff4444 0px 5px 1px;
					-moz-box-shadow: #ff4444 0px 5px 1px;
					box-shadow: #ff4444 0px 5px 1px;
				}
				.button-red > p{
					color: #fff;
					font-weight: 600;
					line-height: 40px;
					font-size: 20px;
					text-align: center;
					position: relative;
				}
			}
			@media(max-width: 375px){
				.ask-for-leave{
					padding: 20px 20px 60px 20px;
				}
				.title{
					text-align: center;
					font-size: 16px;
				}
				.dead-line{
					background: #deefff;
					border-radius: 10px;
					height: 125px;
					margin-top: 25px;
				}
				.cancel{
					text-align: center;
					padding-top: 55px;
					font-size: 16px;
				}
				.word{
					padding-top: 25px;
					text-align: center;
					font-size: 16px;
				}
				.time{
					padding-top: 15px;
					text-align: center;
					font-size: 30px;
				}
				.time > span{
					font-size: 14px;
				}
				.cancel-activity{
					padding: 45px 0 20px 0;
					text-align: center;
					color: #959595;
					font-size: 16px;
				}
				.score{
					padding: 45px 0 35px 0;
					text-align: center;
					color: #959595;
					font-size: 16px;
				}
				.score > span{
					font-size: 18px;
				}
				.money{
					font-size: 16px;
					text-align: center;
					color: #959595;
				}
				.money > span{
					font-size: 18px;
				}
				.same{
					padding: 30px 0;
					text-align: center;
					font-size: 14px;
				}
				.button-red{
					margin-top: 15px;
					border: 1px solid #ff7d7d;
					border-radius: 10px;
					background: #ff7d7d;
					position: relative;
					height: 40px;
					-webkit-box-shadow: #ff4444 0px 5px 1px;
					-moz-box-shadow: #ff4444 0px 5px 1px;
					box-shadow: #ff4444 0px 5px 1px;
				}
				.button-red > p{
					color: #fff;
					font-weight: 600;
					line-height: 40px;
					font-size: 20px;
					text-align: center;
					position: relative;
				}
			}
			@media(max-width: 320px){
				.ask-for-leave{
					padding: 20px 15px 60px 15px;
				}
				.title{
					text-align: center;
					font-size: 14px;
				}
				.dead-line{
					background: #deefff;
					border-radius: 10px;
					height: 110px;
					margin-top: 25px;
				}
				.cancel{
					text-align: center;
					padding-top: 45px;
					font-size: 14px;
				}
				.word{
					padding-top: 20px;
					text-align: center;
					font-size: 14px;
				}
				.time{
					padding-top: 15px;
					text-align: center;
					font-size: 28px;
				}
				.time > span{
					font-size: 12px;
				}
				.cancel-activity{
					padding: 45px 0 20px 0;
					text-align: center;
					color: #959595;
					font-size: 14px;
				}
				.score{
					padding: 45px 0 35px 0;
					text-align: center;
					color: #959595;
					font-size: 14px;
				}
				.score > span{
					font-size: 16px;
				}
				.money{
					font-size: 14px;
					text-align: center;
					color: #959595;
				}
				.money > span{
					font-size: 16px;
				}
				.same{
					padding: 30px 0;
					text-align: center;
					font-size: 12px;
				}
				.button-red{
					margin-top: 15px;
					border: 1px solid #ff7d7d;
					border-radius: 10px;
					background: #ff7d7d;
					position: relative;
					height: 35px;
					-webkit-box-shadow: #ff4444 0px 5px 1px;
					-moz-box-shadow: #ff4444 0px 5px 1px;
					box-shadow: #ff4444 0px 5px 1px;
				}
				.button-red > p{
					color: #fff;
					font-weight: 600;
					line-height: 35px;
					font-size: 18px;
					text-align: center;
					position: relative;
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
		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript" charset="utf-8"></script>

		<script type="text/javascript">

			$(function() {
				var app = new Vue({
					el: '#container',
					data: {
						movieList: [],
					},
					methods:
					{
						myLike: function() {
							window.location.href = "/myLike";
						},
						eventList: function() {
							window.location.href = "/eventList";
						},
						search: function() {
							window.location.href = "/search";
						},
						leave: function(id) {
							if(confirm("确定要请假吗？")) {
								$.ajax({
									url:"/eventRefund",
									type:"GET",
									data:{
										id: id,
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
										window.location.href = "/eventList";
									},
								})
							}
						},
					}
				})

				function countDown(time) {

					var date1=new Date();  //开始时间
					var date2=new Date(time.replace(/-/g,"/"));  //结束时间
					var date3=date2.getTime()-date1.getTime()  //时间差的毫秒数

					//计算出相差天数
					var days=Math.floor(date3/(24*3600*1000))

					//计算出小时数
					var leave1=date3%(24*3600*1000)    //计算天数后剩余的毫秒数
					var hours=Math.floor(leave1/(3600*1000))

					//计算相差分钟数
					var leave2=leave1%(3600*1000)        //计算小时数后剩余的毫秒数
					var minutes=Math.floor(leave2/(60*1000))

					//计算相差秒数
					var leave3=leave2%(60*1000)      //计算分钟数后剩余的毫秒数
					var seconds=Math.round(leave3/1000)

					hours += days*24;

					var content = hours+"<span> 小时</span>"+minutes+"<span> 分</span>"+seconds+"<span> 秒</span>";

					$("p.time").html(content);

				}

				setInterval(function() {
					countDown('{{$data["event"]["open_time"]}}');
				}, 1000);

			});

		</script>
	</head>
	<body id="container">
		<div class="ask-for-leave">
			<p class="title bold">{{$data["event"]["title"]}}--{{$data["event"]["second_title"]}}</p>
			<div class="dead-line">
				<p class="word bold">距活动开始还有</p>
				<p class="time bold color-blue">正在加载...</p>
			</div>
			<div class="">
				<p class="score">现在请假您将被扣除<span class="color-blue font-black bold"> {{$data["rule"]["score"]}} </span>个活动积分</p>
				<p class="money">退款 <span class="color-blue font-black bold">{{$data["rule"]["refund_rate"]*100}}%</span></p>
			</div>

			<p class="same color-red">>了解[SAME]信用积分规则<</p>
			<div class="button-red" v-on:click="leave({{$data["event"]["event_id"]}})">
				<p>我要请假</p>
			</div>
		</div>
		<div class="foot">
			<div class="item"><div>本周</div></div>
			<div class="item" v-on:click="search"><div>电影订单</div></div>
			<div class="item" v-on:click="eventList"><div>活动订单</div></div>
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
				<p class="weui_toast_content">正在提交...</p>
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