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
Route::post('/deleteEmp', 'EmpController@delete');

Route::post('/changeAdmin', 'AdminController@update');
Route::post('/deleteAdmin', 'AdminController@delete');

Route::post('/changeStore', 'StoreController@change');
Route::post('/deleteStore', 'StoreController@delete');


//Route::get('/ajaxStoreList?storeSearch={storeSearch}', function($storeSearch) {
//    echo "ajaxroutes error";
//    dd('routes ajax');
//    $selectedStores = DB::table('retail_store')
//        ->where('retail_store.name', 'like', '%' . $storeSearch . '%')
//        ->orderby('retail_store.name', 'asc')
//        ->get();
//    $html = "";
//    foreach($selectedStores as $selectedStore) {
//        $html += "<a>" . $selectedStore->name . "</a>";
//    }
//    return $html;

//    return view('/admin/employer-planning/1')
//    ->with('selectedStores', $selectedStores);
//});

Route::get('/ajaxStoreList', function ($storeSearch) {
//    $selectedStores = DB::table('retail_store')
//        ->where('retail_store.name', 'like', '%' . $storeSearch . '%')
//        ->orderby('retail_store.name', 'asc')
//        ->get();


    return App\Response::json(['store' => 'this is a text']);
});


/* ---------------------------- FOOTER -------------------------------- */

Route::get('/contact/{date}', function ($urlDate) {
    $week = getWeekArray($urlDate);
    $company = thisCompany();
    $allRetailStores = allRetailStoresOfCompany($company->id);
    return view('admin.contact')
        ->with('week', $week)
        ->with('allRetailStores', $allRetailStores);
});

Route::get('/impressum/{date}', function ($urlDate) {
    $week = getWeekArray($urlDate);
    $company = thisCompany();
    $allRetailStores = allRetailStoresOfCompany($company->id);
    return view('admin.impressum')
        ->with('week', $week)
        ->with('allRetailStores', $allRetailStores);
});

Route::get('/protection/{date}', function ($urlDate) {
    $week = getWeekArray($urlDate);
    $company = thisCompany();
    $allRetailStores = allRetailStoresOfCompany($company->id);
    return view('admin.protection')
        ->with('week', $week)
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

    $manyTimeEvent = allTimeEventOfCompany($company->id);
    $manyWorktimeEvent = allWorktimeFixOfCompany($company->id);
    $manyAlldayEvent = allAlldayEventOfCompany($company->id);
    $amountOfRetailStores = amountOfRetailStoresOfCompany($company->id);

    $week = getWeekArray($urlDate);

    if ($amountOfRetailStores == 0) {
        return view('admin.home')
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

    if ($amountOfRetailStores == 0) {

        return view('admin.employer-planning')
            ->with('amountOfRetailStores', $amountOfRetailStores)
            ->with('week', $week);
    } else {


        $allRetailStores = allRetailStoresOfCompany($company->id);
        $thisRetailStore = thisRetailStore($thisRetailStoreId);
        $allEmployees = allEmployeesOfCompany($company->id);
        $addressRetailStore = oneAddress($thisRetailStore->address_id);

        $manyTimeEvent = allTimeEventOfCompany($company->id);
        $manyWorktimeEvent = allWorktimeFixOfCompany($company->id);
        $manyAlldayEvent = allAlldayEventOfCompany($company->id);

        return view('admin.employer-planning')
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

    $manyTimeEvent = allTimeEventOfCompany($company->id);
    $manyWorktimeEvent = allWorktimeFixOfCompany($company->id);
    $manyAlldayEvent = allAlldayEventOfCompany($company->id);

    $week = getWeekArray($urlDate);

    if ($amountOfRetailStores == 0) {
        return view('admin.employer-planning-single-employee')
            ->with('amountOfRetailStores', $amountOfRetailStores)
            ->with('week', $week);
    } else {
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
        return view('admin.employer-account')
            ->with('company', $company)
            ->with('admin', $admin)
            ->with('address', $address)
            ->with('amountOfRetailStores', $amountOfRetailStores)
            ->with('week', $week);
    } else {
        return view('admin.employer-account')
            ->with('company', $company)
            ->with('admin', $admin)
            ->with('address', $address)
            ->with('allRetailStores', $allRetailStores)
            ->with('amountOfRetailStores', $amountOfRetailStores)
            ->with('week', $week);
    }
}