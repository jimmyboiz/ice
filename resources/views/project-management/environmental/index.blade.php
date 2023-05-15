@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-end mb-2">

        </div>

        <!-- Page Heading -->
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h1 class="h3 mb-0 text-gray-800">Environmental</h1>
            </div>
            <div class="p-2">
                <a href="{{ route('pmd.pyline') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                    <i class="fas fa-chevron-circle-left fa-sm text-white-50"></i> Back
                </a>
            </div>
            <div class="p-2">
                @if (Auth()->user()->role_id != 3)
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="button" data-toggle="modal"
                    data-target="#addEnvironmental">
                    <i class="fas fa-plus fa-sm"></i> New Environmental
                </button>
                @endif
            </div>
        </div>

        @include('project-management.environmental.create')

        <div class="row">

            <div class="col-xl-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                    <div class="card-header py-3">
                        <h5 class="m-0 font-weight-bold text-primary">List of Environmental Documents</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        @if (Auth()->user()->role_id != 3)
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($environmentals->sortBy('environmental_id') as $environmental)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <h6><a
                                                        href="{{ route('pmd.viewEnvironmental', [$environmental->environment_id]) }}">{{ $environmental->environment_name }}</a>
                                                </h6>
                                            </td>
                                            @if (Auth()->user()->role_id != 3)
                                            <td>
                                                <a href="{{ route('pmd.editEnvironmental', ['environment_id' => $environmental->environment_id]) }}"
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
    <!-- /.container-fluid -->
@endsection
