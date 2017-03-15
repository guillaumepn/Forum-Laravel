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

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::get('thread/{id}', 'ThreadController@show');
// Post a thread
Route::post('post-thread', 'ThreadController@post');
Route::get('post-thread', 'HomeController@index');
// Post a comment
Route::post('post-comment', 'CommentController@post');
Route::get('post-comment', 'HomeController@index');


Auth::routes();

