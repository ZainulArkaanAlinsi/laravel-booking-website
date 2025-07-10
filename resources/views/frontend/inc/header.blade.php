<!-- Navbar Booking-Aj -->
<nav class="navbar navbar-expand-lg px-lg-4 py-lg-3 shadow sticky-top modern-navbar">
    <div class="container-fluid">
        <a class="navbar-brand me-5 fw-bold fs-3 h-font d-flex align-items-center" href="/">
            <img src="/img/logo2.png" style="max-width:80px; border-radius:0.8rem; box-shadow:0 2px 8px #b9c9d9;">
            <span class="h5 fw-bold fs-3 ms-2 gradient-brand">Booking-Aj</span>
        </a>
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end w-50 modern-offcanvas" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title gradient-brand" id="offcanvasNavbarLabel">Booking_aj</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern {{ Request::routeIs('index*') ? 'active' : ''}}"
                            aria-current="page" href="/">
                            <i class="bi bi-house-door me-1"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern me-2 {{ Request::is('rooms*') ? 'active' : ''}}"
                            href="/rooms">
                            <i class="bi bi-door-open me-1"></i> Rooms
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern me-2 {{ Request::is('facilities*') ? 'active' : ''}}"
                            href="/facilities">
                            <i class="bi bi-stars me-1"></i> Facilities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern me-2 {{ Request::is('about*') ? 'active' : ''}}"
                            href="/about">
                            <i class="bi bi-info-circle me-1"></i> About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-modern me-2 {{ Request::is('contact*') ? 'active' : ''}}"
                            href="/contact">
                            <i class="bi bi-envelope me-1"></i> Contact
                        </a>
                    </li>
                    @if(auth()->user())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link-modern text-dark d-flex align-items-center" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle fs-5 me-1"></i>
                            <span class="d-none d-lg-inline ms-1">{{ auth()->user()->username ?? 'User' }}</span>
                        </a>
                        <ul class="dropdown-menu shadow rounded-3 dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="/dashboard">
                                    <i class="bi bi-pc-display"></i>
                                    {{ auth()->user()->is_admin ? 'Admin Dashboard' : 'Dashboard' }}
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="/myaccount">
                                    <i class="bi bi-person-vcard-fill"></i>
                                    My Account
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="/history">
                                    <i class="bi bi-cart-check-fill"></i>
                                    History
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <!-- Logout POST: Form tersembunyi + JS -->
                                <form id="logout-form" action="/logout" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right text-danger"></i>
                                    Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>






<style>
    .modern-navbar {
        background: rgba(245, 247, 250, 0.98);
        border-bottom: 1.5px solid #e0e0e0;
        backdrop-filter: blur(6px);
        transition: background 0.3s, box-shadow 0.3s;
        z-index: 1030;
    }

    .modern-navbar.sticky-top,
    .modern-navbar.fixed-top {
        box-shadow: 0 4px 24px rgba(120, 120, 120, 0.07);
    }

    .gradient-brand {
        background: linear-gradient(90deg, #4a6fa5 30%, #5bb0ba 80%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-weight: 900;
        letter-spacing: 0.04em;
    }

    .nav-link-modern {
        font-size: 1.08rem;
        font-weight: 600;
        color: #4a6fa5 !important;
        letter-spacing: 0.01em;
        border-radius: 0.9rem;
        padding: 0.55rem 1.1rem;
        margin: 0 0.1rem;
        transition: background 0.18s, color 0.18s;
        display: flex;
        align-items: center;
    }

    .nav-link-modern.active,
    .nav-link-modern:hover,
    .nav-link-modern:focus {
        background: linear-gradient(90deg, #e0e0e0 80%, #b9c9d9 100%);
        color: #232323 !important;
        box-shadow: 0 2px 8px #b9c9d933;
        text-decoration: none;
    }

    .dropdown-menu {
        min-width: 180px;
        font-size: 1.05rem;
    }

    .dropdown-item {
        padding: 0.7rem 1.2rem;
        border-radius: 0.7rem;
        transition: background 0.18s, color 0.18s;
    }

    .dropdown-item:hover {
        background: #e0e0e0;
        color: #4a6fa5;
    }

    .btn-close:focus {
        box-shadow: none;
    }

    @media (max-width: 991px) {
        .modern-navbar {
            padding: 0.8rem 0.2rem;
        }

        .navbar-brand img {
            max-width: 65px;
        }

        .gradient-brand {
            font-size: 1.25rem !important;
        }
    }

    @media (max-width: 575px) {
        .modern-offcanvas {
            width: 85vw !important;
        }

        .navbar-brand img {
            max-width: 48px;
        }
    }
</style>
