<?php

use App\Http\Controllers\BugController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Models\Bug;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/about', 'about');

Route::get('/register', [UserController::class, 'create'])
    ->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])
    ->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])
    ->middleware('auth');

// Users
Route::prefix('users')->group(function () {

    Route::get('/', [UserController::class, 'index'])
        ->middleware('auth')
        ->can('create', User::class);

    Route::get('/{user}', [UserController::class, 'show'])
        ->where('user', '[0-9]+')
        ->middleware('auth')
        ->can('show', 'user');

    Route::get('/create', [UserController::class, 'create'])
        ->middleware('auth')
        ->can('create', User::class);

    Route::post('/', [UserController::class, 'store'])
        ->can('create', User::class);

    Route::delete('/{user}', [UserController::class, 'destroy'])
        ->where('user', '[0-9]+')
        ->middleware('auth')
        ->can('destroy', 'user');
});

// Bugs
Route::prefix('bugs')->group(function () {

    Route::get('/', [BugController::class, 'index'])
        ->middleware('auth');

    Route::get('/{bug}', [BugController::class, 'show'])
        ->where('bug', '[0-9]+')
        ->middleware('auth')
        ->can('show', 'bug');

    Route::patch('/{bug}', [BugController::class, 'update'])
        ->where('bug', '[0-9]+')
        ->middleware('auth');
    // ->can('update', 'bug');      // For some reason, this doesn't send the request to the BugPolicy:update method

    Route::get('/create', [BugController::class, 'create'])
        ->middleware('auth')
        ->can('create', Bug::class);

    Route::post('/', [BugController::class, 'store'])
        ->middleware('auth')
        ->can('create', Bug::class);

    Route::delete('/{bug}', [BugController::class, 'destroy'])
        ->where('bug', '[0-9]+')
        ->middleware('auth')
        ->can('destroy', 'bug');
});
