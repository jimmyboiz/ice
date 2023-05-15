<!-- Modal Edit Designation Form-->
<div class="modal fade" id="editAccessModal{{ $access->access_id }}" tabindex="-1" role="dialog"
    aria-labelledby="editAccessModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="min-width:50%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAccessModal">Edit Access Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="card shadow col-xl-12  mb-4">
                    <div class="card-body">
                        <form class="user" action="{{ route('access.update', [$access->access_id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label">Access ID</label>
                                    <input type="text" class="form-control" id="access_id" name="access_id"
                                        value="{{ $access->access_id }}" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label class="label">Employee ID</label>
                                    <input type="text" class="form-control" id="emp_id" name="emp_id"
                                        value="{{ $access->emp_id }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="label">Employee Name</label>
                                <input type="text" class="form-control" id="emp_name" name="emp_name"
                                    value="{{ $access->emp_name }}" readonly>
                            </div>

                            <div class="form-group">
                                <label class="label">System</label>
                                <input type="text" class="form-control" id="system_name" name="system_name"
                                    value="{{ $access->system_name }}" readonly>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label">Effective Date</label>
                                    <input type="date" class="form-control" id="effective_date" name="effective_date"
                                        value="{{ $access->effective_date }}">
                                </div>
                                <div class="col-sm-6">
                                    <label class="label">Expiry Date</label>
                                    <input type="date" class="form-control" id="expiry_date" name="expiry_date"
                                        value="{{ $access->expiry_date }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label">Role</label>
                                    <select class="form-control" id="role_id" name="role_id">
                                        @foreach ($roles->where('system_id', $access->system_id) as $role)
                                            @if ($role->role_id == $access->role_id)
                                                <option value="{{ $access->role_id }}" readonly selected>
                                                    {{ $access->role_name }}</option>
                                            @else
                                                <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="label">Status</label>
                                    <select class="form-control" id="is_active" name="is_active">
                                        @if ($access->is_active === 'Y')
                                            <option value="{{ $access->is_active }}" selected>Active</option>
                                            <option value="N">Inactive</option>
                                        @elseif ($access->is_active === 'N')
                                            <option value="{{ $access->is_active }}" selected>Inactive</option>
                                            <option value="Y">Active</option>
                                        @else
                                            <option value="Y">Active</option>
                                            <option value="N">Inactive</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" class="form-control" id="usr_update" name="usr_update"
                                value="{{ Auth()->user()->email }}">

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
        </div>
    </div>
</div>
<!-- Modal Edit Designation Form End-->
