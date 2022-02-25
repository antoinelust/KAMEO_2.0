<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Secondary route includes
require_once('home.php');
require_once('companies.php');
require_once('entretiens.php');
require_once('company_contacts.php');
require_once('bikes.php');
require_once('users.php');
require_once('service_entretiens.php');

// Default route
Route::get('/', function () {
    return view('index.index');
});

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth'])->name('dashboard.index');

require __DIR__.'/auth.php';
