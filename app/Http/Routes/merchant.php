<?php
/**
 * 首页
 */
Route::get('merchant/index', [
    'as'   => 'merchant.index.index',
    'uses' => 'IndexController@index',
]);

/**
 * 主页
 */
Route::get('merchant/home', [
    'as'   => 'merchant.index.home',
    'uses' => 'IndexController@home',
]);

/**
 * 登录
 */
Route::get('merchant/login', [
    'as'   => 'merchant.public.login',
    'uses' => 'PublicController@login',
]);


/**
 * 登录提交
 */
Route::get('merchant/doLogin', [
    'as'   => 'merchant.public.doLogin',
    'uses' => 'PublicController@doLogin',
]);

/**
 * 退出登录
 */
Route::get('merchant/logout', [
    'as'   => 'merchant.public.logout',
    'uses' => 'PublicController@logout',
]);

/**
 * 活动列表
 */
Route::get('merchant/event', [
    'as'   => 'merchant.index.event',
    'uses' => 'IndexController@event',
]);

/**
 * 活动参与列表
 */
Route::get('merchant/eventJoin/{id}', [
    'as'   => 'merchant.index.eventJoin',
    'uses' => 'IndexController@eventJoin',
]);

/**
 * 新增活动页面
 */
Route::get('merchant/addEvent', [
    'as'   => 'merchant.index.addEvent',
    'uses' => 'IndexController@addEvent',
]);

/**
 * 新增活动
 */
Route::post('merchant/addPost', [
    'as'   => 'merchant.index.addPost',
    'uses' => 'IndexController@addPost',
]);

/**
 * 新增活动页面
 */
Route::get('merchant/editEvent/{id}', [
    'as'   => 'merchant.index.editEvent',
    'uses' => 'IndexController@editEvent',
]);

/**
 * 编辑活动操作
 */
Route::put('merchant/editPost/{id}', [
    'as'   => 'merchant.index.editPost',
    'uses' => 'IndexController@editPost',
]);

/**
 * 活动预览
 */
Route::get('merchant/eventDetail/{id}', [
    'as'   => 'merchant.index.eventDetail',
    'uses' => 'IndexController@eventDetail',
]);

/**
 * 二维码窗口
 */
Route::get('merchant/eventPreview/{id}', [
    'as'   => 'merchant.index.eventPreview',
    'uses' => 'IndexController@eventPreview',
]);

/* Ueditor模块 */
Route::any('merchant/ueditor/server', [
    'as' => 'merchant.ueditor.server',
    'uses' => 'UeditorController@server',
]);

/* 上传图片模块 */
Route::post('merchant/common/uploadImage', [
    'as' => 'merchant.common.uploadImage',
    'uses' => 'CommonController@uploadImage',
]);




