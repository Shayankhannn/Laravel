<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;


//home
Route::view('/','home');

// for middleware this route setup is improvement  

Route::controller(JobController::class)->group(function (){
// index job
Route::get('/jobs','index' );
// create job
Route::get('/jobs/create','create');
// store job
Route::post('/jobs','store' )->middleware('auth');
// show job
Route::get('/jobs/{job}','show' );
// edit job
Route::get('/jobs/{job}/edit','edit')->middleware('auth')->can('edit-job','job');
// Route::get('/jobs/{job}/edit','edit')->middleware(['auth','can:edit-job,job']);
// Update job
Route::patch('/jobs/{job}', 'update');
// delete job
Route::delete('/jobs/{job}','destroy');

});

// Route::resource('jobs',JobController::class)->only(['index','show']);
// Route::resource('jobs',JobController::class)->except(['index','show'])->middleware('auth');

//contact
Route::view('/contact', 'contact');


// auth
Route::get('/register',[RegisteredUserController::class,'create']);
Route::post('/register',[RegisteredUserController::class,'store']);

Route::get('/login',[SessionController::class,'create'])->name('login');
Route::post('/login',[SessionController::class,'store']);
Route::post('/logout',[SessionController::class,'destroy']);