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
			.activity-body{
				padding: 10px;
				padding-bottom: 60px;
			}
			.activity-list{
				margin-top: 5px;
				position: relative;
			}
			.activity-content{
				background: #efefef;
				padding: 10px 15px;
				position: relative;
				height: 50px;
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
					width: 150px;
					font-size: 14px;
					overflow: hidden;
					white-space: nowrap;
					text-overflow: ellipsis;
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
					top: 40px;
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
			}
			@media (max-width: 375px){
				.logo-bg{
					background: url('/assets/frontend/image/activityLogo.png')no-repeat center;
					background-size: 100% 83px;
					width: 100%;
					height: 83px;
				}
				.activity-img{
					background: url('/assets/frontend/image/activityImg.png')no-repeat center;
					background-size: 100% 200px;
					width: 100%;
					height: 200px;
				}
				.description{
					width: 150px;
					font-size: 12px;
					overflow: hidden;
					white-space: nowrap;
					text-overflow: ellipsis;
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
					top: 40px;
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
					width: 100px;
					font-size: 12px;
					overflow: hidden;
					white-space: nowrap;
					text-overflow: ellipsis;
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
					top: 40px;
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
						eventDetail: function(id) {
							window.location.href = "/eventDetail/" + id;
						},
					}
				})

				var pageNum = 2;
				var isNeedRefresh = false;

				$(window).scroll(function(){
					var scrollTop = $(this).scrollTop();
					var scrollHeight = $(document).height();
					var windowHeight = $(this).height();
					if(!isNeedRefresh &&
							(scrollHeight - scrollTop - windowHeight <= 25)){
						isNeedRefresh = true;
						refreshPage(pageNum++);
					}
				});

				function refreshPage(pageNum) {
					$.ajax({
						url:"/eventListForPage",
						type:"GET",
						data:{
							pageNum:pageNum,
						},
						dataType:"JSON",
						beforeSend:function(){
							$("#loadingToast").show();
						},
						complete:function(){
							$('#loadingToast').hide();
						},
						success:function(data){
							if(!isNullOrEmpty(data)) {
								if(pageNum == 2){
									app.eventList = data;
								}else{
									app.eventList = app.eventList.concat(data);
								}
								isNeedRefresh = false;
							}
						},
					})
				}

			});

		</script>
	</head>
	<body id="container">
		<div class="activity-body">
			<div class="logo-bg"></div>
			<div>
				@foreach($eventList as $item)
				<div class="activity-list" v-on:click="eventDetail({{$item['event_id']}})">
					<div class="activity-img" style="background:url('{{$item["title_image"]}}') no-repeat center;background-size: cover;"></div>
					@if($item["status"] == config("enumerations.EVENT_STATUS.WAITING_JOIN"))
						<div class="status-join">报名中</div>
					@elseif($item["status"] == config("enumerations.EVENT_STATUS.FULL"))
						<div class="status-full">
							<div>
								<div class="full"><span>满</span></div>
								<div class="remind">下回请早!</div>
							</div>
						</div>
					@elseif($item["status"] == config("enumerations.EVENT_STATUS.END"))
						<div class="status-end">已结束</div>
					@endif
					<div class="activity-content">
						<p class="title">{{$item["title"]}}</p>
						<p class="description">{{$item["second_title"]}}</p>
						@if($item["event_type"] == config("enumerations.EVENT_TYPE.CASH"))
							<p class="price">{{$item["price"]}}元</p>
						@elseif($item["event_type"] == config("enumerations.EVENT_TYPE.FREE"))
							<p class="price">免费</p>
						@endif
						<p class="date">{{$item["time"]}}</p>
					</div>
				</div>
				@endforeach
				<div v-for="item in eventList">
					<div class="activity-list" v-on:click="eventDetail(@{{item.event_id}})">
						<div class="activity-img" style="background:url('@{{item.title_image}}') no-repeat center;background-size: cover;"></div>
						<div class="status-join" v-if="item.status == {{config("enumerations.EVENT_STATUS.WAITING_JOIN")}}">报名中</div>
						<div class="status-full" v-if="item.status == {{config("enumerations.EVENT_STATUS.FULL")}}">
							<div>
								<div class="full"><span>满</span></div>
								<div class="remind">下回请早!</div>
							</div>
						</div>
						<div class="status-end" v-if="item.status == {{config("enumerations.EVENT_STATUS.END")}}">已结束</div>
						<div class="activity-content">
							<p class="title">@{{item.title}}</p>
							<p class="description">@{{item.nickname}}</p>
							<p class="price" v-if="item.event_type == {{config("enumerations.EVENT_TYPE.CASH")}}">@{{item.price}}元</p>
							<p class="date">@{{item.time}}</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="foot">
			<div class="item" onclick="week()"><div>本周</div></div>
			<div class="item" v-on:click="search"><div>电影订单</div></div>
			<div class="item active"><div>活动订单</div></div>
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
				<p class="weui_toast_content">数据加载中</p>
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