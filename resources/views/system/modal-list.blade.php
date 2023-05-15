<!-- Modal Example Start-->
<div class="modal fade bd-example-modal-lg" id="accessID" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" style="min-width:auto;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">List of Employees</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- DataTales Example -->
                <div class="card shadow col-xl-12  mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Selection</th>
                                        <th>Staff No</th>
                                        <th>Name</th>
                                        <th>AD_ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees->sortBy('emp_id') as $employee)
                                        <tr>
                                            <td><input type="radio" name="emp_id" id="emp_id"
                                                    value="{{ $employee->emp_id }}"></td>
                                            <td>{{ $employee->emp_no }}</td>
                                            <td>{{ $employee->emp_usrname }}</td>
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
                <button type="button" class="btn btn-primary" data-dismiss="modal">Done</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- Modal Example End-->
