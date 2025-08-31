<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home',[
        'jobs'=> [
            [
                'title' => 'director',
                'salary' => '50,000'
            ],
            [
                'title'=> 'sweeper',
                'salary' => '90,000'
            ],
            [
                'title'=> 'janitor',
                'salary' => '100,000'
            ]
        ]
    ]);
});

Route::get('/jobs', function () {
    return view('jobs');
});

Route::get('/contact', function () {
    return view('contact');
});
