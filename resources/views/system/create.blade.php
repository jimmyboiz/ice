@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">System Access</h1>

            <a href="{{ route('access.showSystem') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-chevron-circle-left fa-sm text-white-50"></i> Back
            </a>
        </div>

        <div class="card shadow mb-4">
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @elseif(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create System Access</h6>
            </div>

            <div class="card-body">
                <form class="user" method="POST" action="{{ route('access.store') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="label">Employee ID</label>
                            <div class="input-group mb-2">
                                <input type="number" class="form-control" id="emp_id" name="emp_id"
                                    placeholder="Select from table" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" data-toggle="modal"
                                        data-target="#accessID">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @include('system.modal-list')
                        <div class="col-sm-3">
                            <label class="label">Temporary Password</label>
                            <div class="input-group mb-2">
                                <input type="password" class="form-control" name="password" id="password" value="12345678"
                                    readonly>
                                <div class="input-group-append">
                                    <button class="btn btn-primary far fa-eye" type="button" id="togglePassword"
                                        style="cursor: pointer;">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="label">Effective Date</label>
                            <input type="date" class="form-control" id="effective_date" name="effective_date"
                                value="{{ now()->format('Y-m-d') }}" readonly>
                        </div>
                        <div class="col-sm-3">
                            <label class="label">Expiry Date</label>
                            <input type="date" class="form-control" id="expiry_date" name="expiry_date">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <label class="label">System</label>
                            <input type="text" class="form-control" id="system_id" name="system_id"
                                value="{{ $systems->system_name }}" readonly>
                        </div>
                        <div class="col-sm-3">
                            <label class="label">Role</label>
                            <select class="form-control" id="role_id" name="role_id">
                                <option value="" selected>Choose a role</option>
                                @foreach ($roles->sortBy('role_name') as $role)
                                    <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" name="system_id" id="system_id" value="{{ $systems->system_id }}">
                        <input type="hidden" name="usr_create" id="usr_create" value="{{ Auth()->user()->email }}">
                        <input type="hidden" name="is_active" id="is_active" value="Y">
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="submit" class="form-control btn btn-primary" id="submit" name="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>



    </div>
@endsection