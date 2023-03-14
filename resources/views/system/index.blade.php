@extends('layouts.master')

@section('content')
    <!-- Page Heading -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                    Total System
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $totalsystems->count() }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                    Active System
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $totalsystems->where('is_active', 'Y')->count() }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                    Production System
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $totalsystems->where('system_category', 'Production')->count() }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-info text-uppercase mb-1">
                                    Development System
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                            {{ $totalsystems->where('system_category', 'Development')->count() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
        <div class="card">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#index" role="tab"
                        aria-controls="home" aria-selected="true">Active System</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#active" role="tab"
                        aria-controls="profile" aria-selected="false">Active System</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#database" role="tab"
                        aria-controls="contact" aria-selected="false">Database</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="index" role="tabpanel" aria-labelledby="home-tab">
                    <div class="d-flex">
                        <div class="mr-auto p-2">
                            <h1 class="h3 mb-0 text-gray-800">All System(s)</h1>
                        </div>
                        <div class="p-2">
                            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="button"
                                data-toggle="modal" data-target="#addSystem">
                                <i class="fas fa-plus fa-sm"></i> Add System
                            </button>
                            @include('system.modal-addSystem')
                        </div>
                    </div>
                    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">MRT System(s)</h1>
                    </div> --}}

                    <div class="row">
                        @foreach ($systems->sortBy('system_name') as $system)
                            <div class="col-lg-6">
                                <div class="card shadow mb-4">

                                    <a href="#collapseCardExample{{ $system->system_id }}" class="d-block card-header py-3"
                                        data-toggle="collapse" role="button" aria-expanded="false"
                                        aria-controls="collapseCardExample">
                                        @if ($system->is_active == 'Y')
                                            <h6 class="m-0 font-weight-bold text-success">{{ $system->system_name }}</h6>
                                        @else
                                            <h6 class="m-0 font-weight-bold text-danger">{{ $system->system_name }}</h6>
                                        @endif
                                    </a>
                                    <div class="collapse" id="collapseCardExample{{ $system->system_id }}">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-end">
                                                <button data-toggle="modal"
                                                    data-target="#updateSystem{{ $system->system_id }}"
                                                    class="btn btn-sm btn-primary shadow-sm"><i
                                                        class="fas fa-pen fa-sm text-white-50"></i>&nbsp Edit
                                                </button>
                                                @include('system.modal-updateSystem')
                                                {{-- <button data-toggle="modal" data-target="#updateSystem{{ $system->system_id }}"
                                                    class="btn btn-sm btn-primary shadow-sm"><i class="bi bi-folder-plus"></i>
                                                </button>
                                                @include('system.modal-updateSystem') --}}
                                            </div>
                                            <a
                                                href="{{ $system->system_url }}"target="_blank">{{ $system->system_desc }}</a><br>
                                            System Admin: {{ $system->system_admin }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {{-- <div class="tab-pane fade" id="active" role="tabpanel" aria-labelledby="profile-tab">
                    ...
                </div> --}}
                <div class="tab-pane fade" id="database" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="d-flex">
                        <div class="mr-auto p-2">
                            <h1 class="h3 mb-0 text-gray-800">All System(s)</h1>
                        </div>
                        <div class="p-2">
                            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" type="button"
                                data-toggle="modal" data-target="#addSystem">
                                <i class="fas fa-plus fa-sm"></i> Add Databse System
                            </button>
                            @include('system.modal-addSystem')
                        </div>
                    </div>
                    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">MRT System(s)</h1>
                    </div> --}}

                    <div class="row">
                        @foreach ($databases->sortBy('system_name') as $database)
                            <div class="col-lg-6">
                                <div class="card shadow mb-4">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseCardExample{{ $database->system_id }}"
                                        class="d-block card-header py-3" data-toggle="collapse" role="button"
                                        aria-expanded="true" aria-controls="collapseCardExample">
                                        @if ($database->is_active == 'Y')
                                            <h6 class="m-0 font-weight-bold text-success">{{ $database->system_name }}
                                            </h6>
                                        @else
                                            <h6 class="m-0 font-weight-bold text-danger">{{ $database->system_name }}</h6>
                                        @endif
                                    </a>
                                    <div class="collapse" id="collapseCardExample{{ $database->system_id }}">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-end">
                                                <button data-toggle="modal"
                                                    data-target="#updateSystem{{ $database->system_id }}"
                                                    class="btn btn-sm btn-primary shadow-sm"><i
                                                        class="fas fa-pen fa-sm text-white-50"></i>&nbsp Edit
                                                </button>
                                                @include('system.modal-updateSystem')
                                                {{-- <button data-toggle="modal" data-target="#updateSystem{{ $system->system_id }}"
                                                    class="btn btn-sm btn-primary shadow-sm"><i class="bi bi-folder-plus"></i>
                                                </button>
                                                @include('system.modal-updateSystem') --}}
                                            </div>
                                            <a
                                                href="{{ $database->system_url }}"target="_blank">{{ $database->system_desc }}</a><br>
                                            System Admin: {{ $database->system_admin }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
