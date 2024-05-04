@extends('common')
@section('content')

<div class="container mt-n5">




        <div class="card">
        <div class="card-header">Edit Subscription method</div>
        <div class="card-body">


        <form action="{{ route('subscriptions.update',['subId'=>$sub['id']]) }}" method="POST">
                @csrf
               @method('PUT')
                <div class="row gx-3 mb-3">

            <div class="col-md-6">
            <label class="mb-2">Type</label>
                <div class="row">
                    
                    <div class="col">
                <label for="daily">
                    <input type="checkbox" id="type" name="type" value="daily" @if($sub->type=='daily') checked @endif > Daily
                </label><br></div>
                <div class="col">
                <label for="monthly">
                    <input type="checkbox" id="type" name="type" value="monthly" @if($sub->type=='monthly') checked @endif> Monthly
                </label><br></div>
                <div class="col">
                <label for="yearly">
                    <input type="checkbox" id="type" name="type" value="yearly" @if($sub->type=='yearly') checked @endif> Yearly
                </label><br></div> </div>
                


            </div>

                <div class="col-md-6">

                <label class="small mb-1" for="price">Price</label>
                <input class="form-control" name="price" id="price" type="number" value="{{ $sub->price }}" required  />
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
                    {{$sub->description}}
                </textarea>
                @error('description')
                    {{$message}}
                @enderror
            </div> 
            <div class="col-md-6">
            <label class="small mb-1" for="duration">Duration</label>
            <input class="form-control" name="duration" id="duration" type="text"  required value="{{$sub->duration}}" />
            @error('duration')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
             @enderror
            </div></div>

           
            <div class="row gx-3 mb-3">
                <div class="col-md-6">
                <label for="status" class="small mb-1"> Status </label>
                <input type="text" name="status" id="status" class="form-control"  value="@if($sub->status !=null) {{$sub->status}} @endif"/>
                    @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div></div>

                
                

                
                <div class="col-12">
                   
                <button type="submit" class="btn btn-primary btn-sm">Edit Subscription</button></div>
            </form>




        
    </div>
</div>
</div>

@endsection