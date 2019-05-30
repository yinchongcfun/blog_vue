<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
include_once 'admin.php';

Route::group(['namespace' => 'Admin','prefix'=>'admin'], function () {

    Route::get('index', ['uses' => 'IndexController@index', 'as' => 'admin.index']);

    Route::post('gethtml', ['uses' => 'IndexController@getHtml', 'as' => 'admin.gethtml']);

    Route::get('edit', ['uses' => 'IndexController@edit', 'as' => 'admin.edit']);
});
