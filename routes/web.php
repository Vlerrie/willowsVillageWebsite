<?php

use App\Http\Controllers\faqController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
 |--------------------------------------------------------------------------
 | Web Routes
 |--------------------------------------------------------------------------
 |
 | Here is where you can register web routes for your application. These
 | routes are loaded by the RouteServiceProvider within a group which
 | contains the "web" middleware group. Now create something great!
 |
 */

Route::get(
    '/soon', function () {
    return view('errors.comingSoon');
}
);

require __DIR__ . '/policypages.php';

Route::get('/', [HomeController::class, 'dashboard']);
Route::get(
    '/security', function () {
        return view('security.security');
    }
);
Route::get(
    '/importantContacts', function () {
        return view('pages.importantContacts');
    }
);
Route::get(
    '/wilgers', function () {
        return view('pages.wilgers');
    }
);

Route::get('/faq', [faqController::class, 'index']);
Route::get('/faq/search/{searchTerm}', [faqController::class, 'searchTerm']);

Route::get(
    '/dashboard', function () {
        return view('dashboard');
    }
)->middleware(
        ['auth', 'verified']
    )->name(
        'dashboard'
    );

require __DIR__ . '/auth.php';
require __DIR__ . '/account.php';

Route::middleware(['auth', 'admin'])->group(
    function () {
        require __DIR__ . '/admin.php';
    }
);
