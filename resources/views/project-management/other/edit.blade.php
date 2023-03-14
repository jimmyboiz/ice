@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Other Records</h1>

            <div class="justify-content-between">
                <a href="{{ route('pmd.other') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                    <i class="fas fa-chevron-circle-left fa-sm text-white-50"></i> Back
                </a>
            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Records Details</h6>
            </div>

            <div class="card-body">
                @foreach ($records as $record)
                    <form method="POST" action="{{ route('pmd.updateOther', ['otherRec_id' => $record->otherRec_id]) }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="label">ID</label>
                                <input type="text" class="form-control" id="otherRec_id" name="otherRec_id"
                                    value="{{ $record->otherRec_id }}" readonly disabled>
                            </div>
                            <div class="col-sm-6">
                                <label class="label">Status</label>
                                <select class="form-control" id="is_active" name="is_active">
                                    @if ($record->is_active === 'Y')
                                        <option value="{{ $record->is_active }}" selected>Active</option>
                                    @endif
                                    @if ($record->is_active === 'N')
                                        <option value="{{ $record->is_active }}" selected>Inactive</option>
                                    @endif

                                    <option value="Y">Active</option>
                                    <option value="N">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label">Record Name</label>
                            <input type="text" class="form-control" id="otherRec_name" name="otherRec_name"
                                value="{{ $record->otherRec_name }}">
                        </div>
                        <div class="form-group">
                            <label class="label">Record Description</label>
                            <textarea rows="5" class="form-control" id="otherRec_desc" name="otherRec_desc">{{ $record->otherRec_desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="label">Keyword</label>
                            <input type="text" class="form-control" id="keyword" name="keyword"
                                value="{{ $record->keyword }}">
                        </div>

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
