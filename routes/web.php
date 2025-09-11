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
    $jobs = Job::with('employer')->latest()->simplePaginate(4);
        return view('jobs.index',[
            'jobs'=> $jobs]);
});


Route::get('/jobs/create', function (){
    return view('jobs.create');
});
Route::post('/jobs', function (){
    // dd("hell");
    // dd(request()->all());
    request()->validate([
        'title'=> ['required','min:3'],
        'salary'=>['required'],
    ]);
    Job::create([
        'title'=> request('title'),
        'salary'=> request('salary'),
        'employer_id'=> 1,

    ]);
    return redirect('/jobs');
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
