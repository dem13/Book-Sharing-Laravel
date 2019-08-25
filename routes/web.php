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

Route::get('/', 'BookController@list');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::name('book.')->group(function(){
	Route::get('book/{id}', 'BookController@show')->where(['id' => '[0-9]+'])->name('show');
	Route::get('book/list', 'BookController@list')->name('list');
	
	Route::get('book/add', 'BookController@add')->name('add');
	Route::post('book', 'BookController@store')->name('store');
});
