<?php

use App\Http\Controllers\BugController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::view('/about', 'about');

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::resource('bugs', BugController::class, [
    'only' => [
        'index',
        'show',
        'create',
        'store',
        'destroy',
    ],
]);
