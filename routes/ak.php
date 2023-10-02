<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FeedBackController;
use App\Http\Controllers\AssistantController;
use App\Http\Controllers\ClinicDoctorController;
use App\Http\Controllers\ClinicSubscriptionController;


// Start of Doctor routes
Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor.index');
Route::get('/doctor/create', [DoctorController::class, 'create'])->name('doctor.create');
Route::post('/doctor', [DoctorController::class, 'store'])->name('doctor.store');
Route::get('/doctor/edit/{id}', [DoctorController::class, 'edit'])->name('doctor.edit');
Route::put('/doctor/{id}', [DoctorController::class, 'update'])->name('doctor.update');
Route::delete('/doctor/{id}', [DoctorController::class, 'destroy'])->name('doctor.destroy');
// End of Doctor routes

// Start of Assistant routes
Route::get('/assistant', [AssistantController::class, 'index'])->name('assistant.index');
Route::get('/assistant/create', [AssistantController::class, 'create'])->name('assistant.create')->middleware('assistant.auth');
Route::post('/assistant', [AssistantController::class, 'store'])->name('assistant.store');
Route::get('/assistant/{id}', [AssistantController::class, 'show'])->name('assistant.show');
Route::get('/assistant/{id}/edit', [AssistantController::class, 'edit'])->name('assistant.edit');
Route::put('/assistant/{id}', [AssistantController::class, 'update'])->name('assistant.update');
Route::delete('/assistant/{id}', [AssistantController::class, 'destroy'])->name('assistant.destroy');
// End of Assistant routes

// Start of ClinicDoctor routes

Route::get('/admin/clinic-doctor', [ClinicDoctorController::class, 'index'])->name('clinic_doctor_index');
Route::get('/admin/clinic-doctor/create', [ClinicDoctorController::class, 'create'])->name('clinic_doctor_create');
Route::post('/admin/clinic-doctor/create', [ClinicDoctorController::class, 'store'])->name('clinic_doctor_register');
Route::get('/admin/clinic-doctor/edit/{id}', [ClinicDoctorController::class, 'edit'])->name('clinic_doctor_edit');
Route::put('/admin/clinic-doctor/edit/{id}', [ClinicDoctorController::class, 'update'])->name('clinic_doctor_update');
Route::delete('/admin/clinic-doctor/{id}', [ClinicDoctorController::class, 'delete'])->name('clinic_doctor_delete');

// End of ClinicDoctor routes

// Start of Feedback routes, Feedback can be given from doctor index

Route::get('/feedback/create/{id}', [FeedBackController::class, 'create'])->name('feedback_create');
Route::post('/feedback/create', [FeedBackController::class, 'store'])->name('feedback_register');
Route::get('/feedback/show', [FeedBackController::class, 'show'])->name('feedback_show');

// End of Feedback routes

// Start of ClinicSubscription routes

Route::get('/subscription-buy', [ClinicSubscriptionController::class, 'index'])->name('clinic_subscription_index');
Route::get('/subscription-buy/create/{id}', [ClinicSubscriptionController::class, 'create'])->name('clinic_subscription_create');
Route::post('/subscription-buy/create', [ClinicSubscriptionController::class, 'store'])->name('clinic_subscription_register');
// Route::get('/subscription-buy/edit/{id}', [ClinicSubscriptionController::class, 'edit'])->name('clinic_subscription_edit');
Route::put('/subscription-buy/{id}', [ClinicSubscriptionController::class, 'accept'])->name('clinic_subscription_accept');
Route::delete('/subscription-buy/{id}', [ClinicSubscriptionController::class, 'delete'])->name('clinic_subscription_delete');

// End of ClinicSubscription routes