@extends('common')
@section('content')

<div class="container mt-n5">




        <div class="card">
        <div class="card-header">Create A New Subscription method</div>
        <div class="card-body">


        <form action="{{ route('subscriptions.store') }}" method="POST">
                @csrf
               
                <div class="row gx-3 mb-3">

            <div class="col-md-6">
            <label class="mb-2">Type</label>
                <div class="row">
                    
                    <div class="col">
                <label for="daily">
                    <input type="checkbox" id="type" name="type" value="daily" > Daily
                </label><br></div>
                <div class="col">
                <label for="monthly">
                    <input type="checkbox" id="type" name="type" value="monthly"> Monthly
                </label><br></div>
                <div class="col">
                <label for="yearly">
                    <input type="checkbox" id="type" name="type" value="yearly"> Yearly
                </label><br></div> </div>
                


            </div>

                <div class="col-md-6">

                <label class="small mb-1" for="price">Price</label>
                <input class="form-control" name="price" id="price" type="number" value="{{ old('price') }}" required  />
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div></div>



                <div class="row gx-3 mb-3">
                <div class="col-md-6">
                <label for="description" class="small mb-1"> Description </label>
                
                <textarea class="form-control" name="description" id="description">
                    {{old('description')}}
                </textarea>
                @error('description')
                    {{$message}}
                @enderror
            </div> 
            <div class="col-md-6">
            <label class="small mb-1" for="duration">Duration</label>
            <input class="form-control" name="duration" id="duration" type="text"  required value="{{old('duration')}}" />
            @error('duration')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
             @enderror
            </div></div>

           
               

                
                

                
                <div class="col-12">
                   
                <button type="submit" class="btn btn-primary btn-sm">Create Subscription</button></div>
            </form>




        
    </div>
</div>
</div>

@endsection