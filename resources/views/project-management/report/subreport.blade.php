@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-end">
            <a href="{{ route('pmd.report') }}">Report</a>&nbsp/&nbsp <a href="{{ URL::previous() }}">Railway Scheme
                Reports</a> &nbsp/&nbsp{{ $subreports->subreport_name }}
        </div>
        <div class="row">
            <div class="col-xl-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body text-center">
                        <h1 class="text-gray-900 font-weight-bold">{{ $subreports->subreport_name }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow col-xl-12  mb-4">
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">List of Reports</h5>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-plus fa-sm text-white-50"></i> Add Report</a>
            </div>
            <div class="row">
                @foreach ($contents as $content)
                    <div class="col-lg-6">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 text-center">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    <a href="{{ $content->content_link }}" target="_blank">
                                        <img src="https://cdn-icons-png.flaticon.com/512/664/664977.png" class="img-fluid"
                                            width="150" height="30">{{ $content->content_name }}
                                    </a>
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Document Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($contents as $content)
                            <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{ $content->content_link }}"
                                            target="_blank">{{ $content->content_name }}</a></td>
                                    <td><a href="#" data-toggle="modal"
                                            data-target="#demoModal{{ $content->content_id }}"
                                            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                                class="fas fa-eye fa-sm text-white-50"></i></a>@include('project-management.report.update')
                                    </td>

                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
