<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="telephone=no" name="format-detection"/>
		<meta content="email=no" name="format-detection"/>
		<link rel="stylesheet" type="text/css" href="/assets/frontend/css/weui.min.css">
		<title>反馈</title>
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
			@media(max-width: 414px){
				.submit-feed-back{
					padding: 0 15px;
					padding-bottom: 60px;
				}
				.title{
					padding: 15px 0 10px 0;
					border-bottom: 1px solid #dbdbdb;
				}
				.main,.other{
					font-size: 14px;
					text-align: center;
					line-height: 1.6;
				}
				.star{
					background: url('/assets/frontend/image/star.png')no-repeat center;
					background-size: 35px;
					width: 35px;
					height: 35px;
					display: block;
					float: left;
					margin-right: 25px;
				}
				.star.black-star{
					background: url('/assets/frontend/image/black-star.png')no-repeat center;
				}
				.star.blue-star{
					background: url('/assets/frontend/image/blue-star.png')no-repeat center;
				}
				.star.red-star{
					background: url('/assets/frontend/image/red-star.png')no-repeat center;
				}
				.activity-score,.sponsor-score,.total-score{
					padding: 20px 0;
					clear: both;
					height: 70px;
					border-bottom: 1px solid #dbdbdb;
				}
				.activity-score > p,.sponsor-score > p,.total-score > p{
					margin-bottom: 20px;
					font-size: 14px;
					font-weight: bold;
				} 
				.star-margin{
					margin-left: 55px;
				}
				.say{
					font-size: 14px;
					margin-top: 20px;
				}
				textarea{
					height: 100px;
					width: 93%;
					margin: 20px auto;
					background: #efefef;
					padding: 10px;
					border: none;
					border-radius: 8px;
					line-height: 1.5;
					resize:none;
					font-family: "微软雅黑";
				}
				textarea:focus{
					outline: none;
				}
				.button{
					background: #3399ff;
					height: 40px;
					border-radius: 8px;
					margin-top: 10px;
					width: 100%;
					-webkit-box-shadow: #0281ff 0px 2px 1px;
					-moz-box-shadow: #0281ff 0px 2px 1px;
					box-shadow: #0281ff 0px 2px 1px;
				}
				.button > p{
					color: #fff;
					font-size: 20px;
					text-align: center;
					font-weight: 600;
					letter-spacing: 2px;
					line-height: 40px;
				}
			}
			@media(max-width: 375px){
				.submit-feed-back{
					padding: 0 15px;
					padding-bottom: 60px;
				}
				.title{
					padding: 15px 0 10px 0;
					border-bottom: 1px solid #dbdbdb;
				}
				.main,.other{
					font-size: 12px;
					text-align: center;
					line-height: 1.6;
				}
				.star{
					background: url('/assets/frontend/image/star.png')no-repeat center;
					background-size: 29px;
					width: 29px;
					height: 29px;
					display: block;
					float: left;
					margin-right: 25px;
				}
				.star.black-star{
					background: url('/assets/frontend/image/black-star.png')no-repeat center;
				}
				.star.blue-star{
					background: url('/assets/frontend/image/blue-star.png')no-repeat center;
				}
				.star.red-star{
					background: url('/assets/frontend/image/red-star.png')no-repeat center;
				}
				.activity-score,.sponsor-score,.total-score{
					padding: 20px 0;
					clear: both;
					height: 65px;
					border-bottom: 1px solid #dbdbdb;
				}
				.activity-score > p,.sponsor-score > p,.total-score > p{
					margin-bottom: 20px;
					font-size: 12px;
					font-weight: bold;
				} 
				.star-margin{
					margin-left: 45px;
				}
				.say{
					font-size: 12px;
					margin-top: 20px;
				}
				textarea{
					height: 100px;
					width: 93%;
					margin: 20px auto;
					background: #efefef;
					padding: 10px;
					border: none;
					border-radius: 8px;
					line-height: 1.5;
					resize:none;
					font-family: "微软雅黑";
				}
				textarea:focus{
					outline: none;
				}
				.button{
					background: #3399ff;
					height: 40px;
					border-radius: 8px;
					margin-top: 10px;
					width: 100%;
					-webkit-box-shadow: #0281ff 0px 2px 1px;
					-moz-box-shadow: #0281ff 0px 2px 1px;
					box-shadow: #0281ff 0px 2px 1px;
				}
				.button > p{
					color: #fff;
					font-size: 20px;
					text-align: center;
					font-weight: 600;
					letter-spacing: 2px;
					line-height: 40px;
				}
			}
			@media(max-width: 320px){
				.submit-feed-back{
					padding: 0 15px;
					padding-bottom: 60px;
				}
				.title{
					padding: 15px 0 10px 0;
					border-bottom: 1px solid #dbdbdb;
				}
				.main,.other{
					font-size: 10px;
					text-align: center;
					line-height: 1.6;
				}
				.star{
					background: url('/assets/frontend/image/star.png')no-repeat center;
					background-size: 26px;
					width: 26px;
					height: 26px;
					display: block;
					float: left;
					margin-right: 25px;
				}
				.star.black-star{
					background: url('/assets/frontend/image/black-star.png')no-repeat center;
				}
				.star.blue-star{
					background: url('/assets/frontend/image/blue-star.png')no-repeat center;
				}
				.star.red-star{
					background: url('/assets/frontend/image/red-star.png')no-repeat center;
				}
				.activity-score,.sponsor-score,.total-score{
					padding: 20px 0;
					clear: both;
					height: 65px;
					border-bottom: 1px solid #dbdbdb;
				}
				.activity-score > p,.sponsor-score > p,.total-score > p{
					margin-bottom: 20px;
					font-size: 10px;
					font-weight: bold;
				} 
				.star-margin{
					margin-left: 35px;
				}
				.say{
					font-size: 10px;
					margin-top: 20px;
				}
				textarea{
					height: 100px;
					width: 93%;
					margin: 20px auto;
					background: #efefef;
					padding: 10px;
					border: none;
					border-radius: 8px;
					line-height: 1.5;
					resize:none;
					font-family: "微软雅黑";
				}
				textarea:focus{
					outline: none;
				}
				.button{
					background: #3399ff;
					height: 35px;
					border-radius: 8px;
					margin-top: 10px;
					width: 100%;
					-webkit-box-shadow: #0281ff 0px 2px 1px;
					-moz-box-shadow: #0281ff 0px 2px 1px;
					box-shadow: #0281ff 0px 2px 1px;
				}
				.button > p{
					color: #fff;
					font-size: 18px;
					text-align: center;
					font-weight: 600;
					letter-spacing: 2px;
					line-height: 35px;
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
						submit: function() {

							var id = "{{$data["info"]["event_id"]}}";
							var content = $("textarea[name=content]").val();
							var eventPoint = $(".event").attr("point");
							var manPoint = $(".man").attr("point");
							var fullPoint = $(".full").attr("point");

							if(isNullOrEmpty(content)) {
								alert("还是说点啥吧？");
								return false;
							}

							$.ajax({
								url:"/commentEvent",
								type:"GET",
								data:{
									id: id,
									content: content,
									eventPoint: eventPoint,
									manPoint: manPoint,
									fullPoint: fullPoint,
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
									window.location.href = "/myJoinEventList";
								},
							})

						}
					}
				})

				$(".full i").bind("click", function() {
					var index = $(this).attr("index");
					var className = "red-star";
					if(index >= 4) {
						className = "red-star";
					} else if(index <= 2) {
						className = "black-star";
					} else {
						className = "blue-star";
					}
					$(".full i").each(function() {
						var currentIndex = $(this).attr("index");
						$(this).removeClass("red-star")
								.removeClass("black-star")
								.removeClass("blue-star");
						if(currentIndex<=index) {
							$(this).addClass(className);
						}
					});
					$(".full").attr("point", index);
				});

				$(".man i").bind("click", function() {
					var index = $(this).attr("index");
					var className = "red-star";
					if(index >= 4) {
						className = "red-star";
					} else if(index <= 2) {
						className = "black-star";
					} else {
						className = "blue-star";
					}
					$(".man i").each(function() {
						var currentIndex = $(this).attr("index");
						$(this).removeClass("red-star")
								.removeClass("black-star")
								.removeClass("blue-star");
						if(currentIndex<=index) {
							$(this).addClass(className);
						}
					});
					$(".man").attr("point", index);
				});

				$(".event i").bind("click", function() {
					var index = $(this).attr("index");
					var className = "red-star";
					if(index >= 4) {
						className = "red-star";
					} else if(index <= 2) {
						className = "black-star";
					} else {
						className = "blue-star";
					}
					$(".event i").each(function() {
						var currentIndex = $(this).attr("index");
						$(this).removeClass("red-star")
								.removeClass("black-star")
								.removeClass("blue-star");
						if(currentIndex<=index) {
							$(this).addClass(className);
						}
					});
					$(".event").attr("point", index);
				});

			});

		</script>
	</head>
	<body id="container">
		<div class="submit-feed-back">
			<div class="title">
				<p class="main bold">{{$data["info"]["title"]}}</p>
				<p class="other">{{$data["info"]["second_title"]}}</p>
			</div>
			<div class="activity-score">
				<p>活动组织满意度</p>
				<div class="star-margin event" point="5">
					<i class="star red-star" index="1"></i>
					<i class="star red-star" index="2"></i>
					<i class="star red-star" index="3"></i>
					<i class="star red-star" index="4"></i>
					<i class="star red-star" index="5"></i>

				</div>
			</div>
			<div class="sponsor-score">
				<p>对发起人的喜爱</p>
				<div class="star-margin man" point="5">
					<i class="star red-star" index="1"></i>
					<i class="star red-star" index="2"></i>
					<i class="star red-star" index="3"></i>
					<i class="star red-star" index="4"></i>
					<i class="star red-star" index="5"></i>
				</div>
			</div>
			<div class="total-score">
				<p>活动整体满意度</p>
				<div class="star-margin full" point="5">
					<i class="star red-star" index="1"></i>
					<i class="star red-star" index="2"></i>
					<i class="star red-star" index="3"></i>
					<i class="star red-star" index="4"></i>
					<i class="star red-star" index="5"></i>
				</div>
			</div>
			<p class="bold say">对这个活动你想说点啥？</p>
			<textarea name="content"></textarea>
			<div class="button" v-on:click="submit">
				<p>提交</p>
			</div>
		</div>
		<div class="foot">
			<div class="item" onclick="week()"><div>本周</div></div>
			<div class="item" v-on:click="search"><div>电影订单</div></div>
			<div class="item" v-on:click="goToeventList"><div>活动订单</div></div>
			<div class="item" v-on:click="myLike"><div>我</div></div>
		</div>
	</body>
</html>