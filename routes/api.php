<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\User\ProfileController;
use Illuminate\Support\Facades\Route;


Route::post('/register', RegistrationController::class)->name('register');
Route::post('/login', LoginController::class)->name('login');
Route::get('/profile', ProfileController::class)
    ->middleware('auth:sanctum')
    ->name('profile');
