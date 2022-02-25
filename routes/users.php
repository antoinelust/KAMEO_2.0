<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

// Get all users
Route::get('/retrieve-users', [UsersController::class, 'getAll'])
                ->middleware('auth')
                ->name('retrieve-users');

Route::get('/retrieve-employes-by-company-id', [UsersController::class, 'getAllByCompanyId'])
                ->middleware('auth')
                ->name('retrieve-employes-by-company-id');