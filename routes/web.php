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

Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes();

Route::get('/home', 'UserController@index')->name('home');
Route::get('/profile', 'UserController@editProfile')->name('profile');
Route::post('/saveProfile', 'UserController@saveProfile')->name('saveProfile');
Route::post('/imageUpload', 'UserController@imageUpload')->name('imageUpload');
