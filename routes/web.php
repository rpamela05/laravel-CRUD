<?php

use Illuminate\Support\Facades\Route;

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
    return view('productos.index');
});

Route::post('/save','ProductoController@save')->name('save');
Route::get('/','ProductoController@list');
Route::delete('/delete/{id}','ProductoController@delete')->name('delete');
Route::get('/editform/{id}','ProductoController@editform')->name('editform');
Route::patch('/edit/{id}','ProductoController@edit')->name('edit');