<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ClinicController;

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

    Route::prefix('role')->group(function () {
        // get method role
        Route::get('/', [RoleController::class, 'index'])->name('role.index');
        Route::get('create', [RoleController::class, 'create'])->name('role.create');
        Route::get('/{id}', [RoleController::class, 'show'])->name('role.show');
        Route::get('edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::post('update/{id}', [RoleController::class, 'update'])->name('role.update');
        // post method role
        Route::post('create', [RoleController::class, 'store'])->name('role.store');
        Route::delete('delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
    });
});
