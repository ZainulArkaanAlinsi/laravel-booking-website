@extends('frontend.inc.main')

@section('title')
<title>Booking-Aj | FORM BUKTI PEMBAYARAN</title>
@endsection

@section('content')
<style>
    body {
        background: #f4f7fa;
        font-family: 'Inter', 'Poppins', sans-serif;
    }

    .card-custom {
        border-radius: 24px;
        box-shadow: 0 8px 32px rgba(30, 41, 59, 0.10);
        border: none;
        background: #fff;
        padding: 2rem 2rem 1.5rem 2rem;
        margin-bottom: 2rem;
        animation: fadeInUp 0.7s;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    h4,
    .invoice-number {
        color: #2563eb;
        font-weight: 700;
    }

    label {
        color: #334155;
        font-weight: 600;
        letter-spacing: 0.5px;
        margin-bottom: 0.3rem;
    }

    input.form-control:disabled {
        background: #f1f5f9;
        color: #64748b;
        border: none;
        font-weight: 500;
    }

    .form-label-icon {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-primary {
        background: linear-gradient(90deg, #2563eb 0%, #1e40af 100%);
        border: none;
        border-radius: 12px;
        font-weight: 600;
        transition: background 0.3s;
        padding: 10px 0;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #1e40af 0%, #2563eb 100%);
    }

    .text-primary {
        color: #2563eb !important;
    }

    .input-group-text {
        background: #f1f5f9;
        border: none;
        color: #64748b;
    }

    @media (max-width: 991px) {
        .card-custom {
            padding: 1.2rem;
        }
    }
</style>

<div class="container py-5">
    <div class="row g-4">
        <!-- Detail Pesanan -->
        <div class="col-lg-6">
            <div class="card card-custom shadow-lg">
                <h4>Detail Pesanan <span class="invoice-number">#{{ $pay->invoice }}</span></h4>
                <hr>
                <div class="mb-3 row">
                    <label for="room_no" class="col-sm-3 col-form-label form-label-icon">
                        <i class="bi bi-door-closed"></i> Room
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="room_no" class="form-control" value="{{ $t->room->no }}" disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="room_type" class="col-sm-3 col-form-label form-label-icon">
                        <i class="bi bi-house"></i> Type
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="room_type" class="form-control" value="{{ $t->room->type->name }}"
                            disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="room_capacity" class="col-sm-3 col-form-label form-label-icon">
                        <i class="bi bi-people"></i> Capacity
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="room_capacity" class="form-control" value="{{ $t->room->capacity }}"
                            disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="room_price" class="col-sm-3 col-form-label form-label-icon">
                        <i class="bi bi-cash-stack"></i> Price / Day
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="room_price" class="form-control"
                            value="IDR {{ number_format($t->room->price) }}" disabled>
                    </div>
                </div>
                <hr>
                <div class="mb-3 row">
                    <label for="check_in" class="col-sm-3 col-form-label form-label-icon">
                        <i class="bi bi-calendar-event"></i> Check In
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="check_in" class="form-control"
                            value="{{ Carbon\Carbon::parse($t->check_in)->isoformat('D MMMM Y') }}" disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="check_out" class="col-sm-3 col-form-label form-label-icon">
                        <i class="bi bi-calendar-check"></i> Check Out
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="check_out" class="form-control"
                            value="{{ Carbon\Carbon::parse($t->check_out)->isoformat('D MMMM Y') }}" disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="how_long" class="col-sm-3 col-form-label form-label-icon">
                        <i class="bi bi-clock-history"></i> Total Day
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="how_long" class="form-control"
                            value="{{ $t->check_in->diffindays($t->check_out) }} Day" disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="total_price" class="col-sm-3 col-form-label form-label-icon">
                        <i class="bi bi-currency-dollar"></i> Total Price
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="total_price" class="form-control" value="IDR {{ number_format($price) }}"
                            disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="paymentmethod" class="col-sm-3 col-form-label form-label-icon">
                        <i class="bi bi-credit-card"></i> Payment Method
                    </label>
                    <div class="col-sm-9">
                        <input type="text" id="paymentmethod" class="form-control" value="{{ $pay->Methode->nama }}"
                            disabled>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form Upload Bukti Pembayaran -->
        <div class="col-lg-6">
            <div class="card card-custom shadow-lg">
                <h4>Kirim Bukti Pembayaran</h4>
                <hr>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Transfer ke :</label>
                    <h5 class="text-primary">{{ $pay->Methode->no_rek }}</h5>
                </div>
                <form action="/bayar" method="post" enctype="multipart/form-data" class="mt-4">
                    @csrf
                    <div class="mb-3">
                        <label for="image" class="form-label">Upload Bukti <span class="fst-italic">(Max
                                3MB)</span></label>
                        <input required type="file" class="form-control" name="image" id="image"
                            accept="image/*,application/pdf">
                    </div>
                    <input type="hidden" name="id" value="{{ $pay->id }}">
                    <button type="submit" class="btn btn-primary w-100">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
