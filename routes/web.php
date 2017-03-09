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


Route::get('/', 'BookController@index');

Route::get('/addbook', 'BookController@create');

Route::get('/showbook/{$id}', 'BookController@show');

Route::post('/editbook/{$id}', 'BookController@edit');
*/


Route::resource('books', 'BookController');
