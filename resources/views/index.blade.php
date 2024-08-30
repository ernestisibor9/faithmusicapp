@extends('dashboard')

@section('admin')
    {{-- @section('title')
	RealMatterInfo - Admin Dashboard
@endsection --}}

    @php
        $id = Auth::user()->id;
        $profileData = App\Models\User::find($id);
    @endphp

    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-6">
                <h3 class="mb-0 font-weight-bold">{{ $profileData->name }}</h3>
                <p>You are welcome {{ $profileData->name }}</p>
            </div>
            {{-- <div class="col-sm-6">
                <div class="d-flex align-items-center justify-content-md-end">
                    <div class="mb-3 mb-xl-0 pr-1">
                        <div class="dropdown">
                            <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border mr-2" type="button"
                                id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="typcn typcn-calendar-outline mr-2"></i>Last 7 days
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3"
                                data-x-placement="top-start">
                                <h6 class="dropdown-header">Last 14 days</h6>
                                <a class="dropdown-item" href="#">Last 21 days</a>
                                <a class="dropdown-item" href="#">Last 28 days</a>
                            </div>
                        </div>
                    </div>
                    <div class="pr-1 mb-3 mr-2 mb-xl-0">
                        <button type="button" class="btn btn-sm bg-white btn-icon-text border"><i
                                class="typcn typcn-arrow-forward-outline mr-2"></i>Export</button>
                    </div>
                    <div class="pr-1 mb-3 mb-xl-0">
                        <button type="button" class="btn btn-sm bg-white btn-icon-text border"><i
                                class="typcn typcn-info-large-outline mr-2"></i>info</button>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row  mt-3">
            <div class="col-xl-5 d-flex grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-between">
                            <h4 class="card-title mb-3">{{ $profileData->name }} Photo</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <img src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no_image.jpeg') }}"
                                        alt="" class="img-fluid">
                                    {{-- <div class="col-lg-6">
                                        <div id="circleProgress6" class="progressbar-js-circle rounded p-3"></div>
                                    </div>
                                    <div class="col-lg-6">
                                        <ul class="session-by-channel-legend">
                                            <li>
                                                <div>Firewalls(3)</div>
                                                <div>4(100%)</div>
                                            </li>
                                            <li>
                                                <div>Ports(12)</div>
                                                <div>12(100%)</div>
                                            </li>
                                            <li>
                                                <div>Servers(233)</div>
                                                <div>2(100%)</div>
                                            </li>
                                            <li>
                                                <div>Firewalls(3)</div>
                                                <div>7(100%)</div>
                                            </li>
                                            <li>
                                                <div>Firewalls(3)</div>
                                                <div>6(70%)</div>
                                            </li>
                                        </ul>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-3 d-flex grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-between">
                            <h4 class="card-title mb-3">Events</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="d-flex justify-content-between mb-md-5 mt-3">
                                            <div class="small">Critical</div>
                                            <div class="text-danger small">Error</div>
                                            <div class="text-warning small">Warning</div>
                                        </div>
                                        <canvas id="eventChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-xl-6 d-flex grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-between">
                            <h4 class="card-title mb-3">{{ $profileData->name }} Profile</h4>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div>Name</div>
                                            <div class="text-muted">{{ $profileData->name }}</div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-4">
                                            <div>Email</div>
                                            <div class="text-muted">{{ $profileData->email }}</div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-4">
                                            <div>Phone</div>
                                            <div class="text-muted">{{ $profileData->phone }}</div>
                                        </div>
                                        <div class="d-flex justify-content-between mb-4">
                                            <div>Address</div>
                                            <div class="text-muted">{{ $profileData->address }}</div>
                                        </div>
                                        <div class="progress progress-md mt-4">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-xl-11 d-flex grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Category</h4>
                                    <div class="table-responsive pt-3">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        #
                                                    </th>
                                                    <th>
                                                        Category Name
                                                    </th>
                                                    <th>
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $key => $category)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $category->category_name }}</td>
                                                        <td>
                                                            <a href="{{ route('edit.category', $category->id) }}"
                                                                class="btn btn-info">Edit</a>
                                                            <a href="{{ route('delete.category', $category->id) }}"
                                                                class="btn btn-danger" id="delete">Delete</a>
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
            </div>
        </div> --}}
    </div>
@endsection
