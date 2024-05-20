<?php

use App\Models\Bug;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/bugs', function () {
    $bugs = Bug::getMockBugList();

    return view('bugs', [
        'bugs' => $bugs,
    ]);
});

Route::get('/bug/{id}', function (int $id) {
    $bugs = Bug::getMockBugList();

    $bug = Bug::findBug($bugs, $id);

    return view('bug', ['bug' => $bug]);
})->where('id', '[0-9]+');

Route::get('/about', function () {
    return view('about');
});
