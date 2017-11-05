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

Route::get('/', function () {
    return view('/pages/welcome');
});

Route::get('/start', 'TasksController@create');
Route::get('/app', 'TasksController@index');
Route::get('/show', 'TasksController@secIndex');

Route::post('/start', 'TasksController@store');

Route::put('/app/{id}', 'TasksController@update');

Route::delete('/app/{id}', 'TasksController@destroy');
