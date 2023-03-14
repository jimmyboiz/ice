@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">System Access</h1>
        </div>
        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Create System Access</h6>
            </div>
            <div class="card-body">
                <form class="user">
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="label">Employee No</label>
                            <input type="number" class="form-control" id="emp_id" name="emp_id">
                        </div>
                        <div class="col-sm-3">
                            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#demoModal">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>

                        <!-- Modal Example Start-->
                        <div class="modal fade" id="demoModal" tabindex="-1" role="dialog"
                            aria-labelledby="demoModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" style="min-width:50%;" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="demoModalLabel">Modal Example -Websolutionstuff</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- DataTales Example -->
                                        <div class="card shadow col-xl-12  mb-4">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dataTable" width="100%"
                                                        cellspacing="0">
                                                        <thead>
                                                            <tr>
                                                                <th>Staff ID</th>
                                                                <th>Name</th>
                                                                <th>AD_ID</th>
                                                            </tr>
                                                        </thead>
                                                        <tfoot>
                                                            <tr>
                                                                <th>Staff ID</th>
                                                                <th>Name</th>
                                                                <th>AD_ID</th>
                                                            </tr>
                                                        </tfoot>
                                                        <tbody>
                                                            @foreach ($employees->sortBy('emp_no') as $employee)
                                                                <tr>
                                                                    <td>{{ $employee->emp_id }}</td>
                                                                    <td>{{ $employee->title_desc }}
                                                                        {{ $employee->emp_name }}</td>
                                                                    <td>{{ $employee->ad_id }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Example End-->
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label class="label">Effective Date</label>
                            <input type="date" class="form-control" id="effective_date" name="effective_date"
                                value="{{ now()->format('Y-m-d') }}" disabled>
                        </div>
                        <div class="col-sm-3">
                            <label class="label">Expiry Date</label>
                            <input type="date" class="form-control" id="expiry_date" name="expiry_date">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="label">Full Name</label>
                        <input type="text" class="form-control" id="emp_name" name="emp_name">
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="label">Username</label>
                            <input type="text" class="form-control" id="ad_id" name="ad_id">
                        </div>
                        <div class="col-sm-3">
                            <label class="label">Gender</label>
                            <select class="form-control" id="date_joined" name="date_joined">
                                <option value="" selected disabled>Choose a gender</option>
                                <option value="MALE">MALE</option>
                                <option value="FEMALE">FEMALE</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label class="label">Date Joined</label>
                            <input type="date" class="form-control" id="date_joined" name="date_joined">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label class="label">Company</label>
                            <select class="form-control" id="company_id" name="company_id">
                                <option value="" selected disabled>Choose a company</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="label">Designation</label>
                            <select class="form-control" id="designation_id" name="designation_id">
                                <option value="" selected disabled>Choose a designation</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label class="label">Department</label>
                            <select class="form-control" id="dept_id" name="dept_id">
                                <option value="" selected disabled>Choose a department</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label class="label">Previous Grade</label>
                            <input type="text" class="form-control" id="prev_grade_id" name="prev_grade_id">
                        </div>
                        <div class="col-sm-3">
                            <label class="label">New Grade</label>
                            <input type="text" class="form-control" id="new_grade_id" name="new_grade_id">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label class="label">Unit</label>
                            <select class="form-control" id="dept_unit_id" name="dept_unit_id">
                                <option value="" selected disabled>Choose a department unit</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="label">Division</label>
                            <select class="form-control" id="division_id" name="division_id">
                                <option value="" selected disabled>Choose a division</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label class="label">Location</label>
                            <select class="form-control" id="location_id" name="location_id">
                                <option class="form-control">Choose one</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label class="label">Contract Ended</label>
                            <input type="date" class="form-control" id="contract_ended" name="contract_ended">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label class="label">Submit</label>
                            <input type="submit" class="form-control" id="submit" name="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>



    </div>
@endsection
