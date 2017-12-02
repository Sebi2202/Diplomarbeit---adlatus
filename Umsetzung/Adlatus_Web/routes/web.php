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
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('Dashboard');
Route::get('/password/email', 'DashboardController@email')->name('sendEmail');
Route::get('/dashboard/create_patient', 'PagesController@create');
Route::get('/dashboard/patient/{id}', 'PatientController@show');

Route::put('/password/reset', 'Auth\ForgotPasswordController@update');
Route::put('/dashboard/patient/{id}', 'PatientController@update');

Route::post('/dashboard/create_patient', 'PatientController@store');

