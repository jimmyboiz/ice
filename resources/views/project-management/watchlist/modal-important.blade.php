<div class="modal fade" id="modalImportant" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" style="min-width:70%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-gray-600" id="demoModalLabel">Expiring Document(s)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- DataTales Example -->
                <div class="card shadow col-xl-12  mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="watchlist" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Item Description / Activity</th>
                                        <th>Project</th>
                                        <th>Start Date</th>
                                        <th>Expiry Date</th>
                                        <th>Vendor</th>
                                        <th>PIC</th>
                                        <th>PICs Email</th>
                                        @if(Auth()->user()->role_id != 3)
                                        <th>Action</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todays as $today)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td><a href="{{ $today->content_link }}" target="_blank"><img
                                                    src="https://cdn-icons-png.flaticon.com/512/2258/2258853.png"
                                                    class="img-fluid" width="45" height="30">{{ $today->content_name }}
                                            </a>
                                        </td> --}}
                                        <td>{{ $today->item_desc }}</td>
                                        <td>{{ $today->project_name }}</td>
                                        <td>{{ $today->start_date }}</td>
                                        <td>{{ $today->expiry_date }}</td>
                                        <td>{{ $today->item_vendor }}</td>
                                        <td>{{ $today->item_PIC }}</td>
                                        <td>{{ $today->item_PIC_email }}</td>
                                        @if(Auth()->user()->role_id != 3)
                                        <td>
                                            <button data-toggle="modal" data-target="#updateContent{{ $today->item_id }}" id="hideThis"
                                                class="btn btn-sm btn-primary shadow-sm"><i
                                                    class="fas fa-pen fa-sm text-white-50"></i>
                                            </button>

                                            @include('project-management.watchlist.modal-update-today')
                                        </td>
                                        @endif
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>