<!-- Nav Item - Alerts -->
<li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        @if (is_null($todays->first()))
        {{-- Do nothing --}}
        @else
        <span class="badge badge-danger badge-counter">⠀</span>
        @endif
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
        aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
            Notification
        </h6>
        @if (is_null($todays->first()))
        <h6 class="dropdown-body text-center mt-2">No new notification</h6>
        @else
        @foreach($todays as $today)
        <a class="dropdown-item d-flex align-items-center" href="{{route('pmd.watchlist')}}">
            <div class="mr-3">
                <div class="icon-circle bg-danger">
                    <i class="fas fa-file-alt text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">{{date('d-M-Y')}}</div>
                <span class="font-weight-bold">Caution. Items expired!
                    <br>Item Name: {{$today->item_desc}}
                </span>
            </div>
        </a>
        @endforeach
        @endif
        {{-- <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-success">
                    <i class="fas fa-donate text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">December 7, 2019</div>
                $290.29 has been deposited into your account!
            </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
            <div class="mr-3">
                <div class="icon-circle bg-warning">
                    <i class="fas fa-exclamation-triangle text-white"></i>
                </div>
            </div>
            <div>
                <div class="small text-gray-500">December 2, 2019</div>
                Spending Alert: We've noticed unusually high spending for your account.
            </div>
        </a>
        <a class="dropdown-item text-center small text-gray-500" href="#">Show All
            Alerts</a> --}}
    </div>
</li>