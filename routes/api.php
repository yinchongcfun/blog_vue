<?php

use Illuminate\Http\Request;


Route::group(['namespace' => 'Api'], function () {

    Route::get('list', ['uses' => 'IndexController@list', 'as' => 'api.list']);

    Route::get('category', ['uses' => 'IndexController@category', 'as' => 'api.category']);

    Route::get('tag', ['uses' => 'IndexController@tag', 'as' => 'api.tag']);
});

//Route::group(['namespace' => 'Admin'], function () {
//
//    Route::post('login', 'AuthController@login');
//    Route::post('logout', 'AuthController@logout');
//    Route::post('refresh', 'AuthController@refresh');
//});
