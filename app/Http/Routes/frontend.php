<?php
/**
 * 搜索页
 */
Route::get('search/', [
    'as'   => 'frontend.index.search',
    'uses' => 'IndexController@index',
]);
/**
 * 首页分页
 */
Route::get('indexForPage/', [
    'as'   => 'frontend.index.indexForPage',
    'uses' => 'IndexController@indexForPage',
]);
/**
 * 结果页
 */
Route::get('result/{q}', [
    'as'   => 'frontend.index.movieList',
    'uses' => 'IndexController@movieList',
]);

/**
 * 电影订单请假页
 */
Route::get('activityLeavePage/{id}', [
    'as'   => 'frontend.index.activityLeavePage',
    'uses' => 'IndexController@activityLeavePage',
]);

/**
 * 活动订单请假页
 */
Route::get('eventLeavePage/{id}', [
    'as'   => 'frontend.event.eventLeavePage',
    'uses' => 'EventController@eventLeavePage',
]);

/**
 * 活动订单取消报名页
 */
Route::get('eventCancelPage/{id}', [
    'as'   => 'frontend.event.eventCancelPage',
    'uses' => 'EventController@eventCancelPage',
]);

/**
 * 分页结果页
 */
Route::get('getMovieListByPage', [
    'as'   => 'frontend.index.getMovieListByPage',
    'uses' => 'IndexController@getMovieListByPage',
]);

/**
 * 添加电影
 */
Route::get('addMovie', [
    'as'   => 'frontend.index.addMovie',
    'uses' => 'IndexController@addMovie',
]);

/**
 * 占座电影
 */
Route::get('likeMovie', [
    'as'   => 'frontend.index.likeMovie',
    'uses' => 'IndexController@likeMovie',
]);

/**
 * 电影详情页
 */
Route::get('movieInfo/{id}', [
    'as'   => 'frontend.index.movieInfo',
    'uses' => 'IndexController@movieInfo',
]);

/**
 * 报名活动
 */
Route::get('joinActivity', [
    'as'   => 'frontend.index.joinActivity',
    'uses' => 'IndexController@joinActivity',
]);
/**
 * 重新选择是否参与活动
 */
Route::get('confirmChoose', [
    'as'   => 'frontend.index.confirmChoose',
    'uses' => 'IndexController@confirmChoose',
]);
/**
 * 个人中心--我占座的
 */
Route::get('myLike', [
    'as'   => 'frontend.userCenter.myLike',
    'uses' => 'UserCenterController@myLike',
]);

/**
 * 个人中心--我占座的（分页）
 */
Route::get('myLikeForPage', [
    'as'   => 'frontend.userCenter.myLikeForPage',
    'uses' => 'UserCenterController@myLikeForPage',
]);

/**
 * 个人中心--我付款的
 */
Route::get('myPay', [
    'as'   => 'frontend.userCenter.myPay',
    'uses' => 'UserCenterController@myPay',
]);

/**
 * 个人中心--我付款的（分页）
 */
Route::get('myPayForPage', [
    'as'   => 'frontend.userCenter.myPayForPage',
    'uses' => 'UserCenterController@myPayForPage',
]);

/**
 * 个人中心--我的资料
 */
Route::get('myInfo', [
    'as'   => 'frontend.userCenter.myInfo',
    'uses' => 'UserCenterController@myInfo',
]);

/**
 * 个人中心--更新资料
 */
Route::get('updateInfo', [
    'as'   => 'frontend.userCenter.updateInfo',
    'uses' => 'UserCenterController@updateInfo',
]);

/**
 * 报名成功页
 */
Route::get('joinSuccess/{activityId}', [
    'as'   => 'frontend.index.joinSuccess',
    'uses' => 'IndexController@joinSuccess',
]);

/**
 * 报名成功页-event
 */
Route::get('eventJoinSuccess/{eventId}', [
    'as'   => 'frontend.userCenter.eventJoinSuccess',
    'uses' => 'UserCenterController@eventJoinSuccess',
]);

/**
 * 微信首页
 */
Route::any('wechat/serve', [
    'as'   => 'frontend.wechat.serve',
    'uses' => 'WechatController@serve',
]);

/**
 * 微信授权回掉
 */
Route::get('wechat/oauthCallback', [
    'as'   => 'frontend.wechat.oauthCallback',
    'uses' => 'WechatController@oauthCallback',
]);

/**
 * 微信支付成功页面
 */
Route::get('wechat/pay/success',[
    'as'   => 'frontend.wechat.paySuccess',
    'uses' => 'WechatController@paySuccess'
]);

/**
 * 微信支付--event
 */
Route::get('wechat/eventPay/{id}', [
    'as'   => 'frontend.wechat.eventPay',
    'uses' => 'WechatController@eventPay',
]);

/**
 * 微信支付回调--event
 */
Route::post('wechat/eventHandlePay/',[
    'as'   => 'frontend.wechat.eventHandlePay',
    'uses' => 'WechatController@eventHandlePay'
]);

/**
 * 微信支付
 */
Route::get('wechat/pay/{id}', [
    'as'   => 'frontend.wechat.pay',
    'uses' => 'WechatController@pay',
]);

/**
 * 微信支付回调
 */
Route::post('wechat/handlePay/',[
    'as'   => 'frontend.wechat.handlePay',
    'uses' => 'WechatController@handlePay'
]);

/**
 * 支付宝支付页面
 */
Route::get('alipay/page',[
    'as'   => 'frontend.alipay.page',
    'uses' => 'AlipayController@page'
]);

/**
 * 支付宝支付
 */
Route::get('alipay/pay',[
    'as'   => 'frontend.alipay.pay',
    'uses' => 'AlipayController@pay'
]);

/**
 * 支付宝支付回掉
 */
Route::post('alipay/handlePay',[
    'as'   => 'frontend.alipay.handlePay',
    'uses' => 'AlipayController@handlePay'
]);

/**
 * 申请请假
 */
Route::get('leave/{activityId}',[
    'as'   => 'frontend.index.leave',
    'uses' => 'IndexController@leave'
]);

/**
 * 拍砖
 */
Route::get('suggestion',[
    'as'   => 'frontend.index.suggestion',
    'uses' => 'IndexController@suggestion'
]);

/**
 * 拍砖提交
 */
Route::get('goSuggestion',[
    'as'   => 'frontend.index.goSuggestion',
    'uses' => 'IndexController@goSuggestion'
]);

/**
 * 活动列表
 */
Route::get('eventList',[
    'as'   => 'frontend.event.eventList',
    'uses' => 'EventController@eventList'
]);

/**
 * 活动列表--分页
 */
Route::get('eventListForPage',[
    'as'   => 'frontend.event.eventListForPage',
    'uses' => 'EventController@eventListForPage'
]);

/**
 * 活动详情
 */
Route::get('eventDetail/{id}',[
    'as'   => 'frontend.event.eventDetail',
    'uses' => 'EventController@eventDetail'
]);

/**
 * 报名活动问卷
 */
Route::get('joinEventPage/{id}',[
    'as'   => 'frontend.event.joinEventPage',
    'uses' => 'EventController@joinEventPage'
]);

/**
 * 我的信用记录
 */
Route::get('myScoreRecord',[
    'as'   => 'frontend.userCenter.myScoreRecord',
    'uses' => 'UserCenterController@myScoreRecord'
]);

/**
 * 申请成为发起人页面
 */
Route::get('applyPage',[
    'as'   => 'frontend.userCenter.applyPage',
    'uses' => 'UserCenterController@applyPage'
]);

/**
 * 申请成为发起人
 */
Route::get('applySubmit',[
    'as'   => 'frontend.userCenter.applySubmit',
    'uses' => 'UserCenterController@applySubmit'
]);

/**
 * 查看拒绝理由
 */
Route::get('viewRejectReason/{id}',[
    'as'   => 'frontend.userCenter.viewRejectReason',
    'uses' => 'UserCenterController@viewRejectReason'
]);

/**
 * 报名活动
 */
Route::get('joinEvent/',[
    'as'   => 'frontend.event.joinEvent',
    'uses' => 'EventController@joinEvent'
]);

/**
 * 我发起的活动
 */
Route::get('myCreateEvent',[
    'as'   => 'frontend.userCenter.myCreateEvent',
    'uses' => 'UserCenterController@myCreateEvent'
]);

/**
 * 我发起的活动--查看评论
 */
Route::get('viewMyCreateActivityComment/{id}',[
    'as'   => 'frontend.userCenter.viewMyCreateActivityComment',
    'uses' => 'UserCenterController@viewMyCreateActivityComment'
]);

/**
 * 我参加的活动
 */
Route::get('myJoinEventList',[
    'as'   => 'frontend.userCenter.myJoinEventList',
    'uses' => 'UserCenterController@myJoinEventList'
]);

/**
 * 评论电影页面
 */
Route::get('commentActivityPage/{id}',[
    'as'   => 'frontend.userCenter.commentActivityPage',
    'uses' => 'UserCenterController@commentActivityPage'
]);

/**
 * 评论活动页面
 */
Route::get('commentEventPage/{id}',[
    'as'   => 'frontend.userCenter.commentEventPage',
    'uses' => 'UserCenterController@commentEventPage'
]);

/**
 * 评论活动
 */
Route::get('commentActivity',[
    'as'   => 'frontend.userCenter.commentActivity',
    'uses' => 'UserCenterController@commentActivity'
]);

/**
 * 评论event
 */
Route::get('commentEvent',[
    'as'   => 'frontend.userCenter.commentEvent',
    'uses' => 'UserCenterController@commentEvent'
]);

/**
 * 活动签到页面
 */
Route::get('activitySignPage/{id}',[
    'as'   => 'frontend.userCenter.activitySignPage',
    'uses' => 'UserCenterController@activitySignPage'
]);

/**
 * 活动签到
 */
Route::get('activitySign',[
    'as'   => 'frontend.userCenter.activitySign',
    'uses' => 'UserCenterController@activitySign'
]);

/**
 * event签到页面
 */
Route::get('eventSignPage/{id}',[
    'as'   => 'frontend.userCenter.eventSignPage',
    'uses' => 'UserCenterController@eventSignPage'
]);

/**
 * event签到
 */
Route::get('eventSign',[
    'as'   => 'frontend.userCenter.eventSign',
    'uses' => 'UserCenterController@eventSign'
]);

/**
 * event取消报名
 */
Route::get('eventCancel',[
    'as'   => 'frontend.userCenter.eventCancel',
    'uses' => 'UserCenterController@eventCancel'
]);

/**
 * event请假
 */
Route::get('eventRefund',[
    'as'   => 'frontend.userCenter.eventRefund',
    'uses' => 'UserCenterController@eventRefund'
]);

/**
 * 查看我发布活动详情页
 */
Route::get('viewMyCreateEventDetail/{id}',[
    'as'   => 'frontend.userCenter.viewMyCreateEventDetail',
    'uses' => 'UserCenterController@viewMyCreateEventDetail'
]);

/**
 * 同意用户参加event
 */
Route::get('accessEventJoin',[
    'as'   => 'frontend.userCenter.accessEventJoin',
    'uses' => 'UserCenterController@accessEventJoin'
]);
/**
 * 拒绝用户参加event-页面
 */
Route::get('rejectEventJoinPage/{joinId}',[
    'as'   => 'frontend.userCenter.rejectEventJoinPage',
    'uses' => 'UserCenterController@rejectEventJoinPage'
]);
/**
 * 拒绝用户参加event
 */
Route::get('rejectEventJoin',[
    'as'   => 'frontend.userCenter.rejectEventJoin',
    'uses' => 'UserCenterController@rejectEventJoin'
]);

/**
 * 电影订单活动二维码
 */
Route::get('activityQrcode/{id}',[
    'as'   => 'frontend.userCenter.activityQrcode',
    'uses' => 'UserCenterController@activityQrcode'
]);
/**
 * 活动订单活动二维码
 */
Route::get('eventQrcode/{id}',[
    'as'   => 'frontend.userCenter.eventQrcode',
    'uses' => 'UserCenterController@eventQrcode'
]);
