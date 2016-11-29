<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/api/v1/flight/{id?}', 'Flights@index');
Route::post('/api/v1/flight', 'Flights@store');
Route::post('/api/v1/flight/{id}', 'Flights@update');
Route::delete('/api/v1/flight/{id}', 'Flights@destroy');