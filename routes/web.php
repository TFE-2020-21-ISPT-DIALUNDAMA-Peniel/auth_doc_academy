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

// Route::get("/papa",function(){
// 		return view('test');
// 		// $return null;
// 	});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/','AccueilController')->only('index','store');

// Route::post('/','AccueilController@show')->name('show_document');
Route::get('/{document}','AccueilController@show_document')->name('show_document');





