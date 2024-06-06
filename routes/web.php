<?php

use App\Http\Controllers\BugController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Models\Bug;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/about', 'about');

Route::get('/register', [RegisteredUserController::class, 'create'])
    ->middleware('guest');
Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [SessionController::class, 'store'])
    ->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])
    ->middleware('auth');

Route::get('/bugs', [BugController::class, 'index'])
    ->middleware('auth');

Route::get('/bugs/{bug}', [BugController::class, 'show'])
    ->where('bug', '[0-9]+')
    ->middleware('auth')
    ->can('show', 'bug');

Route::get('/bugs/create', [BugController::class, 'create'])
    ->middleware('auth')
    ->can('create', Bug::class);

Route::post('/bugs', [BugController::class, 'store'])
    ->middleware('auth')
    ->can('create', Bug::class);

Route::delete('/bugs/{bug}', [BugController::class, 'destroy'])
    ->where('bug', '[0-9]+')
    ->middleware('auth')
    ->can('destroy', 'bug');
