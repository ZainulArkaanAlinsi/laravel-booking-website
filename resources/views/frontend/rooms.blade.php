@extends('frontend.inc.main')

@section('title')
<title>Booking-aj | Cari Kamar</title>
@endsection

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css">
<style>
    body {
        background: linear-gradient(120deg, #f4f4f6 60%, #e0e0e0 100%);
    }

    .rooms-section-title {
        font-size: 2.6rem;
        font-weight: 800;
        color: #444;
        margin-bottom: 0.7rem;
        letter-spacing: 0.03em;
        text-shadow: 0 2px 12px #d1d1d1;
    }

    .filter-bar {
        background: rgba(255, 255, 255, 0.88);
        border-radius: 1.3rem;
        box-shadow: 0 6px 28px rgba(120, 120, 120, 0.10);
        padding: 1.3rem 2rem 0.7rem 2rem;
        margin-bottom: 2.2rem;
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
        align-items: flex-end;
        justify-content: center;
        border: 1.5px solid #e0e0e0;
        backdrop-filter: blur(5px);
    }

    .filter-bar .form-group {
        min-width: 180px;
        margin-bottom: 0.8rem;
    }

    .btn-search {
        border-radius: 0.7rem;
        font-weight: 600;
        padding: 0.7rem 2.2rem;
        background: linear-gradient(90deg, #bdbdbd 60%, #757575 100%);
        color: #fff;
        border: none;
        box-shadow: 0 4px 16px #bdbdbd33;
        transition: background 0.2s, box-shadow 0.2s;
    }

    .btn-search:hover {
        background: linear-gradient(90deg, #757575 20%, #bdbdbd 100%);
        color: #fff;
        box-shadow: 0 8px 24px #bdbdbd33;
    }

    .rooms-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));
        gap: 2rem;
    }

    .room-card {
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(7px);
        border-radius: 1.5rem;
        border: 1.5px solid #e0e0e0;
        box-shadow: 0 10px 36px rgba(180, 180, 180, 0.13);
        transition: box-shadow 0.3s, transform 0.3s, border 0.2s;
        position: relative;
        overflow: hidden;
        min-height: 310px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        animation: fadeInUp 0.9s;
    }

    .room-card:hover {
        box-shadow: 0 18px 48px #bdbdbd44;
        border: 1.5px solid #bdbdbd;
        transform: translateY(-7px) scale(1.02);
    }

    .room-image {
        border-radius: 1.1rem 1.1rem 0 0;
        width: 100%;
        height: 180px;
        object-fit: cover;
        background: #f2f2f2;
        box-shadow: 0 2px 12px #bdbdbd22;
        transition: transform 0.4s, box-shadow 0.3s;
    }

    .room-card:hover .room-image {
        transform: scale(1.06) rotate(-2deg);
        box-shadow: 0 16px 40px #bdbdbd44;
        z-index: 2;
    }

    .room-content {
        padding: 1.1rem 1.3rem 0.8rem 1.3rem;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .room-title {
        font-size: 1.18rem;
        font-weight: 700;
        color: #444;
        margin-bottom: 0.5rem;
        letter-spacing: 0.01em;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .badge {
        font-size: 0.96rem;
        font-weight: 500;
        margin-bottom: 0.15rem;
        margin-right: 0.18rem;
        margin-top: 0.1rem;
        background: #f4f4f6;
        color: #333;
        border: 1.1px solid #bdbdbd;
        box-shadow: 0 2px 8px #bdbdbd22;
    }

    .room-price {
        font-size: 1.13rem;
        font-weight: 700;
        color: #757575;
        margin-bottom: 0.7rem;
        margin-top: 0.7rem;
    }

    .btn-custom {
        border-radius: 0.7rem;
        font-weight: 600;
        background: linear-gradient(90deg, #bdbdbd 60%, #757575 100%);
        color: #fff;
        border: none;
        margin-bottom: 0.5rem;
        transition: background 0.2s, color 0.2s, box-shadow 0.2s;
    }

    .btn-custom:hover {
        background: linear-gradient(90deg, #757575 20%, #bdbdbd 100%);
        color: #fff;
        box-shadow: 0 4px 16px #bdbdbd33;
    }

    .btn-custom:active {
        background: #757575;
        color: #fff;
    }

    @media (max-width: 991px) {
        .rooms-section-title {
            font-size: 2rem;
        }

        .filter-bar {
            flex-direction: column;
            padding: 1rem 0.7rem 0.3rem 0.7rem;
        }

        .rooms-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="my-5 px-4">
    <h2 class="rooms-section-title text-center animate__animated animate__fadeInDown">OUR ROOMS</h2>
    <p class="h5 mt-3 text-center animate__animated animate__fadeIn animate__delay-1s">{{ $roomsCount }} Rooms Available
    </p>
    <div class="h-line mx-auto animate__animated animate__fadeInLeft"
        style="height:4px;width:120px;border-radius:2px;background:#bdbdbd;"></div>
</div>

<!-- Filter Bar Horizontal -->
<div class="container">
    <form action="/rooms" method="GET" class="filter-bar animate__animated animate__fadeInDown">
        @csrf
        <div class="form-group">
            <label class="form-label" style="color:#757575;">Check-in</label>
            <input type="date" name="from" class="form-control shadow-none mb-2" required>
        </div>
        <div class="form-group">
            <label class="form-label" style="color:#757575;">Check-out</label>
            <input type="date" name="to" class="form-control shadow-none mb-2" required>
        </div>
        <div class="form-group">
            <label class="form-label" style="color:#757575;">How many person?</label>
            <input type="number" name="count" class="form-control shadow-none" value="1" min="1" required>
        </div>
        <button class="btn btn-search" type="submit"><i class="bi bi-search"></i> SEARCH</button>
    </form>
</div>

<!-- Rooms Grid -->
<div class="container">
    <div class="rooms-grid">
        @foreach ($rooms as $r)
        <div class="room-card animate__animated animate__fadeInUp">
            <img src="{{ $r->images->count() > 0 ? asset('storage/' . $r->images[0]->image) : '/img/kamar 1.jpg' }}"
                class="room-image" alt="Room Image">
            <div class="room-content">
                <div>
                    <div class="room-title"><i class="bi bi-door-open" style="color:#757575;"></i> {{ $r->type->name }}
                        #{{ $r->no }}</div>
                    <div class="guests mb-2">
                        <span class="badge rounded-pill"><i class="bi bi-people"></i> {{ $r->capacity }} Guests</span>
                    </div>
                    <div class="features mb-2">
                        <span class="badge rounded-pill"><i class="bi bi-grid-1x2"></i>
                            @if ($r->capacity <= 5) 2 Rooms @elseif ($r->capacity <= 10) 3 Rooms @else 4 Rooms @endif
                                    </span>
                                    <span class="badge rounded-pill"><i class="bi bi-droplet"></i>
                                        @if ($r->capacity <= 5) 1 Bathroom @else 2 Bathroom @endif </span>
                                            <span class="badge rounded-pill"><i class="bi bi-columns-gap"></i>
                                                @if ($r->capacity <= 5) 1 Balcony @else 2 Balcony @endif </span>
                                                    <span class="badge rounded-pill"><i class="bi bi-couch"></i>
                                                        @if ($r->capacity <= 5) 2 Sofa @elseif ($r->capacity <= 10) 4
                                                                Sofa @else 6 Sofa @endif </span>
                    </div>
                    <div class="Facilities mb-2">
                        <span class="badge rounded-pill"><i class="bi bi-wifi"></i> Wifi</span>
                        <span class="badge rounded-pill"><i class="bi bi-tv"></i> Television</span>
                        <span class="badge rounded-pill"><i class="bi bi-snow"></i> AC</span>
                        @if ($r->capacity > 5)
                        <span class="badge rounded-pill"><i class="bi bi-fire"></i> Room Heater</span>
                        @endif
                        @if ($r->capacity > 10)
                        <span class="badge rounded-pill"><i class="bi bi-cloud-drizzle"></i> Smoking Room</span>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="room-price">IDR {{ number_format($r->price) }}</div>
                    @if ($request->from)
                    <form action="/order" method="post">
                        @csrf
                        <input type="hidden" name="room" value="{{ $r->id }}">
                        <input type="hidden" name="from" value="{{ $request->from }}">
                        <input type="hidden" name="to" value="{{ $request->to }}">
                        <button class="btn btn-custom btn-sm w-100 mb-2">Book now</button>
                    </form>
                    <form action="/rooms/{{ $r->no }}" method="post">
                        @csrf
                        <input type="hidden" name="no" value="{{ $r->no }}">
                        <input type="hidden" name="from" value="{{ $request->from }}">
                        <input type="hidden" name="to" value="{{ $request->to }}">
                        <button class="btn btn-custom btn-sm w-100" style="background:#f4f4f6;color:#757575;">More
                            details</button>
                    </form>
                    @else
                    <a href="/rooms/{{ $r->no }}" class="btn btn-custom btn-sm w-100 mb-2">Book Now</a>
                    <a href="/rooms/{{ $r->no }}" class="btn btn-custom btn-sm w-100"
                        style="background:#f4f4f6;color:#757575;">More details</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
        {!! $rooms->links() !!}
    </div>
</div>
@endsection
