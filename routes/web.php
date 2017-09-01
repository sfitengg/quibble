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

/*
*   Login Routes
*/
Route::get('accounts/login',"Auth\LoginController@showLoginForm")->name("login");
Route::post('accounts/login',"Auth\LoginController@login");
Route::get('accounts/logout',"Auth\LoginController@logout");


Route::get('/', "HomeController@show")->name("home");