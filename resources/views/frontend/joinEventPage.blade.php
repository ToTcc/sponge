<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="telephone=no" name="format-detection"/>
		<meta content="email=no" name="format-detection"/>
		<link rel="stylesheet" type="text/css" href="/assets/frontend/css/weui.min.css">
		<title>筛选问题</title>
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
			.my-info{
				padding-bottom: 60px;
			}
			.my-info-body{
				padding: 20px 15px 20px 20px;
			}
			.my-info-body > input:focus{
				outline: none;
			}
			.professional{
				height: 75px;
				width: 90%;
				margin: 20px auto;
				background: #efefef;
				padding: 10px;
				border: none;
				border-radius: 8px;
				line-height: 1.5;
				resize:none;
			}
			textarea:focus{
				outline: none;
			}
			@media (max-width: 414px){
				.my-info-body > p{
					color: #000;
					font-weight: bold;
					font-size: 18px;
					width: 95%;
				}
				.my-info-body > input{
					width: 90%;
					margin: 20px auto;
					background: #efefef;
					padding: 15px 10px;
					font-size: 16px;
					border: none;
					border-radius: 8px;
				}
				.button{
					background: #3399ff;
					height: 40px;
					border-radius: 8px;
					margin-top: 10px;
					width: 96%;
					-webkit-box-shadow: #0281ff 0px 2px 1px;
					-moz-box-shadow: #0281ff 0px 2px 1px;
					box-shadow: #0281ff 0px 2px 1px;
				}
				.button > p{
					color: #fff;
					font-size: 20px;
					text-align: center;
					font-weight: 600;
					line-height: 40px;
					letter-spacing: 2px;
				}
			}
			@media (max-width: 375px){
				.my-info-body > p{
					color: #000;
					font-weight: bold;
					font-size: 18px;
					width: 95%;
				}
				.my-info-body > input{
					width: 90%;
					margin: 20px auto;
					background: #efefef;
					padding: 15px 10px;
					font-size: 16px;
					border: none;
					border-radius: 8px;
				}
				.button{
					background: #3399ff;
					height: 40px;
					border-radius: 8px;
					margin-top: 10px;
					width: 96%;
					-webkit-box-shadow: #0281ff 0px 2px 1px;
					-moz-box-shadow: #0281ff 0px 2px 1px;
					box-shadow: #0281ff 0px 2px 1px;
				}
				.button > p{
					color: #fff;
					font-size: 20px;
					text-align: center;
					font-weight: 600;
					line-height: 40px;
					letter-spacing: 2px;
				}
			}
			@media (max-width: 320px){
				.my-info-body > p{
					color: #000;
					font-weight: bold;
					font-size: 14px;
					width: 95%;
				}
				.my-info-body > input{
					width: 90%;
					margin: 20px auto;
					background: #efefef;
					padding: 15px 10px;
					font-size: 14px;
					border: none;
					border-radius: 8px;
				}
				.button{
					background: #3399ff;
					height: 35px;
					border-radius: 8px;
					margin-top: 10px;
					width: 96%;
					-webkit-box-shadow: #0281ff 0px 2px 1px;
					-moz-box-shadow: #0281ff 0px 2px 1px;
					box-shadow: #0281ff 0px 2px 1px;
				}
				.button > p{
					color: #fff;
					font-size: 18px;
					text-align: center;
					font-weight: 600;
					line-height: 35px;
					letter-spacing: 2px;
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
						myLike: function() {
							window.location.href = "/myLike";
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
						submit: function(id) {

							var questionOne = $("textarea[name=questionOne]").val();
							var questionTwo = $("textarea[name=questionTwo]").val();
							var questionThree = $("textarea[name=questionThree]").val();

							if(isNullOrEmpty(questionOne)
									|| isNullOrEmpty(questionTwo)
									|| isNullOrEmpty(questionThree)) {
								alert("回答不能为空");
								return false;
							}

							$.ajax({
								url:"/joinEvent",
								type:"GET",
								data:{
									id:id,
									questionOne:questionOne,
									questionTwo:questionTwo,
									questionThree:questionThree,
								},
								dataType:"JSON",
								beforeSend:function(){
									$("#loadingToast").show();
								},
								complete:function(){
									$('#loadingToast').hide();
								},
								success:function(data){
									if(data.code == 200) {
										alert("报名成功，请耐心等待审核");
										window.location.href = "/eventDetail/" + id;
									} else {
										alert(data.msg);
									}
								},
							})
						}
					}
				})

			});

		</script>
	</head>
	<body id="container">
		<div class="my-info">
			<div class="my-info-body">
				<p>{{$event["question_one"]}}</p>
				<textarea class="professional" name="questionOne"></textarea>
				<p>{{$event["question_two"]}}</p>
				<textarea class="professional" name="questionTwo"></textarea>
				<p>{{$event["question_three"]}}</p>
				<textarea class="professional" name="questionThree"></textarea>
				<div class="button" v-on:click="submit({{$event["event_id"]}})">
					<p>提交</p>
				</div>
			</div>
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