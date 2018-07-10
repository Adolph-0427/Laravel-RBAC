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
Route::get('/', 'AdminController@index');
Route::view('login', 'Back.Login.login');
Route::post('login/login', 'LoginController@login');
