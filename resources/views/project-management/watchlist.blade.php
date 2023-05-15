@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        {{-- <div class="row">
            <div class="col-xl-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body text-center"> --}}
                        <h1 class="text-gray-900 font-weight-bold">Documents Watch List</h1>
                    {{-- </div>
                </div>
            </div>
        </div> --}}

        @if (is_null($todays->first()))
            {{-- Do nothing --}}
        @else
            <div class="alert alert-danger">
                Important! Some item(s) are expiring / has expired today. Click
                <a data-toggle="modal" data-target="#modalImportant" href="">here</a> to take action.

                @include('project-management.watchlist.modal-important')
            </div>
        @endif

        @if(Auth()->user()->role_id != 3)
        <div class="row">
            <div class="col-xl-12 mb-4">
                <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="float: right;"
                    data-toggle="modal" data-target="#addItemModal">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Add Item
                </button>

                @include('project-management.watchlist.addItem')
            </div>
        </div>
        @endif


        <div class="card mb-4">
            <ul class="nav nav-tabs" id="watchList" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab"
                        aria-controls="all" aria-selected="true">All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#index" role="tab" aria-controls="home"
                        aria-selected="false">Less than 7 Days</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#active" role="tab"
                        aria-controls="profile" aria-selected="false">Less than 14 Days</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#database" role="tab"
                        aria-controls="contact" aria-selected="false">Less than 30 Days</a>
                </li>

            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                    @include('project-management.watchlist.allWatchlist')
                </div>
                <div class="tab-pane fade" id="index" role="tabpanel" aria-labelledby="home-tab">
                    @include('project-management.watchlist.lessthan7days')
                </div>
                <div class="tab-pane fade" id="active" role="tabpanel" aria-labelledby="profile-tab">
                    @include('project-management.watchlist.lessthan14days')
                </div>
                <div class="tab-pane fade" id="database" role="tabpanel" aria-labelledby="contact-tab">
                    @include('project-management.watchlist.lessthan30days')
                </div>

            </div>
        </div>
    </div>
@endsection
