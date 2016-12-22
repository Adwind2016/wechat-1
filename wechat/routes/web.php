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
Route::group(['middleware'=>['web']],function(){
    Route::get('/users','UsersController@users');
    Route::get('/user/{openId}','UsersController@user');
    Route::get('/remark','UsersController@remark');
    Route::get('/image','MaterialController@image');
    Route::get('/audio','MaterialController@audio');
    Route::get('/materials','MaterialController@materials');
});

Route::any('/wechat', 'WechatController@serve');
Route::any('/test','WechatController@test');
