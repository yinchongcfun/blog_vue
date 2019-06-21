<?php

Route::group(['namespace' => 'Admin'], function () {

        Route::post('login', 'AuthController@login');
        Route::post('register', 'AuthController@register');
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
});


Route::group(['namespace' => 'Admin'], function () {

    Route::get('add', ['uses' => 'IndexController@add', 'as' => 'admin.add']);

    Route::post('gethtml', ['uses' => 'IndexController@getHtml', 'as' => 'admin.gethtml']);

    Route::get('edit', ['uses' => 'IndexController@edit', 'as' => 'admin.edit']);
});

