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


Route::get('/', 'infoController@index');
Route::get('/insert', 'infoController@insert');
Route::post('/creat' , 'infoController@creat_user') ;
Route::get('/{user}/update', 'infoController@update');
Route::patch('/edit/{user}', 'infoController@edit');
Route::delete('/delete/{user}' , 'infoController@delete') ;
