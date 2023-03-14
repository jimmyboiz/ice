<!-- Modal Create Company Form-->
<div class="modal fade" id="addContentModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" style="min-width:auto%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Add Document</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="card shadow col-xl-12  mb-4">
                    <div class="card-body">
                        <form class="user" action="{{ route('pmd.content.create') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="label">Document Name</label>
                                <input type="text" class="form-control" id="content_name" name="content_name"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="label">Document Link Address (URL)</label>
                                <input type="url" class="form-control" id="content_link" name="content_link"
                                    required>
                            </div>
                            <div class="form-group">
                                <label class="label">Path</label>
                                <input type="text" class="form-control" id="content_path" name="content_path"
                                    value="Rail / Environmental / {{ $environmentals->environment_name }} " readonly>
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
                                    <input type="text" class="form-control" id="keyword" name="keyword" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="label">Expiry Date</label>
                                    <input type="date" class="form-control" id="expiry_date" name="expiry_date">
                                </div>
                            </div>
                            <br>

                            <input type="hidden" class="form-control" id="content_category" name="content_category"
                                value="Environmental">
                            <input type="hidden" class="form-control" id="environment_id" name="environment_id"
                                value="{{ $environmentals->environment_id }}">
                            <input type="hidden" class="form-control" id="usr_create" name="usr_create"
                                value="{{ Auth()->user()->name }}">
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
<!-- Modal Create Company Form End-->
