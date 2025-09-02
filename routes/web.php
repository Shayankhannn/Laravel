<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs',[
        'jobs'=> [
            [
                'id' => '1',
                'title' => 'director',
                'salary' => '50,000'
            ],
            [
                'id' => '1',
                'title'=> 'sweeper',
                'salary' => '90,000'
            ],
            [
                'id' => '1',
                'title'=> 'janitor',
                'salary' => '100,000'
            ]
        ]
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});
