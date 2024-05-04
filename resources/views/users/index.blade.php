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
                                    <th>Is Online</th>
                                    <th></th>
                                    <th></th>
                                    </tr></thead>

                                    <tbody>
                                        @foreach($users as $user)
                                        <tr style="white-space: nowrap; font-size: 14px;">

                                        <td style="color: black;"><b>{{$user->name}}</b></td>
                                        <td style="color: blue;">{{$user->email}}</td>
                                        @if($user->job_title_id != null)
                                        <td style="color: green;">{{$user->JobTitle->job}}</td>
                                        @else <td>no job title</td>@endif
                                        @if($user->subscription_id !=null)
                                        <td>{{$user->subscription->type}} , {{$user->subscription->duration}}</td>
                                        @else <td>no subscription</td>
                                        @endif

                                        <td>
                                            <p >
                                            <span class="{{ $user->is_online ? 'greenbg':'redbg' }} p-1">
                                                {{ $user->is_online ? 'online' : 'offline' }}
                                            </span></p>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('users.updateStatus', $user) }}">
                                                    @csrf
                                                    @method('PATCH')

                                                    <button type="submit" class="btn btn-danger btn-xs">Change</button>

                                                </form> 
                                            </td>
                                            <td>
                                            <a href="{{ route('users.edit',['userId'=>$user['id']]) }}" class="btn btn-primary btn-xs">Edit</a>

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