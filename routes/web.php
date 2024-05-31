<?php

use App\Http\Controllers\BugController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/bugs', [BugController::class, 'index']);

Route::post('/bugs', [BugController::class, 'store']);

Route::get('/bugs/{bug}', [BugController::class, 'show'])
    ->where('bug', '[0-9]+');

Route::get('/bugs/create', [BugController::class, 'create']);

Route::delete('/bugs/{bug}', [BugController::class, 'destroy']);

Route::get('/about', function () {
    return view('about');
});
