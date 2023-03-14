@extends('layouts.master')

@section('content')
    <!-- Page Heading -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body text-center">
                        <h1 class="text-gray-900 font-weight-bold">INFO PUTRAJAYA LINE</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3 mb-4">
                <div class="card text-center">
                    <div class="card-header">
                        <a href="{{ route('pmd.report') }}">
                            <img src="https://cdn-icons-png.flaticon.com/512/235/235253.png" class="img-fluid"
                                width="150" height="30">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Reports</h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-4">
                <div class="card text-center">
                    <div class="card-header">
                        <a href="{{ route('pmd.drawing') }}">
                            <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRcCZc2FZYgyj0acbG19by2z4lPxOQpkUU9SCNzz8ROXxDaBPZH"
                                class="img-fluid" width="150" height="30">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Drawings</h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-4">
                <div class="card text-center">
                    <div class="card-header">
                        <a href="{{ route('pmd.cert') }}">
                            <img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTIGEsK-Ydxrn-Fc_GM3ZwSNqi52yDb_4MVjKiiDLL3PQYvDJ_Z"
                                class="img-fluid" width="150" height="30">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Certificate</h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-4">
                <div class="card text-center">
                    <div class="card-header">
                        <a href="{{ route('pmd.agreement') }}">
                            <img src="https://cdn-icons-png.flaticon.com/512/5165/5165921.png"
                                class="img-fluid" width="150" height="30">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Mutual Agreements</h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-4">
                <div class="card text-center">
                    <div class="card-header">
                        <a href="{{ route('pmd.event') }}">
                            <img src="https://cdn-icons-png.flaticon.com/512/2403/2403797.png" class="img-fluid"
                                width="150" height="30">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Significant Events</h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-4">
                <div class="card text-center">
                    <div class="card-header">
                        <a href="{{ route('pmd.cops') }}">
                            <img src="https://cdn-icons-png.flaticon.com/512/390/390077.png" class="img-fluid"
                                width="150" height="30">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Carry-over Project Scope</h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-4">
                <div class="card text-center">
                    <div class="card-header">
                        <a href="{{ route('pmd.software') }}">
                            <img src="https://cdn-icons-png.flaticon.com/512/5741/5741483.png" class="img-fluid"
                                width="150" height="30">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Software</h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-4">
                <div class="card text-center">
                    <div class="card-header">
                        <a href="{{ route('pmd.environmental') }}">
                            <img src="https://cdn-icons-png.flaticon.com/512/2926/2926961.png" class="img-fluid"
                                width="150" height="30">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Environmental</h6>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-4">
                <div class="card text-center">
                    <div class="card-header">
                        <a href="{{ route('pmd.other') }}">
                            <img src="https://cdn-icons-png.flaticon.com/512/3357/3357334.png" class="img-fluid"
                                width="150" height="30">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Other Records</h6>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
