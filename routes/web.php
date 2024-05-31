<?php

use App\Http\Controllers\BugController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::view('/about', 'about');

Route::resource('bugs', BugController::class, [
    'only' => [
        'index',
        'show',
        'create',
        'store',
        'destroy',
    ],
]);
