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

    Route::get('list', ['uses' => 'IndexController@list', 'as' => 'blog.list']);

    Route::get('category', ['uses' => 'IndexController@category', 'as' => 'blog.category']);

    Route::get('tag', ['uses' => 'IndexController@tag', 'as' => 'blog.tag']);
});