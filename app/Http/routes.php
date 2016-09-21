<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.า
|
*/

Route::get('/', function () {
    return view('home.index');
});

Route::group(['middleware'=>['web']], function() {
	Route::get('/login',['as'=>'login','uses'=>'AuthController@login']);
	Route::post('/handlelogin',['as'=>'handlelogin','uses'=>'AuthController@handlelogin']);
	Route::get('/viewteacher',['as'=>'viewteacher','uses'=>'TeacherController@index']);
	Route::get('/create_teacher',['as'=>'create_teacher','uses'=>'TeacherController@create']);
	Route::resource('/register','RegisterController');
	Route::resource('/blog','BlogController');
	Route::resource('/ebook','EbookController');
	Route::resource('/forgetPass','ForgetPssController');
	
});




