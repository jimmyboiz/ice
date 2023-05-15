<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Create an Account</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body class="bg-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
                            <div class="col-lg-6 justify-content-center">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create an Account</h1>
                                    </div>

                                    1. Visit <b>MRT Pulse</b> or click <a
                                        href="https://pulse.mymrt.net/pulse-2.0/">here</a>.<br>
                                    2. Scroll down until a set of button is seen on the right-hand side.
                                </div>
                            </div>
                            <div class="col-lg-6 justify-content-center mt-4 px-4">
                                <img src="{{ asset('template\img\mrt-pulse.png') }}" style="width: 100%; height:100%;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 justify-content-center">
                                <div class="p-5">
                                    3. Click on <b>MRT Helpdesk</b> button.
                                </div>
                            </div>
                            <div class="col-lg-6 justify-content-center mt-4 px-4">
                                <img src="{{ asset('template\img\mrt-helpdesk-button.png') }}"
                                    style="width: 100%; height:100%;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 justify-content-center">
                                <div class="p-5">
                                    4. Login to the system using your personal laptop credentials.<br>
                                    5. Create a new ticket to request for system credentials.<br>
                                    6. Submit the ticket to <b>IT - Corporate Applications/Intranets</b>.<br>
                                    7. You will receive an email once account has been created.
                                </div>
                            </div>
                            <div class="col-lg-6 justify-content-center mt-4 px-4">
                                <img src="{{ asset('template\img\helpdesk-request.png') }}"
                                    style="width: 100%; height:100%;">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

</body>

</html>