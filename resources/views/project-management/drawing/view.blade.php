@extends('layouts.master')

@section('content')
<div class="container-fluid">
    @if (Session::has('message'))
    <div class="alert alert-success">
        {{ Session::get('message') }}
    </div>
    @endif

    <div class="d-flex justify-content-end">
        <a href="{{ route('pmd.drawing') }}">Drawing</a>&nbsp/ {{ $drawings->drawing_name }}
    </div>

    <div class="row">
        <div class="col-xl-12 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body text-center">
                    <h1 class="text-gray-900 font-weight-bold">{{ $drawings->drawing_name }}</h1>
                </div>
            </div>
        </div>
    </div>

    @if (is_null($drawings->drawing_desc))
    {{-- Check report have sub-Module or not --}}
    {{-- Do Nothing --}}
    @else
    <div class="row">
        <div class="col-xl-12 mb-4">
            <div class="card shadow h-100 py-2">
                <div class="card-body text-center">
                    <h6 class="text-gray-900">{{ $drawings->drawing_desc }}</h6></a>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- For grouped report --}}
    @if (count($subgroups) >= 1)
    <div class="d-flex justify-content-end mb-4">
        @if (Auth()->user()->role_id != 3)
        <button class="btn btn-primary" style="width: auto;" data-toggle="modal" data-target="#addDrawingGroupModal">
            <i class="fas fa-plus fa-sm"></i> Add Group
        </button>
        @endif
    </div>

    @include('project-management.drawing.addDrawingGroup')


    @foreach ($subgroups->sortBy('subgroup_name') as $subgroup)
    <div class="col-xl-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseGroupCard{{ $subgroup->subgroup_id }}" class="d-block card-header py-3"
                data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseGroupCard">
                <h5 class="m-0 font-weight-bold text-primary">{{ $subgroup->subgroup_name }}</h5>
            </a>

            <!-- Card Content - Collapse -->
            <div class="collapse" id="collapseGroupCard{{ $subgroup->subgroup_id }}">
                <div class="card-body">
                    <div class="d-flex justify-content-end mb-4">
                        @if (Auth()->user()->role_id != 3)
                        <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                            data-target="#addContentSubDrawingModal{{ $subgroup->subgroup_id }}">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Add Document
                        </button>
                        @endif
                    </div>

                    @include('project-management.drawing.addSubDrawing')

                    <div class="row">
                        @foreach ($subcontents as $subcontent)
                        @if ($subcontent->subgroup_id == $subgroup->subgroup_id)
                        <div class="col-lg-6">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    <a href="{{ $subcontent->content_link }}" target="_blank">
                                        <img src="https://cdn-icons-png.flaticon.com/512/2258/2258853.png"
                                            class="img-fluid" width="50" height="30">
                                        {{ $subcontent->content_name }}
                                    </a>
                                </h6>
                                @if (Auth()->user()->role_id != 3)
                                <div>
                                    <a href="#" data-toggle="modal"
                                        data-target="#editSubDrawingModal{{ $subcontent->content_id }}"
                                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                        <i class="fas fa-pen fa-sm text-white-50"></i></a>

                                    @include('project-management.drawing.editSubDrawing')
                                </div>
                                @endif
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    {{-- For non-grouped report --}}
    @elseif (count($contents) >= 1)
    <div class="col-xl-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">List of Drawings</h5>
                @if (Auth()->user()->role_id != 3)
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                    data-target="#addDrawingModal">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Add Document
                </button>
                @endif
                @include('project-management.drawing.addDrawing')
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Document Name</th>
                                @if (Auth()->user()->role_id != 3)
                                <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        @foreach ($contents as $content)
                        <tbody>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ $content->content_link }}" target="_blank">
                                        <img src="https://cdn-icons-png.flaticon.com/512/2258/2258853.png"
                                            class="img-fluid" width="45" height="30">{{ $content->content_name }}
                                    </a>
                                </td @if (Auth()->user()->role_id != 3)
                                >
                                <td>
                                    <button data-toggle="modal"
                                        data-target="#editDrawingModal{{ $content->content_id }}"
                                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                        <i class="fas fa-pen fa-sm text-white-50"></i>
                                    </button>

                                    @include('project-management.drawing.editDrawing')
                                </td>
                                @endif
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
    @elseif (count($contents) < 1) <div class="col-xl-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-primary">List of Drawings</h5>
            </div>

            <div class="card-body">
                <div class="form-group row">
                    @if (Auth()->user()->role_id != 3)
                    <div class="col-sm-6">
                        <button class="btn btn-primary" style="width: 100%;" data-toggle="modal"
                            data-target="#addDrawingModal">Add Document</button>
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-primary" style="width: 100%;" data-toggle="modal"
                            data-target="#addDrawingGroupModal">Add Document By Group</button>
                    </div>
                    @endif
                </div>
            </div>
        </div>
</div>

@include('project-management.drawing.addDrawingGroup')
@include('project-management.drawing.addDrawing')
@endif
</div>
@endsection