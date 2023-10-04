<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientDetailController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\SocialController;
use Illuminate\Support\Facades\Route;

//login

Route::get('/', [LoginController::class, 'login'])->name('user.login');
Route::post('/login', [LoginController::class, 'create'])->name('users.create');
Route::post('/logout', [LoginController::class, 'logout'])->name('user.logout');

//register
Route::get('register', [RegisterController::class, 'register'])->name('user.register');
Route::post('register', [RegisterController::class, 'create'])->name('user.create');

Route::get('login/{provider}/role', [SocialController::class, 'roleSelect'])->name('user#roleSelect');
Route::get('login/social', [SocialController::class, 'socialPage'])->name('user#socialPage');
Route::get('login/{provider}/callback', [SocialController::class, 'socialCallBack'])->name('user#socialCallBack');

Route::prefix('patient')->group(function () {
    //get method
    Route::get('list', [PatientController::class, 'home'])->name('patient#home');
    Route::get('create', [PatientController::class, 'createPage'])->name('patient#createPage');
    Route::get('edit/{id}', [PatientController::class, 'edit'])->name('patient#edit');
    Route::get('delete/{id}', [PatientController::class, 'delete'])->name('patient#delete');
    // detail
    Route::get('detail/create', [PatientDetailController::class, 'createPage'])->name('patientDetails#createPage');
    Route::get('detail/list', [PatientDetailController::class, 'list'])->name('patientDetails#list');
    Route::get('detail/edit/{id}', [PatientDetailController::class, 'edit'])->name('patientDetails#edit');
    Route::get('detail/delete/{id}', [PatientDetailController::class, 'delete'])->name('patientDetail#delete');

    Route::post('create', [PatientController::class, 'create'])->name('patient#create');
    Route::post('update/{id}', [PatientController::class, 'update'])->name('patient#update');
    Route::post('detail/create', [PatientDetailController::class, 'create'])->name('patientDetails#create');
    Route::post('detail/update/{id}', [PatientDetailController::class, 'update'])->name('patientDetails#update');
});