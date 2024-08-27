@extends('dashboard')

@section('admin')


    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body ">
                        <div class="text-center">
                            <img src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no_image.jpeg') }}"
                                alt="" class="img-fluid">
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
                    <h3 class="text-center pt-3">Change Password</h3>
                    <div class="card-body">
                        <form action="{{ route('admin.password.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Old Password</label>
                                <input type="text"
                                    class="form-control  @error('old_password')
                                    is-invalid
                                    @enderror"
                                    id="old_password" name="old_password" placeholder="Enter Old Password">
                                    @error('old_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">New Password</label>
                                <input type="text"
                                    class="form-control  @error('new_password')
                                    is-invalid
                                    @enderror"
                                    id="new_password" name="new_password" placeholder="Enter New Password">
                                    @error('new_password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Confirm Password</label>
                                <input type="text"
                                    class="form-control  @error('new_password_confirmation')
                                    is-invalid
                                    @enderror"
                                    id="new_password_confirmation" name="new_password_confirmation" placeholder="Confirm Password">
                                    @error('new_password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Change Password</button>
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
