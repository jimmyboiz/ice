<!-- Modal Edit Company Form-->
<div class="modal fade" id="editRiskStatusModal{{ $risk_stat->risk_stat_id }}" tabindex="-1" role="dialog"
    aria-labelledby="editRiskStatusModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="min-width:50%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRiskStatusModal">Edit Risk Status Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="card shadow col-xl-12  mb-4">
                    <div class="card-body">
                        <form class="user" action="{{ route('rms.updateRisk-stat', [$risk_stat->risk_stat_id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label">ID</label>
                                    <input type="text" class="form-control" id="risk_stat_id" name="risk_stat_id"
                                        value="{{ $risk_stat->risk_stat_id }}" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label class="label">Status</label>
                                    <select class="form-control" id="is_active" name="is_active">
                                        @if ($risk_stat->is_active === 'Y')
                                            <option value="{{ $risk_stat->is_active }}" selected>Active</option>
                                            <option value="N">Inactive</option>
                                        @elseif ($risk_stat->is_active === 'N')
                                            <option value="{{ $risk_stat->is_active }}" selected>Inactive</option>
                                            <option value="Y">Active</option>
                                        @else
                                            <option value="Y">Active</option>
                                            <option value="N">Inactive</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label">Risk Status Name</label>
                                    <input type="text" class="form-control" id="risk_stat_name" name="risk_stat_name"
                                        value="{{ $risk_stat->risk_stat_name }}">
                                </div>
                                <div class="col-sm-6">
                                    <label class="label">Description</label>
                                    <input type="text" class="form-control" id="risk_stat_desc" name="risk_stat_desc"
                                        value="{{ $risk_stat->risk_stat_desc }}">
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
<!-- Modal Edit Company Form End-->
