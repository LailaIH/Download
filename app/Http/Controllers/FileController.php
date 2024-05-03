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


    public function store(Request $request){

        $request->validate([
            'user_id'=>'required',
            'file_url'=>'required',
            'file_size'=>'required',
            'file_type'=>'required',
            'download_source'=>'required',

        ]);

        $file = new File();
        $file->user_id = strip_tags($request->input('user_id'));
        $file->file_url = strip_tags($request->input('file_url'));
        $file->file_size = strip_tags($request->input('file_size'));
        $file->file_type = strip_tags($request->input('file_type'));
        $file->download_source = strip_tags($request->input('download_source'));
        $file->save();

        return redirect()->route('files.index')->with('success','File has been created successfully');

    }
}
