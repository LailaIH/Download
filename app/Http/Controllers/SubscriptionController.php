<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('subscriptions.index',['subs'=>Subscription::all()]);
    }

    public function storeAndUpdate(Request $request , Subscription $sub){
        $request->validate([
            'type' => 'required',
            'price'=>'required',
            'duration'=>'required',
        ]);
        
        $sub->type = strip_tags($request->input('type'));
        $sub->price = strip_tags($request->input('price'));
        $sub->description = $request->input('description') ;
        $sub->duration = $request->input('duration') ;
        $sub->save();
    }

    public function create(){

        return view('subscriptions.create');
    }


    public function store(Request $request){

     

        $sub = new Subscription();
        $this->storeAndUpdate($request,$sub);
        

        return redirect()->route('subscriptions.index')->with('success','new subscription method has been created successfully');

    }

    public function edit($subId){
        $sub = Subscription::findOrFail($subId);

        return view('subscriptions.edit',['sub'=>$sub]);
    }

    public function update(Request $request , $subId){
        $sub = Subscription::findOrFail($subId);
        $sub->status = strip_tags($request->input('status'));
        $this->storeAndUpdate($request,$sub);
        return redirect()->route('subscriptions.index')->with('success',' subscription method has been updated successfully');

        
    }

    public function updateStatus( Subscription $sub)
    {
        // Toggle the is_online status
        $sub->update(['is_online' => !$sub->is_online]);

        return back()->with('success', 'Status updated successfully');
    }
}
