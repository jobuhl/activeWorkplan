<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});

Route::group(['prefix' => 'employee'], function () {
  Route::get('/login', 'EmployeeAuth\LoginController@showLoginForm');
  Route::post('/login', 'EmployeeAuth\LoginController@login');
  Route::post('/logout', 'EmployeeAuth\LoginController@logout');

  Route::post('/password/email', 'EmployeeAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'EmployeeAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'EmployeeAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'EmployeeAuth\ResetPasswordController@showResetForm');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/deleteAlldayEventAJAX/{eventId?}', 'EventController@deleteAlldayEventAJAX');
Route::get('/deleteTimeEventAJAX/{eventId?}', 'EventController@deleteTimeEventAJAX');
Route::get('/deleteWorktimeEventAJAX/{eventId?}', 'EventController@deleteWorktimeEventAJAX');



// ------------------------ guest ------------------------
Route::get('/', function () {
    return redirect('/guest/index');
});

Route::get('/guest/index', function () {
    return view('guest.index');
});

Route::get('/guest/feature', function () {
    return view('guest.feature');
});


// ------------------------ Footer ------------------------
Route::get('/guest/contact', function () {
    return view('guest.footer.contact');
});

Route::get('/guest/impressum', function () {
    return view('guest.footer.impressum');
});

Route::get('/guest/protection', function () {
    return view('guest.footer.protection');
});



