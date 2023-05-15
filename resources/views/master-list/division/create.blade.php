<!-- Modal Create Company Form-->
<div class="modal fade" id="addDivisionModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" style="min-width:50%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Create New Division</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="card shadow col-xl-12  mb-4">
                    <div class="card-body">
                        <form class="user" action="{{ route('division.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group ">
                                <label class="label">Division Name</label>
                                <input type="text" class="form-control" id="division_name" name="division_name"
                                    required>
                            </div>
                            <br>

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
