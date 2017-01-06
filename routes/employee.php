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
    return view('employee.employee-workplan');
})->name('home');

Route::get('/employee-planning', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();
    return view('employee.employee-planning');
})->name('home');


Route::get('/employee-planning2', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();


    $employee = DB::table('employees')
        ->where('employees.id', Auth::user()->id)
        ->get();

    $manyWorktimePreferred = DB::table('worktime_preferred')
        ->join('category', 'category.id', '=', 'worktime_preferred.category_id')
        ->where('worktime_preferred.employee_id', $employee[0]->id)
        ->get();

    $manyAlldayFix = DB::table('allday_fix')
        ->join('category', 'category.id', '=', 'allday_fix.category_id')
        ->where('allday_fix.employee_id', $employee[0]->id)
        ->get();


    // anzuzeigendes Datum
    $today = new DateTime();

    // Montag vor dem Datum
    $monday = clone $today->modify('-' . ($today->format('N') - 1) . ' days');

    $date = array(
        clone $monday,
        clone $monday->add(new DateInterval('P1D')),
        clone $monday->add(new DateInterval('P1D')),
        clone $monday->add(new DateInterval('P1D')),
        clone $monday->add(new DateInterval('P1D')),
        clone $monday->add(new DateInterval('P1D')),
        clone $monday->add(new DateInterval('P1D'))
    );

    return view('employee.employee-planning2')
        ->with('manyWorktimePreferred', $manyWorktimePreferred)
        ->with('manyAlldayFix', $manyAlldayFix)
        ->with('date', $date);
})->name('home');


Route::get('/employee-account', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();
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

Route::post('/weekBack', 'WeekController@back');
Route::post('/weekNext', 'WeekController@next');
Route::post('/weekToday', 'WeekController@today');


