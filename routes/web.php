<?php

use App\Models\Bug;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/bugs', function () {
    $bugs = Bug::with(['priority', 'status'])->orderBy('status_id')->orderBy('priority_id')->paginate(perPage: 15);

    return view('bugs.index', [
        'bugs' => $bugs,
    ]);
});

Route::post('/bugs', function () {
    $newBug = new Bug;

    return redirect('/bugs');
});

Route::get('/bugs/{id}', function (int $id) {
    $bug = Bug::find($id);

    if (! $bug) {
        abort(404);
    }

    return view('bugs.show', ['bug' => $bug]);
})->where('id', '[0-9]+');

Route::get('/bugs/create', function () {
    return view('bugs.create');
});

Route::get('/about', function () {
    return view('about');
});
