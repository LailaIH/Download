@extends('common')
@section('content')

<div class="container mt-n5">




        <div class="card">
        <div class="card-header">Create A New Job Title</div>
        <div class="card-body">


        <form action="{{ route('job_titles.store') }}" method="POST">
                @csrf
               
                <div class="row gx-3 mb-3">

                <div class="col-md-6">
                <label for="job" class="small mb-1"> Job Title </label>
                <input type="text" name="job" id="job" class="form-control" required value="{{old('job')}}"/>
                    @error('job')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-6">
                <label for="description" class="small mb-1"> Description </label>
                
                <textarea class="form-control" name="description" id="description" type="text" required  >{{old('description')}}</textarea>
                @error('description')
                    {{$message}}
                @enderror
            </div> </div>

            
                <div class="col-12">
                   
                <button type="submit" class="btn btn-primary btn-sm">Create Job Title</button></div>
            </form>




        
    </div>
</div>
</div>

@endsection