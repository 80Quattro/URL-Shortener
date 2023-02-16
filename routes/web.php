<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\URLController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Show home page (welcome)
Route::get('/', function () {
    return view('welcome');
});

// Show All URLs
Route::get('/urls', [URLController::class, 'index']);

// Show Create URL Form
Route::get('/urls/create', [URLController::class, 'create']);

// Store URL Data
Route::post('/urls', [URLController::class, 'store']);

// Show Single URL
Route::get('/urls/{url}', [URLController::class, 'show']);

// Show Edit URL Form
Route::get('/urls/{url}/edit', [URLController::class, 'edit']);

// Update URL
Route::put('/urls/{url}', [URLController::class, 'update']);

// Redirect shortURLKey to Destination URL
Route::get('/s/{shortURLKey}', \AshAllenDesign\ShortURL\Controllers\ShortURLController::class);