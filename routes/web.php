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
    Route::get('/test1', 'IndexController@test');
    Route::get('/test2','Indexontroller@test2');
});

Route::group(['namespace' => 'Admin'], function () {
    Route::get('phpinfo', 'AuthController@phpinfo');
});