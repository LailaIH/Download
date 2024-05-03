@extends('common')
@section('content')

<div class="container mt-n5">




        <div class="card">
        <div class="card-header">Create A New User</div>
        <div class="card-body">


        <form action="{{ route('users.store') }}" method="POST">
                @csrf
               
                <div class="row gx-3 mb-3">

                <div class="col-md-6">
                <label for="name" class="small mb-1">  Name </label>
                <input class="form-control" type="text" id="name"  name="name" value="{{old('name')}}"  required  />
                    @error('name')
                        {{$message}}
                    @enderror
            </div>

                <div class="col-md-6">

                <label class="small mb-1" for="email">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" type="email" aria-describedby="emailHelp" value="{{ old('email') }}" required autocomplete="email" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div></div>



                <div class="row gx-3 mb-3">
                <div class="col-md-6">
                <label for="password" class="small mb-1"> Password </label>
                
                <input class="form-control @error('password') is-invalid @enderror" name="password" id="password" type="password" required autocomplete="new-password" />
                @error('password')
                    {{$message}}
                @enderror
            </div> 
            <div class="col-md-6">
            <label class="small mb-1" for="password-confirm">Confirm Password</label>
            <input class="form-control" name="password_confirmation" id="password-confirm" type="password" placeholder="Confirm password" required autocomplete="new-password" />
            @error('password-confirm')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
             @enderror
            </div></div>

            <div class="row gx-3 mb-3">
                <div class="col-md-6">
                <label for="job_title_id" class="small mb-1"> Job Title </label>

                    <select name="job_title_id" id="job_title_id" class="form-control form-control-solid" aria-label="Default select example" required>
                        <option value="">Select a Job Title</option>
                        @foreach ($jobs as $job)
                            <option value="{{ $job->id }}" @if(old('job_title_id') == $job->id) selected @endif>{{ $job->job }}</option>
                        @endforeach
                    </select>
                    @error('job_title_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-6">
                <label for="job_title_id" class="small mb-1"> Subscription </label>

                    <select name="subscription_id" id="subscription_id" class="form-control form-control-solid" aria-label="Default select example" >
                        <option value="">Select a Subscription</option>
                        @foreach ($subscriptions as $subscription)
                            <option value="{{ $subscription->id }}" @if(old('subscription_id') == $subscription->id) selected @endif >{{ $subscription->duration }}</option>
                        @endforeach
                    </select>
                    @error('subscription_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div></div>
                
                

                
                <div class="col-12">
                   
                <button type="submit" class="btn btn-primary btn-sm">Create User</button></div>
            </form>




        
    </div>
</div>
</div>

@endsection