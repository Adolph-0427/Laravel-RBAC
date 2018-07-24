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
//Route::get('user/create', 'AdminUserController@create');//创建用户视图
//Route::post('user/store', 'AdminUserController@store');//创建用户
//Route::get('user/index', 'AdminUserController@index');//用户列表
//Route::get('user/{uid}/edit', 'AdminUserController@edit');//用户编辑视图
//Route::put('user/{uid}','AdminUserController@update');//用户更新数据

Route::resource('user','AdminUserController');