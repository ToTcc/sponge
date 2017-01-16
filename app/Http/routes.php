<?php
Route::get('/', function () {
    return redirect('backend/index/');
});

/* 后台登录模块 */
Route::group(['namespace' => 'Auth'], function () {
    require_once __DIR__ . '/Routes/auth.php';
});

/* 接口管理模块 */
Route::group([
    'namespace'  => 'Api',
], function () {
    require_once __DIR__ . '/Routes/api.php';
});

/* 前端管理模块 */
Route::group([
    'namespace'  => 'Frontend',
    'middleware' => 'frontendCheckLogin',
], function () {
    require_once __DIR__ . '/Routes/frontend.php';
});

/* 商家管理模块 */
Route::group([
    'namespace'  => 'Merchant',
    'middleware' => 'merchantCheckLogin',
], function () {
    require_once __DIR__ . '/Routes/merchant.php';
});

/* 后台管理模块 */
Route::group([
    'prefix'     => 'backend',
    'namespace'  => 'Backend',
    'middleware' => ['authenticate', 'authorize', 'search'],
], function () {
    require_once __DIR__ . '/Routes/backend.php';
});


