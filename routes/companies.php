<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;

// Load home data
Route::get('/load-data-companies-table', [CompaniesController::class, 'getAllForDataTable'])
                ->middleware('auth')
                ->name('load-data-companies-table');

// Get all data
Route::get('/get-all-by-company-id', [CompaniesController::class, 'getAllByCompanyId'])
                ->middleware('auth')
                ->name('get-all-by-company-id');

// Update company by company id
Route::post('/update-company', [CompaniesController::class, 'updateById'])
                ->middleware('auth')
                ->name('update-company');

// Update and upload logo
Route::post('/upload-logo', [CompaniesController::class, 'uploadLogoByCompanyId'])
                ->middleware('auth')
                ->name('upload-logo');