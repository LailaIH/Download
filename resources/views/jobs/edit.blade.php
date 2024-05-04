@extends('common')
@section('content')

<div class="container mt-n5">




        <div class="card">
        <div class="card-header">Edit Job Title</div>
        <div class="card-body">


        <form action="{{ route('job_titles.update',['jobId'=>$job['id'] ] ) }}" method="POST">
                @csrf
               @method('PUT')
                <div class="row gx-3 mb-3">

                <div class="col-md-6">
                <label for="job" class="small mb-1"> Job Title </label>
                <input type="text" name="job" id="job" class="form-control" required value="{{$job->job}}"/>
                    @error('job')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-6">
                <label for="description" class="small mb-1"> Description </label>
                
                <textarea class="form-control" name="description" id="description" type="text" required  >{{$job->description}}</textarea>
                @error('description')
                    {{$message}}
                @enderror
            </div> </div>

            <div class="row gx-3 mb-3">

                <div class="col-12">
                <label for="status" class="small mb-1"> Status </label>
                <input type="text" name="status" id="status" class="form-control"  value="@if($job->status !=null) {{$job->status}} @endif"/>
                    @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div></div>

            
                <div class="col-12">
                   
                <button type="submit" class="btn btn-primary btn-sm">Edit Job Title</button></div>
            </form>




        
    </div>
</div>
</div>

@endsection