<?php
Route::get('/privacy-policy', function () {
    return view('pages.privacyPolicy');
});
Route::get('/popi', function () {
    return view('pages.popiDisclaimer');
});
Route::get('/constitution', function () {
    return view('pages.dwraConstitution');
});
Route::get('/terms', function () {
    return view('pages.termsAndConditions');
});
