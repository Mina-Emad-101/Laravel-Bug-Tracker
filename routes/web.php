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

Route::get('/users', [UserController::class, 'index'])
    ->middleware('auth')
    ->can('create', User::class);

Route::get('/users/{user}', [UserController::class, 'show'])
    ->where('user', '[0-9]+')
    ->middleware('auth')
    ->can('show', 'user');

Route::get('/users/create', [UserController::class, 'create'])
    ->middleware('auth')
    ->can('create', User::class);

Route::post('/users', [UserController::class, 'store']);
// ->can('create', User::class);

Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->where('user', '[0-9]+')
    ->middleware('auth')
    ->can('destroy', 'user');

Route::get('/bugs', [BugController::class, 'index'])
    ->middleware('auth');

Route::get('/bugs/{bug}', [BugController::class, 'show'])
    ->where('bug', '[0-9]+')
    ->middleware('auth')
    ->can('show', 'bug');

Route::patch('/bugs/{bug}', [BugController::class, 'update'])
    ->where('bug', '[0-9]+')
    ->middleware('auth');
// ->can('update', 'bug');

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
