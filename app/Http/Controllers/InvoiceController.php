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
        $remain_amount = $total_invoice - $paid_amount;
        $userId = $request->input('user_id');

        if($paid_amount <= $total_invoice){
            $invoice->paid_amount = $paid_amount;
            $invoice->remain_amount = $total_invoice - $paid_amount;
            $invoice->user_id = $userId;
            $invoice->invoice = $total_invoice;
            $invoice->save();
            return true;

        }
        else{
            return false;
        }
        
    }

    // view creation form for a new invoice
    public function create(){

        return view('invoices.create',['users'=>User::all()]);
    }

 

    public function store(Request $request){
        $request->validate([
            'user_id'=>'required',
            'invoice'=>'required',
            'paid_amount'=>'required',
        ]);

        $userId = $request->input('user_id');
        $paid_amount = strip_tags($request->input('paid_amount'));
        $total_invoice = strip_tags($request->input('invoice'));

        if($paid_amount <= $total_invoice){
            $invoice = new Invoice();
            $invoice->paid_amount = $paid_amount;
            $invoice->invoice = $total_invoice;
            $invoice->remain_amount = $total_invoice - $paid_amount;
            $invoice->user_id = $userId;
            
            $invoice->save();
            return redirect()->route('invoices.show' , $userId)->with('success','invoice has benn created successfully');


        }
        else{
         return redirect()->back()->withErrors(['fail' => 'Paid amount should not be greater than the invoice!']);

        }


    }

    public function edit($invoiceId){
        $invoice = Invoice::findOrFail($invoiceId);
        return view('invoices.edit',['invoice'=>$invoice , 'users'=>User::all()]);
    }

    

       public function update(Request $request , $invoiceId){
        $request->validate([
            'user_id'=>'required',
            'invoice'=>'required',
            'paid_amount'=>'required',
        ]);
        $userId = $request->input('user_id');
        $paid_amount = strip_tags($request->input('paid_amount'));
        $remain_amount = strip_tags($request->input('remain_amount'));
        $total_invoice = strip_tags($request->input('invoice'));

        $invoice = Invoice::findOrFail($invoiceId);
        $invoice->user_id = $userId;
        $invoice->invoice = $total_invoice;
        $invoice->paid_amount = $paid_amount;
        $invoice->remain_amount = $remain_amount;
        $invoice->save();
       return redirect()->route('invoices.show' , $userId)->with('success','invoice has benn updated successfully');



       }

    public function updateStatus( Invoice $invoice)
    {
        // Toggle the is_online status
        $invoice->update(['is_online' => !$invoice->is_online]);

        return back()->with('success', 'Status updated successfully');
    }
}
