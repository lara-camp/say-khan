<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AssistantController;


// Start of Doctor routes
Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor.index');
Route::get('/doctor/create', [DoctorController::class, 'create'])->name('doctor.create')->middleware('doctor.auth');
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