<?php

use App\Http\Controllers\ClinicController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    // To view clinic route
    Route::prefix('clinic')->group(function () {
        // Get Method Clinic
        Route::get('/', [ClinicController::class, 'index'])->name('admin.clinicList');
        Route::get('create', [ClinicController::class, 'create'])->name('admin.clinicCreate');
        Route::get('edit/{id}', [ClinicController::class, 'edit'])->name('admin.clinicEdit');
        Route::get('delete/{id}', [ClinicController::class, 'delete'])->name('admin.clinicDelete');

        // Post Method Clinic
        Route::post('create', [ClinicController::class, 'store'])->name('admin.clinicStore');
    });
});