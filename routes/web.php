<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConferenceController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;

// Pradžios puslapis ir prisijungimas
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Autentifikacijos maršrutai
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Konferencijų valdymas
Route::resource('conferences', ConferenceController::class)->middleware('auth');

// Konferencijos registracija
Route::post('/conference/register/{conferenceId}', [ConferenceController::class, 'register'])
    ->middleware('auth')
    ->name('conference.register');

// Konferencijos trynimas
Route::delete('/conferences/{id}', [ConferenceController::class, 'destroy'])->name('conferences.destroy');

Route::get('/conferences/{id}', [ConferenceController::class, 'show'])->name('conferences.show');
Route::resource('conferences', ConferenceController::class);
Route::post('/conference/register/{conferenceId}', [ConferenceController::class, 'register'])
    ->middleware('auth')
    ->name('conference.register');
