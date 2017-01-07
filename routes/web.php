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

Route::get('/', function () {
    return view('welcome');
});

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



// ------------------------ general ------------------------
Route::get('/', function () {
    return redirect('/index');
});

Route::get('/index', function () {
    return view('general.index');
});

Route::get('/feature', function () {
    return view('general.feature');
});


// ------------------------ Footer ------------------------
Route::get('/contact', function () {
    return view('general.contact');
});

Route::get('/impressum', function () {
    return view('general.impressum');
});

Route::get('/protection', function () {
    return view('general.protection');
});



