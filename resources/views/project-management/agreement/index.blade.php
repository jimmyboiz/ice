@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-end mb-2">
            <a href="{{ route('pmd.pyline') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-chevron-circle-left fa-sm text-white-50"></i> Back
            </a>
        </div>
        <div class="row">
            <div class="col-xl-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body text-center">
                        <h1 class="text-gray-900 font-weight-bold">{{ $agreements->agreement_name }}</h1>
                    </div>
                </div>
            </div>
        </div>
        @if (is_null($agreements->agreement_desc))
            {{-- Check report have sub-Module or not --}}
            {{-- Do Nothing --}}
        @else
            <div class="row">
                <div class="col-xl-12 mb-4">
                    <div class="card shadow h-100 py-2">
                        <div class="card-body text-center">
                            <h6 class="text-gray-900">{{ $agreements->agreement_desc }}</h6></a>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                {{-- <div class="d-flex justify-content-end mb-4">
                    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
                        data-target="#addContentModal">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Add Document
                    </button>
                </div>
                @include('project-management.agreement.addContent') --}}

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <a href="{{ $contents->content_link }}" target="_blank">
                                    <img src="https://cdn-icons-png.flaticon.com/512/2258/2258853.png" class="img-fluid"
                                        width="50" height="30">{{ $contents->content_name }}
                                </a>
                            </h6>
                            <div class="dropdown no-arrow">
                                <button data-toggle="modal" data-target="#updateContent{{ $contents->content_id }}"
                                    class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-pen fa-sm text-white-50"></i>
                                </button>
                                @include('project-management.agreement.updateContent')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- {{ $contents->content_link }} {{ $contents->content_name }} {{ $contents->content_id }} --}}