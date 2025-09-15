<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Support\Facades\Route;


//home
Route::view('/','home');

// Route::controller(JobController::class)->group(function (){
// // index job
// Route::get('/jobs','index' );
// // create job
// Route::get('/jobs/create','create');
// // store job
// Route::post('/jobs','store' );
// // show job
// Route::get('/jobs/{job}','show' );
// // edit job
// Route::get('/jobs/{job}/edit','edit');
// // Update job
// Route::patch('/jobs/{job}', 'update');
// // delete job
// Route::delete('/jobs/{job}','destroy');

// });`

Route::resource('jobs',JobController::class);

//contact
Route::view('/contact', 'contact');


// auth
Route::get('/register',[RegisteredUserController::class,'create']);