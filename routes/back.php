<?php

/*
  |--------------------------------------------------------------------------
  | Back Routes
  |--------------------------------------------------------------------------
  |
 */

//登录
Route::view('login', 'Back.Login.login');
Route::post('login/login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');
//首页
Route::get('/', 'AdminController@index');
//用户
Route::resource('user', 'AdminUserController');
//文章
Route::resource('articles', 'ArticlesController');
//上传文章封面
Route::post('articles/articleCover','ArticlesController@articleCover');
//文章内容图片上传
Route::post('articles/articleEdit','ArticlesController@articleEdit');
