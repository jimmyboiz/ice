<!-- Modal Edit Designation Form-->
<div class="modal fade" id="editDesignationModal{{ $designation->designation_id }}" tabindex="-1" role="dialog"
    aria-labelledby="editDesignationModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="min-width:50%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDesignationModal">Edit Designation Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="card shadow col-xl-12  mb-4">
                    <div class="card-body">
                        <form class="user" action="{{ route('designation.update', [$designation->designation_id]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label">ID</label>
                                    <input type="text" class="form-control" id="designation_id" name="designation_id"
                                        value="{{ $designation->designation_id }}" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label class="label">Status</label>
                                    <select class="form-control" id="is_active" name="is_active">
                                        @if ($designation->is_active === 'Y')
                                            <option value="{{ $designation->is_active }}" selected>Active</option>
                                            <option value="N">Inactive</option>
                                        @elseif ($designation->is_active === 'N')
                                            <option value="{{ $designation->is_active }}" selected>Inactive</option>
                                            <option value="Y">Active</option>
                                        @else
                                            <option value="Y">Active</option>
                                            <option value="N">Inactive</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="label">Designation Name</label>
                                <input type="text" class="form-control" id="designation_name" name="designation_name"
                                    value="{{ $designation->designation_name }}">
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
                                    <button type="button" class="d-none d-sm-inline-block btn btn-secondary shadow-sm"
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
