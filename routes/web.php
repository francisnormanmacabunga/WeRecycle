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



Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', 'PagesController@index');
Route::get('/index', 'PagesController@index2');

Route::get('/createApplicant', 'PagesController@createApplicant');
Route::get('/createDonor', 'PagesController@createDonor');

Route::get('/auditlogs', 'PagesController@auditlogs');






//Cart Controller
Route::resource('/cart', 'CartController');
Route::get('/cart/add-item/{id}', 'CartController@addItem')->name('cart.addItem');


Route::resource('/donate', 'DonateController');
Route::get('/donate/add-item/{id}', 'DonateController@addItem')->name('donate.addItem');





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
  Route::get('/createFeedback', 'FeedbacksController@create');
  Route::get('/donationCatalog','DonorsCatalogController@donationCatalog');
  Route::get('/shopCatalog','DonorsCatalogController@shopCatalog');
  Route::get('/', 'DonorController@index')->name('donor.dashboard');

  Route::get('/donorhistory','HistoryController@donorHistory');
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
    Route::get('/login','PDAuth\PDLoginController@showLoginForm')->name('pd.login');
    Route::post('/login','PDAuth\PDLoginController@login')->name('pd.login.submit');
    Route::post('/logout', 'PDAuth\PDLoginController@programdirectorLogout')->name('programdirector.logout');

    Route::get('/sendSMS-D','TwilioController@indexDonor');
    Route::get('/sendSMS-V','TwilioController@indexVolunteer');
    Route::post('/sendMessage','TwilioController@sendMessageDonor');
    Route::post('/sendMessage','TwilioController@sendMessageVolunteer');

    Route::post('/password/email','PDAuth\ForgotPasswordController@sendResetLinkEmail')->name('programdirector.password.email');
    Route::get('/password/reset','PDAuth\ForgotPasswordController@showLinkRequestForm')->name('programdirector.password.request');
    Route::post('/password/reset','PDAuth\ResetPasswordController@reset');
    Route::get('/password/reset/{token}','PDAuth\ResetPasswordController@showResetForm')->name('programdirector.password.reset');

    Route::resource('/feedback', 'FeedbacksController');
    Route::resource('/program_directors', 'ProgramDirectorsController');
    Route::resource('/PD_password', 'ProgramDirectorsPasswordController');

    Route::get('/', 'ProgramDirectorController@index')->name('pd.dashboard');

    Route::get('/donationhistory', 'HistoryController@donationHistory');
    Route::get('/transactionhistory', 'HistoryController@transactionHistory');



    });

Route::prefix('admin')->group(function() {
  Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::post('/logout', 'Auth\AdminLoginController@adminLogout')->name('admin.logout');
  Route::resource('/catalog', 'CatalogController');

  Route::get('/manageshop', 'ManageCatalogController@manageShop');
  Route::get('/managedonation', 'ManageCatalogController@manageDonation');

  Route::get('createCatalog', 'AdminController@createCatalog');
  Route::resource('/employees', 'EmployeesController');
  Route::get('/createEmployee', 'AdminController@createEmployee');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

  Route::get('/checkout','CartController@checkout');
