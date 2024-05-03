<?php

namespace App\Http\Controllers;

use App\Models\JobTitle;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // return all users
    public function index(){

        return view('users.index' , ['users'=>User::all()]);
    }

    // view user creation form
    public function create(){
        $jobs = JobTitle::all();
        $subscriptions = Subscription::all();
        return view('users.create' , [
            'jobs'=>$jobs ,
            'subscriptions'=>$subscriptions,
        ]);
    } 

    // store a user in the database
    public function store(Request $request){
       $data= $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'job_title_id'=>'required',
            
        ]);

     
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->job_title_id = $data['job_title_id'];
        $user->subscription_id = $request->filled('subscription_id')? $request->input('subscription_id'):null ;
        $user->save();

        return redirect()->route('users.index');

    }


}
