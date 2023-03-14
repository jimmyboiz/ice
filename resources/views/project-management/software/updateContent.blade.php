<div class="modal fade" id="updateContent{{ $content->content_id }}" tabindex="-1" role="dialog"
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
                        <form method="POST" action="{{ route('pmd.content.update', [$content->content_id]) }}">
                            @csrf
                            <div class="form-group">
                                <label class="label text-gray-900">Document Name</label>
                                <input type="text" class="form-control @error('content_name') is-invalid @enderror"
                                    id="content_name" name="content_name" value="{{ $content->content_name }}"required>
                                @error('content_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label text-gray-900">Document Link Address (URL)</label>
                                <input type="text" class="form-control @error('content_link') is-invalid @enderror"
                                    id="content_link" name="content_link" value="{{ $content->content_link }}"required>
                                @error('content_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="label">Path</label>
                                <input type="text" class="form-control" id="content_path" name="content_path"
                                    value="{{ $content->content_path }}" readonly>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label">Project</label>
                                    <select class="form-control" id="project_id" name="project_id" required>
                                        @foreach ($projects as $project)
                                            @if ($content->project_id == $project->project_id)
                                                <option value="{{ $content->project_id }}" selected>
                                                    {{ $project->project_name }}</option>
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
                                        value="{{ $content->keyword }}"required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label text-gray-900">Expiry Date</label>
                                    <input type="date" class="form-control" id="expiry_date" name="expiry_date">
                                </div>
                                <div class="col-sm-6">
                                    <label class="label text-gray-900">Status</label>
                                    <select class="form-control @error('is_active') is-invalid @enderror" id="is_active"
                                        name="is_active">
                                        @if ($content->is_active == 'Y')
                                            <option value="{{ $content->is_active }}" selected>Active
                                            </option>
                                        @elseif($content->is_active == 'N')
                                            <option value="{{ $content->is_active }}" selected>Inactive
                                            </option>
                                        @endif
                                        <option value="Y">Active</option>
                                        <option value="N">Inactive</option>
                                    </select>
                                    @error('is_active')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" class="form-control" id="usr_update" name="usr_update"
                                value="{{ Auth()->user()->name }}">
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
