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


//Route::get('/createEmployee', 'PagesController@createEmployee');
//Route::get('createCatalog', 'PagesController@createCatalog');
//Route::get('/createFeedback', 'PagesController@createFeedback');

//Route::resource('/employees', 'EmployeesController');
//Route::resource('/catalog', 'CatalogController');
//Route::resource('/feedback', 'FeedbackController');
//Route::get('/donationCatalog','DonorsCatalogController@donationCatalog');
//Route::get('/shopCatalog','DonorsCatalogController@shopCatalog');





Route::get('/', 'PagesController@index');
Route::get('/indexUser', 'PagesController@indexUser');
Route::get('/indexAC', 'PagesController@indexAC');
Route::get('/indexPD', 'PagesController@indexPD');
Route::get('/indexAdmin', 'PagesController@indexAdmin');

Route::get('/createApplicant', 'PagesController@createApplicant');
Route::get('/createDonor', 'PagesController@createDonor');

Route::resource('/applicants', 'ApplicantsController');
//Route::resource('/donors', 'DonorsController');
Route::resource('/A_password', 'DonorsPasswordController');
Route::resource('/status', 'DonorsStatusController');

Route::resource('/activity_coordinators', 'ActivityCoordinatorsController');
Route::resource('/AC_password', 'ActivityCoordinatorsPasswordController');
Route::resource('/program_directors', 'ProgramDirectorsController');
Route::resource('/PD_password', 'ProgramDirectorsPasswordController');






Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('admin')->group(function() {
  Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::resource('/feedback', 'FeedbacksController');
  Route::resource('/catalog', 'CatalogController');
  Route::get('createCatalog', 'AdminController@createCatalog');
  Route::resource('/employees', 'EmployeesController');
  Route::get('/createEmployee', 'AdminController@createEmployee');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

Route::prefix('donor')->group(function() {
  Route::get('/login','DonorAuth\DonorLoginController@showLoginForm')->name('donor.login');
  Route::post('/login','DonorAuth\DonorLoginController@login')->name('donor.login.submit');


  Route::resource('/donors', 'DonorsController');
  Route::get('/createFeedback', 'FeedbacksController@create');
  Route::get('/donationCatalog','DonorsCatalogController@donationCatalog');
  Route::get('/shopCatalog','DonorsCatalogController@shopCatalog');
  Route::get('/', 'DonorController@index')->name('donor.dashboard');
  });
