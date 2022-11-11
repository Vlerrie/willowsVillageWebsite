<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\NewsController;


Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::post('/admin/news/create', [NewsController::class, 'create']);
Route::post('/admin/event/create', [EventController::class, 'create']);
