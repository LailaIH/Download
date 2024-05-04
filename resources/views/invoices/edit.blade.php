@extends('common')
@section('content')

<div class="container mt-n5">




        <div class="card">
        <div class="card-header">Edit Invoice</div>
        <div class="card-body">


        <form action="{{ route('invoices.update',['invoiceId'=>$invoice['id']]) }}" method="POST">
                @csrf
                @method('PUT')
               
                <div class="row gx-3 mb-3">

                <div class="col-md-6">
                <label for="user_id" class="small mb-1"> User </label>

                    <select name="user_id" id="user_id" class="form-control form-control-solid" aria-label="Default select example" required>
                        <option value="">Select a User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @if($invoice->user_id == $user->id) selected @endif>{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('user_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-6">
                <label for="invoice" class="small mb-1"> Invoice </label>
                
                <input class="form-control" name="invoice" id="invoice" type="number" required value="{{$invoice->invoice}}" />
                @error('invoice')
                    {{$message}}
                @enderror
            </div> </div>

           

            <div class="row gx-3 mb-3">

            <div class="col-md-6">

            <label for="paid_amount" class="small mb-1"> Paid Amount </label>
                
                <input class="form-control" name="paid_amount" id="paid_amount" type="text" required value="{{$invoice->paid_amount}}" />
                @error('paid_amount')
                    {{$message}}
                @enderror </div>

                <div class="col-md-6">
                <label for="payment_date" class="small mb-1"> Payment Date </label>
                
                <input class="form-control" name="payment_date" id="payment_date" type="date"  value="{{$invoice->payment_date}}" />
                @error('payment_date')
                    {{$message}}
                @enderror
                </div>
            </div>

                
                

            
                
                <div class="col-12">
                   <br>
                <button type="submit" class="btn btn-primary btn-sm">Edit Invoice</button></div>
            </form>




        
    </div>
</div>
</div>

@endsection