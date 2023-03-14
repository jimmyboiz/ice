@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-end mb-2">

        </div>

        <!-- Page Heading -->
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h1 class="h3 mb-0 text-gray-800">Report</h1>
            </div>
            <div class="p-2">
                <a href="{{ route('pmd.pyline') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                    <i class="fas fa-chevron-circle-left fa-sm text-white-50"></i> Back
                </a>
            </div>
            <div class="p-2">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="button" data-toggle="modal"
                    data-target="#demoModal">
                    <i class="fas fa-plus fa-sm"></i> New Report
                </button>
            </div>
        </div>

        @include('project-management.report.create')

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
                        <h5 class="m-0 font-weight-bold text-primary">List of Reports</h5>
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
                                    @foreach ($reports->sortBy('report_id') as $report)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <h6><a
                                                        href="{{ route('pmd.viewreport', [$report->report_id]) }}">{{ $report->report_name }}</a>
                                                </h6>
                                            </td>
                                            <td>
                                                <a href="{{ route('pmd.editreport', ['report_id' => $report->report_id]) }}"
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
    <!-- /.container-fluid -->
@endsection
