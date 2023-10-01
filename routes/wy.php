<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\RolePermissionController;

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

    Route::prefix('permission')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('admin.PermissionIndex');
        Route::get('create', [PermissionController::class, 'create'])->name('admin.PermissionCreate');
        Route::get('edit/{id}', [PermissionController::class, 'edit'])->name('admin.PermissionEdit');
        Route::get('delete/{id}', [PermissionController::class, 'delete'])->name('admin.PermissionDelete');
        Route::post('create', [PermissionController::class, 'store'])->name('admin.PermissionStore');
        Route::post('update/{id}', [PermissionController::class, 'update'])->name('admin.PermissionUpdate');
    });

    Route::prefix('role-permission')->group(function () {
        // Get Method
        Route::get('list', [RolePermissionController::class, 'list'])->name('rolePermission.list');
        Route::get('create', [RolePermissionController::class, 'create'])->name('rolePermission.create');
        Route::get('edit/{id}', [RolePermissionController::class, 'edit'])->name('rolePermission.edit');
        Route::get('delete/{id}', [RolePermissionController::class, 'delete'])->name('rolePermission.delete');
        // Post Method
        Route::post('create', [RolePermissionController::class, 'store'])->name('rolePermission.store');
        Route::post('update/{id}', [RolePermissionController::class, 'update'])->name('rolePermission.update');
    });
});
