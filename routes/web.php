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

Route::get('/', 'PagesController@index');
Route::get('/indexUser', 'PagesController@indexUser');
Route::get('/indexAC', 'PagesController@indexAC');
Route::get('/indexPD', 'PagesController@indexPD');
Route::get('/indexAdmin', 'PagesController@indexAdmin');
Route::get('/createApplicant', 'PagesController@createApplicant');
Route::get('/createDonor', 'PagesController@createDonor');
Route::get('/createEmployee', 'PagesController@createEmployee');
Route::resource('/applicants', 'ApplicantsController');
Route::resource('/donors', 'DonorsController');
Route::resource('/A_password', 'DonorsPasswordController');
Route::resource('/status', 'DonorsStatusController');
Route::resource('/employees', 'EmployeesController');
Route::resource('/activity_coordinators', 'ActivityCoordinatorsController');
Route::resource('/AC_password', 'ActivityCoordinatorsPasswordController');
Route::resource('/program_directors', 'ProgramDirectorsController');
Route::resource('/PD_password', 'ProgramDirectorsPasswordController');
