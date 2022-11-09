<?php
Route::get('/privacy-policy', function () {
    return view('privacyPolicy');
});
Route::get('/popi', function () {
    return view('popiDisclaimer');
});
Route::get('/constitution', function () {
    return view('dwraConstitution');
});
Route::get('/terms', function () {
    return view('termsAndConditions');
});
