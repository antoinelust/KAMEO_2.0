<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntretiensController;

// Load data for the entretiens table
Route::get('/load-data-entretiens-table', [EntretiensController::class, 'getAllForDataTable'])
                ->middleware('auth')
                ->name('load-data-entretiens-table');
