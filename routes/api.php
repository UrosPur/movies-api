<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('api')->get('/movies', 'MoviesController@index')->name('movies');
Route::middleware('api')->get('/movies/{id}', 'MoviesController@show')->name('single-movie');
Route::middleware('api')->post('/movies', 'MoviesController@store')->name('store-movie');
Route::middleware('api')->put('/movies/{id}', 'MoviesController@update')->name('update-movie');
Route::middleware('api')->delete('/movies/{id}', 'MoviesController@destroy')->name('delete-movie');