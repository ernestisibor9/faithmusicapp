@extends('dashboard')

@section('admin')


<div class="content-wrapper">
    <div class="row">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body ">
                        <div class="text-center">
                            <img src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no_image.jpeg') }}" alt="" class="img-fluid">
                        <div class="mt-2">
                            <h5 class="">NAME: {{ $profileData->name }}</h5>
                            <h5 class="">EMAIL: {{ $profileData->email }}</h5>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card shadow">
                    <h3 class="text-center pt-3">Profile</h3>
                    <div class="card-body">
                        <form action="{{route('admin.profile.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" value="{{ $profileData->name }}" name="name" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $profileData->email }}" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $profileData->phone }}" placeholder="Enter phone">
                            </div>
                            <div class="form-group">
                                <label for="phone">Photo</label>
                                <input type="file" class="form-control" id="image" name="photo" >
                            </div>
                            <div class="form-group">
                                <img id="showImage"
                                src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no_image.jpeg') }}"
                                alt="Admin" class="rounded-circle p-1 bg-primary" width="90">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" name="address" placeholder="Enter address">{{$profileData->address}}</textarea>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#image').change(function(e) {
            let reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result)
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>

@endsection
