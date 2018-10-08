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

//Guest
Route::get('/', 'PagesController@index');
Route::get('/index', 'PagesController@index2');
Route::get('/createApplicant', 'Guest\ApplicantsController@create');
Route::post('/processApplicant', 'Guest\ApplicantsController@store');
Route::get('/createDonor', 'Guest\DonorsController@create');
Route::post('/processDonor', 'Guest\DonorsController@store');
Route::get('/shop', 'Guest\ShopController@shopCatalog');

//AddtoCart AddtoDonate Controller
Route::get('/donate/add-item/{id}', 'Donor\DonateController@addItem')->name('donate.addItem');
Route::get('/cart/add-item/{id}', 'Donor\CartController@addItem')->name('cart.addItem');
Route::resource('/donate', 'Donor\DonateController');
Route::resource('/cart', 'Donor\CartController');
Route::get('/donateCheckout/index','Donor\DonateController@checkout');

//Checkout Controller
Route::get('/checkout/index','Donor\CheckoutController@index')->name('checkout');
Route::get('/checkout/edit{id}','Donor\CheckoutController@edit');
Route::get('/checkout/confirm{id}','Donor\CheckoutController@confirm');
Route::get('/checkout','Donor\CartController@checkout')->name('dcheckout');

Auth::routes();
Route::prefix('donor')->group(function() {
  Route::get('/login','Donor\Auth\DonorLoginController@showLoginForm')->name('donor.login');
  Route::post('/login','Donor\Auth\DonorLoginController@login')->name('donor.login.submit');
  Route::post('/logout', 'Donor\Auth\DonorLoginController@donorLogout')->name('donor.logout');
  Route::post('/password/email','Donor\Auth\ForgotPasswordController@sendResetLinkEmail')->name('donor.password.email');
  Route::get('/password/reset','Donor\Auth\ForgotPasswordController@showLinkRequestForm')->name('donor.password.request');
  Route::post('/password/reset','Donor\Auth\ResetPasswordController@reset');
  Route::get('/password/reset/{token}','Donor\Auth\ResetPasswordController@showResetForm')->name('donor.password.reset');
  Route::resource('/donors', 'Donor\DonorsController');
  Route::resource('/donorPassword', 'Donor\DonorsPasswordController');
  Route::resource('/status', 'Donor\DonorsStatusController');
  Route::get('/createFeedback', 'Donor\FeedbacksController@create');
  Route::post('/sendFeedback', 'Donor\FeedbacksController@sendFeedback');
  Route::get('/donationCatalog','Donor\DonorsCatalogController@donationCatalog');
  Route::get('/shopCatalog','Donor\DonorsCatalogController@shopCatalog');
  Route::get('/donationhistory','Donor\HistoryController@donationHistory');
  Route::get('/transactionhistory','Donor\HistoryController@transactionHistory');
  Route::get('/', 'Donor\DonorController@index')->name('donor.dashboard');
});

Route::prefix('activitycoordinator')->group(function() {
  Route::get('/login','ActivityCoordinator\Auth\ACLoginController@showLoginForm')->name('ac.login');
  Route::post('/login','ActivityCoordinator\Auth\ACLoginController@login')->name('ac.login.submit');
  Route::post('/logout', 'ActivityCoordinator\Auth\ACLoginController@activitycoordinatorLogout')->name('activitycoordinator.logout');
  Route::post('/password/email','ActivityCoordinator\Auth\ForgotPasswordController@sendResetLinkEmail')->name('activitycoordinator.password.email');
  Route::get('/password/reset','ActivityCoordinator\Auth\ForgotPasswordController@showLinkRequestForm')->name('activitycoordinator.password.request');
  Route::post('/password/reset','ActivityCoordinator\Auth\ResetPasswordController@reset');
  Route::get('/password/reset/{token}','ActivityCoordinator\Auth\ResetPasswordController@showResetForm')->name('activitycoordinator.password.reset');
  Route::resource('/activity_coordinators', 'ActivityCoordinator\ActivityCoordinatorsController');
  Route::resource('/AC_password', 'ActivityCoordinator\ActivityCoordinatorsPasswordController');
  Route::resource('/applicants', 'ActivityCoordinator\ApplicantsController');
  Route::get('/sendSMS','ActivityCoordinator\TwilioController@index');
  Route::post('/sendMessage','ActivityCoordinator\TwilioController@sendMessageApplicant');
  Route::get('/', 'ActivityCoordinator\ActivityCoordinatorController@index')->name('ac.dashboard');
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
  Route::post('/sendMessage-D','ProgramDirector\TwilioController@sendMessageDonor');
  Route::post('/sendMessage-v','ProgramDirector\TwilioController@sendMessageVolunteer');
  Route::get('/donationhistory', 'ProgramDirector\DonationHistoryController@donationHistory');
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
