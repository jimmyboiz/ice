<!-- Modal Create Employee Form-->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" role="dialog" aria-labelledby="addEmployeeModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" style="min-width:50%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEmployeeModal">Add New Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="card shadow col-xl-12  mb-4">
                    <div class="card-body">
                        <form class="user" action="{{ route('employee.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label class="label">Abbreviation</label>
                                    <select class="form-control" id="abbr" name="abbr" required>
                                        <option value="MRT">MRT</option>
                                        <option value="BOD">BOD</option>
                                        <option value="CON">CON</option>
                                        <option value="FEL">FEL</option>
                                        <option value="INT">INT</option>
                                        <option value="MRTCFP">MRTCFP</option>
                                        <option value="MRTFEL">MRTFEL</option>
                                        <option value="MYSTEP">MYSTEP</option>
                                        <option value="MRTTEMP">MRTTEMP</option>
                                        <option value="WBL">WBL</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label class="label">Employee No</label>
                                    <input type="text" class="form-control" id="emp_id" name="emp_id" required>
                                </div>
                                <div class="col-sm-3">
                                    <label class="label">Title</label>
                                    <select class="form-control" id="title_id" name="title_id" required>
                                        <option value="" selected disabled>Choose one</option>

                                        @foreach ($titles as $title)
                                            <option value="{{ $title->title_id }}">{{ $title->title_desc }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="label">Full Name</label>
                                <input type="text" class="form-control" id="emp_name" name="emp_name" required>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label">Username</label>
                                    <input type="text" class="form-control" id="ad_id" name="ad_id" required>
                                </div>
                                <div class="col-sm-3">
                                    <label class="label">Gender</label>
                                    <select class="form-control" id="emp_gender" name="emp_gender" required>
                                        <option value="" selected disabled>Choose one</option>
                                        <option value="MALE">MALE</option>
                                        <option value="FEMALE">FEMALE</option>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <label class="label">Date Joined</label>
                                    <input type="date" class="form-control" id="date_joined" name="date_joined" required>
                                </div>
                            </div>
                            <br><hr><br>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="label">Company</label>
                                    <select class="form-control" id="company_id" name="company_id" required>
                                        <option value="" selected disabled>Choose one</option>

                                        @foreach ($companies as $company)
                                            <option value="{{ $company->company_id }}">{{ $company->company_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="label">Designation</label>
                                    <select class="form-control" id="designation_id" name="designation_id" required>
                                        <option value="" selected disabled>Choose one</option>

                                        @foreach ($designations->sortBy('designation_name') as $designation)
                                            <option value="{{ $designation->designation_id }}">
                                                {{ $designation->designation_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="label">Location</label>
                                    <select class="form-control" id="location_id" name="location_id" required>
                                        <option value="" selected disabled>Choose one</option>

                                        @foreach ($locations as $location)
                                            <option value="{{ $location->location_id }}">{{ $location->location_name }}
                                                ({{ $location->location_code }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="label">Contract Ended</label>
                                    <input type="date" class="form-control" id="contract_ended"
                                        name="contract_ended" required>
                                </div>
                            </div>
                            <br><hr><br>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label">Division</label>
                                    <select class="form-control" id="division_id" name="division_id" required>
                                        <option value="" selected disabled>Choose one</option>

                                        @foreach ($divisions as $division)
                                            <option value="{{ $division->division_id }}">
                                                {{ $division->division_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="label">Department</label>
                                    <select class="form-control" id="dept_id" name="dept_id" required>
                                        <option value="" selected disabled>Choose one</option>

                                        @foreach ($departments as $department)
                                            <option value="{{ $department->dept_id }}">{{ $department->dept_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="label">Unit</label>
                                    <select class="form-control" id="dept_unit_id" name="dept_unit_id" required>
                                        <option value="" selected disabled>Choose one</option>

                                        @foreach ($dept_units as $dept_unit)
                                            <option value="{{ $dept_unit->dept_unit_id }}">
                                                {{ $dept_unit->dept_unit_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="label">Grade</label>
                                    <select class="form-control" id="new_grade_id" name="new_grade_id" required>
                                        <option value="" selected disabled>Choose one</option>

                                        @foreach ($grades as $grade)
                                            <option value="{{ $grade->grade_id }}">{{ $grade->grade_desc }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" class="form-control" id="usr_create" name="usr_create"
                                value="{{ Auth()->user()->name }}">
                            <input type="hidden" class="form-control" id="emp_stat" name="emp_stat"
                                value="Y">

                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <div class="mb-6"></div>
                                <div class="justify-content-between">
                                    <button type="submit"
                                        class="d-none d-sm-inline-block btn btn-success btn-icon-split shadow-sm">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                                        <span class="text">Create</span>
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
        </div>
    </div>
</div>
<!-- Modal Create Drawing Form End-->
