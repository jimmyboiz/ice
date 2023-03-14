@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Carry-Over Project Scope</h1>

            <div class="justify-content-between">
                <a href="{{ route('pmd.cops') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                    <i class="fas fa-chevron-circle-left fa-sm text-white-50"></i> Back
                </a>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Project Scope Details</h6>
            </div>

            <div class="card-body">
                @foreach ($scopes as $scope)
                    <form method="POST" action="{{ route('pmd.updateCops', ['carryProject_id' => $scope->carryProject_id]) }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="label">ID</label>
                                <input type="text" class="form-control" id="cert_id" name="cert_id"
                                    value="{{ $scope->carryProject_id }}" readonly disabled>
                            </div>
                            <div class="col-sm-6">
                                <label class="label">Status</label>
                                <select class="form-control" id="is_active" name="is_active">
                                    @if ($scope->is_active === 'Y')
                                        <option value="{{ $scope->is_active }}" selected>Active</option>
                                    @endif
                                    @if ($scope->is_active === 'N')
                                        <option value="{{ $scope->is_active }}" selected>Inactive</option>
                                    @endif

                                    <option value="Y">Active</option>
                                    <option value="N">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label">Project Scope Name</label>
                            <input type="text" class="form-control" id="carryProject_name" name="carryProject_name"
                                value="{{ $scope->carryProject_name }}">
                        </div>
                        <div class="form-group">
                            <label class="label">Project Scope Description</label>
                            <textarea rows="5" class="form-control" id="cert_desc" name="cert_desc">{{ $scope->carryProject_desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="label">Keyword</label>
                            <input type="text" class="form-control" id="keyword" name="keyword"
                                value="{{ $scope->keyword }}">
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
