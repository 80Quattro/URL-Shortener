<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\URLController;
use App\Http\Controllers\UserController;

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

// Delete URL
Route::delete('/urls/{url}', [URLController::class, 'destroy']);

// Redirect shortURLKey to Destination URL
Route::get('/s/{shortURLKey}', \AshAllenDesign\ShortURL\Controllers\ShortURLController::class);

// Show Register Form
Route::get('/register', [UserController::class, 'create']);

// Create New User
Route::post('/users', [UserController::class, 'store']);

//Show Login Form
Route::get('/login', [UserController::class, 'login']);

// User Authenticate
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// User Logout
Route::post('/logout', [UserController::class, 'logout']);