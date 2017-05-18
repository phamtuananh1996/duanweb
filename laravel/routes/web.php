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

Route::get('/', function () {
    return view('/home');
});

Route::get('login','Auth\LoginController@getLogin');

Route::post('login','Auth\LoginController@postLogin')->name('login');
Route::post('logout', 'Auth\LoginController@postLogout')->name('logout');
Route::get('register', 'Auth\LoginController@getRegister');
Route::post('register', 'Auth\RegisterController@postRegister')->name('register');
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'ajax'], function() {
    Route::post('checkemail', 'Auth\RegisterController@ajaxCheckEmail');
    Route::post('checkusername', 'Auth\RegisterController@ajaxCheckUserName');
});