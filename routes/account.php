<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\UnsubscribeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::post('/account/update', [AccountController::class, 'update'])->name('accountUpdate');
    Route::post('/comms/update', [AccountController::class, 'commsUpdate'])->name('commsUpdate');
    Route::post('/account/changePassword', [AccountController::class, 'changePW'])->name('changePassword');
    Route::post('/account/delete', [AccountController::class, 'delete'])->name('deleteAccount');

    Route::get('/email/verification-notification', function () {
       Auth::user()->sendEmailVerificationNotification();
        session()->flash(
            'flash_message',
            [
                'heading' => 'Email Sent',
                'message' => 'We have sent you a new verification email.',
                'type' => 'bg-success'
            ]
        );
        return back()->with('message', 'Verification link sent!');
    })->middleware(['throttle:6,1'])->name('verification.send');
});

Route::get('/unsubscribe/{type}/{identity}', [UnsubscribeController::class, 'unsubscribe']);
