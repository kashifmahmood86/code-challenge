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

Route::get('/', "SearchController@index");
Route::get('/home', "SearchController@index");

Route::post('/search', "SearchController@search");

Route::get('/login', "Auth\LoginController@index");
Route::get('/sendloginrequest', "Auth\LoginController@sendloginrequest");
Route::get('/verifyauth', "Auth\AuthenticatorController@verifylogin");

Route::get('/detail/{type}/{id}', "SearchController@getdetail");