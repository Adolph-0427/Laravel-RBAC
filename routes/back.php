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
//用户授权
Route::get('user/authorizationGroup', 'AdminUserController@authorizationGroup');
Route::get('user/authorizationRole', 'AdminUserController@authorizationRole');
Route::post('user/storeAuthGroup', 'AdminUserController@storeAuthGroup');
Route::post('user/storeAuthRole', 'AdminUserController@storeAuthRole');
Route::resource('user', 'AdminUserController');
//文章
Route::resource('articles', 'ArticlesController');
//上传文章封面
Route::post('articles/articleCover', 'ArticlesController@articleCover');
//文章内容图片上传
Route::post('articles/articleEdit', 'ArticlesController@articleEdit');
//文章分类
Route::resource('articleCategory', 'ArticleCategoryController');
//用户组
//用户组授权
Route::get('group/authorizationRole', 'UserGroupController@authorizationRole');
Route::post('group/storeAuthRole', 'UserGroupController@storeAuthRole');
Route::resource('group', 'UserGroupController');
//角色
Route::resource('role', 'RoleController');
//菜单
Route::resource('menu', 'MenuController');


