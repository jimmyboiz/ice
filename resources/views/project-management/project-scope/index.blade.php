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
                <a href="{{ route('pmd.pyline') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                    <i class="fas fa-chevron-circle-left fa-sm text-white-50"></i> Back
                </a>
                
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="button" data-toggle="modal"
                    data-target="#copsModal">
                    <i class="fas fa-plus fa-sm"></i> New Project Scope
                </button>
            </div>
        </div>

        @include('project-management.project-scope.create')

        <div class="row">
            <!-- DataTables Example -->
            <div class="col-xl-12 ">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary">List of Carry-Over Project Scopes</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($scopes->sortBy('carryProject_id') as $scope)
                                        <tr>
                                            <td>{{ $scope->carryProject_id }}</td>
                                            <td>
                                                <h6><a href="{{ route('pmd.showCops', ['carryProject_id' => $scope->carryProject_id]) }}">{{ $scope->carryProject_name }}</a>
                                                </h6>
                                            </td>
                                            <td>
                                                <a href="{{ route('pmd.editCops', ['carryProject_id' => $scope->carryProject_id]) }}"
                                                    class="btn btn-sm btn-light">
                                                    <i class="fas fa-pen"></i>
                                                </a>
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
