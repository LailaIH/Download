<?php

namespace App\Http\Controllers;

use App\Models\JobTitle;
use Illuminate\Http\Request;

class JobTitleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(){

        return view('jobs.index',['jobs'=>JobTitle::all()]);
    }

    public function create(){

        return view('jobs.create');
    }

    public function storeAndUpdate (Request $request , JobTitle $job){
        $request->validate([
            'job'=>'required',
            'description'=>'required',
        ]);
        $job->job = strip_tags($request->input('job'));
        $job->description = strip_tags($request->input('description'));
       

    }

    public function store(Request $request){

        $job = new JobTitle();

        $this->storeAndUpdate($request , $job);
        $job->save();
        return redirect()->route('job_titles.index')->with('success','a new job has been created successfully');
    }

    public function edit($jobId){
        $job = JobTitle::findOrFail($jobId);
        return view('jobs.edit' , ['job'=>$job] );
    } 

    public function update(Request $request , $jobId){
        $job = JobTitle::findOrFail($jobId);

        $this->storeAndUpdate($request , $job);
        $job->status = strip_tags($request->input('status'));
        $job->save();
        return redirect()->route('job_titles.index')->with('success',' job has been updated successfully');

    
    }

    public function updateStatus( JobTitle $job)
    {
        // Toggle the is_online status
        $job->update(['is_online' => !$job->is_online]);

        return back()->with('success', 'Status updated successfully');
    }
}
