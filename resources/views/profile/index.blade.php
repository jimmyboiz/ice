@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile</h1>
        </div>

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-9">
                        <div class="p-5">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" value="{{ Auth()->user()->name }}"
                                    readonly>
                            </div>

                            <label for="username">Username</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{ Auth()->user()->email }}"
                                    aria-label="email" aria-describedby="basic-addon2" readonly>
                            </div>

                            <label for="email">Email</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{ Auth()->user()->email_noti }}"
                                    aria-label="email" aria-describedby="basic-addon2" readonly>
                                {{-- <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">@mymrt.com.my</span>
                            </div> --}}
                            </div>

                            <div class="mt-4">
                            <table class="table table-bordered text-center">
                                <tr>
                                    <th>System</th>
                                    <th>Role</th>
                                </tr>
                                @foreach ($accesses as $access)
                                    <tr>
                                        <td>{{ $access->system_name }}</td>
                                        <td>{{ $access->role_name }}</td>
                                    </tr>
                                @endforeach
                            </table>
                            </div>

                            {{-- <label class="label">Role</label>
                        <div class="input-group mb-2">
                            @foreach ($roles as $role)
                            @if (Auth()->user()->role_id == $role->role_id)
                            <input type="text" class="form-control" id="name" value="{{ $role->role_name }}" readonly>
                            @endif

                            @endforeach --}}
                        </div>

                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
