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

Route::get('/', 'UserController@index');


Route::prefix('/user')->group(function () {
  Route::get('/page', 'UserController@page');
  Route::get('/add', 'UserController@add');
  Route::post('/submit', 'UserController@submit');
  Route::post('/update', 'UserController@update');
  Route::get('/edit/{user}', 'UserController@edit')->middleware('checkUserExists');
  Route::get('/delete/{user}', 'UserController@delete')->middleware('checkUserExists');
});

Route::get('/lang/{lang}', 'LangController@set');
