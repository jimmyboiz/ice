<div class="row">
    <div class="col-xl-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h5 class="m-0 font-weight-bold text-primary">List of Documents</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
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
                            @foreach ($fourteendays as $fourteenday)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{ $fourteenday->content_link }}" target="_blank"><img
                                                src="https://cdn-icons-png.flaticon.com/512/2258/2258853.png"
                                                class="img-fluid" width="45"
                                                height="30">{{ $fourteenday->content_name }}
                                        </a>
                                    </td>
                                    <td>{{ $fourteenday->content_category }}</td>
                                    <td>{{ $fourteenday->content_path }}</td>
                                    <td>{{ date_format(date_create($fourteenday->expiry_date), 'Y-m-d') }}</td>
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