<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="telephone=no" name="format-detection"/>
		<meta content="email=no" name="format-detection"/>
		<link rel="stylesheet" type="text/css" href="/assets/frontend/css/weui.min.css">
		<title>活动订单</title>
		<style type="text/css">
			html,body{
				height: auto;
				font-family: "微软雅黑";
				font-size: 1rem;
				line-height: inherit;
			}
			*{
				margin: 0;
				padding: 0;
			}
			@media (max-width: 414px) {
				html{
					font-size: 16px;
				}
			}
			@media (max-width: 375px) {
				html{
					font-size: 14px;
				}
			}
			@media (max-width: 320px) {
				html{
					font-size: 12px;
				}
			}
			.success-order{
				padding: 1.07rem;
				padding-bottom: 60px;
			}
			.success-order-details{
				padding: 0.71rem 1.07rem;
				border-radius: 8px;
				background: #deefff;
			}
			h3,.title{
				color: #0074e8;
				text-align: center;
				line-height: 1.5;
				font-size: 1rem;
				font-weight: bold;
			}
			.line{
				margin-top: 1.43rem;
				border-bottom: 1px solid #dbdbdb;
			}
			.color-blue{
				color: #3399ff;
				font-weight: bold;
			}
			.content-details > p:first-child{
				font-size: 0.76rem;
				margin-top: 1.43rem;
			}
			.content-details > p{
				font-size: 0.76rem;
				margin-top: 0.71rem;
			}
			.activity-content{
				margin-top: 1.07rem;
			}
			.join-activity{
				margin-bottom: 1.07rem;
			}
			.remind{
				margin-top: 1.43rem;
			}
			.remind > p{
				font-size: 0.76rem;
			}
			.description{
				margin-top: 0.36rem;
				color: #999;
				line-height: 2;
				letter-spacing: 0.07rem;
			}
			.description p{
				word-wrap:break-word;
			}
			.code{
				position: relative;
				margin-top: 1.07rem;
			}
			.code-img{
				background: #ccc;
				background-size: cover;
				width: 6.43rem;
				height: 6.43rem;
			}
			.code-word{
				position: absolute;
				font-weight: bold;
				font-size: 1rem;
				color: #000;
				left: 7.85rem;
				top: 0;
			}
			.about{
				text-align: center;
				color: #ff7d7d;
				font-size: 1rem;
			}
			.title{
				font-size: 1rem;
				text-align: center;
			}
			.same{
				position: absolute;
			    bottom: 5rem;
			    width: 100%;
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
			.weui_toast.small{
				width: 5.6em;
				min-height: 5.6em;
				top: calc(180px + 1.2em);
				left: calc(50% + 1em);
			}
			.weui_toast.small .weui_loading{
				top: 50%;
			}
			img{
				width: 100px;
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
						modifyInfo: function() {
							window.location.href = "/myInfo";
						},
						myLike: function() {
							window.location.href = "/myLike";
						},
						eventList: function() {
							window.location.href = "/eventList";
						},
						search: function() {
							window.location.href = "/search";
						},
						qrcode: function(eventId) {
							window.location.href = "/eventQrcode" + eventId;
						}
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

					$(".countDown").html(days+"天"+hours+"小时"+minutes+"分钟"+seconds+"秒");

				}

				setInterval(function() {
					countDown('{{$data["info"]["deadline"]}}');
				}, 1000);

			});

		</script>
	</head>
	<body id="container">
		<div class="success-order">
			<div class="success-order-details">
				<div class="title">付款成功 活动订单</div>
				<h3>{{$data["info"]["title"]}}</h3>
				<h3>{{$data["info"]["second_title"]}}</h3>
				<div class="line"></div>
				<div class="content-details">
					<p>活动人数：<span class="color-blue">{{$data["info"]["upper_limit"]}}</span>，还有<span class="color-blue">{{$data["info"]["upper_limit"]-$data["info"]["join_number"]}}</span>个报名资格</p>
					<p>放映时间：<span class="color-blue">{{$data["info"]["time"]}}</span></p>
					<p>放映地点：<span class="color-blue">{{$data["info"]["address"]}}</span></p>
					<p>付款倒计时：<span class="color-blue countDown">03天16小时38分28秒</span></p>
					<p class="color-blue">（如到期未达到指定人数放映将取消，钱款将退回你的账户）</p>
				</div>
				<div class="line"></div>
				<div class="code">
					<div class="code-img" v-on:click="qrcode({{$data["info"]["event_id"]}})" style="background:url('{{$data["info"]["qrcode_image"]}}') no-repeat center;background-size: cover;"></div>
					<div class="code-word">扫描左侧二维码进入本次活动群，了解活动事项</div>
				</div>
				<div class="line"></div>
				<div class="remind">
					<p>SAME提示您：</p>
					<p class="description">
						{!! $data["info"]["description"] !!}
					</p>
				</div>				
			</div>
		</div>
		<div class="same">
			<p class="about">>了解[SAME]请假及迟到规则<</p>
		</div>
		<div class="foot">
			<div class="item" onclick="week()"><div>本周</div></div>
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
				<!--<p class="weui_toast_content">数据加载中</p>-->
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
