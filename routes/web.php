<?php

use App\Models\Bug;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/bugs', function () {
    $bugs = Bug::with(['project', 'priority', 'status'])->latest()->orderBy('status_id')->orderBy('priority_id')->paginate(perPage: 12);

    return view('bugs.index', [
        'bugs' => $bugs,
    ]);
});

Route::post('/bugs', function () {
    request()->validate([
        'project' => ['required'],
        'description' => ['required', 'max:255'],
        'screenshot' => ['required', 'image'],
    ]);

    $newBug = Bug::create([
        'project_id' => request('project'),
        'status_id' => 1,
        'description' => request('description'),
        'reporter_id' => request('reporter'),
        'screenshot' => request()->file('screenshot')->store('screenshots', 'public'),
        'created_at' => now(),
    ]);

    return redirect('/bugs/'.$newBug->id);
});

Route::get('/bugs/{id}', function (int $id) {
    $bug = Bug::find($id);

    if (! $bug) {
        abort(404);
    }

    return view('bugs.show', ['bug' => $bug]);
})->where('id', '[0-9]+');

Route::get('/bugs/create', function () {
    return view('bugs.create', ['projects' => Project::all()]);
});

Route::get('/about', function () {
    return view('about');
});
