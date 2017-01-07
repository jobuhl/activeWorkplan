<?php

include('functions.php');

/* --------------------------- LINK ------------------------------- */

Route::get('/home', function () {
    return redirect('/admin/employer-overview');
})->name('home');

Route::get('/employer-overview', function () {
    return admOverview();
})->name('home');

Route::get('employer-planning/{id}', function ($thisRetailStoreId) {
    return admPlanning($thisRetailStoreId);
})->name('home');

Route::get('/employee-single/{id}', function ($employeeId) {
    return admPlanningSingle($employeeId);
})->name('employer-planning');

Route::get('/employer-account', function () {
    return admAccount();
})->name('home');



/* --------------------------- FORMULAR ------------------------------- */

Route::post('/storeCreate', 'StoreController@create');

Route::post('/addEmp', 'EmpController@create');

Route::post('/weekBackAdmOver', 'WeekController@backAdmOver');
Route::post('/weekNextAdmOver', 'WeekController@nextAdmOver');
Route::post('/weekTodayAdmOver', 'WeekController@todayAdmOver');

Route::post('/weekBackAdmPlan/{retailStoreId}', 'WeekController@backAdmPlan')->where('retailStoreId', '.+');
Route::post('/weekNextAdmPlan/{retailStoreId}', 'WeekController@nextAdmPlan')->where('retailStoreId', '.+');
Route::post('/weekTodayAdmPlan/{retailStoreId}', 'WeekController@todayAdmPlan')->where('retailStoreId', '.+');


/* ---------------------------- FOOTER -------------------------------- */

Route::get('/contact', function () {
    return view('admin.contact');
});

Route::get('/impressum', function () {
    return view('admin.impressum');
});

Route::get('/protection', function () {
    return view('admin.protection');
});


/* --------------------------- FUNCTIONS ------------------------------- */

function authUser()
{
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();
}

function admOverview() {
    authUser();

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
}

function admPlanning($thisRetailStoreId) {
    authUser();

    $company = thisCompany();

    $allRetailStores = allRetailStoresOfCompany($company->id);
    $thisRetailStore = thisRetailStore($thisRetailStoreId);
    $allEmployees = allEmployeesOfCompany($company->id);

    $manyTimeEvent = allTimeEventOfCompany($company->id);
    $manyWorktimeEvent = allWorktimeFixOfCompany($company->id);
    $manyAlldayEvent = allAlldayEventOfCompany($company->id);

    $date = new DateTime();
    $monday = getMondayBeforeDay($date);
    $week = getWeekArray($monday);

    return view('admin.employer-planning')
        ->with('allRetailStores', $allRetailStores)
        ->with('thisRetailStore', $thisRetailStore)
        ->with('allEmployees', $allEmployees)
        ->with('manyTimeEvent', $manyTimeEvent)
        ->with('manyWorktimeEvent', $manyWorktimeEvent)
        ->with('manyAlldayEvent', $manyAlldayEvent)
        ->with('week', $week);
}

function admPlanningSingle($employeeId) {
    authUser();

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
}

function admAccount() {
    authUser();

    $company = thisCompany();
    $admin = thisAdmin();
    $address = oneAddress($company->id);

    return view('admin.employer-account')
        ->with('company', $company)
        ->with('admin', $admin)
        ->with('address', $address);
}