@extends('layouts.master')

@section('content')
    <!-- Page Heading -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body text-center">
                        <h1 class="text-gray-900 font-weight-bold">CORPORATE</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-3 mb-4">
                <div class="card text-center">
                    <div class="card-header">
                        <a href="{{ route('rms.opIndex') }}">
                            <img src="https://cdn-icons-png.flaticon.com/512/2763/2763294.png" class="img-fluid"
                                width="150" height="30">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Operational Risk</h6>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-sm-3 mb-4">
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
            </div>
        </div>

        {{-- <div class="row justify-content-center mb-4">
            <img src="{{ asset('template/img/likelihood vs impact.jpg') }}" width="95%">
        </div> --}}

    </div>
@endsection
