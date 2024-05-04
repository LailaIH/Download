<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\File;


class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('files.index' , ['files'=>File::all()]);
    }


    public function create(){
        return view('files.create' , ['users'=>User::all()]);
    }

    public function storeAndUpdate(Request $request , File $file){
        $request->validate([
            'user_id'=>'required',
            'file_url'=>'required',
            'file_size'=>'required',
            'file_type'=>'required',
            'download_source'=>'required',

        ]);
        $file->user_id = strip_tags($request->input('user_id'));
        $file->file_url = strip_tags($request->input('file_url'));
        $file->file_size = strip_tags($request->input('file_size'));
        $file->file_type = strip_tags($request->input('file_type'));
        $file->download_source = strip_tags($request->input('download_source'));
        $file->save();

    }


    public function store(Request $request){

       

        $file = new File();
        $this->storeAndUpdate($request,$file);
        return redirect()->route('files.index')->with('success','File has been created successfully');

    }

    public function edit($fileId){
        $file = File::findOrFail($fileId);
        return view('files.edit',['file'=>$file , 'users'=>User::all()]);
    }

    public function update(Request $request ,$fileId){
        $file = File::findOrFail($fileId);
        $file->status = strip_tags($request->input('status'));
        $file->description = strip_tags($request->input('description'));
        $this->storeAndUpdate($request,$file);
        return redirect()->route('files.index')->with('success','File has been updated successfully');


    }


    public function updateStatus( File $file)
    {
        // Toggle the is_online status
        $file->update(['is_online' => !$file->is_online]);

        return back()->with('success', 'Status updated successfully');
    }
}
