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

// ユーザー投稿分の詳細画面
Route::get('/user/{user}', 'UserController@show')->middleware('auth');

// 登録されたタグで詳細画面
Route::get('/tags/{tag}', 'TagController@show')->middleware('auth');

// 駅所在地で詳細画面
Route::get('/stations/{station}', 'StationController@show')->middleware('auth');

// 投稿に関するCRUD
Route::get('/', 'PostController@index');
Route::get('/posts', 'PostController@index');
Route::get('/posts/{post}', 'PostController@show');
Route::get('/post/create', 'PostController@create')->middleware('auth');
Route::post('/post/store', 'PostController@store')->middleware('auth');
Route::get('/post/edit/{post}', 'PostController@edit')->middleware('auth');
Route::post('/post/update/{post}', 'PostController@update')->middleware('auth');
Route::post('/post/delete/{post}', 'PostController@destroy')->middleware('auth');
// コメント検索機能
Route::post('/posts/search', 'PostController@search')->middleware('auth');

// コメントの投稿・保存
Route::post('/comment/store', 'CommentController@store')->middleware('auth');

// いいね機能の登録・取り消し
Route::post('/like/store/{post}', 'LikeController@store');
Route::post('/like/delete/{post}', 'LikeController@delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
