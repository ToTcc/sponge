<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="telephone=no" name="format-detection"/>
		<meta content="email=no" name="format-detection"/>
		<title>创建电影订单</title>
		<link rel="stylesheet" type="text/css" href="/assets/frontend/css/weui.min.css">
		<style type="text/css">
			html,body{
				font-family: "微软雅黑";
				font-size: 14px;
				line-height: inherit;
			}
			*{
				margin: 0;
				padding: 0;
			}
			::-webkit-input-placeholder { /* WebKit browsers */ 
				color: #999; 
				font-size: 16px;
			} 
			:-moz-placeholder { /* Mozilla Firefox 4 to 18 */ 
				color: #999;
				font-size: 16px; 
			} 
			::-moz-placeholder { /* Mozilla Firefox 19+ */ 
				color: #999; 
				font-size: 16px;
			} 
			:-ms-input-placeholder { /* Internet Explorer 10+ */ 
				color: #999; 
				font-size: 16px;
			}  
			.search > input:focus{
				outline: none;
			}
			.search > input:focus + .word{
				display: none;
			}
			.word{
				display: block;
				margin: 10px 0;
				color: #66cc99;
				font-size: 14px;
			    position: absolute;
			    top: 7px;
			    right: 10px;
			}
			.line{
				border-bottom: 1px solid #dbdbdb;
				margin-top: 20px;
			}		
			@media (max-width: 414px){ 
				.head-img{
					background: #ccc;
					height: 250px;
					width: 186px;
					display: inline-block;
				}
				.content{
					margin-left: 15px;
					vertical-align: top;
					width: 46%;
					height: 250px;
					display: inline-block;
					position: absolute;
				}
				.search-opacity{
					position: fixed;
					top: 0;
					bottom: 0;
					left: 0;
					right: 0;
					z-index: 9;
					opacity: 0.9;
					background: #fff;
					height: 85px;
				}
				.create-order{
					height: auto;
					margin-bottom: 40px;
					padding-top: 85px;
				}
				.create-order-details{
					padding: 20px 20px 0 20px;	
					position: relative;			
				}
				.search-order{
					position: fixed;
					top: 0;
					bottom: 0;
					left: 0;
					right: 0;
					z-index: 10;
					height: 65px;
					margin: 20px 20px 15px 20px;
					border-bottom: 1px solid #dbdbdb;
				}
				.search{
					margin: 0 auto;
					position: relative;
				}
				.search-btn{
					position: absolute;
					background: #3399ff;
					right: 0;
					padding: 15px 20px;
					border-radius: 0 10px 10px 0;
					top: 0;
				}
				.search-img{
					position: relative;
					background: url('/assets/frontend/image/search.png')no-repeat center;
					background-size: 20px 20px;
					width: 20px;
					height: 20px;
				}
				.search > input{
					-webkit-appearance:none;
					height: 50px;
					border: 1px solid #efefef;
					border-radius: 10px;
					width: 100%;
					padding: 15px;
					background: #efefef;
					font-size: 16px;
				}
				.title{
					font-size: 20px;
					width: 100%;
					line-height: 1.5;
					font-weight: 600;
					display: -webkit-box;
					-webkit-box-orient: vertical;
					-webkit-line-clamp: 2;
					word-break: break-all;
					overflow: hidden; 
					margin-bottom: 0px;
				}
				.point{
					color: #999;
					font-size: 16px;
				}
				.score{
					color: #3399ff;
					font-size: 33px;
					font-family: '黑体';
					font-weight: bold;
				}
				.time,.nation{
					margin-top: 8px;
					color: #999;
					font-size: 16px;
				}
				.person{
					position: absolute;
					bottom: 60px;
					font-size: 18px;
					font-weight: 600;
				}
				.info{
					position: absolute;
					right: 10px;
					bottom: 60px;
					color: #fff;
					border-radius: 5px;
					padding: 3px 8px;
					font-size: 16px;
					background: #a5d2ff;
				}
				.button{
					width: 95%;
					bottom: 5px;
					border: 1px solid #3399ff;
					border-radius: 10px;
					background: #3399ff;
					position: absolute;
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
				.button.active{
					background: #d4e9ff;
					border: 1px solid #d4e9ff;
					-webkit-box-shadow: #c6e3ff 0px 5px 1px;
					-moz-box-shadow: #c6e3ff 0px 5px 1px;
					box-shadow: #c6e3ff 0px 5px 1px;
				}
				.button-gray{
					width: 95%;
					bottom: 5px;
					border: 1px solid #3399ff;
					border-radius: 10px;
					background: #3399ff;
					position: absolute;
					height: 40px;
					-webkit-box-shadow: #269999 0px 5px 1px;
					-moz-box-shadow: #269999 0px 5px 1px;
					box-shadow: #269999 0px 5px 1px;
				}
				.button-gray > p{
					color: #fff;
					font-weight: 600;
					line-height: 40px;
					font-size: 20px;
					text-align: center;
					position: relative;
				}
			}
			@media (max-width: 375px){ 
				.head-img{
					background: #ccc;
					height: 230px;
					width: 165px;
					display: inline-block;
				}
				.content{
					margin-left: 15px;
					vertical-align: top;
					width: 46%;
					height: 230px;
					position: absolute;
				}
				.search-opacity{
					position: fixed;
					top: 0;
					bottom: 0;
					left: 0;
					right: 0;
					z-index: 9;
					opacity: 0.9;
					background: #fff;
					height: 85px;
				}
				.create-order{
					height: auto;
					margin-bottom: 40px;
					padding-top: 85px;
				}
				.create-order-details{
					padding: 20px 20px 0 20px;	
					position: relative;			
				}
				.search-order{
					position: fixed;
					top: 0;
					bottom: 0;
					left: 0;
					right: 0;
					z-index: 10;
					height: 65px;
					margin: 20px 20px 15px 20px;
					border-bottom: 1px solid #dbdbdb;
				}
				.search{
					margin: 0 auto;
					position: relative;
				}
				.search-btn{
					position: absolute;
					background: #3399ff;
					right: 0;
					padding: 15px 20px;
					border-radius: 0 10px 10px 0;
					top: 0;
				}
				.search-img{
					position: relative;
					background: url('/assets/frontend/image/search.png')no-repeat center;
					background-size: 20px 20px;
					width: 20px;
					height: 20px;
				}
				.search > input{
					-webkit-appearance:none;
					height: 50px;
					border: 1px solid #efefef;
					border-radius: 10px;
					width: 100%;
					padding: 15px;
					background: #efefef;
					font-size: 16px;
				}
				.title{
					font-size: 18px;
					width: 100%;
					line-height: 1.5;
					font-weight: 600;
					margin-bottom: 0;
					display: -webkit-box;
					-webkit-box-orient: vertical;
					-webkit-line-clamp: 2;
					word-break: break-all;
					overflow: hidden; 
				}
				.point{
					color: #999;
					font-size: 14px;
				}
				.score{
					color: #3399ff;
					font-size: 30px;
					font-family: '黑体';
					font-weight: bold;
				}
				.time,.nation{
					margin-top: 8px;
					color: #999;
					font-size: 14px;
				}
				.person{
					position: absolute;
					bottom: 53px;
					font-size: 16px;
					font-weight: 600;
				}
				.info{
					position: absolute;
					right: 10px;
					bottom: 53px;
					color: #fff;
					border-radius: 5px;
					padding: 3px 8px;
					font-size: 16px;
					background: #a5d2ff;
				}
				.button{
					width: 95%;
					bottom: 5px;
					border: 1px solid #3399ff;
					border-radius: 10px;
					background: #3399ff;
					position: absolute;
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
				.button.active{
					background: #d4e9ff;
					border: 1px solid #d4e9ff;
					-webkit-box-shadow: #c6e3ff 0px 5px 1px;
					-moz-box-shadow: #c6e3ff 0px 5px 1px;
					box-shadow: #c6e3ff 0px 5px 1px;
				}
				.button-gray{
					width: 95%;
					bottom: 5px;
					border: 1px solid #3399ff;
					border-radius: 10px;
					background: #3399ff;
					position: absolute;
					height: 40px;
					-webkit-box-shadow: #269999 0px 5px 1px;
					-moz-box-shadow: #269999 0px 5px 1px;
					box-shadow: #269999 0px 5px 1px;
				}
				.button-gray > p{
					color: #fff;
					font-weight: 600;
					line-height: 40px;
					font-size: 20px;
					text-align: center;
					position: relative;
				}
			}
			@media (max-width: 320px){
				.head-img{
					background: #ccc;
					height: 200px;
					width: 150px;
					display: inline-block;
				}
				.content{
					margin-left: 10px;
					vertical-align: top;
					width: 43%;
					height: 200px;
					display: inline-block;
					position: absolute;
				}
				.search-opacity{
					position: fixed;
					top: 0;
					bottom: 0;
					left: 0;
					right: 0;
					z-index: 9;
					opacity: 0.9;
					background: #fff;
					height: 70px;
				}
				.create-order{
					height: auto;
					margin-bottom: 40px;
					padding-top: 70px;
				}
				.create-order-details{
					padding: 20px 20px 0 20px;
					position: relative;				
				}
				.search-order{
					position: fixed;
					top: 0;
					bottom: 0;
					left: 0;
					right: 0;
					z-index: 10;
					height: 55px;
					margin: 15px 20px;
					border-bottom: 1px solid #dbdbdb;
				}
				.search{
					margin: 0 auto;
					position: relative;
				}
				.search-btn{
					position: absolute;
					background: #3399ff;
					right: 0;
					padding: 0 20px;
					height: 40px;
					border-radius: 0 10px 10px 0;
					top: 0;
				}
				.search-img{
					position: relative;
					background: url('/assets/frontend/image/search.png')no-repeat center;
					background-size: 20px 20px;
					width: 20px;
					height: 20px;
					padding: 10px 0;
				}
				.search > input{
					-webkit-appearance:none;
					height: 40px;
					border: 1px solid #efefef;
					border-radius: 10px;
					width: 100%;
					padding: 0 15px;
					background: #efefef;
					font-size: 16px;
				}
				.title{
					font-size: 16px;
					width: 100%;
					line-height: 1.5;
					font-weight: 600;
					margin-bottom: 0;
					display: -webkit-box;
					-webkit-box-orient: vertical;
					-webkit-line-clamp: 2;
					word-break: break-all;
					overflow: hidden; 
				}
				.point{
					color: #999;
					font-size: 12px;
				}
				.score{
					color: #3399ff;
					font-size: 25px;
					font-family: '黑体';
					font-weight: bold;
				}
				.time,.nation{
					margin-top: 5px;
					color: #999;
					font-size: 12px;
				}
				.person{
					position: absolute;
					bottom: 50px;
					font-size: 14px;
					font-weight: 600;
				}
				.info{
					position: absolute;
					right: 6px;
					bottom: 50px;
					color: #fff;
					border-radius: 5px;
					padding: 3px 5px;
					font-size: 14px;
					background: #a5d2ff;
				}
				.button{
					width: 95%;
					bottom: 5px;
					border: 1px solid #3399ff;
					border-radius: 10px;
					background: #3399ff;
					position: absolute;
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
				.button-gray{
					width: 95%;
					bottom: 5px;
					border: 1px solid #3399ff;
					border-radius: 10px;
					background: #3399ff;
					position: absolute;
					height: 35px;
					-webkit-box-shadow: #269999 0px 5px 1px;
					-moz-box-shadow: #269999 0px 5px 1px;
					box-shadow: #269999 0px 5px 1px;
				}
				.button-gray > p{
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
				z-index: 999;
				bottom: 0;
				width: 100%;
				border: 1px solid #bfbfbf;
			}
			.foot > div{
				padding: 10px 0;
				display: inline-block;
				width: 32%;
				text-align: center;
				background: #fafafa;
				position: relative;

			}
			.foot > div:nth-child(2){
				border-left: 1px solid #bfbfbf;
				border-right: 1px solid #bfbfbf;
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

				$('input').keydown(function(event){
                    if(event.keyCode == 13){
                        event.preventDefault();
                        var movieName = $("input").val();
                        if(isNullOrEmpty(movieName)){
							alert("电影名称不能为空");
							return false;
						}
						$("#loadingToast").show();
						window.location.href = "/result/" + movieName;
                    }
                })

                $('.search-btn').on("click",function(){
                	var movieName = $("input").val();
                    if(isNullOrEmpty(movieName)){
						alert("电影名称不能为空");
						return false;
					}
					$("#loadingToast").show();
					window.location.href = "/result/" + movieName;
                })

                $("input").focus(function(){
                	$(".foot").hide();
                })

                $("input").blur(function() {
                	$(".foot").show();
                })

				var app = new Vue({
					el: '#container',
					data: {
						movieList: [],
					},
					methods: {
						order: function(movieId) {
							$.ajax({
								url:"/addMovie",
								type:"GET",
								data:{
									movieId:movieId,
								},
								dataType:"JSON",
								beforeSend:function(){
									$("#loadingToast").show();
								},
								complete:function(){
									$('#loadingToast').hide();
								},
								success:function(data){
									alert("创建订单成功");
									window.location.href = "/movieInfo/" + movieId;
								},
							})
						},
                        myLike: function() {
                            window.location.href = "/myLike";
                        },
                        eventList: function() {
							window.location.href = "/eventList";
						},
						like: function(movieId, needLike) {
							if(needLike) {
								$.ajax({
									url:"/likeMovie",
									type:"GET",
									data:{
										movieId:movieId,
									},
									dataType:"JSON",
									beforeSend:function(){
										$("#loadingToast").show();
									},
									complete:function(){
										$('#loadingToast').hide();
									},
									success:function(data){
										window.location.href = "/movieInfo/" + movieId;
									},
								})
							} else {
								window.location.href = "/movieInfo/" + movieId;
							}

						}
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
						url:"/getMovieListByPage",
						type:"GET",
						data:{
							q: "{{$data['q']}}",
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
									app.movieList = data;
								}else{
									app.movieList = app.movieList.concat(data);
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
		<div class="search-opacity"></div>
		<div class="search-order">
			<div class="search">
				<input type="search" placeholder="输入你想看的电影">
				<label class="search-btn"><div class="search-img"></div></label>
				<!-- <div class="word">from豆瓣</div> -->
			</div>
		</div>
		<div class="create-order">
			@foreach($data["subjects"] as $item)
				<div class="create-order-details">
					<div class="head-img"
						 @if($item["has_movie"])
						 	v-on:click="like({{$item["id"]}}, false)"
						 @endif
						  style="background:url('{{$item["images"]["large"]}}') no-repeat center;background-size: cover;"></div>
					<div class="content">
						<p class="title">{{$item["title"]}}</p>
						<p class="point">豆瓣评分：<span class="score">{{$item["rating"]["average"]}}</span></p>
						<p class="time">年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;份：{{$item["year"]}}年</p>
						<p class="nation">国家地区：{{$item["country"]}}</p>
						<p class="person">{{$item["like_count"]}}人占座</p>
						@if($item["has_movie"] && $item["status"] != "可占座")
							@if($item["status"] == "无法放映")
								<p class="info" style="background: #999;">无法放映</p>
							@elseif($item["status"] == "售票中")
								<p class="info" style="background: #A5D2FF;">售票中</p>
							@elseif($item["status"] == "售罄")
								<p class="info" style="background: #ffcc99;">售罄</p>
							@endif
						@endif
						@if($item["has_movie"])
							@if($item["is_liked"])
								<div class="button active">
									<p v-on:click="like({{$item["id"]}}, false)">已占座</p>
								</div>
							@else
								<div class="button">
									<p v-on:click="like({{$item["id"]}}, true)">占座</p>
								</div>
							@endif
						@else
							<div class="button-gray" style="background:#33cccc;border:1px solid #33cccc;">
								<p v-on:click="order({{$item['id']}})">创建新订单</p>
							</div>
						@endif
					</div>
					<div class="line"></div>
				</div>
			@endforeach

			<div class="create-order-details" v-for="list in movieList">
				<div class="head-img" v-if="(list.has_movie)" v-on:click="like(list.id, false) style="background:url('@{{list.images.large}}') no-repeat center;background-size: cover;"></div>
				<div class="head-img" v-if="(!list.has_movie)" style="background:url('@{{list.images.large}}') no-repeat center;background-size: cover;"></div>
				<div class="content">
					<p class="title">@{{list.title}}</p>
					<p class="point">豆瓣评分：<span class="score">@{{list.rating.average}}</span></p>
					<p class="time">年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;份：@{{list.year}}年</p>
					<p class="nation">国家地区：@{{list.country}}</p>
					<p class="person">@{{list.like_count}}人占座</p>
					<p class="info" style="background: #ffcc99;" v-if="(list.has_movie && list.status == '售罄')">@{{list.status}}</p>
					<p class="info" style="background: #A5D2FF;" v-if="(list.has_movie && list.status == '售票中')">@{{list.status}}</p>
					<p class="info" style="background: #999;" v-if="(list.has_movie && list.status == '无法放映')">@{{list.status}}</p>
					<div class="button active" v-if="(list.has_movie)">
						<p v-if="(list.is_liked)" v-on:click="like(list.id, false)">已占座</p>
						<p v-if="(!list.is_liked)" v-on:click="like(list.id, true)">占座</p>
					</div>
					<div class="button-gray" v-if="(!list.has_movie)" style="background:#33cccc;border:1px solid #33cccc;">
						<p v-on:click="order(list.id)">创建新订单</p>
					</div>
				</div>				
				<div class="line"></div>
			</div>
		</div>

        <div class="foot">
            <div class="item" onclick="week()"><div>本周</div></div>
            <div class="item active"><div>电影订单</div></div>
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