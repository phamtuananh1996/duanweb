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
/*Route manager category*/
Route::group(['prefix'=>'admin'],function(){
	Route::get('category',array('as'=>'indexCategory','uses'=>'CategoryController@index'));
	Route::get('category/create',array('as'=>'getcreateCategory','uses'=>'CategoryController@getCreate'));
	Route::post('category/create',array('as'=>'postcreateCategory','uses'=>'CategoryController@postCreate'));
	Route::get('category/show/{category}',array('as'=>'showCategory','uses'=>'CategoryController@Show'));
	Route::post('category/show/{category}',array('as'=>'updateCategory','uses'=>'CategoryController@update'));
	Route::get('category/{id}',array('as'=>'destroyCategory','uses'=>'CategoryController@destroy'));
});


Route::get('/', function () {
	return view('/home');
});

Route::get('login','Auth\LoginController@getLogin');

Route::post('login','Auth\LoginController@postLogin')->name('login');
Route::post('logout', 'Auth\LoginController@postLogout')->name('logout');
Route::get('register', 'Auth\LoginController@getRegister');
Route::post('register', 'Auth\RegisterController@postRegister')->name('register');
Route::get('register/comfirm', 'Auth\RegisterController@registerComfirm');
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'ajax'], function() {
	Route::post('checkemail', 'Auth\RegisterController@ajaxCheckEmail');
	Route::post('checkusername', 'Auth\RegisterController@ajaxCheckUserName');
});

Route::group(['prefix' => 'users'],function(){
	Route::get('infodetail/{id}','UserController@info');
	Route::get('infoEdit','UserController@infoEdit');
	Route::post('infoEdit','UserController@editUser');
});
//tests route
Route::group(['prefix' => 'tests','middleware'=>'check_login'], function(){
	Route::get('/','TestController@index');
	Route::get('createst1','TestController@create');
	Route::post('createst1','TestController@store');
	Route::post('savetest', 'TestController@saveTest')->name('save_write_test');
	Route::get('show/{id}','TestController@show');
	Route::post('multi/savetest','MultiChoiceTestController@store');
});