@extends('dashboard')

@section('admin')

@php
        $id = Auth::user()->id;
        $profileData = App\Models\User::find($id);
    @endphp

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
                    <h3 class="text-center pt-3">Add Music</h3>
                    <div class="card-body">
                        <form action="{{ route('store.music') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Artist Name</label>
                                <input type="text"
                                    class="form-control"
                                    id="" name="artist_name" placeholder="Artist Name">
                            </div>
                            <div class="form-group">
                                <label for="name">Song Title</label>
                                <input type="text"
                                    class="form-control"
                                    id="" name="song_title" placeholder="Song Title">
                            </div>
                            <div class="form-group">
                                <label for="file">Upload Photo <span class="text-danger">(maximum photo upload 2MB)</span> </label>
                                <input type="file"
                                    class="form-control @error('photo')is-invalid @enderror"
                                    id="image" name="photo" >
                                    @error('photo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                            </div>
                            <div class="col-4 mb-3">
                                <img id="showImage" src="{{ url('upload/no_image2.jpeg') }}" alt="Admin"
                                    class="rounded-circle p-1 bg-primary" width="80">
                            </div>
                            <div class="form-group">
                                <label for="name">YouTube URL </label>
                                <input type="text"
                                    class="form-control"
                                    id="" name="youtube_url" placeholder="YouTube URL">
                            </div>
                            <div class="form-group">
                                <label for="name">Upload Video <span class="text-danger">(maximum video upload 5MB)</span> </label>
                                <input type="file"
                                    class="form-control @error('video')is-invalid @enderror"
                                    id="" name="video">
                                    @error('video')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Upload Audio <span class="text-danger">(maximum audio upload 5MB)</span> </label>
                                <input type="file"
                                    class="form-control  @error('audio')is-invalid @enderror"
                                    id="" name="audio">
                                    @error('audio')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Add Music</button>
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
