@extends('common')
@section('content')

        @if (session('success'))
                            <div class="alert alert-success m-3">{{ session('success') }}</div>
                        @endif


                  <div class="row m-5">
                            <div class="col-xl-4">
                                <!-- Profile picture card-->
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">User Picture</div>
                                    <div class="card-body text-center">
                                        <!-- Profile picture image-->
                                        @if($user->img)
                                        <img id="profile-image" width="160" height="160" class="img-account-profile rounded-circle mb-1" src="{{ asset('userImages/'.$user->img) }}" alt=" user pic " />
                                        @else
                                        <img id="profile-image" width="160" height="140" class="img-account-profile rounded-circle mb-1" src="{{asset('assets/img/illustrations/profiles/profile-1.png')}}" alt=" user pic " />
                                        @endif
                                        <!-- Profile picture help block-->
                                       
                                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                                        <!-- Profile picture upload button-->
                                        <form  method="POST" action="{{ route('users.updateProfile', ['userId'=>$user['id']]) }}" enctype="multipart/form-data" id="image-form">
                                        @csrf
                                        @method('PUT')
                                        
                                        <label for="img" class="custom-file-upload">
                                            Upload New Image
                                        </label>
                                        <input style="display: none;" type="file" name="img" id="img" class="form-control-file" multiple onchange="updateProfileImage(event);">

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <!-- Account details card-->
                                <div class="card mb-4">
                                    <div class="card-header">User Details</div>
                                    <div class="card-body">
                                       
                                        <!-- Form Row-->
                                           
                                            <div class="row gx-3 mb-3">
                                               
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="name">Name</label>
                                                    <input class="form-control" id="name" type="text" name="name" value="{{ $user->name }}" required />
                                                </div>
                                                
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="email">Email</label>
                                                    <input value="{{$user->email}}" type="text" name="email" id="email" class="form-control" required readonly>
                                                        
                                                                                         
                                                        </div>
                                            </div>
                                           
                                            <div class="row gx-3 mb-3">
                                            <div class="col-12">
                                            <label class="small mb-1" for="job">Job Title</label>
                                            <input value="{{$user->jobTitle->job}}" type="text" name="job" id="job" class="form-control" required readonly>



                                            </div></div>

               

                                            <!-- Submit button-->
                                            
                                            <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>



<script>
    function updateProfileImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('profile-image');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);

        // Submit form after selecting image
    }
</script>

@endsection                       