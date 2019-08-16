<?php

Route::group(['namespace' => 'Api'], function () {

    Route::get('category', ['uses' => 'IndexController@category', 'as' => 'blog.category']);

    Route::get('tag', ['uses' => 'IndexController@tag', 'as' => 'blog.tag']);

    Route::get('uploadimg', ['uses' => 'IndexController@uploadImg', 'as' => 'blog.uploadimg']);
});
