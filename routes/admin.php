<?php


Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    $company = DB::table('company')
        ->where('company.admin_id', Auth::user()->id)
        ->get();

    $retailStores = DB::table('retail_store')
        ->where('retail_store.company_id', $company[0]->id)
        ->get();

    $employees = DB::table('employees')
        ->get();

    return view('admin.home')
        ->with('retailStores', $retailStores)
        ->with('employees', $employees);
})->name('home');


Route::get('/employer-overview', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    $company = DB::table('company')
        ->where('company.admin_id', Auth::user()->id)
        ->get();

    $retailStores = DB::table('retail_store')
        ->where('retail_store.company_id', $company[0]->id)
        ->get();

    $employees = DB::table('employees')
        ->get();

    return view('admin.home')
        ->with('retailStores', $retailStores)
        ->with('employees', $employees);
})->name('home');







Route::get('employer-planning/{id}', function ($id) {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    $company = DB::table('company')
        ->where('company.admin_id', Auth::user()->id)
        ->get();

    $retailStores = DB::table('retail_store')
        ->where('retail_store.company_id', $company[0]->id)
        ->get();

    $thisRetailStore = DB::table('retail_store')
        ->where('retail_store.company_id', $company[0]->id)
        ->where('retail_store.id', $id)
        ->get();

    $employees = DB::table('employees')
        ->get();

    return view('admin.employer-planning')
        ->with('retailStores', $retailStores)
        ->with('thisRetailStore', $thisRetailStore[0])
        ->with('employees', $employees);
})->name('home');









Route::get('/employer-account', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    $company = DB::table('company')
        ->where('company.admin_id', Auth::user()->id)
        ->get();

    $address = DB::table('address')
        ->where('address.id', $company[0]->id)
        ->get();

    $city = DB::table('city')
        ->where('city.id', $address[0]->id)
        ->get();

    $country = DB::table('country')
        ->where('country.id', $city[0]->id)
        ->get();


    return view('admin.employer-account')
        ->with('company', $company)
        ->with('address', $address)
        ->with('city', $city)
        ->with('country', $country);
})->name('home');






Route::get('/employee-single/{id}', function ($id) {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    $company = DB::table('company')
        ->where('company.admin_id', Auth::user()->id)
        ->get();

    $retailStores = DB::table('retail_store')
        ->where('retail_store.company_id', $company[0]->id)
        ->get();

    $employees = DB::table('employees')
        ->get();

    $employee = DB::table('employees')
        ->where('employees.id', $id)
        ->get();

    $roles = DB::table('role')
        ->get();

    $contracts = DB::table('contract')
        ->get();

    $address = DB::table('address')
        ->where('address.id', $company[0]->id)
        ->get();

    $city = DB::table('city')
        ->where('city.id', $address[0]->id)
        ->get();

    $country = DB::table('country')
        ->where('country.id', $city[0]->id)
        ->get();



    return view('admin.employer-planning-single-employee')
        ->with('retailStores', $retailStores)
        ->with('employees', $employees)
        ->with('employee', $employee[0])
        ->with('contracts', $contracts)
        ->with('roles', $roles)
        ->with('company', $company[0])
        ->with('address', $address[0])
        ->with('city', $city[0])
        ->with('country', $country[0]);
})->name('home');





// ------------------------ Footer ------------------------
Route::get('/contact', function () {
    return view('admin.contact');
});

Route::get('/impressum', function () {
    return view('admin.impressum');
});

Route::get('/protection', function () {
    return view('admin.protection');
});

