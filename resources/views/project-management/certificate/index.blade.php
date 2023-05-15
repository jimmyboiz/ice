@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Certificate</h1>

            <div class="justify-content-between">
                <a href="{{ route('pmd.pyline') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                    <i class="fas fa-chevron-circle-left fa-sm text-white-50"></i> Back
                </a>
                @if(Auth()->user()->role_id != 3)
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="button" data-toggle="modal"
                    data-target="#certModal">
                    <i class="fas fa-plus fa-sm"></i> New Certificate
                </button>
                @endif
            </div>
        </div>

        @include('project-management.certificate.create')

        <div class="row">
            <!-- DataTables Example -->
            <div class="col-xl-12 ">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary">List of Certificates</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        @if(Auth()->user()->role_id != 3)
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($certs->sortBy('cert_id') as $cert)
                                        <tr>
                                            <td>{{ $cert->cert_id }}</td>
                                            <td>
                                                <h6><a href="{{ route('pmd.showCert', ['cert_id' => $cert->cert_id]) }}">{{ $cert->cert_name }}</a>
                                                </h6>
                                            </td>
                                            @if(Auth()->user()->role_id != 3)
                                            <td>
                                                <a href="{{ route('pmd.editCert', ['cert_id' => $cert->cert_id]) }}"
                                                    class="btn btn-sm btn-light">
                                                    <i class="fas fa-pen"></i>
                                                </a>
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
