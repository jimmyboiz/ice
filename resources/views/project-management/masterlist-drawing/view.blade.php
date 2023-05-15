@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Drawing Detail Update</h1>

            <a href="{{ url()->previous() }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-chevron-circle-left fa-sm text-white-50"></i> Back
            </a>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow col-xl-12  mb-4">
            <div class="card-body">
                <form method="POST"
                    action="{{ route('pmd.masterlistDrawing.update', ['drawing_detail_id' => $drawings->drawing_detail_id]) }}">
                    @csrf
                    <div class="form-group row">

                        <div class="col-sm-4">
                            <label class="label text-gray-900"">Package Name</label>
                            <input type="text" class="form-control" id="package_name" name="package_name"
                                value="{{ $drawings->masterlist_package_name }}" readonly>
                        </div>
                        <div class="col-sm-4">
                            <label class="label text-gray-900">Package Company</label>
                            <input type="text" class="form-control"id="package_company" name="package_company"
                                value="{{ $drawings->masterlist_package_company }}" readonly>
                        </div>
                        <div class="col-sm-4">
                            <label class="label text-gray-900">Package Volume</label>
                            <input type="text" class="form-control"id="package_volume" name="package_volume"
                                value="{{ $drawings->masterlist_package_volume }}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label text-gray-900">Transmittal Number</label>
                        <input type="text" class="form-control @error('transmittal_number') is-invalid @enderror"
                            id="transmittal_number" name="transmittal_number"
                            value="{{ $drawings->drawing_detail_transmittal_no }}">
                        @error('transmittal_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="label text-gray-900">Drawing Number</label>
                        <input type="text" class="form-control @error('drawing_number') is-invalid @enderror"
                            id="drawing_number" name="drawing_number" value="{{ $drawings->drawing_detail_no }}"required>
                        @error('drawing_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="label text-gray-900">Rev.</label>
                        <input type="text" class="form-control @error('drawing_rev') is-invalid @enderror"
                            id="drawing_rev" name="drawing_rev" value="{{ $drawings->drawing_detail_rev }}"required>
                        @error('drawing_rev')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="label text-gray-900"">Drawing Description</label>
                        <textarea rows="5" class="form-control" id="drawing_description" name="drawing_description">{{ $drawings->drawing_detail_desc }}</textarea>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" class="form-control" id="usr_update" name="usr_update"
                            value="{{ Auth()->user()->email }}">
                        <div class="col-sm-6">
                            <label class="label text-gray-900"">Project</label>
                            <select class="form-control" id="project_id" name="project_id" required>
                                @foreach ($projects as $project)
                                    @if ($drawings->project_id == $project->project_id)
                                        <option value="{{ $drawings->project_id }}" selected>
                                            {{ $project->project_name }}</option>
                                    @else
                                        <option value="{{ $project->project_id }}">
                                            {{ $project->project_name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="label">Status</label>
                            <select class="form-control" id="is_active" name="is_active">
                                @if ($drawings->is_active === 'Y')
                                    <option value="{{ $drawings->is_active }}" selected>Active</option>
                                    <option value="N">Inactive</option>
                                @elseif ($drawings->is_active === 'N')
                                    <option value="{{ $drawings->is_active }}" selected>Inactive</option>
                                    <option value="Y">Active</option>
                                @else
                                    <option value="Y">Active</option>
                                    <option value="N">Inactive</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success btn-icon-split shadow-sm">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Update</span>
                        </button>
                    </div>
            </div>
        </div>

        {{-- <a type="button" class="btn btn-secondary shadow-sm" href="{{ url()->previous() }}">Back</a> --}}
        </form>
    </div>
    <!-- /.container-fluid -->
@endsection
