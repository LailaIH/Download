@extends('common')
@section('content')

<div class="container mt-n5">

    


@if($invoices->isEmpty())
<div class="card">
<div class="card-header">List Of Users Invoices</div>
            <div class="card-body">
                No User Invoices Yet
            </div>
</div>
@else


                        <!-- Invoice-->
                        <div class="card invoice ">
                            <div class="card-header p-4 p-md-5 border-bottom-0  bg-light-gray text-black-50">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-start">
                                        <!-- Invoice branding-->
                                        <img class="invoice-brand-img rounded-circle mb-4" src="/assets/img/coin.png" alt="" />
                                        <div class="h2 text-black mb-0">List of {{$user->name}} invoices</div>
                                        
                                    </div>
                                    <div class="col-12 col-lg-auto text-center text-lg-end">
                                        <!-- Invoice details-->
                                        <div class="h3 text-black">Invoice</div>
                                        
                                        <br />
                                        January 1, 2021
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-4 p-md-5">
                                <!-- Invoice table-->
                                <div class="table-responsive">
                                @if (session('success'))
                                    <div class="alert alert-success">{{ session('success') }}</div>
                                @endif
                                    <table class="table table-borderless mb-0">
                                        <thead class="border-bottom">
                                            <tr class="small text-uppercase text-muted">
                                                <th scope="col">Description</th>
                                                <th class="text-end" scope="col">Total Invoice</th>
                                                <th class="text-end" scope="col">Paid</th>
                                                <th class="text-end" scope="col">Remaining</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Invoice item 1-->
                                            @foreach($invoices as $invoice)
                                            <tr class="border-bottom">
                                                <td>
                                                    <div class="fw-bold">{{$invoice->user->name}}</div>
                                                    <div class="small text-muted d-none d-md-block">Invoice creation date : {{$invoice->created_at}}</div>
                                                </td>
                                                <td class="text-end fw-bold">${{$invoice->invoice}}</td>
                                                <td class="text-end fw-bold">${{$invoice->paid_amount}}</td>
                                                <td class="text-end fw-bold">${{$invoice->remain_amount}}</td>
                                            </tr>
                                           @endforeach
                                          
                                            <!-- Invoice subtotal-->
                                            <tr>
                                                <td class="text-end pb-0" colspan="3"><div class="text-uppercase small fw-700 text-muted">Subtotal:</div></td>
                                                <td class="text-end pb-0"><div class="h5 mb-0 fw-700">$,1925.00</div></td>
                                            </tr>
                                            <!-- Invoice tax column-->
                                            <tr>
                                                <td class="text-end pb-0" colspan="3"><div class="text-uppercase small fw-700 text-muted">Tax (7%):</div></td>
                                                <td class="text-end pb-0"><div class="h5 mb-0 fw-700">$134.75</div></td>
                                            </tr>
                                            <!-- Invoice total-->
                                            <tr>
                                                <td class="text-end pb-0" colspan="3"><div class="text-uppercase small fw-700 text-muted">Total Amount Due:</div></td>
                                                <td class="text-end pb-0"><div class="h5 mb-0 fw-700 text-green">$2059.75</div></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer p-4 p-lg-5 border-top-0">
                                <div class="row">
                                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                        <!-- Invoice - sent to info-->
                                        <div class="small text-muted text-uppercase fw-700 mb-2">To</div>
                                        <div class="h6 mb-1">Company Name</div>
                                        <div class="small">1234 Company Dr.</div>
                                        <div class="small">Yorktown, MA 39201</div>
                                    </div>
                                    <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                                        <!-- Invoice - sent from info-->
                                        <div class="small text-muted text-uppercase fw-700 mb-2">From</div>
                                        <div class="h6 mb-0">Start Bootstrap</div>
                                        <div class="small">5678 Company Rd.</div>
                                        <div class="small">Yorktown, MA 39201</div>
                                    </div>
                                    <div class="col-lg-6">
                                        <!-- Invoice - additional notes-->
                                        <div class="small text-muted text-uppercase fw-700 mb-2">Note</div>
                                        <div class="small mb-0">Payment is due 15 days after receipt of this invoice. Please make checks or money orders out to Company Name, and include the invoice number in the memo. We appreciate your business, and hope to be working with you again very soon!</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    @endif
    
       </div>

    
</main>
                
@endsection