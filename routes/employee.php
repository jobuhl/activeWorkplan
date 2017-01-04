<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();

    //dd($users);

    return view('employee.home');
})->name('home');

Route::get('/employee-workplan', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();

    //dd($users);

    return view('employee.employee-workplan');
})->name('home');

Route::get('/employee-planning', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();

    //dd($users);

    return view('employee.employee-planning');
})->name('home');

Route::get('/employee-account', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();

    //dd($users);

    return view('employee.employee-account');
})->name('home');

Route::get('/contact', function () {
    return view('employee.contact');
});

Route::get('/impressum', function () {
    return view('employee.impressum');
});

Route::get('/protection', function () {
    return view('employee.protection');
});

