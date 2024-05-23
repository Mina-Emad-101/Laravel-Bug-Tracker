<?php

use App\Models\Bug;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/bugs', function () {
    $bugs = Bug::with(['priority', 'status'])->get()->sortBy('priority_id')->sortBy('status_id');

    return view('bugs', [
        'bugs' => $bugs,
    ]);
});

Route::get('/bug/{id}', function (int $id) {
    $bug = Bug::find($id);

    if (! $bug) {
        abort(404);
    }

    return view('bug', ['bug' => $bug]);
})->where('id', '[0-9]+');

Route::get('/report-bug', function () {
    return view('report-bug');
});

Route::get('/about', function () {
    return view('about');
});
