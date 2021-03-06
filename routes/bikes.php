<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BikesController;

// Load data for the bike companies table
Route::get('/load-data-companies-bike-table', [BikesController::class, 'getAllForDataTable'])
                ->middleware('auth')
                ->name('load-data-companies-bike-table');

// Load data for the bike clients table
Route::get('/load-data-clients-bikes-table', [BikesController::class, 'getAllBikesClientForDataTable'])
                ->middleware('auth')
                ->name('load-data-clients-bikes-table');

// Get all bikes
Route::get('/retrieve-bikes', [BikesController::class, 'getAll'])
                ->middleware('auth')
                ->name('retrieve-bikes');

// Get all bike brand
Route::get('/retrieve-brands', [BikesController::class, 'getAllBrand'])
                ->middleware('auth')
                ->name('retrieve-brands');

// Get all bike model by brand
Route::get('/retrieve-models-by-brand', [BikesController::class, 'getAllModelByBrand'])
                ->middleware('auth')
                ->name('retrieve-models-by-brand');

// Get all size by model
Route::get('/retrieve-sizes-by-model', [BikesController::class, 'getAllSizeByModel'])
                ->middleware('auth')
                ->name('retrieve-sizes-by-model');

// Get all bikes by company id
Route::post('/retrieve-bikesId-by-company-id', [BikesController::class, 'getAllByCompanyId'])
                ->middleware('auth')
                ->name('retrieve-bikesId-by-company-id');

// Add one
Route::post('/add-bike-client', [BikesController::class, 'addOne'])
                ->middleware('auth')
                ->name('add-bike-client');

// Retrieve img by bike
Route::get('/retrieve-bike-img', [BikesController::class, 'retrieveBikeImg'])
                ->middleware('auth')
                ->name('retrieve-bike-img');
