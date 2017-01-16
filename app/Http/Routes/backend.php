<?php
/* 后台首页 */
Route::get('index/', [
    'as'   => 'backend.index.index',
    'uses' => 'IndexController@index',
]);

Route::get('indexContent/', [
    'as'   => 'backend.index.indexContent',
    'uses' => 'IndexController@indexContent',
]);

/* 菜单管理模块 */
Route::resource('menu', 'MenuController');

/* 管理员管理模块 */
Route::resource("user", 'UserController');

/* 角色管理模块 */
Route::get('role/permission/{id}', [
    'as'   => 'backend.role.permission',
    'uses' => 'RoleController@permission',
]);
Route::post('role/associatePermission', [
    'as'   => 'backend.role.associate.permission',
    'uses' => 'RoleController@associatePermission',
]);
Route::resource("role", 'RoleController');

/* 权限管理模块 */
Route::get('permission/associate/{id}', [
    'as'   => 'backend.permission.associate',
    'uses' => 'PermissionController@associate',
]);
Route::post('permission/associateMenus', [
    'as'   => 'backend.permission.associate.menus',
    'uses' => 'PermissionController@associateMenus',
]);
Route::post('permission/associateActions', [
    'as'   => 'backend.permission.associate.actions',
    'uses' => 'PermissionController@associateActions',
]);
Route::resource("permission", 'PermissionController');

/* 操作管理模块 */
Route::resource('action', 'ActionController');

/* Ueditor模块 */
Route::any('ueditor/server', [
    'as' => 'backend.ueditor.server',
    'uses' => 'UeditorController@server',
]);

/* 上传图片模块 */
Route::post('common/uploadImage', [
    'as' => 'backend.common.uploadImage',
    'uses' => 'CommonController@uploadImage',
]);

/************************************************vmeets************************************************/
/* 活动模块 */
Route::get('activity/viewJoinCustomer/{id}', [
    'as' => 'backend.activity.viewJoinCustomer',
    'uses' => 'ActivityController@viewJoinCustomer',
]);

Route::get('activity/cancel/{id}', [
    'as' => 'backend.activity.cancel',
    'uses' => 'ActivityController@cancel',
]);

Route::resource('activity', 'ActivityController');

/* 用户模块 */
Route::get('customer/viewMovieLike/{id}', [
    'as' => 'backend.customer.viewMovieLike',
    'uses' => 'CustomerController@viewMovieLike',
]);
Route::get('customer/viewActivityJoin/{id}', [
    'as' => 'backend.customer.viewActivityJoin',
    'uses' => 'CustomerController@viewActivityJoin',
]);
Route::get('customer/viewScoreRecord/{id}', [
    'as' => 'backend.customer.viewScoreRecord',
    'uses' => 'CustomerController@viewScoreRecord',
]);
Route::resource('customer', 'CustomerController');

/* 发起人模块 */
Route::get('sponsor/viewEventList/{id}', [
    'as' => 'backend.sponsor.viewEventList',
    'uses' => 'SponsorController@viewEventList',
]);
Route::get('sponsor/enable/{id}', [
    'as' => 'backend.sponsor.enable',
    'uses' => 'SponsorController@enable',
]);
Route::get('sponsor/disable/{id}', [
    'as' => 'backend.sponsor.disable',
    'uses' => 'SponsorController@disable',
]);
Route::resource('sponsor', 'SponsorController');

/* 发起人审核模块 */
Route::get('apply/viewDetail/{id}', [
    'as' => 'backend.apply.viewDetail',
    'uses' => 'ApplyController@viewDetail',
]);
Route::post('apply/approveApply', [
    'as' => 'backend.apply.approveApply',
    'uses' => 'ApplyController@approveApply',
]);
Route::post('apply/rejectApply', [
    'as' => 'backend.apply.rejectApply',
    'uses' => 'ApplyController@rejectApply',
]);
Route::resource('apply', 'ApplyController');

/* 发起人活动模块 */
Route::get('event/enable/{id}', [
    'as' => 'backend.event.enable',
    'uses' => 'EventController@enable',
]);
Route::get('event/preview/{id}', [
    'as'   => 'backend.event.preview',
    'uses' => 'EventController@preview',
]);
Route::get('event/cancel/{id}', [
    'as' => 'backend.event.cancel',
    'uses' => 'EventController@cancel',
]);
Route::resource('event', 'EventController');

/* 电影模块 */
Route::get('movie/viewLikeCustomer/{id}', [
    'as' => 'backend.movie.viewLikeCustomer',
    'uses' => 'MovieController@viewLikeCustomer',
]);
Route::get('movie/disable/{id}', [
    'as' => 'backend.movie.disable',
    'uses' => 'MovieController@disable',
]);
Route::get('movie/enable/{id}', [
    'as' => 'backend.movie.enable',
    'uses' => 'MovieController@enable',
]);
Route::get('movie/viewActivityRecord/{id}', [
    'as' => 'backend.movie.viewActivityRecord',
    'uses' => 'MovieController@viewActivityRecord',
]);
Route::resource('movie', 'MovieController');

/* 建议模块 */
Route::get('suggestions/viewDescription/{id}', [
    'as' => 'backend.suggestions.viewDescription',
    'uses' => 'SuggestionsController@viewDescription',
]);
Route::resource('suggestions', 'SuggestionsController');

/* 积分规则模块 */
Route::resource('scoreRule', 'ScoreRuleController');