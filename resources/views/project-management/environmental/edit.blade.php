@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Environmental</h1>

            <div class="justify-content-between">
                @foreach ($environmentals as $environmental)
                    <a href="{{ route('pmd.environmental') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                        <i class="fas fa-chevron-circle-left fa-sm text-white-50"></i> Back
                    </a>
                @endforeach
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Environmental Details</h6>
            </div>

            <div class="card-body">
                @foreach ($environmentals as $environmental)
                    <form method="POST"
                        action="{{ route('pmd.updateEnvironmental', [$environmental->environment_id]) }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="label">ID</label>
                                <input type="text" class="form-control" id="report_id" name="report_id"
                                    value="{{ $environmental->environment_id }}" readonly disabled>
                            </div>
                            <div class="col-sm-6">
                                <label class="label">Status</label>
                                <select class="form-control" id="is_active" name="is_active">
                                    @if ($environmental->is_active === 'Y')
                                        <option value="{{ $environmental->is_active }}" selected>Active</option>
                                        <option value="N">Inactive</option>
                                    @endif
                                    @if ($environmental->is_active === 'N')
                                        <option value="{{ $environmental->is_active }}" selected>Inactive</option>
                                        <option value="Y">Active</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label">Environmental Name</label>
                            <input type="text" class="form-control" id="environment_name" name="environment_name"
                                value="{{ $environmental->environment_name }}">
                        </div>
                        <div class="form-group">
                            <label class="label">Environmental Description</label>
                            <textarea rows="5" class="form-control" id="environment_desc" name="environment_desc">{{ $environmental->environment_desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="label">Keywords</label>
                            <input type="text" class="form-control" id="keyword" name="keyword"
                                value="{{ $environmental->keyword }}">
                        </div>

                        <input type="hidden" class="form-control" id="updated_at" name="updated_at"
                            value="{{ now()->format('Y-m-d') }}">
                        <input type="hidden" class="form-control" id="usr_update" name="usr_update"
                            value="{{ Auth()->user()->name }}">

                        <button class="btn btn-success btn-icon-split" style="float: right;" type="submit">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Update</span>
                        </button>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection
