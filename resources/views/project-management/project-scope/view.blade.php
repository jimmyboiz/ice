@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="d-flex justify-content-end">
            <a href="{{ route('pmd.cops') }}">Carry-Over Project Scope</a>&nbsp/ {{ $scopes->carryProject_name }}
        </div>

        <div class="row">
            <div class="col-xl-12 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body text-center">
                        <h1 class="text-gray-900 font-weight-bold">{{ $scopes->carryProject_name }}</h1>
                    </div>
                </div>
            </div>
        </div>

        @if (is_null($scopes->carryProject_desc))
            {{-- Check report have sub-Module or not --}}
            {{-- Do Nothing --}}
        @else
            <div class="row">
                <div class="col-xl-12 mb-4">
                    <div class="card shadow h-100 py-2">
                        <div class="card-body text-center">
                            <h6 class="text-gray-900">{{ $scopes->carryProject_desc }}</h6></a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="col-xl-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between">
                    <h5 class="m-0 font-weight-bold text-primary">List of Carry-Over Project Scope</h5>

                    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                        data-target="#addCopsModal">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Add Document
                    </button>

                    @include('project-management.project-scope.addContent')
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Document Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @foreach ($contents as $content)
                                <tbody>
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <a href="{{ $content->content_link }}" target="_blank">
                                                <img src="https://cdn-icons-png.flaticon.com/512/664/664977.png"
                                                    class="img-fluid" width="45"
                                                    height="30">{{ $content->content_name }}
                                            </a>
                                        </td>

                                        <td>
                                            <button data-toggle="modal"
                                                data-target="#editCopsModal{{ $content->content_id }}"
                                                class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                                <i class="fas fa-pen fa-sm text-white-50"></i>
                                            </button>

                                            @include('project-management.project-scope.editContent')
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
