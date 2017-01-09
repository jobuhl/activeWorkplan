<?php

include('functions.php');

/* --------------------------- LINK ------------------------------- */

Route::get('/home', function () {
    return redirect('/admin/employer-overview/' . (new DateTime())->format('d-m-Y'));
})->name('home');

Route::get('/employer-overview/{date}', function ($urlDate) {
    return admOverview($urlDate);
})->name('home');

Route::get('employer-planning/{id}/{date}', function ($thisRetailStoreId, $urlDate) {
    return admPlanning($thisRetailStoreId, $urlDate);
})->name('home');

Route::get('/employer-single/{id}/{date}', function ($employeeId, $urlDate) {
    return admPlanningSingle($employeeId, $urlDate);
})->name('employer-planning');

Route::get('/employer-account/{date}', function ($urlDate) {
    return admAccount($urlDate);
})->name('home');



/* --------------------------- FORMULAR ------------------------------- */

Route::post('/storeCreate', 'StoreController@create');

Route::post('/addEmp', 'EmpController@create');
Route::post('/changeEmp', 'EmpController@change');

Route::post('/changeAdmin', 'AdminController@update');
Route::post('/deleteAdmin', 'AdminController@delete');

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

function admOverview($urlDate) {
    authUser();

    $company = thisCompany();
    $allRetailStores = allRetailStoresOfCompany($company->id);
    $allEmployees = allEmployeesOfCompany($company->id);

    $manyTimeEvent = allTimeEventOfCompany($company->id);
    $manyWorktimeEvent = allWorktimeFixOfCompany($company->id);
    $manyAlldayEvent = allAlldayEventOfCompany($company->id);

    $today = new DateTime($urlDate);
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

function admPlanning($thisRetailStoreId, $urlDate) {
    authUser();

    $company = thisCompany();

    $allRetailStores = allRetailStoresOfCompany($company->id);
    $thisRetailStore = thisRetailStore($thisRetailStoreId);
    $allEmployees = allEmployeesOfCompany($company->id);

    $manyTimeEvent = allTimeEventOfCompany($company->id);
    $manyWorktimeEvent = allWorktimeFixOfCompany($company->id);
    $manyAlldayEvent = allAlldayEventOfCompany($company->id);

    $date = new DateTime($urlDate);
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

function admPlanningSingle($employeeId, $urlDate) {
    authUser();

    $company = thisCompany();
    $allRetailStores = allRetailStoresOfCompany($company->id);
    $allEmployees = allEmployeesOfCompany($company->id);
    $thisEmployee = oneEmployee($employeeId);
    $address = oneAddress($thisEmployee->retail_store_id);
    $thisRetailStore = thisRetailStore($thisEmployee->retail_store_id);

    $manyTimeEvent = allTimeEventOfCompany($company->id);
    $manyWorktimeEvent = allWorktimeFixOfCompany($company->id);
    $manyAlldayEvent = allAlldayEventOfCompany($company->id);

    $date = new DateTime($urlDate);
    $monday = getMondayBeforeDay($date);
    $week = getWeekArray($monday);

    return view('admin.employer-planning-single-employee')
        ->with('allRetailStores', $allRetailStores)
        ->with('thisRetailStore', $thisRetailStore)
        ->with('allEmployees', $allEmployees)
        ->with('thisEmployee', $thisEmployee)
        ->with('company', $company)
        ->with('address', $address)
        ->with('manyTimeEvent', $manyTimeEvent)
        ->with('manyWorktimeEvent', $manyWorktimeEvent)
        ->with('manyAlldayEvent', $manyAlldayEvent)
        ->with('week', $week);
}

function admAccount($urlDate) {
    authUser();

    $company = thisCompany();
    $allRetailStores = allRetailStoresOfCompany($company->id);
    $admin = thisAdmin();
    $address = oneAddress($company->id);

    $date = new DateTime($urlDate);
    $monday = getMondayBeforeDay($date);
    $week = getWeekArray($monday);

    return view('admin.employer-account')
        ->with('company', $company)
        ->with('admin', $admin)
        ->with('address', $address)
        ->with('allRetailStores', $allRetailStores)
        ->with('week', $week);
}