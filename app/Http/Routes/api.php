<?php

Route::get('api/test/{id}', [
    'as'   => 'api.test.index',
    'uses' => 'TestController@index',
]);

Route::get('api/ret/{id}', [
    'as'   => 'api.test.ret',
    'uses' => 'TestController@ret',
]);

Route::get('api/doubantest', [
    'as'   => 'api.test.doubantest',
    'uses' => 'TestController@doubantest',
]);