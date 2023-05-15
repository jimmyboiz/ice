@extends('layouts.master')
@section('content')
    <div class="container-fluid">


        {{-- <label class="label">Password</label>
                        <div class="input-group mb-2">
                            <input type="password" class="form-control" name="password" id="password" value="12345678"
                                readonly>
                            <div class="input-group-append">
                                <button class="far fa-eye" id="togglePassword" style="cursor: pointer;" type="button">
                                </button>
                            </div>
                        </div> --}}

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Update Password</h1>
        </div>
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-3 d-none d-lg-block bg-login-image"></div>
                    <div class="col-lg-9">
                        <div class="p-5">
                            <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                @csrf
                                @method('put')

                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label>Current Password</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="current_password" name="current_password" type="password"
                                            class="form-control" autocomplete="current-password">
                                        <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <div>
                                            <label>New Password</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="password" name="password" type="password" class="form-control"
                                            autocomplete="new-password">
                                        <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label>Confirm Password</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input id="password_confirmation" name="password_confirmation" type="password"
                                            class="form-control" autocomplete="new-password">
                                        <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                                    </div>
                                </div>

                                {{-- <div class="flex items-center gap-4">
                                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                        
                                        @if (session('status') === 'password-updated')
                                            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                                class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                        @endif
                                    </div> --}}

                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <div class="mb-6"></div>
                                    <div class="justify-content-between">
                                        <button type="submit"
                                            class="d-none d-sm-inline-block btn btn-success btn-icon-split shadow-sm">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <span class="text">Save</span>
                                        </button>

                                        {{-- @if (session('status') === 'password-updated')
                                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                            @endif --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
