<!-- Modal Create Item Form-->
<div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModal"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" style="min-width:50%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addItemModalLabel">Add Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="card shadow col-xl-12  mb-4">
                    <div class="card-body">
                        <form class="user" action="{{ route('pmd.item.create') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- <div class="form-group">
                                <label class="label">Item Name</label>
                                <input type="text" class="form-control" id="item_name" name="item_name" required>
                            </div> --}}

                            <div class="form-group">
                                <label class="label">Item Description / Activity</label>
                                <textarea rows="2" class="form-control" id="item_desc" name="item_desc"></textarea>
                            </div>

                            <div class="form-group">
                                <label class="label">Vendor</label>
                                <input type="text" class="form-control" id="item_vendor" name="item_vendor">
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label">PIC</label>
                                    <input type="text" class="form-control" id="item_PIC" name="item_PIC">
                                </div>
                                <div class="col-sm-6">
                                    <label class="label">PIC Email</label>
                                    <input type="email" class="form-control" id="item_PIC_email" name="item_PIC_email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label">Start Date</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date">
                                </div>
                                <div class="col-sm-6">
                                    <label class="label">Expiry Date</label>
                                    <input type="date" class="form-control" id="expiry_date" name="expiry_date">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label">Project</label>
                                    <select class="form-control" id="project_id" name="project_id" required>
                                        <option value="" selected disabled>Choose a project</option>

                                        @foreach ($projects as $project)
                                            <option value="{{ $project->project_id }}">{{ $project->project_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="label">Keyword</label>
                                    <input type="text" class="form-control" id="keyword" name="keyword">
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
<!-- Modal Create Item Form End-->
