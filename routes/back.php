<?php

/*
  |--------------------------------------------------------------------------
  | Back Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

//登录
Route::view('login', 'Back.Login.login');
Route::post('login/login', 'LoginController@login');
//首页
Route::get('/', 'AdminController@index');
//用户
Route::resource('user','AdminUserController');