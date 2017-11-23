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
Route::get('/error', 'PagesController@error');
Route::get('/registrierung', 'TherapeutController@create');
Route::get('/forgot_password', 'PagesController@forgot');
Route::get('/dashboard/create_patient', 'PatientController@index');

Route::put('/forgot_password/{sozNr}', 'TherapeutController@update');

Route::post('/dashboard', 'LoginController@loginTherapeut');
Route::post('/registrierung', 'TherapeutController@store');
Route::post('/forgot_password', 'TherapeutController@continue');
Route::post('/dashboard/create_patient', ['before' => 'csrf', 'uses' => 'PatientController@store']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
