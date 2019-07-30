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

    Route::get('search', ['uses' => 'IndexController@search', 'as' => 'blog.search']);

    Route::get('comment', ['uses' => 'CommentController@comment', 'as' => 'blog.comment'])->middleware('comment');

    Route::get('replay', ['uses' => 'CommentController@replay', 'as' => 'blog.replay'])->middleware('comment');

    Route::get('star', ['uses' => 'CommentController@star', 'as' => 'blog.star']);

    Route::post('login', 'loginController@login')->name('login');

    Route::post('register', 'loginController@register');

    Route::post('sendemail', 'loginController@sendEmail');

});