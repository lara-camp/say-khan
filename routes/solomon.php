<?php

use App\Http\Controllers\PatientController;
use App\Http\Controllers\PatientDetailController;
use App\Http\Controllers\PatientRecordController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\SocialController;
use Illuminate\Support\Facades\Route;

//login
Route::group(['middleware' => ['checkGuest']], function () {
    Route::get('/', [LoginController::class, 'login'])->name('user.login');
    Route::post('/login', [LoginController::class, 'create'])->name('users.create');

//register
    Route::get('register', [RegisterController::class, 'register'])->name('user.register');
    Route::post('register', [RegisterController::class, 'create'])->name('user.create');

    Route::get('login/{provider}/role', [SocialController::class, 'roleSelect'])->name('user#roleSelect');
    Route::get('login/social', [SocialController::class, 'socialPage'])->name('user#socialPage');
    Route::get('login/{provider}/callback', [SocialController::class, 'socialCallBack'])->name('user#socialCallBack');

});

Route::post('/logout', [LoginController::class, 'logout'])->name('user.logout');

Route::prefix('patient')->group(function () {
    //get method
    Route::get('list/{id}', [PatientController::class, 'list'])->name('patient.list');
    Route::get('create', [PatientController::class, 'create'])->name('patient.create');
    Route::get('edit/{id}', [PatientController::class, 'edit'])->name('patient.edit');
    Route::get('delete/{id}', [PatientController::class, 'delete'])->name('patient.delete');
    // detail
    Route::get('detail/create', [PatientDetailController::class, 'create'])->name('patientDetails.create');
    Route::get('detail/list/{id}', [PatientDetailController::class, 'list'])->name('patientDetails.list');
    Route::get('detail/edit/{id}', [PatientDetailController::class, 'edit'])->name('patientDetails.edit');
    Route::get('detail/delete/{id}', [PatientDetailController::class, 'delete'])->name('patientDetails.delete');

    Route::get('record/create', [PatientRecordController::class, 'create'])->name('patientRecords.create');
    Route::get('record/list/{id}', [PatientRecordController::class, 'list'])->name('patientRecords.list');
    Route::get('record/edit/{id}', [PatientRecordController::class, 'edit'])->name('patientRecords.edit');
    Route::get('record/delete/{id}', [PatientRecordController::class, 'delete'])->name('patientRecords.delete');

    Route::post('create', [PatientController::class, 'store'])->name('patient.store');
    Route::post('update/{id}', [PatientController::class, 'update'])->name('patient.update');
    Route::post('detail/create', [PatientDetailController::class, 'store'])->name('patientDetails.store');
    Route::post('detail/update/{id}', [PatientDetailController::class, 'update'])->name('patientDetails.update');
    Route::post('record/create/', [PatientRecordController::class, 'store'])->name('patientRecords.store');
    Route::post('record/update/{id}', [PatientRecordController::class, 'update'])->name('patientRecords.update');
    Route::post('pdf/patientRecord/{id}', [PatientRecordController::class, 'exportPatientRecordPDF'])->name('patientRecords.download.pdf');
});
