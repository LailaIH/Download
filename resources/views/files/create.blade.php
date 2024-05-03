@extends('common')
@section('content')

<div class="container mt-n5">




        <div class="card">
        <div class="card-header">Create A New File</div>
        <div class="card-body">


        <form action="{{ route('files.store') }}" method="POST">
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
                <label for="file_url" class="small mb-1"> File URL </label>
                
                <input class="form-control" name="file_url" id="file_url" type="text" required value="{{old('file_url')}}" />
                @error('file_url')
                    {{$message}}
                @enderror
            </div> </div>

            <div class="row gx-3 mb-3">

            <div class="col-md-6">

            <label for="file_size" class="small mb-1"> File Size </label>
                
                <input class="form-control" name="file_size" id="file_size" type="text" required value="{{old('file_size')}}" />
                @error('file_size')
                    {{$message}}
                @enderror </div>

                <div class="col-md-6">
                <label for="file_type" class="small mb-1"> File Type </label>
                
                <input class="form-control" name="file_type" id="file_type" type="text" required value="{{old('file_type')}}" />
                @error('file_type')
                    {{$message}}
                @enderror
                </div></div>

                <div class="col-12">
                <label for="download_source" class="small mb-1"> Downloading Source </label>
                
                <input class="form-control" name="download_source" id="download_source" type="text" required value="{{old('download_source')}}" />
                @error('download_source')
                    {{$message}}
                @enderror
                </div>
                

            
                
                <div class="col-12">
                   <br>
                <button type="submit" class="btn btn-primary btn-sm">Create File</button></div>
            </form>




        
    </div>
</div>
</div>

@endsection