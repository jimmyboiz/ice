@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">System Access</h1>
        </div>

        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create System Access</h6>
            </div>

            <div class="card-body">
                <form class="user" method="POST" action="{{ route('access.create') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-5">
                            <label class="label">System</label>
                            <select class="form-control" name="system_id" id="system_id">
                                <option selected disabled>Choose a system</option>

                                @foreach ($systems->sortBy('system_name') as $system)
                                    <option value="{{ $system->system_id }}">{{ $system->system_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-pen fa-sm text-white-50"></i> Proceed
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection