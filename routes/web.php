<?php


use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
    // $jobs = Job::all();
    // dd($jobs[0]->title);
});

// index job
Route::get('/jobs', function ()  {
    // $jobs = Job::with('employer')->get();
    $jobs = Job::with('employer')->latest()->simplePaginate(4);
        return view('jobs.index',[
            'jobs'=> $jobs]);
});

// create job
Route::get('/jobs/create', function (){
    return view('jobs.create');
});

// store job
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

// show job
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

// edit job
Route::get('/jobs/{id}/edit', function ($id)  {
       $job = Job::find($id);            
    return view('jobs.edit',[
        'job' => $job
    ]);
});

// Update job
Route::patch('/jobs/{id}', function ($id)  {            
    //    validate 
 request()->validate([
        'title'=> ['required','min:3'],
        'salary'=>['required'],
    ]);
    // authorize 

    $job = Job::findorfail($id); // this will try to find if not there then fail

    // $job->title = request('title') ;
    // $job->salary = request('salary') ;
    // $job->save();

    $job->update([
        'title'=> request('title'),
        'salary'=> request('salary'),
    ]);
    return redirect('/jobs/' . $job->id);
});

// delete job

Route::delete('/jobs/{id}', function ($id)  {            
    // authorize hold
    $job = Job::findorfail($id);
    $job->delete();
    
    return redirect('/jobs');


});


Route::get('/contact', function () {
    return view('contact');
});
