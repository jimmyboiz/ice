<!-- Modal Example Start-->
<div class="modal fade" id="accessID" tabindex="-1" role="dialog"
aria-labelledby="demoModalLabel" aria-hidden="true">
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
            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
    </div>
</div>
</div>
<!-- Modal Example End-->