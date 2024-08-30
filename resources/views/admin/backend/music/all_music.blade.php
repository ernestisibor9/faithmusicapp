@extends('dashboard')

@section('admin')


@section('title')
	RealMatterInfo - All Post
@endsection

    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Music</h4>
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Artist Image
                                        </th>
                                        <th>
                                            Artist Name
                                        </th>
                                        <th>
                                            Song Title
                                        </th>
                                        <th>
                                            YouTube URL
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($music as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td> <img src="{{ asset($item->photo) }}" alt=""
                                                    style="width: 70px; height:50px;"> </td>
                                            <td>{{ $item->artist_name }}</td>
                                            <td>{{ $item->song_title }}</td>
                                            <td>{{ $item->youtube_url }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('edit.music', $item->id) }}" class="btn btn-info px-5">Edit
                                                </a> &nbsp;
                                                <a href="{{ route('delete.music', $item->id) }}" class="btn btn-danger px-5"
                                                    id="delete">Delete </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
