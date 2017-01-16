<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="telephone=no" name="format-detection"/>
	<meta content="email=no" name="format-detection"/>
	<link rel="stylesheet" type="text/css" href="/assets/frontend/css/weui.min.css">
	<title>群二维码</title>
	<style type="text/css">
		html,body{
			height: auto;
			font-family: "微软雅黑";
			font-size: 14px;
			line-height: inherit;
		}
		*{
			margin: 0;
			padding: 0;
		}
		.success-order{
			margin: 50% 0;
			text-align: center;
		}
		.success-order > svg{
			width: 100%;
		}
		.success-order-details{
			padding: 10px 15px;
			border-radius: 8px;
			background: #deefff;
		}
		.title{
			margin-top: 15px;
			font-size: 24px;
			font-weight: 600;
			width: 100%;
			line-height: 1.5;
		}
		h3{
			color: #0074e8;
			text-align: center;
			line-height: 1.5;
		}
		.line{
			margin-top: 20px;
			border-bottom: 1px solid #dbdbdb;
		}
		.color-blue{
			color: #3399ff;
			font-weight: bold;
		}
		.content-details > p:first-child{
			font-size: 14px;
			margin-top: 20px;
		}
		.content-details > p{
			font-size: 14px;
			margin-top: 10px;
		}
		.activity-content{
			margin-top: 15px;
		}
		.join-activity{
			margin-bottom: 15px;
		}
		.description{
			margin-top: 5px;
			color: #999;
			line-height: 2;
			letter-spacing: 1px;
		}
		.code{
			position: relative;
			margin-top: 15px;
		}
		.code-img{
			background: #ccc;
			background-size: 90px;
			width: 90px;
			height: 90px;
		}
		.code-word{
			position: absolute;
			font-weight: 550;
			font-size: 16px;
			color: #000;
			left: 110px;
			top: 0;
		}
		.remind{
			margin-top: 20px;
		}
		.about{
			text-align: center;
			color: #ff7d7d;
			font-size: 14px;
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
			width: 200px;
		}
	</style>

	<script type="text/javascript" src="/assets/frontend/js/jquery.1.11.1.js"></script>
	<script type="text/javascript" src="/assets/frontend/js/vue.min.js"></script>
	<script type="text/javascript" src="/assets/frontend/js/common.js"></script>

	<script type="text/javascript">

		$(function() {



		});

	</script>
</head>
<body id="container">
<div class="success-order">
	<img src="{{$data["url"]}}">
</div>
</body>
</html>
