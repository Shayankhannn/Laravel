<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index()
    {
         // $jobs = Job::with('employer')->get();
    $jobs = Job::with('employer')->latest()->simplePaginate(4);
        return view('jobs.index',[
            'jobs'=> $jobs]);
    }

    public function create()
    {
        return view('jobs.create'); 
    }

    public function store()
    {
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
    }

    public function show(Job $job)
    {
       // dd($id);
  
        // Arr::first($jobs, function ($job) use ($id) {
        //     return $job['id'] == $id;
        // });
        //    $job = Job::find($id);            
            
    return view('jobs.show',[
        'job' => $job
    ]);  
    }


    public function edit(Job $job)
    {
        
           
        // if(Gate::denies('edit-job',$job))
        Gate::authorize('edit-job',$job);
        
          //    $job = Job::find($id);            
    return view('jobs.edit',[
        'job' => $job
    ]);
    }

    public function update(Job $job)
    {
        
            //    validate 
 request()->validate([
        'title'=> ['required','min:3'],
        'salary'=>['required'],
    ]);
    // authorize 

    // $job = Job::findorfail($id); // this will try to find if not there then fail

    // $job->title = request('title') ;
    // $job->salary = request('salary') ;
    // $job->save();

    $job->update([
        'title'=> request('title'),
        'salary'=> request('salary'),
    ]);
    return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
         // authorize hold
    // $job = Job::findorfail($id);
    $job->delete();
    
    return redirect('/jobs');
    }
}
