@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Risk Status</h1>

            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="button" data-toggle="modal"
                data-target="#addRiskStatusModal">
                <i class="fas fa-plus fa-sm text-white-50"></i> New Risk Status
            </button>

            @include('rms.risk-stat.create')
        </div>

        <div class="row">
            <div class="col-xl-12 ">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">List of Risk Statuses</h6>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Risk Status</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($risk_stats as $risk_stat)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $risk_stat->risk_stat_name }}</td>
                                            <td>{{ $risk_stat->risk_stat_desc }}</td>
                                            <td>
                                                @if ($risk_stat->is_active === 'Y')
                                                    <div style="color: #13ec13">Active</div>
                                                @endif
                                                @if ($risk_stat->is_active === 'N')
                                                    <div style="color: #ff0000">Inactive</div>
                                                @endif
                                            </td>
                                            <td>
                                                <button data-toggle="modal"
                                                    data-target="#editRiskStatusModal{{ $risk_stat->risk_stat_id }}"
                                                    class="d-none d-sm-inline-block btn btn-sm btn-light shadow-sm">
                                                    <i class="fas fa-pen fa-sm"></i>
                                                </button>

                                                @include('rms.risk-stat.edit')
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
