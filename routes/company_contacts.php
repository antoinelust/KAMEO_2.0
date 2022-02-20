<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Company_contactsController;

// Load data for the contact companies table
Route::get('/load-data-companies-contact-table', [Company_contactsController::class, 'getAllByCompanyId'])
                ->middleware('auth')
                ->name('load-data-companies-contact-table');

// Add contact company
Route::post('/add-contact-company', [Company_contactsController::class, 'addOneByCompanyId'])
                ->middleware('auth')
                ->name('add-contact-company');

// Get all info of one contact
Route::get('/retrieve-contact', [Company_contactsController::class, 'getOneById'])
                ->middleware('auth')
                ->name('retrieve-contact');

// Modify one by id
Route::post('/update-contact', [Company_contactsController::class, 'updateOneById'])
                ->middleware('auth')
                ->name('update-contact');

// Delete one by id
Route::post('/delete-contact', [Company_contactsController::class, 'deleteOneByid'])
                ->middleware('auth')
                ->name('delete-contact');