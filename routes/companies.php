<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;

// Load data for the companies table
Route::get('/load-data-companies-table', [CompaniesController::class, 'getAllForDataTable'])
                ->middleware('auth')
                ->name('load-data-companies-table');

// Get all data
Route::get('/get-all-by-company-id', [CompaniesController::class, 'getAllById'])
                ->middleware('auth')
                ->name('get-all-by-company-id');

// Update one by id
Route::post('/update-company', [CompaniesController::class, 'updateByOnById'])
                ->middleware('auth')
                ->name('update-company');

// Update and upload logo
Route::post('/upload-logo', [CompaniesController::class, 'uploadLogoByCompanyId'])
                ->middleware('auth')
                ->name('upload-logo');

// Add company
Route::post('/add-company', [CompaniesController::class, 'addOne'])
                ->middleware('auth')
                ->name('add-company');

// Get all company
Route::get('/retrieve-companies', [CompaniesController::class, 'getAll'])
                ->middleware('auth')
                ->name('retrieve-companies');