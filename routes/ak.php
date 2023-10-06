<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FeedBackController;
use App\Http\Controllers\AssistantController;
use App\Http\Controllers\ClinicDoctorController;
use App\Http\Controllers\DoctorReportController;
use App\Http\Controllers\ClinicSubscriptionController;

// Start of Doctor routes
Route::group(['prefix' => 'doctor', 'middleware' => ['checkAuth:doctor']], function () {
    Route::get('/', [DoctorController::class, 'index'])->name('doctor.index');
    Route::get('create', [DoctorController::class, 'create'])->name('doctor.create');
    Route::post('/', [DoctorController::class, 'store'])->name('doctor.store');
    Route::get('edit/{id}', [DoctorController::class, 'edit'])->name('doctor.edit');
    Route::put('{id}', [DoctorController::class, 'update'])->name('doctor.update');
    Route::delete('{id}', [DoctorController::class, 'destroy'])->name('doctor.destroy');
    Route::get('list', [DoctorController::class, 'list'])->name('doctor.list');
    Route::get('report/income/{id}', [DoctorReportController::class, 'showIncomeReport'])->name('doctor.report.income');
    Route::post('report/income/{id}', [DoctorReportController::class, 'fetchIncomeReport'])->name('doctor.report.fetch');
});

// End of Doctor routes

// Start of Assistant routes
Route::group(['prefix' => 'assistant', 'middleware' => ['checkAuth:assistant']], function () {
    Route::get('/', [AssistantController::class, 'index'])->name('assistant.index');
    Route::get('create', [AssistantController::class, 'create'])->name('assistant.create');
    Route::post('/', [AssistantController::class, 'store'])->name('assistant.store');
    Route::get('{id}', [AssistantController::class, 'show'])->name('assistant.show');
    Route::get('{id}/edit', [AssistantController::class, 'edit'])->name('assistant.edit');
    Route::put('{id}', [AssistantController::class, 'update'])->name('assistant.update');
    Route::delete('{id}', [AssistantController::class, 'destroy'])->name('assistant.destroy');

});
// End of Assistant routes

// Start of ClinicDoctor routes

Route::get('/admin/clinic-doctor', [ClinicDoctorController::class, 'index'])->name('clinicDoctor.index');
Route::get('/admin/clinic-doctor/create', [ClinicDoctorController::class, 'create'])->name('clinicDoctor.create');
Route::post('/admin/clinic-doctor/create', [ClinicDoctorController::class, 'store'])->name('clinicDoctor.store');
Route::get('/admin/clinic-doctor/edit/{id}', [ClinicDoctorController::class, 'edit'])->name('clinicDoctor.edit');
Route::put('/admin/clinic-doctor/edit/{id}', [ClinicDoctorController::class, 'update'])->name('clinicDoctor.update');
Route::delete('/admin/clinic-doctor/{id}', [ClinicDoctorController::class, 'delete'])->name('clinicDoctor.delete');

// End of ClinicDoctor routes

// Start of Feedback routes, Feedback can be given from doctor index

Route::get('/feedback/create/{id}', [FeedBackController::class, 'create'])->name('feedback.create');
Route::post('/feedback/create', [FeedBackController::class, 'store'])->name('feedback.store');
Route::get('/feedback/list', [FeedBackController::class, 'list'])->name('feedback.list');
Route::get('delete/{id}', [FeedBackController::class, 'delete'])->name('feedback.delete');

// End of Feedback routes

// Start of ClinicSubscription routes

Route::get('/subscription-buy', [ClinicSubscriptionController::class, 'index'])->name('clinicSubscription.index');
Route::get('/subscription-buy/create/{id}', [ClinicSubscriptionController::class, 'create'])->name('clinicSubscription.create');
Route::post('/subscription-buy/create', [ClinicSubscriptionController::class, 'store'])->name('clinicSubscription.register');
// Route::get('/subscription-buy/edit/{id}', [ClinicSubscriptionController::class, 'edit'])->name('clinicSubscription.edit');
Route::put('/subscription-buy/{id}', [ClinicSubscriptionController::class, 'update'])->name('clinicSubscription.update');
Route::delete('/subscription-buy/{id}', [ClinicSubscriptionController::class, 'delete'])->name('clinicSubscription.delete');

// End of ClinicSubscription routes
