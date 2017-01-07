<?php

/* --------------------------- WORKPLAN ------------------------------- */
Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();

    return redirect('/employee/employee-workplan');
})->name('home');


Route::get('/employee-workplan', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();

    $thisEmployee = oneEmployee(Auth::user()->id);

    $manyTimeEvent = timeEventOfEmployee($thisEmployee->id);

    $manyWorktimeEvent = worktimeFixOfEmployee($thisEmployee->id);

    $manyAlldayEvent = alldayEventOfEmployee($thisEmployee->id);

    $today = new DateTime();

    $monday = getMondayBeforeDay($today);

    $week = getWeekArray($monday);

    return view('employee.employee-workplan')
        ->with('manyTimeEvent', $manyTimeEvent)
        ->with('manyWorktimeEvent', $manyWorktimeEvent)
        ->with('manyAlldayEvent', $manyAlldayEvent)
        ->with('week', $week);
})->name('home');


/* --------------------------- PLANNING ------------------------------- */

Route::get('/employee-planning', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();

    $thisEmployee = oneEmployee(Auth::user()->id);

    $manyTimeEvent = timeEventOfEmployee($thisEmployee->id);

    $manyAlldayEvent = alldayEventOfEmployee($thisEmployee->id);

    $today = new DateTime();

    $monday = getMondayBeforeDay($today);

    $week = getWeekArray($monday);


    return view('employee.employee-planning')
        ->with('manyTimeEvent', $manyTimeEvent)
        ->with('manyAlldayEvent', $manyAlldayEvent)
        ->with('week', $week);
})->name('home');


/* --------------------------- ACCOUNT ------------------------------- */

Route::get('/employee-account', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();

    $thisEmployee = oneEmployee(Auth::user()->id);

    $thisRetailStore = thisRetailStore($thisEmployee->retail_store_id);

    $company = oneCompany($thisRetailStore->company_id);

    $address = oneAddress($thisRetailStore->address_id);

    return view('employee.employee-account')
        ->with('thisEmployee', $thisEmployee)
        ->with('company', $company)
        ->with('thisRetailStore', $thisRetailStore)
        ->with('address', $address);
})->name('home');


/* --------------------------- Formulare ------------------------------- */

Route::post('/weekBackEmpPlan', 'WeekController@backEmpPlan');
Route::post('/weekNextEmpPlan', 'WeekController@nextEmpPlan');
Route::post('/weekTodayEmpPlan', 'WeekController@todayEmpPlan');

Route::post('/weekBackEmpWork', 'WeekController@backEmpWork');
Route::post('/weekNextEmpWork', 'WeekController@nextEmpWork');
Route::post('/weekTodayEmpWork', 'WeekController@todayEmpWork');


/* --------------------------- FOOTER ------------------------------- */

Route::get('/contact', function () {
    return view('employee.contact');
});

Route::get('/impressum', function () {
    return view('employee.impressum');
});

Route::get('/protection', function () {
    return view('employee.protection');
});





