@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="row">
            <div class="col-xl-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body text-center">
                        <h1 class="text-gray-900 font-weight-bold">Documents Watch List</h1>
                    </div>
                </div>
            </div>
        </div>

        @if(is_null($todays->first()))
        {{-- Do nothing --}}
        @else
        <div class="alert alert-danger">
            {{-- <div class="table-responsive">
                <table class="table table-bordered" id="watchlist" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Document Name</th>
                            <th>Category</th>
                            <th>Path</th>
                            <th>Expiry Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($todays as $today)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><a href="{{ $today->content_link }}" target="_blank"><img
                                            src="https://cdn-icons-png.flaticon.com/512/2258/2258853.png"
                                            class="img-fluid" width="45"
                                            height="30">{{ $today->content_name }}
                                    </a>
                                </td>
                                <td>{{ $today->content_category }}</td>
                                <td>{{ $today->content_path }}</td>
                                <td>{{ date_format(date_create($today->expiry_date), 'Y-m-d') }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> --}}
            Important! Some document(s) are expiring today. Click <a href="">here</a> to take action.
        </div>
        @endif

        <div class="card">
            <ul class="nav nav-tabs" id="watchList" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#index" role="tab"
                        aria-controls="home" aria-selected="true">Less than 7 Days</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#active" role="tab"
                        aria-controls="profile" aria-selected="false">Less than 14 Days</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#database" role="tab"
                        aria-controls="contact" aria-selected="false">Less than 30 Days</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="index" role="tabpanel" aria-labelledby="home-tab">
                    @include('project-management.watchlist.lessthan7days')
                </div>
                <div class="tab-pane fade" id="active" role="tabpanel" aria-labelledby="profile-tab">
                    @include('project-management.watchlist.lessthan14days')
                </div>
                <div class="tab-pane fade" id="database" role="tabpanel" aria-labelledby="contact-tab">
                    @include('project-management.watchlist.lessthan30days')
                </div>
            </div>
        </div>

        
    </div>
@endsection
