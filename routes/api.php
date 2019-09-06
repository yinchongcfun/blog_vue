<?php

Route::group(['namespace' => 'Api'], function () {

    Route::get('category', ['uses' => 'IndexController@category', 'as' => 'blog.category']);

    Route::get('tag', ['uses' => 'IndexController@tag', 'as' => 'blog.tag']);

    Route::post('uploadimg', ['uses' => 'IndexController@uploadImg', 'as' => 'blog.uploadimg']);
    //音乐列表
    Route::get('musiclist', ['uses' => 'IndexController@musicList', 'as' => 'blog.musiclist']);
});
