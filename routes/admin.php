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
    //添加音乐信息
    Route::post('addmusic', ['uses' => 'IndexController@addMusic', 'as' => 'admin.addmusic']);
    //上传音乐
    Route::post('uploadmusic', ['uses' => 'IndexController@uploadMusic', 'as' => 'blog.uploadmusic']);
    //文章编辑
    Route::get('detail', ['uses' => 'IndexController@detail', 'as' => 'admin.detail']);
    //删除文章
    Route::get('delete', ['uses' => 'IndexController@delete', 'as' => 'admin.delete']);
    //设置热门
    Route::get('sethot', ['uses' => 'IndexController@setHot', 'as' => 'admin.sethot']);
    //上传图片
    Route::match([ 'get', 'post' ],'qiniutoken', [ 'uses' => 'QiniuController@uploadtoken', 'as' => 'qiniu.token' ]);
});

