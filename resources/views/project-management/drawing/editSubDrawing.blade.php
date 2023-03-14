<div class="modal fade" id="editSubDrawingModal{{ $subcontent->content_id }}" tabindex="-1" role="dialog"
    aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="min-width:50%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSubDrawingModalLabel">Edit Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- DataTales Example -->
                <div class="card shadow col-xl-12  mb-4">
                    <div class="card-body">
                        <form method="POST" action="{{ route('pmd.content.update', [$subcontent->content_id]) }}">
                            @csrf
                            <div class="form-group">
                                <label class="label text-gray-900">Document Name</label>
                                <input type="text" class="form-control @error('content_name') is-invalid @enderror"
                                    id="content_name" name="content_name"
                                    value="{{ $subcontent->content_name }}"required>

                                @error('content_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="label text-gray-900">Document Link Address (URL)</label>
                                <input type="url" class="form-control" id="content_link" name="content_link"
                                    value="{{ $subcontent->content_link }}"required>
                            </div>

                            <div class="form-group">
                                <label class="label">Path</label>
                                <input type="text" class="form-control" id="content_path" name="content_path"
                                    value="{{ $subcontent->content_path }}" disabled>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label">Project</label>
                                    <select class="form-control" id="project_id" name="project_id" required>
                                        @foreach ($projects as $project)
                                            @if ($subcontent->project_id == $project->project_id)
                                                <option value="{{ $subcontent->project_id }}" selected disabled>
                                                    {{ $project->project_name }}
                                                </option>
                                            @else
                                                <option value="{{ $project->project_id }}">
                                                    {{ $project->project_name }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <label class="label">Keyword</label>
                                    <input type="text" class="form-control" id="keyword" name="keyword"
                                        value="{{ $subcontent->keyword }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label text-gray-900">Expiry Date</label>
                                    <input type="date" class="form-control" id="expiry_date" name="expiry_date"
                                        value="{{ date_format(date_create($subcontent->expiry_date), 'Y-m-d') }}">
                                </div>

                                <div class="col-sm-6">
                                    <label class="label text-gray-900">Status</label>
                                    <select class="form-control @error('is_active') is-invalid @enderror" id="is_active"
                                        name="is_active">
                                        @if ($subcontent->is_active == 'Y')
                                            <option value="{{ $subcontent->is_active }}" selected disabled>Active
                                            </option>
                                        @elseif($subcontent->is_active == 'N')
                                            <option value="{{ $subcontent->is_active }}" selected disabled>Inactive
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

                            <input type="hidden" class="form-control" id="subgroup_id" name="subgroup_id"
                                value="{{ $subcontent->subgroup_id }}">
                                <input type="hidden" class="form-control" id="drawing_id" name="drawing_id"
                                value="{{ $drawings->drawing_id }}">
                            <input type="hidden" class="form-control" id="usr_update" name="usr_update"
                                value="{{ Auth()->user()->name }}">

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
