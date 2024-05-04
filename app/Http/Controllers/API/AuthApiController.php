<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\JobTitle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthApiController extends Controller
{

    public function register(Request $request){

        $fields = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed'
            
            
        ]);

        $job = JobTitle::where('job','user')->first();


        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
       
        $user->password = Hash::make($request->input('password'));
        $user->job_title_id = $job->id;

        
        $user->save();

        $token = $user->createToken('myapptoken')->plainTextToken;
        
        return response(['user'=>$user , 'token'=>$token] , 201);

    }


    public function login(Request $request) { 
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if(!$user  || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    // public function logout(Request $request){
    //     //$user = Auth::user();
    //     auth()->user()->tokens()->delete();
    //    // $request->user()->currentAccessToken()->delete();


    //     return [
    //         'message' => 'Logged out'
    //     ];
    // }
    
    
}
