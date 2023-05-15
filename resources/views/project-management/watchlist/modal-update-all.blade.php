<div class="modal fade" id="updateItem{{ $item->item_id }}" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" style="min-width:50%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Edit Item Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- DataTales Example -->
                <div class="card shadow col-xl-12  mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('pmd.item.update', [$item->item_id]) }}">
                            @csrf
                            <div class="form-group">
                                <label class="label text-gray-900">Item Description / Activity</label>
                                <textarea rows="2" class="form-control @error('item_desc') is-invalid @enderror"
                                    id="item_desc" name="item_desc" required>{{ $item->item_desc }}</textarea>
                                @error('item_desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="label">Vendor</label>
                                <input type="text" class="form-control @error('item_vendor') is-invalid @enderror"
                                    id="item_vendor" name="item_vendor" value="{{ $item->item_vendor }}">
                                @error('item_vendor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label">PIC</label>
                                    <input type="text" class="form-control @error('item_PIC') is-invalid @enderror"
                                        id="item_PIC" name="item_PIC" value="{{ $item->item_PIC }}">
                                    @error('item_PIC')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="label">PIC Email</label>
                                    <input type="email"
                                        class="form-control @error('item_PIC_email') is-invalid @enderror"
                                        id="item_PIC_email" name="item_PIC_email"
                                        value="{{ $item->item_PIC_email }}">
                                    @error('item_PIC_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label">Start Date</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date"
                                        value="{{ $item->start_date }}">
                                </div>
                                <div class="col-sm-6">
                                    <label class="label">Expiry Date</label>
                                    <input type="date" class="form-control" id="expiry_date" name="expiry_date"
                                        value="{{ $item->expiry_date }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label">Project</label>
                                    <select class="form-control" id="project_id" name="project_id" required>
                                        @foreach ($projects as $project)
                                        @if($item->project_id == $project->project_id)
                                        <option value="{{ $item->project_id }}" selected>{{ $project->project_name }}</option>
                                        @else
                                        <option value="{{ $project->project_id }}">{{ $project->project_name }}
                                        </option>
                                        @endif
                                            
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="label text-gray-900">Keyword</label>
                                    <input type="text" class="form-control"id="keyword" name="keyword"
                                        value="{{ $item->keyword }}">
                                </div>
                            </div>

                            <input type="hidden" class="form-control" id="usr_update" name="usr_update"
                                value="{{ Auth()->user()->email }}">

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success btn-icon-split shadow-sm">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check"></i>
                                    </span>
                                    <span class="text">Update</span>
                                </button>
                                <button type="button" class="btn btn-secondary shadow-sm"
                                    data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
