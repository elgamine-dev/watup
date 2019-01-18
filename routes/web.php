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

Route::post('/signin', 'Auth\LoginController@sendSignInLink')->name('signin');
Route::get('/autologin', 'Auth\LoginController@autologin')->name('autologin');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/users', 'HomeController@users')->name('users');
Route::get('/feelings', 'HomeController@feelings')->name('feelings');
Route::get('/options', 'HomeController@options')->name('options');

Route::get('/browser/{user}', 'HeyController@browser')->name('browser');
Route::get('/profile/{user?}', 'HomeController@profile')->name('profile');
Route::get('/hey/{feeling}/{vote}', 'HeyController@vote')->name('hey');


Route::group(['prefix'=>'options'], function(){
    Route::post('/', 'OptionController@post')->name('options.post');
    Route::put('/', 'OptionController@put')->name('options.put');
});

