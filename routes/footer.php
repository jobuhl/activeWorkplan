<?php

Route::get('/contact', function () {
    return view('general.contact');
});

Route::get('/impressum', function () {
    return view('general.impressum');
});

Route::get('/protection', function () {
    return view('general.protection');
});
