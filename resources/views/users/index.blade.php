@extends('common')
@section('content')


<div class="container mt-n5">



        <div class="card">
            <div class="card-header">List Of Users</div>

            @if($users->isEmpty())
            <div class="card-body">
                No Users Yet
            </div>
            @else
                <div class="card-body">
                    

                <div class=" mt-3 table-container">
                            @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            
                                <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 14px;">
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>Job Title</th>
                                    <th>Subscription</th>

                                    </tr></thead>

                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>

                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->JobTitle->job}}</td>
                                        @if($user->subscription_id !=null)
                                        <td>{{$user->subscription->type}} , {{$user->subscription->duration}}</td>
                                        @else <td></td>
                                        @endif
                                        </tr>

                                            @endforeach
                                    </tbody>
                                </table>


                </div>
            </div>

            @endif

       
       


        </div>




</div>


@endsection