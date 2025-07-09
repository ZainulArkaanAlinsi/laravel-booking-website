<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font section-title animate__animated animate__fadeInDown">OUR ROOMS</h2>
<div class="container">
    <div class="row justify-content-center">
        @foreach ($room as $index => $r)
        @php
        $colorSets = [
        ['badge' => 'bg-primary text-white', 'btn' => 'btn-primary', 'gradient' => 'linear-gradient(90deg,#a3c9f9
        60%,#1e5fa6 100%)'],
        ['badge' => 'bg-success text-white', 'btn' => 'btn-success', 'gradient' => 'linear-gradient(90deg,#b6e2c6
        60%,#37996b 100%)'],
        ['badge' => 'bg-warning text-dark', 'btn' => 'btn-warning', 'gradient' => 'linear-gradient(90deg,#ffe6a0
        60%,#e6b800 100%)'],
        ['badge' => 'bg-danger text-white', 'btn' => 'btn-danger', 'gradient' => 'linear-gradient(90deg,#f9b3b3
        60%,#d43f3a 100%)'],
        ['badge' => 'bg-info text-white', 'btn' => 'btn-info', 'gradient' => 'linear-gradient(90deg,#b3e6f9 60%,#1ba7c6
        100%)'],
        ['badge' => 'bg-secondary text-white', 'btn' => 'btn-secondary', 'gradient' => 'linear-gradient(90deg,#d1d1d1
        60%,#757575 100%)'],
        ];
        $set = $colorSets[$index % count($colorSets)];
        @endphp
        <div class="col-xl-4 col-lg-5 col-md-6 my-4 d-flex">
            <div class="room-card shadow-lg border-0 rounded-4 w-100 animate__animated animate__fadeInUp">
                <div class="room-image-wrapper position-relative" style="background: {{ $set['gradient'] }};">
                    @if ($r->images->count() > 0)
                    <img src="{{ asset('storage/' . $r->images[0]->image) }}" class="img-fluid room-image rounded-4"
                        alt="Room Image">
                    @else
                    <img src="/nyoba/images/rooms/1.jpg" class="img-fluid room-image rounded-4" alt="Room Image">
                    @endif
                    <div class="room-image-gradient"></div>
                    <span class="room-price-badge shadow {{ $set['badge'] }}"><i class="bi bi-cash-coin me-1"></i>IDR {{
                        number_format($r->price) }}</span>
                </div>
                <div class="card-body px-4 py-3">
                    <h5 class="card-title fw-bold mb-2 text-dark"><i class="bi bi-door-open me-2 text-secondary"></i>{{
                        $r->type->name }} #{{ $r->no }}</h5>
                    <div class="d-flex align-items-center mb-3">
                        <i class="bi bi-people-fill fs-5 text-secondary me-2"></i>
                        <span class="badge rounded-pill {{ $set['badge'] }} px-3 py-2">{{ $r->capacity }} Guests</span>
                    </div>
                    <div class="mb-3">
                        <h6 class="fw-semibold mb-1 text-muted"><i class="bi bi-list-check me-1"></i>Features</h6>
                        <div class="d-flex flex-wrap gap-2">
                            @if ($r->capacity <= 5) <span class="badge {{ $set['badge'] }}">2 Rooms</span>
                                <span class="badge {{ $set['badge'] }}">1 Bathroom</span>
                                <span class="badge {{ $set['badge'] }}">1 Balcony</span>
                                <span class="badge {{ $set['badge'] }}">2 Sofa</span>
                                @elseif ($r->capacity <= 10) <span class="badge {{ $set['badge'] }}">3 Rooms</span>
                                    <span class="badge {{ $set['badge'] }}">2 Bathroom</span>
                                    <span class="badge {{ $set['badge'] }}">2 Balcony</span>
                                    <span class="badge {{ $set['badge'] }}">4 Sofa</span>
                                    @else
                                    <span class="badge {{ $set['badge'] }}">4 Rooms</span>
                                    <span class="badge {{ $set['badge'] }}">2 Bathroom</span>
                                    <span class="badge {{ $set['badge'] }}">2 Balcony</span>
                                    <span class="badge {{ $set['badge'] }}">6 Sofa</span>
                                    @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <h6 class="fw-semibold mb-1 text-muted"><i class="bi bi-stars me-1"></i>Facilities</h6>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="badge {{ $set['badge'] }}"><i class="bi bi-wifi"></i> Wifi</span>
                            <span class="badge {{ $set['badge'] }}"><i class="bi bi-tv"></i> Television</span>
                            <span class="badge {{ $set['badge'] }}"><i class="bi bi-snow"></i> AC</span>
                            @if ($r->capacity > 5)
                            <span class="badge {{ $set['badge'] }}"><i class="bi bi-fire"></i> Room Heater</span>
                            @endif
                            @if ($r->capacity > 10)
                            <span class="badge {{ $set['badge'] }}"><i class="bi bi-cloud-drizzle"></i> Smoke
                                Room</span>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4">
                        <a href="/rooms/{{ $r->no }}" class="btn {{ $set['btn'] }} w-50"><i
                                class="bi bi-calendar-check me-1"></i>Book Now</a>
                        <a href="/rooms/{{ $r->no }}" class="btn btn-outline-dark w-50"><i
                                class="bi bi-info-circle me-1"></i>More details</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-12 text-center mt-5">
            <a href="/rooms"
                class="btn btn-lg btn-dark rounded-pill fw-bold shadow animate__animated animate__pulse animate__delay-1s">
                <i class="bi bi-arrow-right-circle"></i> More Rooms
            </a>
        </div>
    </div>
</div>

<style>
    .room-card {
        background: rgba(255, 255, 255, 0.98);
        border-radius: 1.7rem;
        box-shadow: 0 14px 48px rgba(120, 120, 120, 0.13), 0 2px 12px rgba(160, 160, 160, 0.08);
        border: 1.5px solid #e0e0e0;
        transition: box-shadow 0.3s, border 0.2s, transform 0.3s;
        overflow: hidden;
        min-height: 540px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    .room-card:hover {
        box-shadow: 0 22px 64px #bdbdbd44;
        border: 1.5px solid #bdbdbd;
        transform: translateY(-8px) scale(1.025);
    }

    .room-image-wrapper {
        position: relative;
        width: 100%;
        height: 250px;
        overflow: hidden;
        border-radius: 1.7rem 1.7rem 0 0;
    }

    .room-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 1.7rem 1.7rem 0 0;
        transition: transform 0.5s cubic-bezier(.34, 1.56, .64, 1), box-shadow 0.3s;
        box-shadow: 0 2px 16px #bdbdbd22;
    }

    .room-card:hover .room-image {
        transform: scale(1.07) rotate(-2deg);
        box-shadow: 0 16px 40px #bdbdbd44;
        z-index: 2;
    }

    .room-image-gradient {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        top: 0;
        background: linear-gradient(120deg, rgba(240, 240, 240, 0.0) 60%, rgba(120, 120, 120, 0.14) 100%);
        border-radius: 1.7rem 1.7rem 0 0;
        pointer-events: none;
        z-index: 2;
    }

    .room-price-badge {
        position: absolute;
        right: 20px;
        top: 20px;
        font-weight: 700;
        font-size: 1.05rem;
        padding: 0.45rem 1.1rem;
        border-radius: 1.3rem;
        z-index: 3;
        letter-spacing: 0.02em;
        box-shadow: 0 2px 8px #bdbdbd22;
    }

    .feature-badge,
    .facility-badge {
        font-weight: 500;
        font-size: 0.97rem;
        padding: 0.48em 1em;
    }

    @media (max-width: 991px) {
        .room-card {
            min-height: 480px;
        }

        .room-image-wrapper {
            height: 180px;
        }
    }

    @media (max-width: 575px) {
        .room-card {
            min-height: 420px;
        }

        .room-image-wrapper {
            height: 140px;
        }
    }
</style>
