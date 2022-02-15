<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompaniesController;

// Load data for the companies table
Route::get('/load-data-companies-table', [CompaniesController::class, 'getAllForCompaniesDataTable'])
                ->middleware('auth')
                ->name('load-data-companies-table');

// Load data for the contact companies table
Route::get('/load-data-companies-contact-table', [CompaniesController::class, 'getAllForContactsCompanyDataTable'])
                ->middleware('auth')
                ->name('load-data-companies-contact-table');

// Load data for the bike companies table
Route::get('/load-data-companies-bike-table', [CompaniesController::class, 'getAllForBikesCompanyDataTable'])
                ->middleware('auth')
                ->name('load-data-companies-bike-table');

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

// Add company
Route::post('/add-company', [CompaniesController::class, 'addOne'])
                ->middleware('auth')
                ->name('add-company');

// Add contact company
Route::post('/add-contact-company', [CompaniesController::class, 'addContactCompanyByCompanyId'])
                ->middleware('auth')
                ->name('add-contact-company');