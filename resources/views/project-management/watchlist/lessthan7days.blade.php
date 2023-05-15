<div class="row">
    <div class="col-xl-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">List of Documents</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                            @foreach ($sevendays as $sevenday)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                {{-- <td><a href="{{ $sevenday->content_link }}" target="_blank"><img
                                            src="https://cdn-icons-png.flaticon.com/512/2258/2258853.png"
                                            class="img-fluid" width="45" height="30">{{ $sevenday->content_name }}
                                    </a>
                                </td> --}}
                                <td>{{ $sevenday->item_desc }}</td>
                                <td>{{ $sevenday->project_name }}</td>
                                <td>{{ $sevenday->start_date }}</td>
                                <td>{{ $sevenday->expiry_date }}</td>
                                <td>{{ $sevenday->item_vendor }}</td>
                                <td>{{ $sevenday->item_PIC }}</td>
                                <td>{{ $sevenday->item_PIC_email }}</td>
                                @if(Auth()->user()->role_id != 3)
                                <td><button data-toggle="modal" data-target="#updateContent{{ $sevenday->item_id }}"
                                        class="btn btn-sm btn-primary shadow-sm"><i
                                            class="fas fa-pen fa-sm text-white-50"></i>
                                    </button>

                                    @include('project-management.watchlist.modal-update-7')
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