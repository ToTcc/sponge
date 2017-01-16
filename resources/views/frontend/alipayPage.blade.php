<!doctype html>

<html>

<head>

<meta charset="utf-8">

<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no" />

<meta name="apple-mobile-web-app-capable" content="yes">

<meta name="apple-mobile-web-app-status-bar-style" content="black">

<meta name="format-detection" content="telephone=no">

<title>微信平台暂不支持支付宝支付-SAME</title>

<meta name="Keywords" content="SAME">

<meta name="Description" content="SAME">

<link rel="stylesheet" href="__Temp__/css/style.css?v=20150111">

<link rel="stylesheet" href="__Temp__/css/common.css?v=20150111">

</head>

<body>
<script type="text/javascript" src="/assets/frontend/js/jquery.1.11.1.js"></script>
<script type="text/javascript" src="/assets/frontend/js/vue.min.js"></script>
<script type="text/javascript" src="/assets/frontend/js/common.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
	$(function() {
		if (typeof WeixinJSBridge == "undefined") {
			if (document.addEventListener || document.attachEvent) {
				window.location.href = "{{route('frontend.alipay.pay')}}";
			} else {
				alert("您在微信中");
			}
		}
	});
</script>
<section id="couponWrap">

	<div class="qiajia"></div>

</section>

</body>

</html>