<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
		<meta content="telephone=no" name="format-detection"/>
		<meta content="email=no" name="format-detection"/>
		<link rel="stylesheet" type="text/css" href="/assets/frontend/css/weui.min.css">
		<title>电影订单</title>
		<style type="text/css">
			html,body{
				font-family: "微软雅黑";
				line-height: inherit;
			}
			*{
				padding: 0;
				margin: 0;
				font-size: 14px;
			}
			.bold{
				font-family: '黑体';
			}
			#shareit {
				-webkit-user-select: none;
				display: none;
				position: fixed;
				width: 100%;
				height: 100%;
				background: rgba(0,0,0,0.85);
				text-align: center;
				top: 0;
				left: 0;
				right: 0;
				bottom: 0;
				z-index: 105;
			}
			#shareit img {
				width: 40%;
			}
			.arrow {
				position: absolute;
				right: 10%;
				top: 5%;
			}
			#share-text {
				margin-top: 70%;
			}
			#share-text > p{
				color: #fff;
				font-size: 18px;
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
			.pay-success-info{
				background: #3399ff;
				padding: 15px;
			}
			.pay-success-info > div{
				text-align: center;
				color: #fff;
				font-size: 18px;
			}
			@media (max-width: 450px){ 
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
				.moive-order{
					height: auto;
					padding-bottom: 65px;
					padding-top: 85px;
				}
				.create-order-details{
					padding: 20px 15px 0 15px;	
					position: relative;			
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
				.status{
					margin-top: 15px;
					padding: 20px 0;
					border-top: 1px solid #dbdbdb;
					border-bottom: 1px solid #dbdbdb;
					color: #3399ff;
					position: relative;
				}
				.status > p{
					line-height: 1.7;
					margin-left: 35px;
				}
				.complete{
					background: url('/assets/frontend/image/complete.png')no-repeat center;
					background-size: 30px 30px;
					width: 30px;
					height: 30px;
					position: absolute;
					top: 16px;
				}
				.like-moive{
					margin-top: 15px;
					padding: 0 5px;
				}
				.like-moive > div{
					margin-top: 15px;
					margin-right: 10px;
					margin-left: 10px;
					float: left;
				} 
				.like-img{
					background: #ccc;
					background-size: 70px 70px;
					width: 70px;
					height: 70px;
					border-radius: 5px;				
				}
				.like-moive > div > p{
					text-align: center;
					margin-top: 3px;
					white-space:nowrap;
					overflow:hidden;
					text-overflow:ellipsis;
					width: 70px;
					font-size: 13px;
				}
				.like-img.active{
					width: 70px;
					height: 70px;
					background: #000;
					opacity: 0.3;
				}
				#share-btn > div{
					background: #fff;
					width: 70px;
					height: 70px;
					border: 1px solid #dbdbdb;
					border-radius: 5px;
				}
				.share-img{
					background: url('/assets/frontend/image/share.png')no-repeat center;
					background-size: 30px;
					width: 30px;
					height: 30px;
					position: absolute;
					padding: 19px;
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
					-webkit-box-shadow: #a2d0ff 0px 5px 1px;
					-moz-box-shadow: #a2d0ff 0px 5px 1px;
					box-shadow: #a2d0ff 0px 5px 1px;
				}
				.button-red{
					margin-top: 15px;
					padding: 0 15px;
					border: 1px solid #ff7d7d;
					border-radius: 10px;
					background: #ff7d7d;
					position: relative;
					height: 40px;
					-webkit-box-shadow: #ff4444 0px 5px 1px;
					-moz-box-shadow: #ff4444 0px 5px 1px;
					box-shadow: #ff4444 0px 5px 1px;
					margin-bottom: 30px;
					clear: both;
					top: 20px;
				}
				.button-red > p{
					color: #fff;
					font-weight: 600;
					line-height: 40px;
					font-size: 20px;
					text-align: center;
					position: relative;
				}
				.choose > p:first-child{
					font-size: 35px;
				}
				.price{
					font-size: 30px;
					font-weight: 600;
					margin-top: 10px;
				}
				.tips-btn{
					background: #ffefdf;
					border-radius: 8px;
					border: 1px solid #ffefdf;
					margin-top: 20px;
					padding: 0 15px;
					height: 45px;
					position: relative;
					clear: both;
					top: 20px;
				}
				.tips-btn > p{
					color: #663333;
					font-size: 18px;
					line-height: 45px;
					font-weight: bold;
				}
				.tips-btn > p > span{
					margin-left: 10px;
					font-size: 15px;
				}
				.button-pay{
					margin-top: 15px;
					border: 1px solid #3399ff;
					border-radius: 10px;
					padding: 0 15px;
					background: #3399ff;
					position: relative;
					height: 40px;
					-webkit-box-shadow: #0281ff 0px 5px 1px;
					-moz-box-shadow: #0281ff 0px 5px 1px;
					box-shadow: #0281ff 0px 5px 1px;
					margin-bottom: 30px;
				}
				.button-pay > p{
					color: #fff;
					font-weight: 600;
					line-height: 40px;
					font-size: 20px;
					text-align: center;
					position: relative;
				}
				.button1{
					margin-top: 15px;
					border: 1px solid #97cbff;
					border-radius: 10px;
					padding: 0 15px;
					background: #97cbff;
					position: relative;
					height: 40px;
					-webkit-box-shadow: #6fb7ff 0px 5px 1px;
					-moz-box-shadow: #6fb7ff 0px 5px 1px;
					box-shadow: #6fb7ff 0px 5px 1px;
					margin-bottom: 30px;
				}
				.button1 > p{
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
				.moive-order{
					height: auto;
					padding-bottom: 65px;
					padding-top: 85px;
				}
				.create-order-details{
					padding: 20px 15px 0 15px;	
					position: relative;			
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
				.status{
					margin-top: 15px;
					padding: 20px 0;
					border-top: 1px solid #dbdbdb;
					border-bottom: 1px solid #dbdbdb;
					color: #3399ff;
					position: relative;
				}
				.status > p{
					line-height: 1.7;
					margin-left: 35px;
				}
				.complete{
					background: url('/assets/frontend/image/complete.png')no-repeat center;
					background-size: 30px 30px;
					width: 30px;
					height: 30px;
					position: absolute;
					top: 17px;
				}
				.like-moive{
					margin-top: 15px;
				}
				.like-moive > div{
					margin-top: 15px;
					margin-right: 7px;
					margin-left: 8px;
					float: left;
				} 
				.like-img{
					background: #ccc;
					background-size: 65px 65px;
					width: 65px;
					height: 65px;
					border-radius: 5px;				
				}
				.like-moive > div > p{
					text-align: center;
					margin-top: 3px;
					white-space:nowrap;
					overflow:hidden;
					text-overflow:ellipsis;
					width: 65px;
					font-size: 13px;
				}
				.like-img.active{
					width: 65px;
					height: 65px;
					background: #000;
					opacity: 0.3;
				}
				#share-btn > div{
					background: #fff;
					width: 65px;
					height: 65px;
					border: 1px solid #dbdbdb;
					border-radius: 5px;
				}
				.share-img{
					background: url('/assets/frontend/image/share.png')no-repeat center;
					background-size: 30px;
					width: 30px;
					height: 30px;
					position: absolute;
					padding: 17px;
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
					-webkit-box-shadow: #a2d0ff 0px 5px 1px;
					-moz-box-shadow: #a2d0ff 0px 5px 1px;
					box-shadow: #a2d0ff 0px 5px 1px;
				}
				.button-red{
					margin-top: 15px;
					border: 1px solid #ff7d7d;
					border-radius: 10px;
					background: #ff7d7d;
					position: relative;
					padding: 0 15px;
					height: 40px;
					-webkit-box-shadow: #ff4444 0px 5px 1px;
					-moz-box-shadow: #ff4444 0px 5px 1px;
					box-shadow: #ff4444 0px 5px 1px;
					margin-bottom: 30px;
					clear: both;
					top: 20px;
				}
				.button-red > p{
					color: #fff;
					font-weight: 600;
					line-height: 40px;
					font-size: 20px;
					text-align: center;
					position: relative;
				}
				.choose > p:first-child{
					font-size: 32px;
				}
				.price{
					font-size: 28px;
					font-weight: 600;
					margin-top: 10px;
				}
				.tips-btn{
					background: #ffefdf;
					border-radius: 8px;
					border: 1px solid #ffefdf;
					margin-top: 20px;
					padding: 0 15px;
					height: 45px;
					position: relative;
					clear: both;
					top: 20px;
				}
				.tips-btn > p{
					color: #663333;
					font-size: 18px;
					line-height: 45px;
					font-weight: bold;
				}
				.tips-btn > p > span{
					margin-left: 10px;
					font-size: 15px;
				}
				.button-pay{
					margin-top: 15px;
					border: 1px solid #3399ff;
					border-radius: 10px;
					padding: 0 15px;
					background: #3399ff;
					position: relative;
					height: 40px;
					-webkit-box-shadow: #0281ff 0px 5px 1px;
					-moz-box-shadow: #0281ff 0px 5px 1px;
					box-shadow: #0281ff 0px 5px 1px;
					margin-bottom: 30px;
				}
				.button-pay > p{
					color: #fff;
					font-weight: 600;
					line-height: 40px;
					font-size: 20px;
					text-align: center;
					position: relative;
				}
				.button1{
					margin-top: 15px;
					border: 1px solid #97cbff;
					border-radius: 10px;
					padding: 0 15px;
					background: #97cbff;
					position: relative;
					height: 40px;
					-webkit-box-shadow: #6fb7ff 0px 5px 1px;
					-moz-box-shadow: #6fb7ff 0px 5px 1px;
					box-shadow: #6fb7ff 0px 5px 1px;
					margin-bottom: 30px;
				}
				.button1 > p{
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
					height: 40px;
					padding: 0 20px;
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
				.moive-order{
					height: auto;
					padding-bottom: 65px;
					padding-top: 80px;
				}
				.create-order-details{
					padding: 20px 15px 0 15px;
					position: relative;				
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
					right: 0;
					bottom: 50px;
					color: #fff;
					border-radius: 5px;
					padding: 3px 5px;
					font-size: 14px;
					background: #a5d2ff;
				}
				.status{
					margin-top: 15px;
					padding: 15px 0;
					border-top: 1px solid #dbdbdb;
					border-bottom: 1px solid #dbdbdb;
					color: #3399ff;
					position: relative;
				}
				.status > p{
					line-height: 1.7;
					margin-left: 35px;
					font-size: 12px;
				}
				.complete{
					background: url('/assets/frontend/image/complete.png')no-repeat center;
					background-size: 25px 25px;
					width: 25px;
					height: 25px;
					position: absolute;
					top: 13px;
				}
				.like-moive{
					margin-top: 15px;
				}
				.like-moive > div{
					margin-top: 10px;
					margin-right: 6px;
					margin-left: 6px;
					float: left;
				} 
				.like-img{
					background: #ccc;
					background-size: 55px 55px;
					width: 55px;
					height: 55px;
					border-radius: 5px;				
				}
				.like-moive > div > p{
					text-align: center;
					margin-top: 3px;
					white-space:nowrap;
					overflow:hidden;
					text-overflow:ellipsis;
					width: 55px;
					font-size: 10px;
				}
				.like-img.active{
					width: 55px;
					height: 55px;
					background: #000;
					opacity: 0.3;
				}
				#share-btn > div{
					background: #fff;
					width: 55px;
					height: 55px;
					border: 1px solid #dbdbdb;
					border-radius: 5px;
				}
				.share-img{
					background: url('/assets/frontend/image/share.png')no-repeat center;
					background-size: 25px;
					width: 25px;
					height: 25px;
					position: absolute;
					padding: 15px;
				}
				.button{
					width: 100%;
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
				.button-red{
					margin-top: 15px;
					border: 1px solid #ff7d7d;
					border-radius: 10px;
					padding: 0 15px;
					background: #ff7d7d;
					position: relative;
					height: 35px;
					-webkit-box-shadow: #ff4444 0px 5px 1px;
					-moz-box-shadow: #ff4444 0px 5px 1px;
					box-shadow: #ff4444 0px 5px 1px;
					margin-bottom: 30px;
					clear: both;
					top: 20px;
				}
				.button-red > p{
					color: #fff;
					font-weight: 600;
					line-height: 35px;
					font-size: 18px;
					text-align: center;
					position: relative;
				}
				.choose > p:first-child{
					font-size: 28px;
				}
				.price{
					font-size: 24px;
					font-weight: 600;
					margin-top: 10px;
				}
				.tips-btn{
					background: #ffefdf;
					border-radius: 8px;
					border: 1px solid #ffefdf;
					margin-top: 20px;
					padding: 0 10px;
					height: 35px;
					position: relative;
					clear: both;
					top: 20px;
				}
				.tips-btn > p{
					color: #663333;
					font-size: 14px;
					line-height: 35px;
					font-weight: bold;
				}
				.tips-btn > p > span{
					margin-left: 8px;
					font-size: 12px;
				}
				.button-pay{
					margin-top: 15px;
					border: 1px solid #3399ff;
					border-radius: 10px;
					padding: 0 15px;
					background: #3399ff;
					position: relative;
					height: 35px;
					-webkit-box-shadow: #0281ff 0px 5px 1px;
					-moz-box-shadow: #0281ff 0px 5px 1px;
					box-shadow: #0281ff 0px 5px 1px;
					margin-bottom: 30px;
				}
				.button-pay > p{
					color: #fff;
					font-weight: 600;
					line-height: 35px;
					font-size: 20px;
					text-align: center;
					position: relative;
				}
				.button1{
					margin-top: 15px;
					border: 1px solid #97cbff;
					border-radius: 10px;
					padding: 0 15px;
					background: #97cbff;
					position: relative;
					height: 35px;
					-webkit-box-shadow: #6fb7ff 0px 5px 1px;
					-moz-box-shadow: #6fb7ff 0px 5px 1px;
					box-shadow: #6fb7ff 0px 5px 1px;
					margin-bottom: 30px;
				}
				.button1 > p{
					color: #fff;
					font-weight: 600;
					line-height: 35px;
					font-size: 20px;
					text-align: center;
					position: relative;
				}
			}
			.content-details{
				margin-top: 15px;
			}
			.content-details > p{
				font-size: 14px;
				margin-top: 10px;
			}
			.color-blue{
				color: #3399ff;
				font-weight: bold;
			}
			.date{
				border-radius: 8px;
				padding: 15px 10px;
				background: #deefff;
				margin: 15px 0;
			}
			.date > div{
				display: inline-block;
				width: 100%;
			}
			.over{
				font-size: 12px;
			}
			.dead-line{
				margin-top: 15px;
				font-size: 12px;
				margin-bottom: 10px;
			}
			.activity-info{
				/*padding: 15px 0;*/
				position: relative;
			}
			.activity{
				padding: 15px 0;
				font-weight: 600;
				font-size: 14px;
			}
			.down{
				background: url('/assets/frontend/image/down.png')no-repeat center;
				background-size: 25px;
				width: 25px;
				height: 25px;
				position: absolute;
				right: 0;
				top: 12px;
			}
			.description{
				margin-top: 5px;
				color: #999;
				line-height: 2;
				letter-spacing: 1px;
				margin-bottom: 10px;
			}
			.description p{
				word-wrap:break-word;
			}
			.choose > p{
				color: #0074e8;
			}
			.code{
				position: relative;
				margin: 15px 0 20px 0;
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
			.line{
				border-bottom: 1px solid #dbdbdb;
			}
			.date,.date-other{
				border-radius: 8px;
				padding: 15px 10px;
				background: #deefff;
				margin: 15px 0;
			}
			.date > div{
				display: inline-block;
				width: 30%;
			}
			.price,.over,.dead-line{
				color: #a2d2ff;;
				text-align: center;
			}
			.date2{
				padding: 0 6px;
				border-left: 2px dashed #fff;
				border-right: 2px dashed #fff;
			}
			.over{
				font-size: 12px;
			}
			.dead-line{
				margin-top: 15px;
				font-size: 12px;
				margin-bottom: 10px;
			}
			.date-other > div{
				display: inline-block;
				width: 48%;
			}
			.date-other > div:first-child{
				border-right: 2px dashed #fff;
			}
			.free{
				border-radius: 8px;
				padding: 15px 10px;
				background: #deefff;
				margin: 15px 0;
			}
			.free > div{
				display: inline-block;
				width: 100%;
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
			.hassuccess {
				padding: 20px 0;
				font-size: 16px;
			}
			img{
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
			/*.status > p{
				line-height: 1.7;
				margin-left: 35px;
			}
			.complete{
				background: url('../image/complete.png')no-repeat center;
				background-size: 30px 30px;
				width: 30px;
				height: 30px;
				position: absolute;
			}
			.like-moive{
				margin-top: 15px;
			}
			.like-moive > div{
				margin-top: 15px;
				margin-right: 15px;
				display: inline-block;
			} 
			.like-img{
				background: #ccc;
				background-size: 65px 65px;
				width: 65px;
				height: 65px;
				border-radius: 5px;				
			}
			.like-moive > div > p{
				text-align: center;
				margin-top: 3px;
				white-space:nowrap;
				overflow:hidden;
				text-overflow:ellipsis;
				width: 65px;
				font-size: 13px;
			}*/
		</style>
		<script type="text/javascript" src="/assets/frontend/js/jquery.1.11.1.js"></script>
		<script type="text/javascript" src="/assets/frontend/js/vue.min.js"></script>
		<script type="text/javascript" src="/assets/frontend/js/common.js"></script>
		<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" charset="utf-8">
			wx.config({!!EasyWeChat::js()->config(array('onMenuShareAppMessage', 'onMenuShareTimeline'), false)!!});
			var currentUrl = window.location.href;
			wx.ready(function(){
				var shareData = {
					appid:'{{env("WECHAT_APPID")}}',
					imgUrl:'{{$data["info"]["images"]["large"]}}',
					link:(currentUrl),
					title:'{{$data["info"]["title"]}}',
					desc:'{{$data["info"]["title"]}}'
				};
				wx.onMenuShareAppMessage(shareData);
				wx.onMenuShareTimeline(shareData);
			});
		</script>
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

                $('#share-btn').on("click",function(){
                	$('#shareit').show();
                })

                $("#shareit").on("click",function(){
					$("#shareit").hide();
				})

				var app = new Vue({
					el: '#container',
					data: {
						movieList: [],
					},
					methods: {
						qrcode: function(activityId) {
							window.location.href = "/activityQrcode/" + activityId;
						},
						like: function(movieId) {
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
									alert("占座成功");
									window.location.reload();
								},
							})
						},
						myLike: function() {
							window.location.href = "/myLike";
						},
						eventList: function() {
							window.location.href = "/eventList";
						},
						choosePay: function(activityId, joinActivity) {
							$.ajax({
								url:"/confirmChoose",
								type:"GET",
								data:{
									joinActivity: joinActivity,
									activityId: activityId,
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
										window.location.href = "/wechat/pay/"+activityId;
									} else {
										alert(data.msg);
									}

								},
							})
						},
						toggleDescription: function() {
							$(".description").toggle();
						},
						leave: function(activityId) {
							window.location.href = "/activityLeavePage/" + activityId;
						},
						join: function(activityId, joinActivity, isFree) {
							$.ajax({
								url:"/joinActivity",
								type:"GET",
								data:{
									joinActivity: joinActivity,
									activityId: activityId,
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
										if(isFree) {
											alert("报名成功");
											window.location.reload();
										} else {
											window.location.href = "/wechat/pay/"+activityId;
										}
									} else {
										alert(data.msg);
									}

								},
							})
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

				@if($data["has_activity"] && $data["activity"]["deadline"] > getCurrentTime())
				setInterval(function() {
					countDown('{{$data["activity"]["deadline"]}}');
				}, 1000);
				@else
					$(".button-pay").hide();
					$(".button1").hide();
					$(".countDown").html("已截止报名");
				@endif
			});

		</script>

	</head>
	<body id="container">
		<div id="shareit" style="display:none;">
			<img class="arrow" src="/assets/frontend/image/share-it.png">
			<div id="share-text" class="text">
				<p>点击右上角，分享给小伙伴吧~</p>
			</div>
		</div>
		<div class="search-opacity"></div>
		<div class="search-order">
			<div class="search">
				<input type="search" placeholder="输入你想看的电影">
				<label class="search-btn"><div class="search-img"></div></label>
				<!-- <div class="word">from豆瓣</div> -->
			</div>
		</div>
		<div class="moive-order">
			@if($data["pay_status"] == 2)
				<div class="pay-success-info">
					@if($data["join_activity"] == "1")
					<div>{{$data["customer"]["nickname"]}}成功报名电影订单，且参加活动</div>
					@else
						<div>{{$data["customer"]["nickname"]}}成功报名电影订单</div>
					@endif
				</div>
			@endif
			<div class="create-order-details">
				<div class="head-img" style="background:url('{{$data["info"]["images"]["large"]}}') no-repeat center;background-size: cover;"></div>
				<div class="content">
					<p class="title">{{$data["info"]["title"]}}</p>
					<p class="point">豆瓣评分：<span class="score">{{$data["info"]["rating"]["average"]}}</span></p>
					<p class="time">年&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;份：{{$data["info"]["year"]}}年</p>
					<p class="nation">国家地区：{{$data["info"]["countries"][0]}}</p>
					<div class="wait-info">
						<p class="person">{{$data["like_count"]}}人占座</p>
						@if($data["status"] == "4")
							<p class="info" style="background: #999">{{getEnumString(config("enumerations.MOVIE_STATUS"), $data["status"])}}</p>
						@elseif($data["status"] == "3")
							<p class="info" style="background: #ffcc99">{{getEnumString(config("enumerations.MOVIE_STATUS"), $data["status"])}}</p>
						@elseif($data["status"] == "2")
							<p class="info" style="background: #A5D2FF;">{{getEnumString(config("enumerations.MOVIE_STATUS"), $data["status"])}}</p>
						@endif
					</div>
					@if(!$data["is_liked"])
						<div class="button">
							<p v-on:click="like({{$data["info"]["id"]}})">占座</p>
						</div>
					@else
						<div class="button active">
							<p>已占座</p>
						</div>
					@endif
				</div>

				@if($data["is_liked"])

					@if($data["has_activity"])

						@if($data["activity"]["activity_type"] == "2")

							<div class="content-details">
								<p>放映成本：<span class="color-blue bold"> {{$data["activity"]["cost"]}} </span>元</p>
								<p>报名人数：<span class="color-blue bold"> {{$data["activity"]["join_number"]}} </span>人，还差<span class="color-blue bold"> {{$data["activity"]["upper_limit"] - $data["activity"]["join_number"]}}</span>人可以放映</p>
								<div class="free choose">
									<p class="price">免费</p>
									<p class="over">Free for you</p>
									<p class="dead-line">{{$data["activity"]["created_at"]}}-{{$data["activity"]["show_time"]}}</p>
								</div>
								<p>放映时间：<span class="color-blue bold">{{$data["activity"]["show_time"]}}</span></p>
								<p>放映地点：<span class="color-blue">{{$data["activity"]["address"]}}</span></p>
								<p>付款倒计时：<span class="color-blue countDown">03天16小时38分28秒</span></p>
								<p class="color-blue">（如到期未达到指定人数放映将取消，钱款将退回你的账户）</p>
							</div>
							<div class="line" style="margin-top:15px;"></div>
							@if($data["activity"]["activity_qrcode_image"])
								@if($data["pay_status"] == 0)
									<div class="activity-info">
										<p class="activity">本场放映<span class="color-blue">有</span>活动</p>
										<span class="down" v-on:click="toggleDescription"></span>
									</div>
									<div class="description">
										<div class="code" style="font-weight:bold;color:#000;">
											活动详情：
										</div>
										<div class="code" style="text-align:center;width:100%;">
											{!! $data["activity"]["description"] !!}
										</div>
									</div>
									<div class="button-pay" v-on:click="join({{$data["activity"]["activity_id"]}}, 0, true)">
										<p>点击确定参与</p>
									</div>
									<div class="line"></div>
								@elseif($data["pay_status"] == 1)
									<div class="activity-info">
										<p class="activity">本场放映<span class="color-blue">有</span>活动</p>
										<span class="down" v-on:click="toggleDescription"></span>
									</div>
									<div class="description">
										<div class="code" style="font-weight:bold;color:#000;">
											活动详情：
										</div>
										<div class="code" style="text-align:center;width:100%;">
											{!! $data["activity"]["description"] !!}
										</div>
									</div>
									<div class="line"></div>
									<div class="button-pay" v-on:click="choosePay({{$data["activity"]["activity_id"]}})">
										<p>去支付</p>
									</div>
								@elseif($data["pay_status"] == 2)
									<div class="activity-info">
										<p class="activity">本场放映<span class="color-blue">有</span>活动</p>
										<span class="down" v-on:click="toggleDescription"></span>
									</div>
									<div class="description">
										<div class="code" style="font-weight:bold;color:#000;">
											活动详情：
										</div>
										<div class="code" style="text-align:center;width:100%;">
											{!! $data["activity"]["description"] !!}
										</div>
									</div>
									<div class="line"></div>
									<div class="code">
										<div class="code-img" v-on:click="qrcode({{$data["activity"]["activity_id"]}})" style="background:url('{{$data["activity"]["activity_qrcode_image"]}}') no-repeat center;background-size: cover;"></div>
										<div class="code-word">扫描左侧二维码进入本次活动群，了解活动事项</div>
									</div>
								@endif
							@else
								@if($data["pay_status"] == 0)
									<div class="button-pay" v-on:click="join({{$data["activity"]["activity_id"]}}, 0, true)">
										<p>点击确定参与</p>
									</div>
									<div class="line"></div>
									<div class="code">
										<div class="code-img" v-on:click="qrcode({{$data["activity"]["activity_id"]}})" style="background:url('{{$data["activity"]["qrcode_image"]}}') no-repeat center;background-size: cover;"></div>
										<div class="code-word">扫描左侧二维码进入本次活动群，了解活动事项</div>
									</div>
								@elseif($data["pay_status"] == 1)
									<div class="button-pay" v-on:click="choosePay({{$data["activity"]["activity_id"]}})">
										<p>去支付</p>
									</div>
									<div class="line"></div>
									<div class="code">
										<div class="code-img" v-on:click="qrcode({{$data["activity"]["activity_id"]}})" style="background:url('{{$data["activity"]["qrcode_image"]}}') no-repeat center;background-size: cover;"></div>
										<div class="code-word">扫描左侧二维码进入本次活动群，了解活动事项</div>
									</div>
								@elseif($data["pay_status"] == 2)
									<p class="activity">本场放映<span class="color-blue">无</span>活动</p>
									<div class="line"></div>
									<div class="line"></div>
									<div class="code">
										<div class="code-img" v-on:click="qrcode({{$data["activity"]["activity_id"]}})" style="background:url('{{$data["activity"]["qrcode_image"]}}') no-repeat center;background-size: cover;"></div>
										<div class="code-word">扫描左侧二维码进入本次活动群，了解活动事项</div>
									</div>
								@endif
							@endif

							<div class="line"></div>
						@else

							<div class="content-details">
								<p>放映成本：<span class="color-blue bold"> {{$data["activity"]["cost"]}} </span>元</p>
								<p>付款人数：<span class="color-blue bold"> {{$data["activity"]["join_number"]}} </span>人，还差<span class="color-blue bold"> {{$data["activity"]["upper_limit"] - $data["activity"]["join_number"]}} </span>人可以放映</p>
								@if($data["price_count"] == "3")
									<div class="date">
										<div class="date1
								@if($data['price_list'][0]['status'] == '1')
												choose
                                        @endif">
											<p class="price bold">{{$data["price_list"][0]["price"]}}<span style="font-size:14px;">元</span></p>
											@if($data["price_list"][0]["status"] == "1")
												<p class="over">当前活动费用</p>
											@elseif($data["price_list"][0]["status"] == "2")
												<p class="over">已结束</p>
											@else
												<p class="over">未开始</p>
											@endif
											<p class="dead-line bold">{{$data["price_list"][0]["begin_time"]}}-{{$data["price_list"][0]["end_time"]}}</p>
										</div>
										<div class="date2
								@if($data['price_list'][1]['status'] == '1')
												choose
                                        @endif">
											<p class="price bold">{{$data["price_list"][1]["price"]}}<span style="font-size:14px;">元</span></p>
											@if($data["price_list"][1]["status"] == "1")
												<p class="over">当前活动费用</p>
											@elseif($data["price_list"][1]["status"] == "2")
												<p class="over">已结束</p>
											@else
												<p class="over">未开始</p>
											@endif
											<p class="dead-line bold">{{$data["price_list"][1]["begin_time"]}}-{{$data["price_list"][1]["end_time"]}}</p>
										</div>
										<div class="date3
								@if($data['price_list'][2]['status'] == '1')
												choose
                                        @endif">
											<p class="price bold">{{$data["price_list"][2]["price"]}}<span style="font-size:14px;">元</span></p>
											@if($data["price_list"][2]["status"] == "1")
												<p class="over">当前活动费用</p>
											@elseif($data["price_list"][2]["status"] == "2")
												<p class="over">已结束</p>
											@else
												<p class="over">未开始</p>
											@endif
											<p class="dead-line bold">{{$data["price_list"][2]["begin_time"]}}-{{$data["price_list"][2]["end_time"]}}</p>
										</div>
									</div>
								@elseif($data["price_count"] == "2")
									<div class="date-other">
										<div class="date1
								@if($data['price_list'][0]['status'] == '1')
												choose
                                       @endif">
											<p class="price bold">{{$data["price_list"][0]["price"]}}<span style="font-size:14px;">元</span></p>
											@if($data["price_list"][0]["status"] == "1")
												<p class="over">当前活动费用</p>
											@elseif($data["price_list"][0]["status"] == "2")
												<p class="over">已结束</p>
											@else
												<p class="over">未开始</p>
											@endif
											<p class="dead-line bold">{{$data["price_list"][0]["begin_time"]}}-{{$data["price_list"][0]["end_time"]}}</p>
										</div>
										<div class="date3
								@if($data['price_list'][1]['status'] == '1')
												choose
                                        @endif">
											<p class="price bold">{{$data["price_list"][1]["price"]}}<span style="font-size:14px;">元</span></p>
											@if($data["price_list"][1]["status"] == "1")
												<p class="over">当前活动费用</p>
											@elseif($data["price_list"][1]["status"] == "2")
												<p class="over">已结束</p>
											@else
												<p class="over">未开始</p>
											@endif
											<p class="dead-line bold">{{$data["price_list"][1]["begin_time"]}}-{{$data["price_list"][1]["end_time"]}}</p>
										</div>
									</div>
								@elseif($data["price_count"] == "1")
									<div class="free
							@if($data['price_list'][0]['status'] == '1')
											choose
                                    @endif">
										<p class="price bold">{{$data["price_list"][0]["price"]}}<span style="font-size:14px;">元</span></p>
										@if($data["price_list"][0]["status"] == "1")
											<p class="over">当前活动费用</p>
										@elseif($data["price_list"][0]["status"] == "2")
											<p class="over">已结束</p>
										@else
											<p class="over">未开始</p>
										@endif
										<p class="dead-line bold">{{$data["price_list"][0]["begin_time"]}}-{{$data["price_list"][0]["end_time"]}}</p>
									</div>
								@endif
								<p>放映时间：<span class="color-blue bold">{{$data["activity"]["show_time"]}}</span></p>
								<p>放映地点：<span class="color-blue">{{$data["activity"]["address"]}}</span></p>
								<p>付款倒计时：<span class="color-blue countDown">03天16小时38分28秒</span></p>
								<p class="color-blue">（如到期未达到指定人数放映将取消，钱款将退回你的账户）</p>
							</div>
							<div class="line" style="margin-top:15px;"></div>
							@if($data["activity"]["activity_qrcode_image"])
								@if($data["pay_status"] == 0)
									<div class="activity-info">
										<p class="activity">本场放映<span class="color-blue">有</span>活动</p>
										<span class="down" v-on:click="toggleDescription"></span>
									</div>
									<div class="description">
										<div class="code" style="font-weight:bold;color:#000;">
											活动详情：
										</div>
										<div class="code" style="text-align:center;width:100%;">
											{!! $data["activity"]["description"] !!}
										</div>
									</div>
									<div class="line"></div>
									<div class="button-pay" v-on:click="join({{$data["activity"]["activity_id"]}}, 1, false)">
										<p>参与活动付款</p>
									</div>
									<div class="button1" v-on:click="join({{$data["activity"]["activity_id"]}}, 0, false)">
										<p>不参与活动付款</p>
									</div>

								@elseif($data["pay_status"] == 1)
									<div class="activity-info">
										<p class="activity">本场放映<span class="color-blue">有</span>活动</p>
										<span class="down" v-on:click="toggleDescription"></span>
									</div>
									<div class="description">
										<div class="code" style="font-weight:bold;color:#000;">
											活动详情：
										</div>
										<div class="code" style="text-align:center;width:100%;">
											{!! $data["activity"]["description"] !!}
										</div>
									</div>
									<div class="line"></div>
									<div class="button-pay" v-on:click="choosePay({{$data["activity"]["activity_id"]}}, 1)">
										<p>参与活动付款</p>
									</div>
									<div class="button1" v-on:click="choosePay({{$data["activity"]["activity_id"]}}, 0)">
										<p>不参与活动付款</p>
									</div>
								@elseif($data["pay_status"] == 2)
									<div class="activity-info">
										<p class="activity">本场放映<span class="color-blue">有</span>活动</p>
										<span class="down" v-on:click="toggleDescription"></span>
									</div>
									<div class="description">
										<div class="code" style="font-weight:bold;color:#000;">
											活动详情：
										</div>
										<div class="code" style="text-align:center;width:100%;">
											{!! $data["activity"]["description"] !!}
										</div>
									</div>
									<div class="line"></div>
									<div class="code">
										<div class="code-img" v-on:click="qrcode({{$data["activity"]["activity_id"]}})" style="background:url('{{$data["activity"]["activity_qrcode_image"]}}') no-repeat center;background-size: cover;"></div>
										<div class="code-word">扫描左侧二维码进入本次活动群，了解活动事项</div>
									</div>
								@endif
							@else
								@if($data["pay_status"] == 0)
									<div class="button1" v-on:click="join({{$data["activity"]["activity_id"]}}, 0, false)">
										<p>付款</p>
									</div>
									<p class="activity">本场放映<span class="color-blue">无</span>活动</p>
									<div class="line"></div>
									<div class="line"></div>
								@elseif($data["pay_status"] == 1)
									<div class="button-pay" v-on:click="choosePay({{$data["activity"]["activity_id"]}}, 1)">
										<p>参与活动付款</p>
									</div>
									<div class="button1" v-on:click="choosePay({{$data["activity"]["activity_id"]}}, 0)">
										<p>不参与活动付款</p>
									</div>
									<p class="activity">本场放映<span class="color-blue">无</span>活动</p>
									<div class="line"></div>
									<div class="line"></div>
								@elseif($data["pay_status"] == 2)
									<p class="activity">本场放映<span class="color-blue">无</span>活动</p>
									<div class="line"></div>
									<div class="line"></div>
									<div class="code">
										<div class="code-img" v-on:click="qrcode({{$data["activity"]["activity_id"]}})" style="background:url('{{$data["activity"]["qrcode_image"]}}') no-repeat center;background-size: cover;"></div>
										<div class="code-word">扫描左侧二维码进入本次活动群，了解活动事项</div>
									</div>
								@endif
							@endif
							<div class="line"></div>
						@endif

					@else

						@if($data["status"] == "3")

							<div class="hassuccess">
								放映过
								<span class="color-blue">{{$data["total_play_count"]}}</span>次，<span class="color-blue">{{$data["total_join_count"]}}</span>人参与。
							</div>

						@endif

						<div class="status">
							<span class="complete"></span>
							<p>占座成功，快来邀请你的朋友一起占座吧！</p>
						</div>

					@endif

				@endif

				@if(!$data["has_activity"])
					<div class="like-moive">
						<p>已占座</p>
						@foreach($data["like_list"] as $item)
						<div>
							<div class="like-img" style="background:url('{{$item["headimgurl"]}}') no-repeat center;background-size: cover;"></div>
							<p>{{$item["nickname"]}}</p>
						</div>
						@endforeach
						<div id="share-btn">
							<div><div class="share-img"></div></div>
						</div>
						<div style="position:relative;clear:both;padding-bottom:60px;"></div>
					</div>
				@else
					<div class="like-moive">
						<p>已占座<span class="color-blue">（清晰头像为确定参与用户）</span></p>
						@foreach($data["like_list"] as $item)
							<div>
								@if(!$item["is_join"])
								<div class="like-img active" style="background:url('{{$item["headimgurl"]}}') no-repeat center;background-size: cover;"></div>
								<p>{{$item["nickname"]}}</p>
								@else
								<div class="like-img" style="background:url('{{$item["headimgurl"]}}') no-repeat center;background-size: cover;"></div>
								<p>{{$item["nickname"]}}</p>
								@endif
							</div>
						@endforeach
						<div id="share-btn">
							<div><div class="share-img"></div></div>
						</div>
						<div style="position:relative;clear:both;padding-bottom:60px;"></div>
					</div>
				@endif

				@if(!$data["has_activity"])

					<div class="tips-btn">
						<p>Tips:<span>占座人数满40人达到组织放映条件</span></p>
					</div>

				@endif

				@if($data["pay_status"] == 2)
					<div class="button-red" v-on:click="leave({{$data["activity"]["activity_id"]}})">
						<p>我要请假</p>
					</div>
				@elseif($data["pay_status"] == 3)
					<div class="button-red">
						<p>已请假</p>
					</div>
				@endif
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