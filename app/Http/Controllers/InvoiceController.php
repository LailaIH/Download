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
        $total = $invoices->sum('remain_amount');

        return view('invoices.show',['invoices'=>$invoices , 
         'user'=>User::findOrFail($userId)
         ,'total'=>$total ]);
    }

    public function storeAndUpdate(Request $request , Invoice $invoice){
        $request->validate([
            'user_id'=>'required',
            'invoice'=>'required',
            'paid_amount'=>'required',
        ]);

        $paid_amount = strip_tags($request->input('paid_amount'));
        $total_invoice = strip_tags($request->input('invoice'));
        $userId = $request->input('user_id');

        $invoice->user_id = $userId;
        $invoice->invoice = $total_invoice;
        $invoice->paid_amount = $paid_amount;
        if($paid_amount <= $total_invoice){
            $invoice->remain_amount = $total_invoice - $paid_amount;

        }
        $invoice->save();
    }

    // view creation form for a new invoice
    public function create(){

        return view('invoices.create',['users'=>User::all()]);
    }

    // store a new invoice for a user
    public function store(Request $request){
       $userId = $request->input('user_id');

       $invoice = new Invoice();
       $this->storeAndUpdate($request,$invoice);

        
        return redirect()->route('invoices.show' , $userId)->with('success','invoice has benn created successfully');



    }

    public function edit($invoiceId){
        $invoice = Invoice::findOrFail($invoiceId);
        return view('invoices.edit',['invoice'=>$invoice , 'users'=>User::all()]);
    }

    public function update(Request $request , $invoiceId){
        $userId = $request->input('user_id');
        $invoice = Invoice::findOrFail($invoiceId);

        $invoice->payment_date = $request->input('payment_date');
        $this->storeAndUpdate($request,$invoice);
        return redirect()->route('invoices.show' , $userId)->with('success','invoice has benn updated successfully');


    }

    public function updateStatus( Invoice $invoice)
    {
        // Toggle the is_online status
        $invoice->update(['is_online' => !$invoice->is_online]);

        return back()->with('success', 'Status updated successfully');
    }
}
