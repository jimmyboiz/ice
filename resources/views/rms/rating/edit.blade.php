<!-- Modal Edit Company Form-->
<div class="modal fade" id="editRatingModal{{ $rating->rating_id }}" tabindex="-1" role="dialog"
    aria-labelledby="editRiskStatusModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="min-width:50%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRiskStatusModal">Edit Rating Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="card shadow col-xl-12  mb-4">
                    <div class="card-body">
                        <form class="user" action="{{ route('rms.updateRating', [$rating->rating_id]) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label">ID</label>
                                    <input type="text" class="form-control" id="rating_id" name="rating_id"
                                        value="{{ $rating->rating_id }}" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label class="label">Status</label>
                                    <select class="form-control" id="is_active" name="is_active">
                                        @if ($rating->is_active === 'Y')
                                            <option value="{{ $rating->is_active }}" selected>Active</option>
                                            <option value="N">Inactive</option>
                                        @elseif ($rating->is_active === 'N')
                                            <option value="{{ $rating->is_active }}" selected>Inactive</option>
                                            <option value="Y">Active</option>
                                        @else
                                            <option value="Y">Active</option>
                                            <option value="N">Inactive</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="label">Rating Name</label>
                                <input type="text" class="form-control" id="rating_name" name="rating_name"
                                    value="{{ $rating->rating_name }}">
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
