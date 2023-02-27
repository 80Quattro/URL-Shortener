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
Route::get('/urls', [URLController::class, 'index'])
    ->middleware('auth');

// Show Create URL Form
Route::get('/urls/create', [URLController::class, 'create'])
    ->middleware('auth');

// Store URL Data
Route::post('/urls', [URLController::class, 'store'])
    ->middleware('auth');

// Show Single URL
Route::get('/urls/{url}', [URLController::class, 'show'])
    ->middleware('auth');

// Show Edit URL Form
Route::get('/urls/{url}/edit', [URLController::class, 'edit'])
    ->middleware('auth');

// Update URL
Route::put('/urls/{url}', [URLController::class, 'update'])
    ->middleware('auth');

// Delete URL
Route::delete('/urls/{url}', [URLController::class, 'destroy'])
    ->middleware('auth');

// Redirect shortURLKey to Destination URL
Route::get('/s/{shortURLKey}', \AshAllenDesign\ShortURL\Controllers\ShortURLController::class);

// Show Register Form
Route::get('/register', [UserController::class, 'create'])
    ->middleware('guest');

// Create New User
Route::post('/users', [UserController::class, 'store']);

//Show Login Form
Route::get('/login', [UserController::class, 'login'])
    ->name('login')
    ->middleware('guest');

// User Authenticate
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// User Logout
Route::post('/logout', [UserController::class, 'logout'])
    ->middleware('auth');