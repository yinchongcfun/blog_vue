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


Route::group(['namespace' => 'Web'], function () {

    Route::get('index', ['uses' => 'IndexController@list', 'as' => 'blog.index']);

    Route::get('detail', ['uses' => 'IndexController@detail', 'as' => 'blog.detail']);

});