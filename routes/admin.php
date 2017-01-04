<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

   /* $admins = App\Admin::all();
    $stores = DB::table('retail_store')
        ->join('company', 'retail_store.id', '=', 'company.id')
        ->join('admin', 'company.id', '=', 'admin.id')
        ->where($admins->id, 1)
        ->get();*/

    //dd($stores);

    return view('admin.home');
})->name('home');





Route::get('/employer-overview', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();
    return view('admin.home');
})->name('home');





Route::get('/employer-planning', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    //dd($users);

    return view('admin.employer-planning');
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






Route::get('/employer-planning-single-employee', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('admin')->user();

    return view('admin.employer-planning-single-employee');
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

