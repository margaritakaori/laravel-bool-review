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




Auth::routes();
Route::get('/','ReviewController@index');

Route::get('/show/{id}','ReviewController@show')->name('show');


// ログインしている人だけがアクセスできるルーティンググループ

Route::group(['middleware' => 'auth'], function () {
    // GETはユーザがデータを要求する時
    Route::get('/review','ReviewController@create')->name('create');
    // POSTはユーザがサーバに渡す時
    Route::post('/review/store','ReviewController@store')->name('store');
});



Route::get('/home', 'HomeController@index')->name('home');
