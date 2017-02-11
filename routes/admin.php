<?php

include('functions.php');

/* --------------------------- LINK ------------------------------- */

Route::get('/home', function () {
    return redirect('/admin/overview/' . (new DateTime())->format('d-m-Y'));
})->name('home');

Route::get('/overview/{date}', function ($urlDate) {
    return admOverview($urlDate);
})->name('home');

Route::get('/planning/{id}/{date}', function ($thisRetailStoreId, $urlDate) {
    return admPlanning($thisRetailStoreId, $urlDate);
})->name('home');

Route::get('/planning-single/{id}/{date}', function ($employeeId, $urlDate) {
    return admPlanningSingle($employeeId, $urlDate);
})->name('employer-planning');

Route::get('/account/{date}', function ($urlDate) {
    return admAccount($urlDate);
})->name('home');


/* --------------------------- FORMULAR ------------------------------- */

Route::post('/storeCreate', 'StoreController@create');

Route::post('/addEmp', 'EmpController@create');
Route::post('/changeEmp', 'EmpController@change');
Route::post('/changeEmailEmp', 'EmpController@changeEmail');
Route::post('/changePasswordEmp', 'EmpController@changePassword');


Route::post('/deleteEmp', 'EmpController@delete');

Route::post('/changeAdmin', 'AdminController@update');
Route::post('/changeEmailAdmin', 'AdminController@update_email');
Route::post('/changePasswordAdmin', 'AdminController@update_password');
Route::post('/deleteAdmin', 'AdminController@delete');

Route::post('/changeStore', 'StoreController@change');
Route::post('/deleteStore', 'StoreController@delete');

Route::post('/addWorktimeFix', 'EventController@addWorktimeFixEvent');
Route::post('/deleteWorktimeFix', 'EventController@deleteWorktimeFixEvent');
Route::post('/changeWorktimeFix', 'EventController@changeWorktimeFixEvent');

Route::post('/acceptTimeEvent', 'EventController@acceptTimeEvent');
Route::post('/acceptAlldayEvent', 'EventController@acceptAlldayEvent');

Route::post('/notAcceptTimeEvent', 'EventController@notAcceptTimeEvent');
Route::post('/notAcceptAlldayEvent', 'EventController@notAcceptAlldayEvent');


Route::post('/searchOverview', function () {
    $character = Request::input('inputValue');
    $company = thisCompany();

    $store = DB::table('retail_store')
    ->select('retail_store.*')
    ->join('company', 'company.id', '=', 'retail_store.company_id')
    ->where('company.id', $company->id)
    ->where('retail_store.name', 'like', '%' . $character . '%')
    ->get();

    return response()->json(["store" => $store]);
});




/* ---------------------------- FOOTER -------------------------------- */

Route::get('/contact/{date}', function ($urlDate) {
    $week = getWeekArray($urlDate);
    $company = thisCompany();
    $allRetailStores = allRetailStoresOfCompany($company->id);
    $amountOfRetailStores = amountOfRetailStoresOfCompany($company->id);

    return view('admin.contact')
        ->with('week', $week)
        ->with('amountOfRetailStores', $amountOfRetailStores)
        ->with('allRetailStores', $allRetailStores);
});

Route::get('/impressum/{date}', function ($urlDate) {
    $week = getWeekArray($urlDate);
    $company = thisCompany();
    $allRetailStores = allRetailStoresOfCompany($company->id);
    $amountOfRetailStores = amountOfRetailStoresOfCompany($company->id);

    return view('admin.impressum')
        ->with('week', $week)
        ->with('amountOfRetailStores', $amountOfRetailStores)
        ->with('allRetailStores', $allRetailStores);
});

Route::get('/protection/{date}', function ($urlDate) {
    $week = getWeekArray($urlDate);
    $company = thisCompany();
    $allRetailStores = allRetailStoresOfCompany($company->id);
    $amountOfRetailStores = amountOfRetailStoresOfCompany($company->id);

    return view('admin.protection')
        ->with('week', $week)
        ->with('amountOfRetailStores', $amountOfRetailStores)
        ->with('allRetailStores', $allRetailStores);
});


/* --------------------------- FUNCTIONS ------------------------------- */

function authUser()
{
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();
}

function admOverview($urlDate)
{
    authUser();

    $company = thisCompany();
    $allRetailStores = allRetailStoresOfCompany($company->id);
    $allEmployees = allEmployeesOfCompany($company->id);

    $week = getWeekArray($urlDate);

    $manyTimeEvent = allTimeEventOfCompany($company->id, $week);
    $manyWorktimeEvent = allWorktimeFixOfCompany($company->id, $week);
    $manyAlldayEvent = allAlldayEventOfCompany($company->id, $week);
    $amountOfRetailStores = amountOfRetailStoresOfCompany($company->id);

    // Wenn keine Stores vorhanden sind
    if ($amountOfRetailStores == 0) {

        // Special Seite oeffnen, auf der man einen Store anlegen kann
        return view('admin.nostore')
            ->with('amountOfRetailStores', $amountOfRetailStores)
            ->with('week', $week);
    } else {
        return view('admin.home')
            ->with('allRetailStores', $allRetailStores)
            ->with('allEmployees', $allEmployees)
            ->with('manyTimeEvent', $manyTimeEvent)
            ->with('manyWorktimeEvent', $manyWorktimeEvent)
            ->with('manyAlldayEvent', $manyAlldayEvent)
            ->with('amountOfRetailStores', $amountOfRetailStores)
            ->with('week', $week);
    }
}

function admPlanning($thisRetailStoreId, $urlDate)
{
    authUser();

    $company = thisCompany();
    $amountOfRetailStores = amountOfRetailStoresOfCompany($company->id);
    $week = getWeekArray($urlDate);

    // Wenn keine Stores vorhanden sind
    if ($amountOfRetailStores == 0) {

        // Special Seite oeffnen, auf der man einen Store anlegen kann
        return view('admin.nostore')
            ->with('amountOfRetailStores', $amountOfRetailStores)
            ->with('week', $week);
    } else {


        $allRetailStores = allRetailStoresOfCompany($company->id);
        $thisRetailStore = thisRetailStore($thisRetailStoreId);
        $allEmployees = allEmployeesOfCompany($company->id);
        $addressRetailStore = oneAddress($thisRetailStore->address_id);

        $manyTimeEvent = allTimeEventOfCompany($company->id, $week);
        $manyWorktimeEvent = allWorktimeFixOfCompany($company->id, $week);
        $manyAlldayEvent = allAlldayEventOfCompany($company->id, $week);

        return view('admin.planning')
            ->with('allRetailStores', $allRetailStores)
            ->with('thisRetailStore', $thisRetailStore)
            ->with('allEmployees', $allEmployees)
            ->with('manyTimeEvent', $manyTimeEvent)
            ->with('manyWorktimeEvent', $manyWorktimeEvent)
            ->with('manyAlldayEvent', $manyAlldayEvent)
            ->with('addressRetailStore', $addressRetailStore)
            ->with('amountOfRetailStores', $amountOfRetailStores)
            ->with('week', $week);
    }


}

function admPlanningSingle($employeeId, $urlDate)
{
    authUser();

    $company = thisCompany();
    $allRetailStores = allRetailStoresOfCompany($company->id);
    $allEmployees = allEmployeesOfCompany($company->id);
    $thisEmployee = oneEmployee($employeeId);
    $address = oneAddress($thisEmployee->retail_store_id);
    $thisRetailStore = thisRetailStore($thisEmployee->retail_store_id);
    $amountOfRetailStores = amountOfRetailStoresOfCompany($company->id);

    $week = getWeekArray($urlDate);

    $manyTimeEvent = allTimeEventOfCompany($company->id, $week);
    $manyWorktimeEvent = allWorktimeFixOfCompany($company->id, $week);
    $manyAlldayEvent = allAlldayEventOfCompany($company->id, $week);


    if ($amountOfRetailStores == 0) {
        return view('admin.planning-single')
            ->with('amountOfRetailStores', $amountOfRetailStores)
            ->with('week', $week);
    } else {
        return view('admin.planning-single')
            ->with('allRetailStores', $allRetailStores)
            ->with('thisRetailStore', $thisRetailStore)
            ->with('allEmployees', $allEmployees)
            ->with('thisEmployee', $thisEmployee)
            ->with('company', $company)
            ->with('address', $address)
            ->with('manyTimeEvent', $manyTimeEvent)
            ->with('manyWorktimeEvent', $manyWorktimeEvent)
            ->with('manyAlldayEvent', $manyAlldayEvent)
            ->with('amountOfRetailStores', $amountOfRetailStores)
            ->with('week', $week);
    }

}

function admAccount($urlDate)
{
    authUser();

    $company = thisCompany();
    $allRetailStores = allRetailStoresOfCompany($company->id);
    $admin = thisAdmin();
    $address = oneAddress($company->id);
    $amountOfRetailStores = amountOfRetailStoresOfCompany($company->id);

    $week = getWeekArray($urlDate);

    if ($amountOfRetailStores == 0) {
        return view('admin.account')
            ->with('company', $company)
            ->with('admin', $admin)
            ->with('address', $address)
            ->with('amountOfRetailStores', $amountOfRetailStores)
            ->with('week', $week);
    } else {
        return view('admin.account')
            ->with('company', $company)
            ->with('admin', $admin)
            ->with('address', $address)
            ->with('allRetailStores', $allRetailStores)
            ->with('amountOfRetailStores', $amountOfRetailStores)
            ->with('week', $week);
    }
}