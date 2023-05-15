<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome to MyICE</title>

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
                            <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
                            <div class="col-lg-6 justify-content-center">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome to MyICE</h1>
                                    </div>

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Email Address -->
                                        <div>
                                            <label>Username</label>
                                            <input id="email" class="form-control form-control-user" type="text"
                                                name="email" :value="old('email')" required autofocus>
                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-4">
                                            <label>Password</label>
                                            <input id="password" class="form-control form-control-user" type="password"
                                                name="password" required autocomplete="current-password">
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                                <a class="underline text-sm rounded-md 
                                                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 focus:ring-offset-gray-800"
                                                    href="{{ route('create.instruction') }}" target="_blank">
                                                    Create an Account
                                                </a>
                                                <div class="mb-6"></div>
                                                <div class="justify-content-between">
                                                    <button type="submit"
                                                        class="d-none d-sm-inline-block btn btn-secondary btn-icon-split shadow-sm">
                                                        <span class="text">Log in</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
<!-- Footer -->
<footer class="sticky-footer bg-transparent">
    <div class="container my-auto">
        <div class="copyright text-center my-auto text-white">
            <span>Workplace Innovation</span>
            <span>Copyright &copy; IT Department MRT Corporation {{ now()->year }}</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->
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

{{-- Original Login Template --}}
{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf --}}

<!-- Email Address -->
{{-- <div>
            <x-input-label for="email" value="Username" />
            <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')"
                required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div> --}}

<!-- Password -->
{{-- <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div> --}}

{{-- <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded bg-gray-900 border-gray-300 border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 focus:ring-indigo-600 focus:ring-offset-gray-800"
                    name="remember">
                <span class="ml-2 text-sm text-gray-700 text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div> --}}

{{-- <div class="flex items-center justify-end mt-4"> --}}
{{-- @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 text-gray-400 hover:text-gray-900 hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif --}}

{{-- <a class="underline text-sm text-gray-600 text-gray-400 hover:text-gray-500 hover:text-gray-100 rounded-md 
                focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 focus:ring-offset-gray-800"
                href="{{ route('create.instruction') }}" target="_blank">
                Create an Account
            </a>

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
