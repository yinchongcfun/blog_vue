<?php

Route::group(['namespace' => 'Admin','prefix'=>'admin'], function () {

    Route::get('add', ['uses' => 'IndexController@add', 'as' => 'admin.add']);

    Route::post('gethtml', ['uses' => 'IndexController@getHtml', 'as' => 'admin.gethtml']);

    Route::get('edit', ['uses' => 'IndexController@edit', 'as' => 'admin.edit']);
});