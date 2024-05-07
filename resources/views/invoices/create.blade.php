@extends('common')
@section('content')

<div class="container mt-n5">




        <div class="card">
        <div class="card-header">Create A New Invoice</div>
        <div class="card-body">
        @if ($errors->has('fail'))
                                <div class="alert alert-danger">
                                    {{ $errors->first('fail') }}
                                </div>
                            @endif

        <form action="{{ route('invoices.store') }}" method="POST">
                @csrf
               
                <div class="row gx-3 mb-3">

                <div class="col-md-6">
                <label for="user_id" class="small mb-1"> User </label>

                    <select name="user_id" id="user_id" class="form-control form-control-solid" aria-label="Default select example" required>
                        <option value="">Select a User</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @if(old('user_id') == $user->id) selected @endif>{{ $user->name }}</option>
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
                
                <input class="form-control" name="invoice" id="invoice" type="number" required value="{{old('invoice')}}" />
                @error('invoice')
                    {{$message}}
                @enderror
            </div> </div>

           

            <div class="col-12">

            <label for="paid_amount" class="small mb-1"> Paid Amount </label>
                
                <input class="form-control" name="paid_amount" id="paid_amount" type="text" required value="{{old('paid_amount')}}" />
                @error('paid_amount')
                    {{$message}}
                @enderror </div>

              

                
                

            
                
                <div class="col-12">
                   <br>
                <button type="submit" class="btn btn-primary btn-sm">Create Invoice</button></div>
            </form>




        
    </div>
</div>
</div>

@endsection