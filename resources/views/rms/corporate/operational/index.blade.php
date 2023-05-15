@extends('layouts.master')

@section('content')
    <!-- Page Heading -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body text-center">
                        <h1 class="text-gray-900 font-weight-bold">OPERATIONAL RISK</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mb-4">
            <img src="{{ asset('template/img/likelihood vs impact.jpg') }}" width="70%">
        </div>

        <div class="row justify-content-center">
            @foreach ($divisions as $division)
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                    {{ $division->division_name }}
                                </div>
                                {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ $division->division_name }}
                                </div> --}}
                            </div>
                            {{-- <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            

            {{-- <div class="col-sm-3 mb-4">
                <div class="card text-center">
                    <div class="card-header">
                        <a href="">
                            <img src="https://cdn-icons-png.flaticon.com/512/2016/2016314.png" class="img-fluid"
                                width="150" height="30">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Strategic Risk</h6>
                        </a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
