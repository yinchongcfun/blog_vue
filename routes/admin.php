<?php
Route::group(['prefix' => 'api','namespace'=>'admin'], function () {
    //根据ID获取攻略信息
    Route::post('checknews', [ 'uses' => 'NewsController@checkNews', 'as' => 'news.checknews' ]);
    //保存攻略模块
    Route::post('addnews', [ 'uses' => 'NewsController@addNews', 'as' => 'news.addnews' ]);
});