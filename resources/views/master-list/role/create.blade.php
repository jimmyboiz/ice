<!-- Modal Create Role Form-->
<div class="modal fade" id="addRoleModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="min-width:50%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Create New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="card shadow col-xl-12  mb-4">
                    <div class="card-body">
                        <form class="user" action="{{ route('role.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label">Role Name</label>
                                    <input type="text" class="form-control" id="role_name" name="role_name" required>
                                </div>
                                <div class="col-sm-6">
                                    <label class="label">Description</label>
                                    <input type="text" class="form-control" id="role_desc" name="role_desc" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label">System</label>
                                    <select class="form-control" name="system_id" id="system_id">
                                        <option selected disabled>Choose a system</option>

                                        @foreach ($systems as $system)
                                            <option value="{{ $system->system_id }}">{{ $system->system_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="usr_create" name="usr_create"
                                value="{{ Auth()->user()->email }}">
                            <input type="hidden" class="form-control" id="is_active" name="is_active" value="Y">

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
