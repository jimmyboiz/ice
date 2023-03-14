@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Software</h1>

            <div class="justify-content-between">
                <a href="{{ route('pmd.software') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                    <i class="fas fa-chevron-circle-left fa-sm text-white-50"></i> Back
                </a>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Software Details</h6>
            </div>

            <div class="card-body">
                @foreach ($softwares as $software)
                    <form method="POST" action="{{ route('pmd.updateSoftware', ['software_id' => $software->software_id]) }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="label">ID</label>
                                <input type="text" class="form-control" id="software_id" name="software_id"
                                    value="{{ $software->software_id }}" readonly disabled>
                            </div>
                            <div class="col-sm-6">
                                <label class="label">Status</label>
                                <select class="form-control" id="is_active" name="is_active">
                                    @if ($software->is_active === 'Y')
                                        <option value="{{ $software->is_active }}" selected>Active</option>
                                    @endif
                                    @if ($software->is_active === 'N')
                                        <option value="{{ $software->is_active }}" selected>Inactive</option>
                                    @endif

                                    <option value="Y">Active</option>
                                    <option value="N">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label">Certificate Name</label>
                            <input type="text" class="form-control" id="software_name" name="software_name"
                                value="{{ $software->software_name }}">
                        </div>
                        <div class="form-group">
                            <label class="label">Certificate Description</label>
                            <textarea rows="5" class="form-control" id="software_desc" name="software_desc">{{ $software->software_desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="label">Keyword</label>
                            <input type="text" class="form-control" id="keyword" name="keyword"
                                value="{{ $software->keyword }}">
                        </div>

                        <input type="hidden" class="form-control" id="usr_update" name="usr_update"
                            value="{{ Auth()->user()->name }}">

                        <button class="btn btn-success btn-icon-split" style="float: right;" type="submit">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Update</span>
                        </button>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection
