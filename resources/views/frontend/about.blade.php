@extends('frontend.inc.main')
@section('title')
<title>Booking-aj | TENTANG KAMI</title>
@endsection

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css">
<style>
    .about-stat-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(3px);
        border-radius: 1.2rem;
        border: none;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.07);
        transition: box-shadow 0.3s, transform 0.3s;
        position: relative;
        overflow: hidden;
        min-height: 220px;
    }

    .about-stat-card::before {
        content: '';
        position: absolute;
        top: -40px;
        left: -40px;
        width: 120px;
        height: 120px;
        background: linear-gradient(135deg, #0d6efd22 0%, #6c757d11 100%);
        border-radius: 50%;
        z-index: 0;
    }

    .about-stat-card:hover {
        box-shadow: 0 12px 36px rgba(13, 110, 253, 0.12);
        transform: translateY(-8px) scale(1.04);
    }

    .about-stat-card img {
        background: #f1f3f7;
        border-radius: 50%;
        padding: 10px;
        width: 64px;
        height: 64px;
        margin-bottom: 1rem;
        position: relative;
        z-index: 1;
    }

    .about-stat-card h5,
    .about-stat-card p {
        position: relative;
        z-index: 1;
    }

    .about-img-grid img {
        transition: transform 0.4s cubic-bezier(.34, 1.56, .64, 1), box-shadow 0.3s;
        border: 3px solid transparent;
        background: linear-gradient(135deg, #fff 60%, #0d6efd22 100%);
    }

    .about-img-grid img:hover {
        transform: scale(1.09) rotate(-2deg);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.16);
        border-image: linear-gradient(135deg, #0d6efd 0%, #ffc107 100%) 1;
        z-index: 2;
    }

    .about-feature-list li {
        font-size: 1.14rem;
        letter-spacing: 0.02em;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }

    .about-feature-list i {
        font-size: 1.3rem;
        margin-right: 0.7rem;
    }

    .about-section-title {
        font-size: 2.5rem;
        font-weight: bold;
        color: #0d6efd;
        margin-bottom: 1.2rem;
        letter-spacing: 0.01em;
    }

    @media (max-width: 991px) {
        .about-section-title {
            font-size: 2rem;
        }
    }
</style>

<!-- Statistics Section -->
<section class="py-5" style="background: linear-gradient(120deg, #f8fafc 60%, #e7f1ff 100%);">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-lg-4 col-md-6 animate__animated animate__fadeInUp">
                <div class="about-stat-card shadow border-top border-4 border-primary">
                    <img src="/nyoba/images/about/hotel.svg" alt="Rooms">
                    <h5 class="fw-bold mb-1 text-primary">{{$r}}+ ROOMS</h5>
                    <p class="text-muted small">Kamar berkelas dan nyaman untuk pengalaman terbaik Anda.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 animate__animated animate__fadeInUp animate__delay-1s">
                <div class="about-stat-card shadow border-top border-4 border-success">
                    <img src="/nyoba/images/about/customers.svg" alt="Customers">
                    <h5 class="fw-bold mb-1 text-success">{{$c}}+ CUSTOMERS</h5>
                    <p class="text-muted small">Kami dipercaya ribuan pelanggan dari berbagai wilayah.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 animate__animated animate__fadeInUp animate__delay-2s">
                <div class="about-stat-card shadow border-top border-4 border-warning">
                    <img src="/nyoba/images/about/t.png" alt="Transactions">
                    <h5 class="fw-bold mb-1 text-warning">{{$t}}+ TRANSACTIONS</h5>
                    <p class="text-muted small">Transaksi cepat, aman, dan terpercaya sejak 2020.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center g-5">
            <!-- Text Content -->
            <div class="col-lg-6 animate__animated animate__fadeInLeft">
                <div>
                    <div class="about-section-title">Tentang Kami</div>
                    <p class="text-muted mb-4" style="font-size:1.13rem;">
                        <span style="color:#0d6efd; font-weight:600;">Booking-aj</span> berdiri sejak 2022. Bermula dari
                        satu hotel kecil, kini berkembang dengan lebih dari <span style="color:#ffc107;">20 kamar</span>
                        berfasilitas unggulan.
                    </p>
                    <ul class="list-unstyled text-muted about-feature-list">
                        <li><i class="bi bi-water text-info"></i>Kolam renang pribadi</li>
                        <li><i class="bi bi-mic-fill text-danger"></i>Ruangan Karaoke</li>
                        <li><i class="bi bi-wifi text-success"></i>Gratis Wi-Fi</li>
                        <li><i class="bi bi-egg-fried text-warning"></i>Sarapan & Makan Siang</li>
                    </ul>
                </div>
            </div>
            <!-- Image Grid -->
            <div class="col-lg-6 animate__animated animate__fadeInRight">
                <div class="row g-3 about-img-grid">
                    <div class="col-6">
                        <img src="/nyoba/images/carousel/1.png" class="img-fluid rounded shadow-sm mb-3" alt="img1">
                        <img src="/nyoba/images/carousel/2.png" class="img-fluid rounded shadow-sm" alt="img2">
                    </div>
                    <div class="col-6 d-flex flex-column justify-content-between">
                        <img src="/nyoba/images/carousel/3.png"
                            class="img-fluid rounded shadow-sm h-100 object-fit-cover" alt="img3"
                            style="min-height: 220px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
