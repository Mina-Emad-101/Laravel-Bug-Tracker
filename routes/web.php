<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/bugs', function () {
    return view('bugs', [
        'bugs' => [
            [
                'id' => 1,
                'status' => 'Investigating',
                'description' => 'a bug',
            ],
            [
                'id' => 2,
                'status' => 'Fixed',
                'description' => 'another bug',
            ],
        ],
    ]);
});

Route::get('/bug/{id}', function ($id) {
    $bugs = [
        [
            'id' => 1,
            'status' => 'Investigating',
            'description' => 'a bug',
        ],
        [
            'id' => 2,
            'status' => 'Fixed',
            'description' => 'another bug',
        ],
    ];

    $bug = Arr::first($bugs, function ($bug) use ($id) {
        return $bug['id'] == $id;
    });

    return view('bug', ['bug' => $bug]);
});

Route::get('/about', function () {
    return view('about');
});
