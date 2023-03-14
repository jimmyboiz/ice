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
                                <th>Document Name</th>
                                <th>Category</th>
                                <th>Path</th>
                                <th>Expiry Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sevendays as $sevenday)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{ $sevenday->content_link }}" target="_blank"><img
                                                src="https://cdn-icons-png.flaticon.com/512/2258/2258853.png"
                                                class="img-fluid" width="45"
                                                height="30">{{ $sevenday->content_name }}
                                        </a>
                                    </td>
                                    <td>{{ $sevenday->content_category }}</td>
                                    <td>{{ $sevenday->content_path }}</td>
                                    <td>{{ date_format(date_create($sevenday->expiry_date), 'Y-m-d') }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>