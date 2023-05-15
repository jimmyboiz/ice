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
            <h1 class="h3 mb-0 text-gray-800">Line</h1>

            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="button" data-toggle="modal"
                data-target="#addLineModal">
                <i class="fas fa-plus fa-sm text-white-50"></i> New Line
            </button>

            @include('master-list.line.create')
        </div>

        <div class="row">
            <div class="col-xl-12 ">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">List of Line</h6>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Line Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lines as $line)
                                        <tr>
                                            <td>{{ $line->line_id }}</td>
                                            <td>{{ $line->line_name }}</td>
                                            <td>
                                                @if ($line->is_active === 'Y')
                                                    <div style="color: #13ec13">Active</div>
                                                @endif
                                                @if ($line->is_active === 'N')
                                                    <div style="color: #ff0000">Inactive</div>
                                                @endif
                                            </td>
                                            <td>
                                                <button data-toggle="modal"
                                                    data-target="#editLineModal{{ $line->line_id }}"
                                                    class="d-none d-sm-inline-block btn btn-sm btn-light shadow-sm">
                                                    <i class="fas fa-pen fa-sm"></i>
                                                </button>

                                                @include('master-list.line.edit')
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
@endsection
