@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="text-gray-900 font-weight-bold mb-4">User Access</h1>

            @if (Auth()->user()->role_id != 3)
                <a href="{{ route('access.showSystem') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
                    type="button">
                    <i class="fas fa-plus fa-sm"></i> Add User
                </a>
            @endif
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex justify-content-between">
                        <h5 class="m-0 font-weight-bold text-primary">List of Users with Access</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable4" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        @if (Auth()->user()->role_id != 3)
                                            <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($accesses as $access)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $access->emp_name }}</td>
                                            <td>{{ $access->role_name }}</td>
                                            @if (Auth()->user()->role_id != 3)
                                                <td><button data-toggle="modal"
                                                        data-target="#editAccessModal{{ $access->access_id }}"
                                                        class="btn btn-sm btn-light shadow-sm"><i
                                                            class="fas fa-pen fa-sm"></i>
                                                    </button>

                                                    @include('system.edit-access')
                                                </td>
                                            @endif
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