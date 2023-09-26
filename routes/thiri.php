<?php

use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\RegisterController;
use App\Http\Controllers\User\SocialController;
use Illuminate\Support\Facades\Route;

//login
Route::get('/',[LoginController::class, 'login'])->name('user.login');
Route::post('/login',[LoginController::class, 'create'])->name('user.create');
// //register
// Route::get('register', [RegisterController::class, 'register'])->name('user#register');
// Route::post('register', [RegisterController::class, 'create'])->name('user#create');

// Route::get('register/{provider}/role', [SocialController::class, 'roleSelect'])->name('user#roleSelect');
// Route::get('register/social', [SocialController::class, 'socialPage'])->name('user#socialPage');
// Route::get('register/{provider}/callback', [SocialController::class, 'socialCallBack'])->name('user#socialCallBack');