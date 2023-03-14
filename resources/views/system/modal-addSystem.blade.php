<div class="modal fade" id="addSystem" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
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
                        <form method="POST" action="{{route('system.store')}}">
                            @csrf
                            <div class="form-group">
                                <label class="label text-gray-900">System Name</label>
                                <input type="text" class="form-control" id="system_name" name="system_name">
                            </div>
                            <div class="form-group">
                                <label class="label text-gray-900">System Description</label>
                                <input type="text" class="form-control" id="system_desc" name="system_desc">
                            </div>
                            <div class="form-group">
                                <label class="label text-gray-900">System Address (URL)</label>
                                <input type="text" class="form-control" id="system_url" name="system_url">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label class="label text-gray-900">System Type</label>
                                    <input type="text" class="form-control" id="system_type" name="system_type">
                                </div>
                                <div class="col-sm-4">
                                    <label class="label text-gray-900">System Category</label>
                                    <input type="text" class="form-control" id="system_category"
                                        name="system_category">
                                </div>
                                <div class="col-sm-4">
                                    <label class="label text-gray-900">System Software</label>
                                    <input type="text" class="form-control" id="system_software"
                                        name="system_software">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label class="label text-gray-900">System Hostname</label>
                                    <input type="text" class="form-control" id="system_hostname"
                                        name="system_hostname">
                                </div>
                                <div class="col-sm-4">
                                    <label class="label text-gray-900">System Deploy</label>
                                    <input type="text" class="form-control" id="system_deploy" name="system_deploy">
                                </div>
                                <div class="col-sm-4">
                                    <label class="label text-gray-900">System Publish</label>
                                    <input type="text" class="form-control" id="system_publish"
                                        name="system_publish">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label class="label text-gray-900">System Vendor</label>
                                    <input type="text" class="form-control" id="system_vendor" name="system_vendor">
                                </div>
                                <div class="col-sm-4">
                                    <label class="label text-gray-900">System Owner</label>
                                    <input type="text" class="form-control" id="system_owner" name="system_owner">
                                </div>
                                <div class="col-sm-4">
                                    <label class="label text-gray-900">System Admin</label>
                                    <input type="text" class="form-control" id="system_admin" name="system_admin">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label text-gray-900">System User</label>
                                    <input type="text" class="form-control" id="system_user" name="system_user">
                                </div>
                                <div class="col-sm-6">
                                    <label class="label text-gray-900">Status</label>
                                    <select class="form-control" id="is_active" name="is_active">
                                        <option value="Y">Active</option>
                                        <option value="N">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="usr_create" name="usr_create"
                                value="{{ Auth()->user()->name }}">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success btn-icon-split shadow-sm">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Create</span>
                </button>
                <button type="button" class="btn btn-secondary shadow-sm" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
