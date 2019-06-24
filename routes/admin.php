<?php

Route::group(['namespace' => 'Admin'], function () {
        Route::get('login', 'AuthController@login')->name('login');
        Route::post('register', 'AuthController@register');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
});

Route::group(['middleware' => 'auth:admin','namespace' => 'Admin'], function () {
    //文章添加
    Route::get('add', ['uses' => 'IndexController@add', 'as' => 'admin.add']);
    //文章编辑
    Route::get('edit', ['uses' => 'IndexController@edit', 'as' => 'admin.edit']);
});

