<div class="modal fade" id="updateContent{{ $contents->content_id }}" tabindex="-1" role="dialog"
    aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="min-width:50%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Edit Document Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- DataTales Example -->
                <div class="card shadow col-xl-12  mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('pmd.content.update', [$contents->content_id]) }}">
                            @csrf
                            <div class="form-group">
                                <label class="label text-gray-900">Document Name</label>
                                <input type="text" class="form-control @error('content_name') is-invalid @enderror"
                                    id="content_name" name="content_name" value="{{ $contents->content_name }}"required>
                                @error('content_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label text-gray-900">Document Link Address (URL)</label>
                                <input type="text" class="form-control @error('content_link') is-invalid @enderror"
                                    id="content_link" name="content_link" value="{{ $contents->content_link }}"required>
                                @error('content_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label">Path</label>
                                <input type="text" class="form-control" id="content_path" name="content_path"
                                    value="{{ $contents->content_path }}" readonly>
                            </div>
                            <div class="form-group row">
                                <input type="hidden" class="form-control" id="usr_update" name="usr_update"
                                    value="{{ Auth()->user()->name }}">
                                <div class="col-sm-6">
                                    <label class="label">Project</label>
                                    <select class="form-control" id="project_id" name="project_id" required>
                                        @foreach ($projects as $project)
                                            @if ($contents->project_id == $project->project_id)
                                                <option value="{{ $contents->project_id }}" selected>
                                                    {{ $project->project_name }}</option>
                                            @else
                                                <option value="{{ $project->project_id }}">
                                                    {{ $project->project_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="label text-gray-900">Keyword</label>
                                    <input type="text" class="form-control"id="keyword" name="keyword"
                                        value="{{ $contents->keyword }}"required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label text-gray-900">Expiry Date</label>
                                    <input type="date" class="form-control" id="expiry_date" name="expiry_date"
                                        value="{{ date_format(date_create($content->expiry_date), 'Y-m-d') }}">
                                </div>
                                <div class="col-sm-6">
                                    <label class="label text-gray-900">Status</label>
                                    <select class="form-control @error('is_active') is-invalid @enderror" id="is_active"
                                        name="is_active">
                                        @if ($contents->is_active == 'Y')
                                            <option value="{{ $contents->is_active }}" selected>Active</option>
                                            <option value="N">Inactive</option>
                                        @elseif($contents->is_active == 'N')
                                            <option value="{{ $contents->is_active }}" selected>Inactive</option>
                                            <option value="Y">Active</option>
                                        @else
                                            <option value="N">Inactive</option>
                                            <option value="Y">Active</option>
                                        @endif
                                    </select>
                                    @error('is_active')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
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
