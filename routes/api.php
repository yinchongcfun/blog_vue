<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'], function () {

    Route::get('list', ['uses' => 'IndexController@list', 'as' => 'api.list']);

    Route::get('category', ['uses' => 'IndexController@category', 'as' => 'api.category']);

    Route::get('tag', ['uses' => 'IndexController@tag', 'as' => 'api.tag']);
});