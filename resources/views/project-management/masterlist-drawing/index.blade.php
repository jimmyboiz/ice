@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body text-center">
                        <form action="{{ route('pmd.masterlistDrawing') }}" method="GET" class="">
                            <div class="row">
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label text-gray-900">Transmittal No.</label>
                                        <input type="text" class="form-control bg-gray-100 border-2 small"
                                            name='trans_no' value="{{ Request::get('trans_no') }}"
                                            placeholder="Transmittal Number" aria-label="Search"
                                            aria-describedby="basic-addon2">
                                    </div>
                                </div> --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label text-gray-900">Drawing No.</label>
                                        <input type="text" class="form-control bg-gray-100 border-2 small" name='draw_no'
                                            value="{{ Request::get('draw_no') }}" placeholder="Drawing Number"
                                            aria-label="Search" aria-describedby="basic-addon2">
                                    </div>
                                </div>
                                {{-- </div> --}}
                                {{-- <div class="row"> --}}
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="label text-gray-900">Drawing Desc.</label>
                                        <input type="text" class="form-control bg-gray-100 border-2 small"
                                            name='draw_desc' value="{{ Request::get('draw_desc') }}"
                                            placeholder="Drawing Description" aria-label="Search"
                                            aria-describedby="basic-addon2">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <label class="label">Project</label>
                                    <select class="form-control bg-gray-100 border-2 small" id="project" name="project">
                                        <option value="">Please select...</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->project_id }}">
                                                {{ $project->project_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div> --}}
                            </div>
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i> Search
                            </button>
                        </form>
                        {{-- <form action="{{ route('pmd.masterlistDrawing') }}" method="GET" class="">
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
                        </form> --}}
                    </div>
                </div>
            </div>
        </div>
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">List of Drawings</h5>
                        @foreach ($adminPY as $admin)
                            @if ($admin->emp_id == Auth()->user()->emp_id)
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('pmd.masterlistDrawing.create') }}"
                                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="button">
                                        <i class="fas fa-plus fa-sm text-white-50"></i> Add Drawing
                                    </a>
                                </div>
                            @endif
                        @endforeach

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="searchTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Transmittal No.</th>
                                        <th>Drawing No.</th>
                                        <th>Description</th>
                                        <th>Rev.</th>
                                        <th>Project</th>
                                        @foreach ($adminPY as $admin)
                                            @if ($admin->emp_id == Auth()->user()->emp_id)
                                                <th>Action</th>
                                            @endif
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($searchDrawings as $searchDrawing)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $searchDrawing->drawing_detail_transmittal_no }}</td>
                                            <td>{{ $searchDrawing->drawing_detail_no }}</td>
                                            <td>{{ $searchDrawing->drawing_detail_desc }}</td>
                                            <td>{{ $searchDrawing->drawing_detail_rev }}</td>
                                            <td>{{ $searchDrawing->project_name }}</td>
                                            @foreach ($adminPY as $admin)
                                                @if ($admin->emp_id == Auth()->user()->emp_id)
                                                    <td>
                                                        <a href="{{ route('pmd.masterlistDrawing.show', ['drawing_detail_id' => $searchDrawing->drawing_detail_id]) }}"
                                                            class="btn btn-sm btn-primary shadow-sm"><i
                                                                class="fas fa-pen fa-sm text-white-50"></i>
                                                        </a>
                                                    </td>
                                                @endif
                                            @endforeach

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
    <!-- /.container-fluid -->
@endsection
