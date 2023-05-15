<div class="modal fade" id="updateSystem{{ $system->system_id }}" tabindex="-1" role="dialog"
    aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="min-width:50%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Edit Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- DataTales Example -->
                <div class="card shadow col-xl-12  mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{route('system.update', [$system->system_id])}}">
                            @csrf
                            <div class="form-group">
                                <label class="label text-gray-900">System Name</label>
                                <input type="text" class="form-control" id="system_name" name="system_name"
                                    value="{{ $system->system_name }}">
                            </div>
                            <div class="form-group">
                                <label class="label text-gray-900">System Description</label>
                                <input type="text" class="form-control" id="system_desc" name="system_desc"
                                    value="{{ $system->system_desc }}">
                            </div>
                            <div class="form-group">
                                <label class="label">System Address (URL)</label>
                                <input type="text" class="form-control" id="system_url" name="system_url"
                                    value="{{ $system->system_url }}" >
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label class="label">System Type</label>
                                    <input type="text" class="form-control" id="system_type" name="system_type"
                                        value="{{ $system->system_type }}" >
                                </div>
                                <div class="col-sm-4">
                                    <label class="label">System Category</label>
                                    <input type="text" class="form-control" id="system_category"
                                        name="system_category" value="{{ $system->system_category }}" >
                                </div>
                                <div class="col-sm-4">
                                    <label class="label">System Software</label>
                                    <input type="text" class="form-control" id="system_software"
                                        name="system_software" value="{{ $system->system_software }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label class="label">System Hostname</label>
                                    <input type="text" class="form-control" id="system_hostname"
                                        name="system_hostname" value="{{ $system->system_hostname }}" >
                                </div>
                                <div class="col-sm-4">
                                    <label class="label">System Deploy</label>
                                    <input type="text" class="form-control" id="system_deploy" name="system_deploy"
                                        value="{{ $system->system_deploy }}" >
                                </div>
                                <div class="col-sm-4">
                                    <label class="label">System Publish</label>
                                    <input type="text" class="form-control" id="system_publish" name="system_publish"
                                        value="{{ $system->system_publish }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label class="label">System Vendor</label>
                                    <input type="text" class="form-control" id="system_vendor" name="system_vendor"
                                        value="{{ $system->system_vendor }}" >
                                </div>
                                <div class="col-sm-4">
                                    <label class="label">System Owner</label>
                                    <input type="text" class="form-control" id="system_owner" name="system_owner"
                                        value="{{ $system->system_owner }}" >
                                </div>
                                <div class="col-sm-4">
                                    <label class="label">System Admin</label>
                                    <input type="text" class="form-control" id="system_admin" name="system_admin"
                                        value="{{ $system->system_admin }}" >
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label text-gray-900">System User</label>
                                    <input type="text" class="form-control" id="system_user" name="system_user"
                                        value="{{ $system->system_user }}" >
                                </div>
                                <div class="col-sm-6">
                                    <label class="label text-gray-900">Status</label>
                                    <select class="form-control" id="is_active" name="is_active">
                                        @if ($system->is_active == 'Y')
                                            <option value="{{ $system->is_active }}" selected>Active</option>
                                            <option value="N">Inactive</option>
                                        @elseif($system->is_active == 'N')
                                            <option value="{{ $system->is_active }}" selected>Inactive</option>
                                            <option value="Y">Active</option>
                                        @else
                                            <option value="N">Inactive</option>
                                            <option value="Y">Active</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="usr_update" name="usr_update"
                                value="{{ Auth()->user()->email }}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-icon-split shadow-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Update</span>
                </button>
                <button type="button" class="btn btn-secondary shadow-sm" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
