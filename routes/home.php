<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Load home data
Route::get('/retrieve-home-data', [HomeController::class, 'retrieveHomeData'])
                ->middleware('auth')
                ->name('retrieve-home-data');