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
//Route::resource('/feedback', 'FeedbackController');z
//Route::get('/donationCatalog','DonorsCatalogController@donationCatalog');
//Route::get('/shopCatalog','DonorsCatalogController@shopCatalog');
//Route::resource('/applicants', 'ApplicantsController');
//Route::resource('/donors', 'DonorsController');
//Route::resource('/donorPassword', 'DonorsPasswordController');
//Route::resource('/status', 'DonorsStatusController');
//Route::resource('/activity_coordinators', 'ActivityCoordinatorsController');
//Route::resource('/AC_password', 'ActivityCoordinatorsPasswordController');
//Route::resource('/program_directors', 'ProgramDirectorsController');
//Route::resource('/PD_password', 'ProgramDirectorsPasswordController');
//Route::get('/indexUser', 'PagesController@indexUser');
//Route::get('/indexAC', 'PagesController@indexAC');
//Route::get('/indexPD', 'PagesController@indexPD');
//Route::get('/indexAdmin', 'PagesController@indexAdmin');
//Route::get('/sms', 'PagesController@sms');
//Route:: post('/send_sms','TwilioTestController@testMessage');
//Route::get('/sms', function()
//{
    //return View::make('activity_coordinators.sms');
//});
//Route::get('/sms', 'PagesController@sms');
//Route:: post('/send_sms','TwilioTestController@testMessage');
//Route::get('/sms', function()
//{
    //return View::make('activity_coordinators.sms');
//});
//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PagesController@index');
Route::get('/index', 'PagesController@index2');

Route::get('/createApplicant', 'PagesController@createApplicant');
Route::get('/createDonor', 'PagesController@createDonor');

//Cart Controller
Route::resource('/cart', 'CartController');
Route::get('/cart/add-item/{id}', 'CartController@addItem')->name('cart.addItem');

Route::resource('/donate', 'DonateController');
Route::get('/donate/add-item/{id}', 'DonateController@addItem')->name('donate.addItem');

Auth::routes();
Route::prefix('donor')->group(function() {
  Route::get('/login','DonorAuth\DonorLoginController@showLoginForm')->name('donor.login');
  Route::post('/login','DonorAuth\DonorLoginController@login')->name('donor.login.submit');
  Route::post('/logout', 'DonorAuth\DonorLoginController@donorLogout')->name('donor.logout');
  Route::post('/password/email','DonorAuth\ForgotPasswordController@sendResetLinkEmail')->name('donor.password.email');
  Route::get('/password/reset','DonorAuth\ForgotPasswordController@showLinkRequestForm')->name('donor.password.request');
  Route::post('/password/reset','DonorAuth\ResetPasswordController@reset');
  Route::get('/password/reset/{token}','DonorAuth\ResetPasswordController@showResetForm')->name('donor.password.reset');
  Route::resource('/status', 'DonorsStatusController');
  Route::resource('/donorPassword', 'DonorsPasswordController');
  Route::resource('/donors', 'DonorsController');

  Route::get('/createFeedback', 'Donor\FeedbacksController@create');
  Route::post('/sendFeedback', 'Donor\FeedbacksController@sendFeedback');

  Route::get('/donationCatalog','DonorsCatalogController@donationCatalog');
  Route::get('/shopCatalog','DonorsCatalogController@shopCatalog');
  Route::get('/donorhistory','HistoryController@donorHistory');
  Route::get('/', 'DonorController@index')->name('donor.dashboard');
});

Route::prefix('activitycoordinator')->group(function() {
  Route::get('/login','ACAuth\ACLoginController@showLoginForm')->name('ac.login');
  Route::post('/login','ACAuth\ACLoginController@login')->name('ac.login.submit');
  Route::post('/logout', 'ACAuth\ACLoginController@activitycoordinatorLogout')->name('activitycoordinator.logout');
  Route::get('/sendSMS','TwilioController@index');
  Route::post('/sendMessage','TwilioController@sendMessageApplicant');
  Route::post('/password/email','ACAuth\ForgotPasswordController@sendResetLinkEmail')->name('activitycoordinator.password.email');
  Route::get('/password/reset','ACAuth\ForgotPasswordController@showLinkRequestForm')->name('activitycoordinator.password.request');
  Route::post('/password/reset','ACAuth\ResetPasswordController@reset');
  Route::get('/password/reset/{token}','ACAuth\ResetPasswordController@showResetForm')->name('activitycoordinator.password.reset');
  Route::resource('/AC_password', 'ActivityCoordinatorsPasswordController');
  Route::resource('/activity_coordinators', 'ActivityCoordinatorsController');
  Route::resource('/applicants', 'ApplicantsController');
  Route::get('/', 'ActivityCoordinatorController@index')->name('ac.dashboard');
});

Route::prefix('programdirector')->group(function() {
  Route::get('/login','ProgramDirector\Auth\PDLoginController@showLoginForm')->name('pd.login');
  Route::post('/login','ProgramDirector\Auth\PDLoginController@login')->name('pd.login.submit');
  Route::post('/logout', 'ProgramDirector\Auth\PDLoginController@programdirectorLogout')->name('programdirector.logout');
  Route::post('/password/email','ProgramDirector\Auth\ForgotPasswordController@sendResetLinkEmail')->name('programdirector.password.email');
  Route::get('/password/reset','ProgramDirector\Auth\ForgotPasswordController@showLinkRequestForm')->name('programdirector.password.request');
  Route::post('/password/reset','ProgramDirector\Auth\ResetPasswordController@reset');
  Route::get('/password/reset/{token}','ProgramDirector\Auth\ResetPasswordController@showResetForm')->name('programdirector.password.reset');
  Route::resource('/program_directors', 'ProgramDirector\ProgramDirectorsController');
  Route::resource('/PD_password', 'ProgramDirector\ProgramDirectorsPasswordController');
  Route::get('/sendSMS-D','ProgramDirector\TwilioController@indexDonor');
  Route::get('/sendSMS-V','ProgramDirector\TwilioController@indexVolunteer');
  Route::post('/sendMessage','ProgramDirector\TwilioController@sendMessageDonor');
  Route::post('/sendMessage','ProgramDirector\TwilioController@sendMessageVolunteer');
  Route::get('/donationhistory', 'ProgramDirector\HistoryController@donationHistory');
  Route::get('/transactionhistory', 'ProgramDirector\HistoryController@transactionHistory');
  Route::resource('/feedback', 'ProgramDirector\FeedbacksController');
  Route::get('/', 'ProgramDirector\ProgramDirectorController@index')->name('pd.dashboard');
});

Route::prefix('admin')->group(function() {
  Route::get('/login','Admin\Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login','Admin\Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::post('/logout', 'Admin\Auth\AdminLoginController@adminLogout')->name('admin.logout');
  Route::get('/auditlogs', 'Admin\AuditLogController@auditlogs');
  Route::resource('/catalog', 'Admin\CatalogController');
  Route::get('/manageshop', 'Admin\ManageCatalogController@manageShop');
  Route::get('/managedonation', 'Admin\ManageCatalogController@manageDonation');
  Route::get('createCatalog', 'Admin\AdminController@createCatalog');
  Route::resource('/employees', 'Admin\EmployeesController');
  Route::get('/createEmployee', 'Admin\AdminController@createEmployee');
  Route::get('/', 'Admin\AdminController@index')->name('admin.dashboard');
});

Route::get('/checkout','CartController@checkout');
Route::get('/checkout/edit{id}','CheckoutController@edit');
Route::get('/checkout/index','CheckoutController@index')->name('checkout');
Route::get('/checkout/confirm{id}','CheckoutController@confirm');
