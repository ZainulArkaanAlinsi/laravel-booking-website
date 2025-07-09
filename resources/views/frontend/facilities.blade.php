@extends('frontend.inc.main')
@section('title')
<title>Booking-aj | FASILITAS HOTEL KAMI</title>
@endsection

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css">
<style>
    .facilities-section-title {
        font-size: 2.4rem;
        font-weight: bold;
        color: #0d6efd;
        margin-bottom: 1.2rem;
        letter-spacing: 0.01em;
    }

    .facility-card {
        background: rgba(255, 255, 255, 0.85);
        backdrop-filter: blur(3px);
        border-radius: 1.3rem;
        border: none;
        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.07);
        transition: box-shadow 0.3s, transform 0.3s;
        position: relative;
        overflow: hidden;
        min-height: 320px;
    }

    .facility-card::before {
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

    .facility-card:hover {
        box-shadow: 0 12px 36px rgba(13, 110, 253, 0.12);
        transform: translateY(-8px) scale(1.04);
    }

    .facility-card img {
        border-radius: 1.1rem;
        transition: transform 0.4s cubic-bezier(.34, 1.56, .64, 1), box-shadow 0.3s;
        border: 3px solid transparent;
        background: linear-gradient(135deg, #fff 60%, #0d6efd22 100%);
        width: 100%;
        max-width: 300px;
        height: 200px;
        object-fit: cover;
        z-index: 1;
        position: relative;
    }

    .facility-card img:hover {
        transform: scale(1.07) rotate(-2deg);
        box-shadow: 0 12px 32px rgba(0, 0, 0, 0.16);
        border-image: linear-gradient(135deg, #0d6efd 0%, #ffc107 100%) 1;
        z-index: 2;
    }

    .facility-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-top: 1.2rem;
        color: #212529;
        letter-spacing: 0.01em;
        position: relative;
        z-index: 1;
    }

    /* Animasi delay per card */
    .animate__delay-1 {
        animation-delay: .1s;
    }

    .animate__delay-2 {
        animation-delay: .2s;
    }

    .animate__delay-3 {
        animation-delay: .3s;
    }

    .animate__delay-4 {
        animation-delay: .4s;
    }

    .animate__delay-5 {
        animation-delay: .5s;
    }

    @media (max-width: 991px) {
        .facilities-section-title {
            font-size: 2rem;
        }

        .facility-card {
            min-height: 0;
        }
    }
</style>

<div class="my-5 px-4">
    <h2 class="facilities-section-title text-center animate__animated animate__fadeInDown">OUR FACILITIES</h2>
    <div class="h-line bg-dark mx-auto animate__animated animate__fadeInLeft"></div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 mb-5 px-4">
            <div class="facility-card animate__animated animate__fadeInUp animate__delay-1">
                <div class="d-flex justify-content-center mb-2">
                    <img src="/frontend/img/fasilitas/1.jpg" alt="Kolam Renang">
                </div>
                <div class="d-flex justify-content-center">
                    <div class="facility-title"><i class="bi bi-water text-info me-2"></i>Kolam Renang</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-5 px-4">
            <div class="facility-card animate__animated animate__fadeInUp animate__delay-2">
                <div class="d-flex justify-content-center mb-2">
                    <img src="/frontend/img/fasilitas/2.jpg" alt="Wifi">
                </div>
                <div class="d-flex justify-content-center">
                    <div class="facility-title"><i class="bi bi-wifi text-success me-2"></i>Wifi</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-5 px-4">
            <div class="facility-card animate__animated animate__fadeInUp animate__delay-3">
                <div class="d-flex justify-content-center mb-2">
                    <img src="/frontend/img/fasilitas/3.jpg" alt="Lunch">
                </div>
                <div class="d-flex justify-content-center">
                    <div class="facility-title"><i class="bi bi-egg-fried text-warning me-2"></i>Lunch</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-5 px-4">
            <div class="facility-card animate__animated animate__fadeInUp animate__delay-4">
                <div class="d-flex justify-content-center mb-2">
                    <img src="/frontend/img/fasilitas/4.jpg" alt="Hot Water">
                </div>
                <div class="d-flex justify-content-center">
                    <div class="facility-title"><i class="bi bi-droplet-half text-primary me-2"></i>Hot Water</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-5 px-4">
            <div class="facility-card animate__animated animate__fadeInUp animate__delay-5">
                <div class="d-flex justify-content-center mb-2">
                    <img src="/frontend/img/fasilitas/5.jpg" alt="Breakfast">
                </div>
                <div class="d-flex justify-content-center">
                    <div class="facility-title"><i class="bi bi-cup-hot text-danger me-2"></i>Breakfast</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-5 px-4">
            <div class="facility-card animate__animated animate__fadeInUp animate__delay-5">
                <div class="d-flex justify-content-center mb-2">
                    <img src="/frontend/img/fasilitas/ball.jpg" alt="8 Ball Pool">
                </div>
                <div class="d-flex justify-content-center">
                    <div class="facility-title"><i class="bi bi-joystick text-dark me-2"></i>8 Ball Pool</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
