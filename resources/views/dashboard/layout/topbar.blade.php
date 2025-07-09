<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle me-3">
    <i class="fa fa-bars"></i>
</button>

<!-- Topbar Navbar -->
<ul class="navbar-nav ms-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end p-3 shadow" aria-labelledby="searchDropdown">
            <form class="d-flex w-100 navbar-search">
                <input type="text" class="form-control bg-light border-0 small me-2" placeholder="Search for..."
                    aria-label="Search">
                <button class="btn btn-primary" type="submit">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </form>
        </div>
    </li>

    <!-- Nav Item - Alerts -->
    <li class="nav-item dropdown mx-1">
        <a class="nav-link dropdown-toggle position-relative" href="#" id="alertsDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            @php
            $notif = App\Models\Notifications::limit(5)
            ->where('status', 'unread')
            ->orderby('created_at', 'desc')
            ->get();
            $countnotif = App\Models\Notifications::where('status', 'unread')->count();
            @endphp
            @if($countnotif > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $countnotif }}
                <span class="visually-hidden">unread notifications</span>
            </span>
            @endif
        </a>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="alertsDropdown" style="min-width: 350px;">
            <li>
                <h6 class="dropdown-header">Alerts Center</h6>
            </li>
            @foreach ($notif as $n)
            @php
            $url = json_decode($n->data)->url;
            $message = json_decode($n->data)->message;
            $partmessage = explode('.', $message);
            $datatrim = trim($partmessage[0]);
            $pay = null;
            $invoice = $total = $checkin = $checkout = '';
            if (str_contains($url, 'pay/')) {
            $parturl = explode('pay/', $url);
            $idpay = trim($parturl[1]);
            $pay = App\Models\Payment::where('id', $idpay)->first();
            if ($pay) {
            $checkin = \Carbon\Carbon::parse($pay->Transaction->check_in)->format('d M Y');
            $checkout = \Carbon\Carbon::parse($pay->Transaction->check_out)->format('d M Y');
            $total = $pay->price;
            $invoice = $pay->invoice;
            }
            }
            @endphp
            <li>
                <form action="{{ $url }}" method="get" class="m-0">
                    @csrf
                    <input type="hidden" name="nid" value="{{ $n->id }}">
                    <button type="submit" class="dropdown-item d-flex align-items-start gap-2">
                        <div class="icon-circle bg-primary flex-shrink-0 d-flex align-items-center justify-content-center"
                            style="width: 40px; height: 40px;">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                        <div class="flex-grow-1">
                            <div class="small text-muted mb-1">
                                {{ $n->created_at->diffForHumans() }},
                                {{ $n->created_at->isoFormat('MMM D, Y') }}
                            </div>
                            <span class="fw-bold">{{ $pay && $pay->status == 'Pending' ? $datatrim : $message }}</span>
                            @if($pay)
                            <div class="small text-muted mt-1">
                                | Invoice {{ $invoice }} | Total IDR {{ number_format($total) }} | {{ $checkin }} - {{
                                $checkout }} |
                            </div>
                            @endif
                        </div>
                    </button>
                </form>
            </li>
            @endforeach
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <a class="dropdown-item text-center small text-primary" href="#">Show All Alerts</a>
            </li>
            <li>
                <a class="dropdown-item text-center small text-danger" href="/dashboard/markall">Mark ALL as Read</a>
            </li>
        </ul>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="userDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            <span class="d-none d-lg-inline text-gray-600 small">Halo, {{ Auth::user()->username }}!</span>
            <i class="fa fa-user-circle img-profile rounded-circle fa-lg"></i>
        </a>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
            <li>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>
                    Profile
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw me-2 text-gray-400"></i>
                    Settings
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw me-2 text-gray-400"></i>
                    Activity Log
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li>
                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>
                    Logout
                </a>
            </li>
        </ul>
    </li>
</ul>
