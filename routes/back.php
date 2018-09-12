<?php

/*
  |--------------------------------------------------------------------------
  | Back Routes
  |--------------------------------------------------------------------------
  |
 */

//登录
Route::view('login', 'Back.Login.login')->name('login.index');
Route::post('login/login', 'LoginController@login')->name('login.login');
Route::get('logout', 'LoginController@logout')->name('login.logout');
//首页
Route::get('/', 'AdminController@index')->name('index');
//用户
//用户授权
Route::get('user/authorizationGroup', 'AdminUserController@authorizationGroup')->name('user.authorizationGroup');
Route::get('user/authorizationRole', 'AdminUserController@authorizationRole')->name('user.authorizationRole');
Route::post('user/storeAuthGroup', 'AdminUserController@storeAuthGroup')->name('user.storeAuthGroup');
Route::post('user/storeAuthRole', 'AdminUserController@storeAuthRole')->name('user.storeAuthRole');
Route::resource('user', 'AdminUserController');
//文章
Route::resource('articles', 'ArticlesController');
//上传文章封面
Route::post('articles/articleCover', 'ArticlesController@articleCover')->name('articles.articleCover');
//文章内容图片上传
Route::post('articles/articleEdit', 'ArticlesController@articleEdit')->name('articles.articleEdit');
//文章分类
Route::resource('articleCategory', 'ArticleCategoryController');
//用户组
//用户组授权
Route::get('group/authorizationRole', 'UserGroupController@authorizationRole')->name('group.authorizationRole');
Route::post('group/storeAuthRole', 'UserGroupController@storeAuthRole')->name('group.storeAuthRole');
Route::resource('group', 'UserGroupController');
//角色
Route::resource('role', 'RoleController');
//菜单
Route::resource('menu', 'MenuController');
//访问授权
Route::get('access/index','AccessController@index');
