<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="telephone=no" name="format-detection"/>
		<meta content="email=no" name="format-detection"/>
		<title>活动订单</title>
		<link rel="stylesheet" type="text/css" href="/assets/frontend/css/weui.min.css">
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
			.activity-details{
				padding: 10px;
				padding-bottom: 60px;
			}
			.activity-content{
				background: #efefef;
				padding: 10px 15px;
				position: relative;
			}
			.activity-head{
				position: relative;
			}
			@media (max-width: 414px){
				.logo-bg{
					background: url('/assets/frontend/image/activityLogo.png')no-repeat center;
					background-size: 100% 95px;
					width: 100%;
					height: 95px;
				}
				.activity-img{
					background: url('/assets/frontend/image/activityImg.png')no-repeat center;
					background-size: 100% 230px;
					width: 100%;
					height: 230px;
				}
				.description{
					font-size: 14px;
					margin-bottom: 15px;
				}
				.title{
					margin-bottom: 5px;
					font-size: 18px;
					font-weight: bold;
					width: 250px;
					overflow: hidden;
					white-space: nowrap;
					text-overflow: ellipsis;
				}
				.price{
					position: absolute;
					color: #3399ff;
					top: 10px;
					right: 15px;
					font-size: 18px;
					font-weight: bold;
					font-family: "黑体";
				}
				.date{
					position: absolute;
					color: #3399ff;
					bottom: 5px;
					right: 15px;
					font-size: 14px;
				}
				.status-join{
					position: absolute;
					top: 10px;
					left: 15px;
					background: #3399ff;
					padding: 3px 25px;
					color: #fff;
					border-radius: 5px;
					font-size: 17px;
				}
				.status-full{
					position: absolute;
					top: 0;
					left: 0;
					right: 0;
					bottom: 0;
					z-index: 1;
					background: #000;
					opacity: 0.6;
					height: 230px;
				}
				.status-full > div{
					position: relative;
				}
				.full{
					color: #fff;
					border-radius: 50%;
					font-size: 18px;
					width: 100px;
					height: 100px;
					border: 2px solid #fff;
					margin: 0 auto;
					margin-top: 53px;
					z-index: 2;
					position: relative;
				}
				.full > span{
					margin: 0 27px;
				    font-size: 46px;
				    top: 12px;
				    position: relative;
				}
				.remind{
					text-align: center;
					margin-top: 5px;
					font-size: 16px;
					color: #fff;
				}
				.status-end{
					position: absolute;
					top: 10px;
					left: 15px;
					background: #999;
					padding: 3px 25px;
					color: #fff;
					border-radius: 5px;
					font-size: 17px;
				}
				.head-img{
					border-radius: 50%;
					width: 100px;
					height: 100px;
					background: #efefef;
					margin: 0 auto;
					margin-top: 15px;
					position: relative;
				}
				.caidai{
					background: url('/assets/frontend/image/icon-caidai.png')no-repeat center;
					background-size: 120px 29px;
					width: 120px;
					height: 29px;
					position: absolute;
					bottom: 0;
					left: -9px;
				}
				.head-img > span{
					color: #fff;
					position: absolute;
					bottom: 10px;
					left: 34px;
					font-size: 12px;
				}
				.name{
					font-size: 23px;
					color: #000;
					text-align: center;
					font-weight: bold;
				}
				.user-description{
					text-align: center;
					color: #999;
					padding: 0 55px;
				}
				.activity-description{
					background: #deefff;
					border-radius: 5px;
					padding: 15px;
					margin-top: 40px;
					position: relative;
				}
				.triangle_border_up{
				    width:0;
				    height:0;
				    border-width:0 15px 15px;
				    border-style:solid;
				    border-color:transparent transparent #deefff;/*透明 透明  灰*/
				    top: -15px;
				    left: 185px;
				    position:absolute;
				}
				h1{
					color: #3399ff;
					text-align: center;
					font-size: 18px;
					font-weight: bold;
					margin-bottom: 15px;
				}
				.line{
					border-bottom: 1px solid #bfdfff;
				}
				.content-description{
					text-align: center;
					color: #000;
					padding: 15px 0;
				}
				.content-description > img{
					width: 100%;
					margin: 10px 0;
				}
				.content-description p{
					font-size: 13px;
					color: #666;
					word-wrap:break-word;
				}
				.activity-info-details{
					font-size: 16px;
					font-weight: bold;
					margin: 20px 0 15px 0;
					margin-left: 20px;
				}
				.line-blue{
					border-bottom: 1px solid #dbdbdb;
				}
				.activity-info > div:nth-child(3){
					padding: 10px 20px 0 20px;
				}
				.activity-info > div:nth-child(3) > p,.beizhu{
					margin-bottom: 5px;
				}
				.rule-num{
					display: inline-block;
					width: 5%;
					vertical-align: top;
				}
				.rule{
					display: inline-block;
					width: 95%;
				}
				.button{
					width: 95%;
					margin: 20px auto;
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
				.button-red{
					width: 95%;
					margin: 20px auto;
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
				.color-blue{
					color: #3399ff;
					font-weight: bold;
				}
			}
			@media (max-width: 375px){
				.activity-img{
					background: url('/assets/frontend/image/activityImg.png')no-repeat center;
					background-size: 100% 200px;
					width: 100%;
					height: 200px;
				}
				.description{
					font-size: 12px;
					margin-bottom: 10px;
				}
				.title{
					margin-bottom: 5px;
					font-size: 16px;
					font-weight: bold;
					width: 250px;
					overflow: hidden;
					white-space: nowrap;
					text-overflow: ellipsis;
				}
				.price{
					position: absolute;
					color: #3399ff;
					top: 10px;
					right: 15px;
					font-size: 16px;
					font-weight: bold;
					font-family: "黑体";
				}
				.date{
					position: absolute;
					color: #3399ff;
					bottom:5px;
					right: 15px;
					font-size: 12px;
				}
				.status-join{
					position: absolute;
					top: 10px;
					left: 15px;
					background: #3399ff;
					padding: 3px 18px;
					color: #fff;
					border-radius: 5px;
					font-size: 16px;
				}
				.status-full{
					position: absolute;
					top: 0;
					left: 0;
					right: 0;
					bottom: 0;
					z-index: 1;
					background: #000;
					opacity: 0.6;
					height: 200px;
				}
				.status-full > div{
					position: relative;
				}
				.full{
					color: #fff;
					border-radius: 50%;
					font-size: 18px;
					width: 92px;
					height: 92px;
					border: 2px solid #fff;
					margin: 0 auto;
					margin-top: 45px;
					z-index: 2;
					position: relative;
				}
				.full > span{
					margin: 25px;
				    font-size: 40px;
				    top: 12px;
				    position: relative;
				}
				.remind{
					text-align: center;
					margin-top: 5px;
					font-size: 15px;
					color: #fff;
				}
				.status-end{
					position: absolute;
					top: 10px;
					left: 15px;
					background: #999;
					padding: 3px 18px;
					color: #fff;
					border-radius: 5px;
					font-size: 16px;
				}
				.head-img{
					border-radius: 50%;
					width: 90px;
					height: 90px;
					background: #efefef;
					margin: 0 auto;
					margin-top: 15px;
					position: relative;
				}
				.caidai{
					background: url('/assets/frontend/image/icon-caidai.png')no-repeat center;
					background-size: 110px 29px;
					width: 110px;
					height: 29px;
					position: absolute;
					bottom: 0;
					left: -9px;
				}
				.head-img > span{
					color: #fff;
					position: absolute;
					bottom: 10px;
					left: 29px;
					font-size: 12px;
				}
				.name{
					font-size: 20px;
					color: #000;
					text-align: center;
					font-weight: bold;
				}
				.user-description{
					text-align: center;
					color: #999;
					padding: 0 55px;
				}
				.activity-description{
					background: #deefff;
					border-radius: 5px;
					padding: 15px;
					margin-top: 40px;
					position: relative;
				}
				.triangle_border_up{
				    width:0;
				    height:0;
				    border-width:0 15px 15px;
				    border-style:solid;
				    border-color:transparent transparent #deefff;/*透明 透明  灰*/
				    top: -15px;
				    left: 165px;
				    position:absolute;
				}
				h1{
					color: #3399ff;
					text-align: center;
					font-size: 18px;
					font-weight: bold;
					margin-bottom: 15px;
				}
				.line{
					border-bottom: 1px solid #bfdfff;
				}
				.content-description{
					text-align: center;
					color: #000;
					padding: 15px 0;
				}
				.content-description > img{
					width: 100%;
					margin: 10px 0;
				}
				.content-description p{
					font-size: 11px;
					color: #666;
					word-wrap:break-word;
				}
				.activity-info-details{
					font-size: 16px;
					font-weight: bold;
					margin: 20px 0 15px 0;
					margin-left: 20px;
				}
				.line-blue{
					border-bottom: 1px solid #dbdbdb;
				}
				.activity-info > div:nth-child(3){
					padding: 10px 20px 0 20px;
				}
				.activity-info > div:nth-child(3) > p,.beizhu{
					margin-bottom: 5px;
				}
				.rule-num{
					display: inline-block;
					width: 5%;
					vertical-align: top;
				}
				.rule{
					display: inline-block;
					width: 95%;
				}
				.button{
					width: 95%;
					border: 1px solid #3399ff;
					border-radius: 10px;
					background: #3399ff;
					position: relative;
					height: 40px;
					margin: 20px auto;
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
				.button-red{
					width: 95%;
					margin: 20px auto;
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
				.color-blue{
					color: #3399ff;
					font-weight: bold;
				}
			}
			@media (max-width: 320px){
				.logo-bg{
					background: url('/assets/frontend/image/activityLogo.png')no-repeat center;
					background-size: 100% 72px;
					width: 100%;
					height: 72px;
				}
				.activity-img{
					background: url('/assets/frontend/image/activityImg.png')no-repeat center;
					background-size: 100% 180px;
					width: 100%;
					height: 180px;
				}
				.description{
					font-size: 10px;
					margin-bottom: 10px;
				}
				.title{
					margin-bottom: 5px;
					font-size: 15px;
					font-weight: bold;
					width: 200px;
					overflow: hidden;
					white-space: nowrap;
					text-overflow: ellipsis;
				}
				.price{
					position: absolute;
					color: #3399ff;
					top: 10px;
					right: 15px;
					font-size: 15px;
					font-weight: bold;
					font-family: "黑体";
				}
				.date{
					position: absolute;
					color: #3399ff;
					bottom:5px;
					right: 15px;
					font-size: 12px;
				}
				.status-join{
					position: absolute;
					top: 10px;
					left: 15px;
					background: #3399ff;
					padding: 1px 15px;
					color: #fff;
					border-radius: 5px;
				}
				.status-full{
					position: absolute;
					top: 0;
					left: 0;
					right: 0;
					bottom: 0;
					z-index: 1;
					background: #000;
					opacity: 0.6;
					height: 180px;
				}
				.status-full > div{
					position: relative;
				}
				.full{
					color: #fff;
					border-radius: 50%;
					font-size: 18px;
					width: 78px;
					height: 78px;
					border: 2px solid #fff;
					margin: 0 auto;
					margin-top: 40px;
					z-index: 2;
					position: relative;
				}
				.full > span{
					margin: 0 21px;
				    font-size: 35px;
				    top: 8px;
				    position: relative;
				}
				.remind{
					text-align: center;
					margin-top: 5px;
					color: #fff;
				}
				.status-end{
					position: absolute;
					top: 10px;
					left: 15px;
					background: #999;
					padding: 1px 15px;
					color: #fff;
					border-radius: 5px;
				}
				.head-img{
					border-radius: 50%;
					width: 80px;
					height: 80px;
					background: #efefef;
					margin: 0 auto;
					margin-top: 15px;
					position: relative;
				}
				.caidai{
					background: url('/assets/frontend/image/icon-caidai.png')no-repeat center;
					background-size: 100px 29px;
					width: 100px;
					height: 29px;
					position: absolute;
					bottom: 0;
					left: -10px;
				}
				.head-img > span{
					color: #fff;
					position: absolute;
					bottom: 10px;
					left: 24px;
					font-size: 10px;
				}
				.name{
					font-size: 20px;
					color: #000;
					text-align: center;
					font-weight: bold;
				}
				.user-description{
					text-align: center;
					color: #999;
					padding: 0 45px;
				}
				.activity-description{
					background: #deefff;
					border-radius: 5px;
					padding: 15px;
					margin-top: 40px;
					position: relative;
				}
				.triangle_border_up{
				    width:0;
				    height:0;
				    border-width:0 15px 15px;
				    border-style:solid;
				    border-color:transparent transparent #deefff;/*透明 透明  灰*/
				    top: -15px;
				    left: 135px;
				    position:absolute;
				}
				h1{
					color: #3399ff;
					text-align: center;
					font-size: 18px;
					font-weight: bold;
					margin-bottom: 15px;
				}
				.line{
					border-bottom: 1px solid #bfdfff;
				}
				.content-description{
					text-align: center;
					color: #000;
					padding: 15px 0;
					font-size: 12px;
				}
				.content-description > img{
					width: 100%;
					margin: 10px 0;
				}
				.content-description p{
					font-size: 9px;
					color: #666;
					word-wrap:break-word;
				}
				.activity-info-details{
					font-size: 16px;
					font-weight: bold;
					margin: 20px 0 15px 0;
					margin-left: 20px;
				}
				.line-blue{
					border-bottom: 1px solid #dbdbdb;
				}
				.activity-info > div:nth-child(3){
					padding: 10px 20px 0 20px;
				}
				.activity-info > div:nth-child(3) > p,.beizhu{
					font-size: 12px;
					margin-bottom: 5px;
				}
				.rule-num{
					display: inline-block;
					font-size: 12px;
					width: 5%;
					vertical-align: top;
				}
				.rule{
					display: inline-block;
					font-size: 12px;
					width: 95%;
				}
				.button{
					width: 95%;
					margin: 20px auto;
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
				.button-red{
					width: 95%;
					margin: 20px auto;
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
				.color-blue{
					color: #3399ff;
					font-weight: bold;
					font-size: 12px;
				}
			}	
			img{
				width: 100%;
				margin: 10px 0;
			}
			.code{
				position: relative;
				margin: 25px;
			}
			.code-img{
				background: #ccc;
				background-size: 85px;
				width: 85px;
				height: 85px;
			}
			.code-word{
				position: absolute;
				font-weight: 550;
				font-size: 14px;
				color: #000;
				left: 110px;
				font-weight: bold;
				top: 0;
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
						join: function(id) {
							window.location.href = "/joinEventPage/" + id;
						},
						cancel: function(id) {
							window.location.href = "/eventCancelPage/" + id;
						},
						gotoPay: function(id) {
							window.location.href = "/wechat/eventPay/" + id;
						},
						refund: function(id) {
							window.location.href = "/eventLeavePage/" + id;
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

				@if($data["event"]["status"]
					== config("enumerations.EVENT_STATUS.WAITING_JOIN")
					&& $data["event"]["deadline"] > getCurrentTime())
				setInterval(function() {
					countDown('{{$data["event"]["deadline"]}}');
				}, 1000);
				@else
					$(".countDown").html("已截止报名");
				@endif

			});

		</script>
	</head>
	<body id="container">
		<div class="activity-details">
			<div class="activity-head">
				<div class="activity-img" style="background:url('{{$data["event"]["title_image"]}}') no-repeat center;background-size: cover;"></div>
				@if($data["event"]["status"] == config("enumerations.EVENT_STATUS.WAITING_JOIN"))
					<div class="status-join">报名中</div>
				@elseif($data["event"]["status"] == config("enumerations.EVENT_STATUS.FULL"))
					<div class="status-full">
						<div>
							<div class="full"><span>满</span></div>
							<div class="remind">下回请早!</div>
						</div>
					</div>
				@elseif($data["event"]["status"] == config("enumerations.EVENT_STATUS.END"))
					<div class="status-end">已结束</div>
				@endif
				<div class="activity-content">
					<p class="title">{{$data["event"]["title"]}}</p>
					<p class="description">{{$data["event"]["second_title"]}}</p>
					@if($data["event"]["event_type"] == config("enumerations.EVENT_TYPE.CASH"))
						<p class="price">{{$data["event"]["price"]}}元</p>
					@elseif($data["event"]["event_type"] == config("enumerations.EVENT_TYPE.FREE"))
						<p class="price">免费</p>
					@endif
					<p class="date">{{$data["event"]["time"]}}</p>
				</div>
			</div>
			<div class="activity-content-body">
				@if($data["join"]["status"] == config("enumerations.EVENT_JOIN_STATUS.END_PAY") ||
					$data["join"]["status"] == config("enumerations.EVENT_JOIN_STATUS.END_SIGN") ||
					$data["join"]["status"] == config("enumerations.EVENT_JOIN_STATUS.END_COMMENT"))
					<div class="code">
						<div class="code-img" v-on:click="qrcode({{$data["event"]["event_id"]}})" style="background:url('{{$data["event"]["qrcode_image"]}}') no-repeat center;background-size: cover;"></div>
						<div class="code-word">扫描左侧二维码进入本次活动群，了解活动事项</div>
					</div>
				@endif
				<div class="line-blue"></div>
				<div class="head-img" style="background:url('{{$data["event"]["headimgurl"]}}') no-repeat center;background-size: cover;">
					<div class="caidai"></div>
					<span>发起人</span>
				</div>	
				<p class="name">{{$data["event"]["nickname"]}}</p>
				<p class="user-description">{{$data["event"]["sign"]}}</p>
				<div class="activity-description">
					<div class="triangle_border_up"></div>
					<h1>发起人说</h1>
					<div class="line"></div>
					<div class="content-description">
						{!! $data["event"]["description"] !!}
					</div>
				</div>
				<div class="activity-info">
					<div class="activity-info-details">活动详情</div>
					<div class="line-blue"></div>
					<div>
						<p class="number">活动人数：<span class="color-blue">{{$data["event"]["upper_limit"]}}</span>人，还有<span class="color-blue">{{$data["event"]["upper_limit"]-$data["event"]["join_number"]}}</span>个报名资格</p>
						<p class="time">活动时间：<span class="color-blue">{{$data["event"]["time"]}}</span></p>
						<p class="address">活动地点：<span class="color-blue">{{$data["event"]["address"]}}</span></p>
						@if($data["event"]["event_type"] == config("enumerations.EVENT_TYPE.CASH"))
							<p class="activity-price">活动费用：<span class="color-blue">{{$data["event"]["price"]}}元（{{$data["event"]["price_description"]}}）</span></p>
						@elseif($data["event"]["event_type"] == config("enumerations.EVENT_TYPE.FREE"))
							<p class="activity-price">活动费用：<span class="color-blue">免费</span></p>
						@endif
						<p class="end-time">付款倒计时：<span class="color-blue countDown">已结束</span></p>
						<p class="color-blue">（如到期未达到指定人数活动将取消。钱款将退回你的账户。）</p>
					</div>
				</div>
				@if($data["event"]["necessary"])
					<div class="activity-info">
						<div class="activity-info-details">活动流程</div>
						<div class="line-blue"></div>
						<div>
							@foreach($data["event"]["necessary"] as $index=>$item)
								<div class="beizhu">
									<div class="rule-num">{{$index+1}}.</div><div class="rule">{{$item}}</div>
								</div>
							@endforeach
						</div>
					</div>
				@endif
				@if($data["event"]["necessary"])
					<div class="activity-info" style="margin-bottom:15px;">
						<div class="activity-info-details">备注说明</div>
						<div class="line-blue"></div>
						<div>
							@foreach($data["event"]["note"] as $index=>$item)
								<div class="beizhu">
									<div class="rule-num">{{$index+1}}.</div><div class="rule">{{$item}}</div>
								</div>
							@endforeach
						</div>
					</div>
				@endif
				<div class="line-blue"></div>		
			</div>

			@if($data["event"]["status"]
				!= config("enumerations.EVENT_STATUS.END") &&
				$data["event"]["status"]
				!= config("enumerations.EVENT_STATUS.CANCEL"))
				@if($data["join"])

					@if($data["join"]["status"] == config("enumerations.EVENT_JOIN_STATUS.WAITING_CHECK"))
						<div class="button-red" v-on:click="cancel({{$data["event"]["event_id"]}})">
							<p>取消报名</p>
						</div>
					@elseif($data["join"]["status"] == config("enumerations.EVENT_JOIN_STATUS.WAITING_PAY"))
						<div class="button-red" v-on:click="gotoPay({{$data["event"]["event_id"]}})">
							<p>去付款</p>
						</div>
					@elseif($data["join"]["status"] == config("enumerations.EVENT_JOIN_STATUS.REFUND"))
						<div class="button-red">
							<p>已请假</p>
						</div>
					@elseif($data["join"]["status"] == config("enumerations.EVENT_JOIN_STATUS.REJECT"))
						<div class="button-red">
							<p>被拒绝</p>
						</div>
					@elseif($data["join"]["status"] == config("enumerations.EVENT_JOIN_STATUS.END_SIGN"))
						<div class="button">
							<p>已签到</p>
						</div>
					@elseif($data["join"]["status"] == config("enumerations.EVENT_JOIN_STATUS.CANCEL"))
						<div class="button-red">
							<p>已取消</p>
						</div>
					@elseif($data["join"]["status"] == config("enumerations.EVENT_JOIN_STATUS.END_PAY"))
						<div class="button-red" v-on:click="refund({{$data["event"]["event_id"]}})">
							<p>我要请假</p>
						</div>
					@elseif($data["join"]["status"] == config("enumerations.EVENT_JOIN_STATUS.END_COMMENT"))
						<div class="button">
							<p>已评价</p>
						</div>
					@elseif($data["join"]["status"] == config("enumerations.EVENT_JOIN_STATUS.ABSENT"))
						<div class="button-red">
							<p>未到场</p>
						</div>
					@endif

				@else
					<div class="button" v-on:click="join({{$data["event"]["event_id"]}})">
						<p>报名</p>
					</div>
				@endif
			@endif
		</div>
		<div class="foot">
			<div class="item" onclick="week()"><div>本周</div></div>
			<div class="item" v-on:click="search"><div>电影订单</div></div>
			<div class="item active" v-on:click="goToeventList"><div>活动订单</div></div>
			<div class="item" v-on:click="myLike"><div>我</div></div>
		</div>
	</body>
</html>