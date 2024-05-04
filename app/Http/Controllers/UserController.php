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

    public function storeAndUpdate(Request $request , User $user){
        $data= $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'job_title_id'=>'required',]);
            $user->name = $data['name'];
            $user->job_title_id = $data['job_title_id'];
            $user->subscription_id = $request->filled('subscription_id')? $request->input('subscription_id'):null ;
            $user->save();

    }

    // store a user in the database
    public function store(Request $request){
       $data= $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);

     
        $user = new User();
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        
        $this->storeAndUpdate($request , $user);
        return redirect()->route('users.index')->with('success','user was created successfully');

    }

    public function edit($userId){
        $jobs = JobTitle::all();
        $subscriptions = Subscription::all();
        return view('users.edit',['user'=>User::findOrFail($userId) 
    , 'jobs'=>$jobs ,
       'subscriptions'=>$subscriptions]);
    }

    public function update(Request $request,$userId){
        $user = User::findOrFail($userId);
        $this->storeAndUpdate($request,$user);
        return redirect()->route('users.index')->with('success','user was updated successfully');

    }

    public function updateStatus( User $user)
    {
        // Toggle the is_online status
        $user->update(['is_online' => !$user->is_online]);

        return back()->with('success', 'Status updated successfully');
    }


}
