<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Service_entretiensController;
Route::post('/retrieve-manualwork-description-by-category', [Service_entretiensController::class, 'selectDescription'])
                ->middleware('auth')
                ->name('retrieve-manualwork-description-by-category');