<?php

use App\Http\Controllers\AssistantController;
use App\Http\Controllers\ClinicDoctorController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\FeedBackController;
use Illuminate\Support\Facades\Route;

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
Route::post('/admin/clinic-doctor/create', [ClinicDoctorController::class, 'clinic_doctor_register'])->name('clinic_doctor_register');
Route::get('/admin/clinic-doctor/edit/{id}', [ClinicDoctorController::class, 'show_edit_clinic_doctor'])->name('clinic_doctor_edit');
Route::put('/admin/clinic-doctor/edit/{id}', [ClinicDoctorController::class, 'update_clinic_doctor'])->name('clinic_doctor_update');
Route::delete('/admin/clinic-doctor/{id}', [ClinicDoctorController::class, 'delete_clinic_doctor'])->name('clinic_doctor_delete');

// End of ClinicDoctor routes

// Start of Feedback routes

Route::get('/feedback/create/{id}', [FeedBackController::class, 'create'])->name('feedback_create');
Route::post('/feedback/create', [FeedBackController::class, 'feedback_register'])->name('feedback_register');
Route::get('/feedback/show', [FeedBackController::class, 'show_feedback'])->name('feedback_show');
Route::get('delete/{id}', [FeedBackController::class, 'delete'])->name('feedback_delete');

// End of Feedback routes
