<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

// Naudokite tik resursų maršrutus
Route::delete('/conferences/{id}', [ConferenceController::class, 'destroy'])->name('conferences.destroy');
Route::resource('conferences', ConferenceController::class);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Pagrindinis puslapis
Route::get('/', [HomeController::class, 'index'])->name('home');

// Sistemos administratoriaus puslapis
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

