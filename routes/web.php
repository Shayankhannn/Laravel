<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
    // $jobs = Job::all();
    // dd($jobs[0]->title);
});

// index job
Route::get('/jobs',[JobController::class,'index'] );

// create job
Route::get('/jobs/create',[JobController::class,'create']);

// store job
Route::post('/jobs',[JobController::class,'store'] );

// show job
Route::get('/jobs/{job}',[JobController::class,'show'] );

// edit job
Route::get('/jobs/{job}/edit',[JobController::class,'edit']);

// Update job
Route::patch('/jobs/{job}', [JobController::class,'update']);

// delete job

Route::delete('/jobs/{job}',[JobController::class,'destroy']);


Route::get('/contact', function () {
    return view('contact');
});
