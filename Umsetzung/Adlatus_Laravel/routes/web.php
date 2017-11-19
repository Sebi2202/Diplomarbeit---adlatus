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

Route::get('/', 'PagesController@showStart');
Route::get('/login', 'PagesController@showLogin');
Route::get('/registrierung', 'TherapeutController@create');
Route::get('/error', 'PagesController@error');

Route::post('/dashboard', 'LoginController@login');
Route::post('/registrierung', 'TherapeutController@store');

