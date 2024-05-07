@extends('layouts.app')

@section('content')
@if ($errors->has('fail'))
<div class="row justify-content-center">
        <div class="col-md-7">
    
                                <div class="alert alert-danger text-center " >
                                    {{ $errors->first('fail') }}
                                </div></div></div>
                            @endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
               
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} @if(auth()->user()->jobTitle->job=='admin') <a href="/admin">Admin Panel</a>@endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
