<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConferenceController;

// Naudokite tik resursų maršrutus
Route::delete('/conferences/{id}', [ConferenceController::class, 'destroy'])->name('conferences.destroy');
Route::resource('conferences', ConferenceController::class);
