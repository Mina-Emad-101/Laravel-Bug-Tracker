<?php

use App\Http\Controllers\BugController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::view('/about', 'about');

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::resource('bugs', BugController::class, [
    'only' => [
        'index',
        'show',
        'create',
        'store',
        'destroy',
    ],
]);
