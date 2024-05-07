@extends('common')
@section('content')

<div class="container mt-n5">


        <div class="card">
            <div class="card-header">List Of Jobs</div>

            @if($jobs->isEmpty())
            <div class="card-body">
                No Jobs yet
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
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Is Online</th>
                                    <th></th>
                                    <th></th>

                                    </tr></thead>

                                    <tbody>
                                        @foreach($jobs as $job)
                                        <tr style="white-space: nowrap; font-size: 13px;">

                                        <td style="color: black;"><b>{{$job->job}}</b></td>
                                        <td >{{$job->description}}</td>
                                        <td>
                                            <p >
                                            <span class="{{ $job->is_online ? 'greenbg':'redbg' }} p-1">
                                                {{ $job->is_online ? 'online' : 'offline' }}
                                            </span></p>
                                        </td>

                                            <td>
                                            <form method="POST" action="{{ route('job_titles.updateStatus', $job) }}">
                                                    @csrf
                                                    @method('PATCH')

                                                    <button type="submit" class="btn btn-danger btn-xs">Change</button>

                                                </form> 
                                            </td>
                                     <td>
                                     <a href="{{route('job_titles.edit',['jobId'=>$job['id'] ])}}" class="btn btn-primary btn-xs">Edit</a>

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