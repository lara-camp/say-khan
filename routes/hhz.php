<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.login');
});
Route::get('/', function () {
    return view('user.register');
});
