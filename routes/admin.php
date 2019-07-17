<?php

Route::group(['namespace' => 'Admin'], function () {
        Route::post('login', 'AuthController@login')->name('login');
        Route::post('register', 'AuthController@register');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::get('sendemail', 'AuthController@sendEmail');
});

Route::group(['namespace' => 'Admin'], function () {
    //文章添加
    Route::get('phpinfo', ['uses' => 'IndexController@phpInfo', 'as' => 'admin.phpinfo']);
    //文章添加
    Route::post('add', ['uses' => 'IndexController@add', 'as' => 'admin.add']);
    //文章编辑
    Route::get('detail', ['uses' => 'IndexController@detail', 'as' => 'admin.detail']);
});

