<?php

use App\Http\Controllers\ClinicController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    // To view clinic route
    Route::prefix('clinic')->group(function () {
        Route::get('/', [ClinicController::class, 'index'])->name('admin.clinicList');
        Route::get('create', [ClinicController::class, 'create'])->name('admin.clinicCreate');
    });
});