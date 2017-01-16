<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="telephone=no" name="format-detection"/>
		<meta content="email=no" name="format-detection"/>
		<title>支付</title>
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
			.choose-pay-way{
				padding: 20px;
				padding-bottom: 60px;
			}
			.content{
				font-size: 16px;
			}
			.wxpay{
				margin-top: 30px;
				background: #e5f4e3;
				width: 100%;
				border-radius: 15px;
				margin-bottom: 20px;
			}
			.wxpay > div{
				padding: 35px 0;
				width: 100%;
			}
			.wxpay-img{
				background: url('/assets/frontend/image/wxpay.png')no-repeat center;
				background-size: 90px;
				width: 90px;
				height: 90px;
				margin: 0 auto;
			}
			.wx-word{
				font-size: 18px;
				text-align: center;
				margin-top: 20px;
			}
			.alipay{
				margin-top: 20px;
				background: #d9f1fc;
				width: 100%;
				border-radius: 15px;
			}
			.alipay > div{
				padding: 35px 0;
				width: 100%;
			}
			.alipay-img{
				background: url('/assets/frontend/image/alipay.png')no-repeat center;
				background-size: 90px;
				width: 90px;
				height: 90px;
				margin: 0 auto;
			}
			.ali-word{
				font-size: 18px;
				text-align: center;
				margin-top: 20px;
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
						callpay: function() {
							if (typeof WeixinJSBridge == "undefined"){
								if( document.addEventListener ){
									alert("必须在微信中支付");
									document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
								}else if (document.attachEvent){
									alert("必须在微信中支付2");
									document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
									document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
								}
							}else{
								onBridgeReady();
							}
						},
						myLike: function() {
							window.location.href = "/myLike";
						},
						eventList: function() {
							window.location.href = "/eventList";
						},
						search: function() {
							window.location.href = "/search";
						}
					}
				})

			});

		</script>
	</head>
	<body id="container">
	<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" charset="utf-8">
		wx.config({!!EasyWeChat::js()->config(array('chooseWXPay'), false)!!});
		function onBridgeReady() {
			wx.chooseWXPay({
				timestamp: "{{$config['timestamp']}}",
				nonceStr: "{{$config['nonceStr']}}",
				package: "{{$config['package']}}",
				signType: "{{$config['signType']}}",
				paySign: "{{$config['paySign']}}", // 支付签名
				success: function (res) {
					window.location.href = "/joinSuccess/{{$config['activity_id']}}";
				}
			});
		}
	</script>
		<div class="choose-pay-way">
			<div class="content">请选择支付方式</div>
			<div class="wxpay" v-on:click="callpay">
				<div>
					<div class="wxpay-img"></div>
					<p class="wx-word">微信支付</p>
				</div>
			</div>
			<div class="alipay">
				<div>
					<div class="alipay-img"></div>
					<p class="ali-word">支付宝</p>
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