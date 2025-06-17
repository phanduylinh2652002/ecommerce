<?php

use Illuminate\Support\Facades\Route;
use Modules\Cms\app\Http\Controllers\AuthController;
use Modules\Cms\Http\Controllers\CmsController;
use Modules\Cms\app\Http\Controllers\DashboardController;

Route::get('/login', [AuthController::class, 'index'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('cms', CmsController::class)->names('cms');

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});