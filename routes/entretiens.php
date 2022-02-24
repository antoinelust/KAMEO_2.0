<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EntretiensController;

// Load data for the entretiens table
Route::get('/load-data-entretiens-table', [EntretiensController::class, 'getAllForDataTable'])
                ->middleware('auth')
                ->name('load-data-entretiens-table');

// Get all data
Route::get('/get-all-by-entretien-id', [EntretiensController::class, 'getAllById'])
                ->middleware('auth')
                ->name('get-all-by-entretien-id');

Route::post('/add-entretien', [EntretiensController::class, 'addEntretien'])
                ->middleware('auth')
                ->name('add-entretien');
