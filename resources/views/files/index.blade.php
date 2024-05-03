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
                                    <tr style="white-space: nowrap; font-size: 14px;">
                                    <th>User Name</th>
                                    <th>File URL</th>
                                    <th>File Size</th>
                                    <th>File Type</th>
                                    <th>Downloading Source</th>

                                    </tr></thead>

                                    <tbody>
                                        @foreach($files as $file)
                                        <tr>

                                        <td>{{$file->user->name}}</td>
                                        <td>{{$file->file_url}}</td>
                                        <td>{{$file->file_size}}</td>
                                       
                                        <td>{{$file->file_type}}</td>
                                        <td>{{$file->download_source}}</td>
                                        
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