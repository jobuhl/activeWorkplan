<?php

/* --------------------------- WORKPLAN ------------------------------- */
Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();

    return redirect('/employee/workplan/' . (new DateTime())->format('d-m-Y'));
})->name('home');


Route::get('/workplan/{date}', function ($urlDate) {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();

    $thisEmployee = oneEmployee(Auth::user()->id);

    $week = getWeekArray($urlDate);

    $manyTimeEvent = timeEventOfEmployee($thisEmployee->id, $week);
    $manyAlldayEvent = alldayEventOfEmployee($thisEmployee->id, $week);


    return view('employee.workplan')
        ->with('manyTimeEvent', $manyTimeEvent)
        ->with('manyAlldayEvent', $manyAlldayEvent)
        ->with('thisEmployee',$thisEmployee)
        ->with('week', $week);
})->name('home');


/* --------------------------- PLANNING ------------------------------- */

Route::get('/planning/{date}', function ($urlDate) {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();

    $category = allCategory();

    $week = getWeekArray($urlDate);

    $thisEmployee = oneEmployee(Auth::user()->id);
    $manyTimeEvent = timeEventOfEmployee($thisEmployee->id, $week);
    $manyAlldayEvent = alldayEventOfEmployee($thisEmployee->id, $week);



    return view('employee.planning')
        ->with('manyTimeEvent', $manyTimeEvent)
        ->with('manyAlldayEvent', $manyAlldayEvent)
        ->with('category', $category)
        ->with('thisEmployee',$thisEmployee)
        ->with('week', $week);
})->name('home');


/* --------------------------- ACCOUNT ------------------------------- */

Route::get('/account/{date}', function ($urlDate) {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('employee')->user();

    $thisEmployee = oneEmployee(Auth::user()->id);
    $thisRetailStore = thisRetailStore($thisEmployee->retail_store_id);
    $company = oneCompany($thisRetailStore->company_id);
    $address = oneAddress($thisRetailStore->address_id);

    $week = getWeekArray($urlDate);

    return view('employee.account')
        ->with('thisEmployee', $thisEmployee)
        ->with('company', $company)
        ->with('thisRetailStore', $thisRetailStore)
        ->with('address', $address)
        ->with('week', $week);
})->name('home');


/* --------------------------- Formulare ------------------------------- */

Route::post('/changeEmp', 'EmpController@update');

Route::post('/changeEmpPassword', 'EmpController@updatePassword');
Route::post('/changeEmpEmail', 'EmpController@updateEmail');

Route::post('/alldayEventCreate', 'EventController@addAlldayEvent');
Route::post('/timeEventCreate', 'EventController@addTimeEvent');
Route::post('/alldayEventChange', 'EventController@changeAlldayEvent');
Route::post('/timeEventChange', 'EventController@changeTimeEvent');
Route::post('/alldayEventDelete', 'EventController@deleteAlldayEvent');
Route::post('/timeEventDelete', 'EventController@deleteTimeEvent');




/* --------------------------- FOOTER ------------------------------- */

Route::get('/contact/{date}', function ($urlDate) {
    $week = getWeekArray($urlDate);
    return view('employee.footer.contact')
        ->with('week', $week);
});

Route::get('/impressum/{date}', function ($urlDate) {
    $week = getWeekArray($urlDate);
    return view('employee.footer.impressum')
        ->with('week', $week);
});

Route::get('/protection/{date}', function ($urlDate) {
    $week = getWeekArray($urlDate);
    return view('employee.footer.protection')
        ->with('week', $week);
});





