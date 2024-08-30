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
                    <h3 class="text-center pt-3">Edit Music</h3>
                    <div class="card-body">
                        <form action="{{ route('update.music') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="music_id" value="{{ $music->id }}">
                            <input type="hidden" name="old_vid" value="{{ $music->video }}">
                            <input type="hidden" name="old_aud" value="{{ $music->audio }}">
                            <input type="hidden" name="old_img" value="{{ $music->photo }}">

                            <div class="form-group">
                                <label for="name">Artist Name</label>
                                <input type="text" class="form-control" id="" name="artist_name"
                                    value="{{ $music->artist_name }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Song Title</label>
                                <input type="text" class="form-control" id="" name="song_title"
                                    value="{{ $music->song_title }}">
                            </div>
                            <div class="form-group">
                                <label for="file">Upload Photo</label>
                                <input type="file" class="form-control " id="image" name="photo">
                            </div>
                            <div class="col-4 mb-3">
                                <img id="showImage" src="{{ asset($music->photo) }}" alt="Admin"
                                    class="rounded-circle p-1 bg-primary" width="80">
                            </div>
                            <div class="form-group">
                                <label for="name">YouTube URL </label>
                                <input type="text" class="form-control" id="" name="youtube_url"
                                    value="{{ $music->youtube_url }}">
                            </div>
                            <div class="form-group">
                                <label for="name">Upload Video </label>
                                <input type="file" class="form-control" id="" name="video">
                            </div>
                            <div class="form-group">
                                <label for="name">Upload Audio </label>
                                <input type="file" class="form-control" id="" name="audio">
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Update Music</button>
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
