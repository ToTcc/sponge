<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="telephone=no" name="format-detection"/>
		<meta content="email=no" name="format-detection"/>
		<link rel="stylesheet" type="text/css" href="/assets/frontend/css/weui.min.css">
		<title>拒绝理由</title>
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
			@media(max-width: 414px){
				.refuse-reason{
					padding: 20px 20px 60px 20px;
				}
				.refuse-reason > p{
					font-weight: bold;
					font-size: 18px;
				}
				.reason{
					height: 200px;
					width: 93%;
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
				textarea{
					font-size: 16px;
					font-family: "微软雅黑";
				}
				.button{
					background: #3399ff;
					height: 50px;
					border-radius: 8px;
					margin-top: 10px;
					-webkit-box-shadow: #0281ff 0px 2px 1px;
					-moz-box-shadow: #0281ff 0px 2px 1px;
					box-shadow: #0281ff 0px 2px 1px;
				}
				.button > p{
					color: #fff;
					font-size: 20px;
					line-height: 50px;
					text-align: center;
					font-weight: 600;
					letter-spacing: 2px;
				}
			}
			@media(max-width: 375px){
				.refuse-reason{
					padding: 15px 15px 60px 15px;
				}
				.refuse-reason > p{
					font-weight: bold;
					font-size: 16px;
				}
				.reason{
					height: 200px;
					width: 93%;
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
				textarea{
					font-size: 14px;
					font-family: "微软雅黑";
				}
				.button{
					background: #3399ff;
					height: 45px;
					border-radius: 8px;
					margin-top: 10px;
					-webkit-box-shadow: #0281ff 0px 2px 1px;
					-moz-box-shadow: #0281ff 0px 2px 1px;
					box-shadow: #0281ff 0px 2px 1px;
				}
				.button > p{
					color: #fff;
					font-size: 18px;
					line-height: 45px;
					text-align: center;
					font-weight: 600;
					letter-spacing: 2px;
				}
			}
			@media(max-width: 320px){
				.refuse-reason{
					padding: 15px 15px 60px 15px;
				}
				.refuse-reason > p{
					font-weight: bold;
					font-size: 14px;
				}
				.reason{
					height: 200px;
					width: 93%;
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
				textarea{
					font-size: 12px;
					font-family: "微软雅黑";
				}
				.button{
					background: #3399ff;
					height: 35px;
					border-radius: 8px;
					margin-top: 10px;
					-webkit-box-shadow: #0281ff 0px 2px 1px;
					-moz-box-shadow: #0281ff 0px 2px 1px;
					box-shadow: #0281ff 0px 2px 1px;
				}
				.button > p{
					color: #fff;
					font-size: 16px;
					line-height: 35px;
					text-align: center;
					font-weight: 600;
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
						submit: function(joinId) {

							var reason = $(".reason[name=reason]").val();

							if(isNullOrEmpty(reason)) {
								alert("拒绝也要给人家个理论啦~");
								return false;
							}

							$.ajax({
								url:"/rejectEventJoin",
								type:"GET",
								data:{
									joinId: joinId,
									reason: reason,
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
									if(data.code == 200) {
										window.location.href = "/viewMyCreateEventDetail/{{$data["join"]["event_id"]}}";
									}
								},
							})

						},
					}
				})

			});

		</script>
	</head>
	<body id="container">
		<div class="refuse-reason">
			<p>请给出拒绝理由</p>
			<textarea class="reason" name="reason"></textarea>
			<div class="button" v-on:click="submit({{$data["join"]["join_id"]}})">
				<p>提交</p>
			</div>
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