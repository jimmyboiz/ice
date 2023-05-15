@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif

        <div class="card shadow col-xl-12  mb-4">
            <div class="card-body">
                <form class="user" action="{{ route('employee.update', [$employee->emp_id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-4">
                            <label class="label">Employee No</label>
                            <input type="text" class="form-control" id="emp_no" name="emp_no"
                                value="{{ $employee->emp_no }}" readonly>
                        </div>
                        <div class="col-sm-3">
                            <label class="label">Title</label>
                            <select class="form-control" id="title_id" name="title_id">
                                <option value="{{ $employee->title_id }}" selected>{{ $employee->title_desc }}
                                </option>

                                @foreach ($titles as $title)
                                    <option value="{{ $title->title_id }}">
                                        {{ $title->title_desc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label class="label">Status</label>
                            <select class="form-control" id="emp_stat" name="emp_stat">
                                @if ($employee->emp_stat === 'Y')
                                    <option value="{{ $employee->emp_stat }}" selected>Active</option>
                                    <option value="N">Inactive</option>
                                @elseif ($employee->emp_stat === 'N')
                                    <option value="{{ $employee->emp_stat }}" selected>Inactive</option>
                                    <option value="Y">Active</option>
                                @else
                                    <option value="Y">Active</option>
                                    <option value="N">Inactive</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label">Full Name</label>
                        <input type="text" class="form-control" id="emp_name" name="emp_name"
                            value="{{ $employee->emp_name }}">
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="label">Username</label>
                            <input type="text" class="form-control" id="ad_id" name="ad_id"
                                value="{{ $employee->ad_id }}">
                        </div>
                        <div class="col-sm-3">
                            <label class="label">Gender</label>
                            <select class="form-control" id="emp_gender" name="emp_gender">
                                @if ($employee->emp_gender === 'MALE')
                                    <option value="{{ $employee->emp_gender }}" selected>
                                        {{ $employee->emp_gender }}</option>
                                    <option value="FEMALE">FEMALE</option>
                                @elseif ($employee->emp_gender === 'FEMALE')
                                    <option value="{{ $employee->emp_gender }}" selected>
                                        {{ $employee->emp_gender }}</option>
                                    <option value="MALE">MALE</option>
                                @else
                                    <option value="MALE">MALE</option>
                                    <option value="FEMALE">FEMALE</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label class="label">Date Joined</label>
                            <input type="date" class="form-control" id="date_joined" name="date_joined"
                                value="{{ date_format(date_create($employee->date_joined), 'Y-m-d') }}">
                        </div>
                    </div>
                    <br>
                    <hr><br>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="label">Company</label>
                            <select class="form-control" id="company_id" name="company_id">
                                <option value="{{ $employee->company_id }}" selected>
                                    {{ $employee->company_name }}</option>

                                @foreach ($companies as $company)
                                    <option value="{{ $company->company_id }}">
                                        {{ $company->company_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="label">Designation</label>
                            <select class="form-control" id="designation_id" name="designation_id">
                                <option value="{{ $employee->designation_id }}" selected>
                                    {{ $employee->designation_name }}</option>

                                @foreach ($designations as $designation)
                                    <option value="{{ $designation->designation_id }}">
                                        {{ $designation->designation_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="label">Location</label>
                            <select class="form-control" id="location_id" name="location_id">
                                <option value="{{ $employee->location_id }}" selected>
                                    {{ $employee->location_name }}</option>

                                @foreach ($locations as $location)
                                    <option value="{{ $location->location_id }}">
                                        {{ $location->location_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="label">Contract Ended</label>
                            <input type="date" class="form-control" id="contract_ended"
                                name="contract_ended"
                                value="{{ date_format(date_create($employee->contract_ended), 'Y-m-d') }}">
                        </div>
                    </div>
                    <br>
                    <hr><br>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="label">Division</label>
                            <select class="form-control" id="division_id" name="division_id">
                                <option value="{{ $employee->division_id }}" selected>
                                    {{ $employee->division_name }}</option>

                                @foreach ($divisions as $division)
                                    <option value="{{ $division->division_id }}">
                                        {{ $division->division_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="label">Department</label>
                            <select class="form-control" id="dept_id" name="dept_id">
                                <option value="{{ $employee->dept_id }}" selected>
                                    {{ $employee->dept_name }}</option>

                                @foreach ($departments as $department)
                                    <option value="{{ $department->dept_id }}">
                                        {{ $department->dept_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="label">Unit</label>
                            <select class="form-control" id="dept_unit_id" name="dept_unit_id">
                                <option value="{{ $employee->dept_unit_id }}" selected>
                                    {{ $employee->dept_unit_name }}</option>

                                @foreach ($dept_units as $dept_unit)
                                    <option value="{{ $dept_unit->dept_unit_id }}">
                                        {{ $dept_unit->dept_unit_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="label">Grade</label>
                            <select class="form-control" id="new_grade_id" name="new_grade_id">
                                <option value="{{ $employee->new_grade_id }}" selected>
                                    {{ $employee->grade_desc }}</option>

                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->grade_id }}">
                                        {{ $grade->grade_desc }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <input type="hidden" class="form-control" id="usr_update" name="usr_update"
                        value="{{ Auth()->user()->name }}">

                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <div class="mb-6"></div>
                        <div class="justify-content-between">
                            <button type="submit"
                                class="d-none d-sm-inline-block btn btn-success btn-icon-split shadow-sm">
                                <span class="icon text-white-50">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text">Update</span>
                            </button>
                            <button type="button"
                                class="d-none d-sm-inline-block btn btn-secondary shadow-sm"
                                data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection