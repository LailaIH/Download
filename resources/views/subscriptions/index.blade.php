@extends('common')
@section('content')


<div class="container mt-n5">



        <div class="card">
            <div class="card-header">List Of Users</div>

            @if($subs->isEmpty())
            <div class="card-body">
                No Subscription methods yet
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
                                    <th>Subscription type</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Duration</th>
                                    <th>Is Online</th>
                                    <th></th>
                                    <th></th>

                                    </tr></thead>

                                    <tbody>
                                        @foreach($subs as $sub)
                                        <tr style="white-space: nowrap; font-size: 14px;">

                                        <td style="color: black;"><b>{{$sub->type}}</b></td>
                                        <td style="color: blue;">${{$sub->price}} per {{$sub->duration}}</td>
                                        <td>{{$sub->description}}</td>
                                        
                                        <td style="color: blue;">{{$sub->duration}}</td>

                                        <td>
                                            <p >
                                            <span class="{{ $sub->is_online ? 'greenbg':'redbg' }} p-1">
                                                {{ $sub->is_online ? 'online' : 'offline' }}
                                            </span></p>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('subscriptions.updateStatus', $sub) }}">
                                                    @csrf
                                                    @method('PATCH')

                                                    <button type="submit" class="btn btn-danger btn-xs">Change</button>

                                                </form> 
                                            </td>
                                            <td>
                                            <a href="{{ route('subscriptions.edit',['subId'=>$sub['id']]) }}" class="btn btn-primary btn-xs">Edit</a>

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