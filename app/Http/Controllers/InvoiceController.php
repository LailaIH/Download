<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // get all the users with their invoices
    public function index(){
        $usersWithInvoices = User::has('invoices')->get();

        return view('invoices.index',['users'=>$usersWithInvoices]);
    }

    // show all invoices of a certain user
    public function show($userId){

        $invoices = User::findOrFail($userId)->invoices ;
        return view('invoices.show',['invoices'=>$invoices , 'user'=>User::findOrFail($userId)]);
    }

    // view creation form for a new invoice
    public function create(){

        return view('invoices.create',['users'=>User::all()]);
    }

    // store a new invoice for a user
    public function store(Request $request){

        
        $request->validate([
            'user_id'=>'required',
            'invoice'=>'required',
            'paid_amount'=>'required',
        ]);

        $paid_amount = strip_tags($request->input('paid_amount'));
        $total_invoice = strip_tags($request->input('invoice'));
        $userId = $request->input('user_id');
        $invoice = new Invoice();
        $invoice->user_id = $userId;
        $invoice->invoice = $total_invoice;
        $invoice->paid_amount = $paid_amount;
        if($paid_amount <= $total_invoice){
            $invoice->remain_amount = $total_invoice - $paid_amount;

        }

        $invoice->save();
        return redirect()->route('invoices.show' , $userId)->with('success','invoice has benn created successfully');



    }
}
