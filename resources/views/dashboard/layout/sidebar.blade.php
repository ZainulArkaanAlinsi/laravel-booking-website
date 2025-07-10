<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard/">
        <div class="sidebar-brand-icon">
            <i class="fas fa-building"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Booking-Aj</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Data Collapse Menu -->
    <li class="nav-item {{ Request::is('dashboard/data*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTwo"
            aria-expanded="{{ Request::is('dashboard/data*') ? 'true' : 'false' }}" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data</span>
        </a>
        <div id="collapseTwo" class="collapse {{ Request::is('dashboard/data*') ? 'show' : '' }}"
            data-bs-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Inner</h6>
                <a class="collapse-item {{ Request::is('dashboard/data/room*') ? 'active' : '' }}"
                    href="/dashboard/data/room">Room</a>
                <a class="collapse-item {{ Request::is('dashboard/data/status*') ? 'active' : '' }}"
                    href="/dashboard/data/status">Status Room</a>
                <a class="collapse-item {{ Request::is('dashboard/data/type*') ? 'active' : '' }}"
                    href="/dashboard/data/type">Type Room</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - User Collapse Menu -->
    <li class="nav-item {{ Request::is('dashboard/user*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseuser"
            aria-expanded="{{ Request::is('dashboard/user*') ? 'true' : 'false' }}" aria-controls="collapseuser">
            <i class="fas fa-fw fa-wrench"></i>
            <span>User</span>
        </a>
        <div id="collapseuser" class="collapse {{ Request::is('dashboard/user*') ? 'show' : '' }}"
            data-bs-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data</h6>
                <a class="collapse-item {{ Request::is('dashboard/user') ? 'active' : '' }}"
                    href="/dashboard/user">User</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pesan/Order Collapse Menu -->
    <li class="nav-item {{ Request::is('dashboard/order*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
            aria-expanded="{{ Request::is('dashboard/order*') ? 'true' : 'false' }}" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pesan</span>
        </a>
        <div id="collapsePages" class="collapse {{ Request::is('dashboard/order*') ? 'show' : '' }}"
            data-bs-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Order now:</h6>
                <a class="collapse-item {{ Request::is('dashboard/order') ? 'active' : '' }}"
                    href="/dashboard/order">Order</a>
                <h6 class="collapse-header">Data Transactions:</h6>
                <a class="collapse-item {{ Request::is('dashboard/order/history-pay*') ? 'active' : '' }}"
                    href="/dashboard/order/history-pay">History Payment</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
