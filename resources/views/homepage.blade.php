@extends('layouts.master')

@section('content')
    <div class="container-fluid ">
        @include('dashboardModal')
        {{-- <div class="row justify-content-lg-center"> --}}
        <h1 class="animated--grow-in font-weight-bold text-gray-900 text-center mb-4">
            <blink>Welcome to Management Information System</blink>
        </h1>
        {{-- </div> --}}
        <div class="row justify-content-lg-center">
            <div class="col-lg-6">
                <div id="carouselExampleSlidesOnly" class="carousel slide mb-4" data-ride="carousel">
                    <div class="carousel-inner"role="listbox" style=" width:100%; height:500px !important;">
                        <div class="carousel-item active">
                            <img class="d-block w-100 border border-dark" src="{{ asset('template/img/1.jpg') }}"
                                alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 border border-dark" src="{{ asset('template/img/2.jpg') }}"
                                alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 border border-dark" src="{{ asset('template/img/3.jpg') }}"
                                alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 border border-dark" src="{{ asset('template/img/4.jpg') }}"
                                alt="Forth slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 border border-dark" src="{{ asset('template/img/5.jpg') }}"
                                alt="Forth slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 border border-dark" src="{{ asset('template/img/6.jpg') }}"
                                alt="Forth slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 border border-dark" src="{{ asset('template/img/7.jpg') }}"
                                alt="Forth slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 border border-dark" src="{{ asset('template/img/8.jpg') }}"
                                alt="Forth slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 border border-dark" src="{{ asset('template/img/9.jpg') }}"
                                alt="Forth slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100 border border-dark" src="{{ asset('template/img/10.jpg') }}"
                                alt="Forth slide">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
