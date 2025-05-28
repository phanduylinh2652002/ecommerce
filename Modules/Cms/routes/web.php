<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Modules\Cms\Http\Controllers\CmsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('cms', CmsController::class)->names('cms');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
});
