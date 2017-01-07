<?php

include('functions.php');
/* --------------------------- OVERVIEW ------------------------------- */

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    return redirect('/admin/employer-overview');

})->name('home');


Route::get('/employer-overview', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    $company = thisCompany();

    $allRetailStores = allRetailStoresOfCompany($company->id);

    $allEmployees = allEmployeesOfCompany($company->id);

    $manyTimeEvent = allTimeEventOfCompany($company->id);

    $manyWorktimeEvent = allWorktimeFixOfCompany($company->id);

    $manyAlldayEvent = allAlldayEventOfCompany($company->id);

    $today = new DateTime();

    $monday = getMondayBeforeDay($today);

    $week = getWeekArray($monday);

    return view('admin.home')
        ->with('allRetailStores', $allRetailStores)
        ->with('allEmployees', $allEmployees)
        ->with('manyTimeEvent', $manyTimeEvent)
        ->with('manyWorktimeEvent', $manyWorktimeEvent)
        ->with('manyAlldayEvent', $manyAlldayEvent)
        ->with('week', $week);
})->name('home');


/* --------------------------- Planning ------------------------------- */

Route::get('employer-planning/{id}', function ($thisRetailStoreId) {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    $company = thisCompany();

    $allRetailStores = allRetailStoresOfCompany($company->id);

    $thisRetailStore = thisRetailStore($thisRetailStoreId);

    $allEmployees = allEmployeesOfCompany($company->id);

    return view('admin.employer-planning')
        ->with('allRetailStores', $allRetailStores)
        ->with('thisRetailStore', $thisRetailStore)
        ->with('allEmployees', $allEmployees);
})->name('home');


Route::get('/employee-single/{id}', function ($employeeId) {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    $company = thisCompany();

    $allRetailStores = allRetailStoresOfCompany($company->id);

    $allEmployees = allEmployeesOfCompany($company->id);

    $thisEmployee = oneEmployee($employeeId);

    $address = oneAddress($thisEmployee->retail_store_id);

    $thisRetailStore = thisRetailStore($thisEmployee->retail_store_id);

    return view('admin.employer-planning-single-employee')
        ->with('allRetailStores', $allRetailStores)
        ->with('thisRetailStore', $thisRetailStore)
        ->with('allEmployees', $allEmployees)
        ->with('thisEmployee', $thisEmployee)
        ->with('company', $company)
        ->with('address', $address);
})->name('home');


/* --------------------------- Account ------------------------------- */

Route::get('/employer-account', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    $company = thisCompany();

    $admin = thisAdmin();

    $address = oneAddress($company->id);

    return view('admin.employer-account')
        ->with('company', $company)
        ->with('admin', $admin)
        ->with('address', $address);
})->name('home');




/* --------------------------- Formulare ------------------------------- */

Route::post('/storeCreate', 'StoreController@create');

Route::post('/addEmp', 'EmpController@create');

Route::post('/weekBackAdmOver', 'WeekController@backAdmOver');
Route::post('/weekNextAdmOver', 'WeekController@nextAdmOver');
Route::post('/weekTodayAdmOver', 'WeekController@todayAdmOver');



/* --------------------------- Footer ------------------------------- */

Route::get('/contact', function () {
    return view('admin.contact');
});

Route::get('/impressum', function () {
    return view('admin.impressum');
});

Route::get('/protection', function () {
    return view('admin.protection');
});

