<?php


use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
    // $jobs = Job::all();
    // dd($jobs[0]->title);
});

Route::get('/jobs', function ()  {
    // $jobs = Job::with('employer')->get();
    $jobs = Job::with('employer')->simplePaginate(4);
        return view('jobs.index',[
            'jobs'=> $jobs]);
});


Route::get('/jobs/create', function (){
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id)  {
    // dd($id);
  
        // Arr::first($jobs, function ($job) use ($id) {
        //     return $job['id'] == $id;
        // });
            
       $job = Job::find($id);            
    return view('jobs.show',[
        'job' => $job
    ]);
});


Route::get('/contact', function () {
    return view('contact');
});
