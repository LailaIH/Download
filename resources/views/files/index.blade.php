@extends('common')
@section('content')


<div class="container mt-n5">



        <div class="card">
            <div class="card-header">List Of Files</div>

            @if($files->isEmpty())
            <div class="card-body">
                No Files Yet
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
                                    <th>File URL</th>
                                    <th>File Size</th>
                                    <th>File Type</th>
                                    <th>Downloading Source</th>
                                    <th>Is Online</th>
                                    <th></th>
                                    <th></th>

                                    </tr></thead>

                                    <tbody>
                                        @foreach($files as $file)
                                        <tr style="white-space: nowrap; font-size: 13px;">

                                        <td style="color: black;"><b>{{$file->user->name}}</b></td>
                                        <td>{{$file->file_url}}</td>
                                        <td style="color: blue;">{{$file->file_size}}</td>
                                       
                                        <td style="color: blue;">{{$file->file_type}}</td>
                                        <td>{{$file->download_source}}</td>
                                        <td>
                                            <p >
                                            <span class="{{ $file->is_online ? 'greenbg':'redbg' }} p-1">
                                                {{ $file->is_online ? 'online' : 'offline' }}
                                            </span></p>
                                        </td>

                                        <td>
                                            <form method="POST" action="{{ route('files.updateStatus', $file) }}">
                                                    @csrf
                                                    @method('PATCH')

                                                    <button type="submit" class="btn btn-danger btn-xs">Change</button>

                                                </form> 
                                            </td>
                                            <td>
                                     <a href="{{route('files.edit',['fileId'=>$file['id'] ])}}" class="btn btn-primary btn-xs">Edit</a>

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