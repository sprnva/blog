<?php

/**
 * --------------------------------------------------------------------------
 * Routes
 * --------------------------------------------------------------------------
 * 
 * Here is where you can register routes for your application.
 * Now create something great!
 * 
 */

use App\Core\Routing\Route;

Route::get('/', ['WelcomeController@index']);
Route::get('/home', ['WelcomeController@home', ['auth']]);

Route::get('/{id}', ['BlogController@detail']);

Route::group(['prefix' => 'article', 'middleware' => ['auth']], function () {
    Route::get('/', ['BlogController@index']);
    Route::post('/add', ['BlogController@store']);
    Route::get('/edit/{id}', ['BlogController@edit']);
    Route::post('/update', ['BlogController@update']);
    Route::post('/delete', ['BlogController@deleteItem']);
});

Route::get('/test', function () {
    dd(Route::uriCollection());
});