<?php

Route::group(['middleware' => 'auth:admin','namespace' => 'Admin'], function () {

        //登录
        Route::get('login', 'AuthController@login')->name('login');
        //注册
        Route::post('register', 'AuthController@register');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        //文章添加
        Route::get('add', ['uses' => 'IndexController@add', 'as' => 'admin.add']);
        //文章编辑
        Route::get('edit', ['uses' => 'IndexController@edit', 'as' => 'admin.edit']);
});



