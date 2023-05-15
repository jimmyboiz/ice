@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        {{-- <div class="row">
            <div class="col-xl-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body text-center"> --}}
                        <h1 class="text-gray-900 font-weight-bold">Searching</h1>
                    {{-- </div>
                </div>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-xl-12 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body text-center">
                        <form action="{{ route('pmd.search') }}" method="GET" class="">
                            <div class="input-group">
                                <input type="text" class="form-control bg-gray-100 border-2 small" name='search'
                                    value="{{ Request::get('search') }}" placeholder="Search for..." aria-label="Search"
                                    aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">List of Documents</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="searchTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Document Name</th>
                                        <th>Project</th>
                                        <th>Category</th>
                                        <th>Path</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($searchContents as $searchContent)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><a href="{{ $searchContent->content_link }}" target="_blank"><img
                                                        src="https://cdn-icons-png.flaticon.com/512/2258/2258853.png"
                                                        class="img-fluid" width="45"
                                                        height="30">{{ $searchContent->content_name }}</a>
                                            </td>
                                            <td>{{ $searchContent->project_name }}</td>
                                            <td>{{ $searchContent->content_category }}</td>
                                            {{-- @include('project-management.report.updateContent')</td> --}}
                                            <td>{{ $searchContent->content_path }}</td>
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
