<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConferenceController;

// Naudokite tik resursų maršrutus
Route::resource('conferences', ConferenceController::class);
