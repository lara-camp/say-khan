<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\SubscriptionController;

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
        Route::post('update/{id}', [ClinicController::class, 'update'])->name('admin.clinicUpdate');
    });

    // To view role route
    Route::prefix('role')->group(function () {
        // get method role
        Route::get('/', [RoleController::class, 'index'])->name('role.index');
        Route::get('create', [RoleController::class, 'create'])->name('role.create');
        Route::get('edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::post('update/{id}', [RoleController::class, 'update'])->name('role.update');
        // post method role
        Route::post('create', [RoleController::class, 'store'])->name('role.store');
        Route::delete('delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
    });

    Route::prefix('subscription')->group(function () {
        // Get method Subscription
        Route::get('/', [SubscriptionController::class, 'index'])->name('admin.subIndex');
        Route::get('create', [SubscriptionController::class, 'create'])->name('admin.subCreate');
        Route::get('edit/{id}', [SubscriptionController::class, 'edit'])->name('admin.subEdit');
        Route::get('delete/{id}', [SubscriptionController::class, 'delete'])->name('admin.subDelete');
        // POST method Subscription
        Route::post('create', [SubscriptionController::class, 'store'])->name('admin.subStore');
        Route::post('update/{id}', [SubscriptionController::class, 'update'])->name('admin.subUpate');
    });
});
