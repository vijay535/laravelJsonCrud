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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::get('/','JsonController@fetchAll')->name('indexfile');
Route::get('add-records','JsonController@add')->name('jsonform');
Route::post('add','JsonController@store')->name('insert');
Route::get('edit/{id}','JsonController@edit')->name('jsonedit');
Route::post('update/{jsonid}','JsonController@update')->name('jsonupdate');
Route::get('delete/{jsonidd}','JsonController@destroy')->name('jsonidRemove');