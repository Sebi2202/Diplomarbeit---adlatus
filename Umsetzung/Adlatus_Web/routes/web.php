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
Route::get('/dashboard/patient/{id}', 'PagesController@index');
Route::get('/dashboard/patient/edit/{id}', 'PatientController@show');
Route::get('/dashboard/patient/calendar/{id}', 'PagesController@show');
Route::get('/dashboard/patient/calendar/tasks/{id}', 'TaskController@index');
Route::get('/dashboard/patient/calendar/{id}/{start}', 'PagesController@task');
Route::get('/dashboard/patient/calendar/{id}/{date}/{task_id}', 'PagesController@showTask');

Route::put('/password/reset', 'Auth\ForgotPasswordController@update');
Route::put('/dashboard/patient/edit/{id}', 'PatientController@update');

Route::put('/dashboard/patient/calendar/{id}/{date}/{task_id}', 'TaskController@update');

Route::post('/dashboard/create_patient', 'PatientController@store');
Route::post('/dashboard', 'Auth\LoginController@logout');
Route::post('/dashboard/patient/calendar/{id}/date', 'TaskController@store');

Route::delete('/dashboard/patient/calendar/{id}/{date}/{task_id}', 'TaskController@destroy');
Route::delete('/dashboard/patient/edit/{id}', 'PatientController@destroy');
