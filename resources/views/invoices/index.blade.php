@extends('common')
@section('content')


<div class="container mt-n5">



        <div class="card">
            <div class="card-header">List Of Users Invoices</div>

            @if($users->isEmpty())
            <div class="card-body">
                No Users Invoices Yet
            </div>
            @else
                <div class="card-body">
                    

                <div class=" mt-3 table-container">
                            @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            
                                <table id="myTable" class="table small-table-text">
                                    <thead>
                                    <tr style="white-space: nowrap; font-size: 13px;">
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>User Job Title</th>
                                    <th></th>

                                    </tr></thead>

                                    <tbody>
                                        @foreach($users as $user)
                                        <tr style="white-space: nowrap; font-size: 13px;">

                                        <td style="color: black;"><b>{{$user->name}}</b></td>
                                        <td style="color: green;">{{$user->email}}</td>
                                        <td>{{$user->jobTitle->job}}</td>
                                        <td>
                                            <a href="{{route('invoices.show' , $user->id)}}" class="btn btn-primary btn-xs">
                                                show invoices
                                            </a>
                                        </td>
                                       
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