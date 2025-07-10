@extends('dashboard.layout.main')
@section('title')
<title>Dashboard | Tambah Kamar</title>
@endsection

@section('content')
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.92);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.13);
        backdrop-filter: blur(10px);
        border-radius: 1.5rem;
        border: 1px solid rgba(220, 220, 220, 0.25);
        padding: 2.5rem 2rem 2rem 2rem;
        transition: box-shadow .3s;
    }

    .glass-card:hover {
        box-shadow: 0 16px 48px 0 rgba(31, 38, 135, 0.18);
    }

    .form-label {
        font-weight: 600;
        letter-spacing: .01em;
        margin-bottom: .4rem;
    }

    .input-group-text {
        background: #f8fafc;
        border: none;
    }

    .form-control,
    .form-select {
        border-radius: .75rem;
        padding-left: 2.2rem;
        font-size: 1rem;
        background: #f9fbfd;
        border: 1px solid #e4e9ee;
        transition: border-color .2s, box-shadow .2s;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.13rem rgba(13, 110, 253, 0.09);
        background: #fff;
    }

    .icon-input {
        position: absolute;
        left: 1rem;
        top: 50%;
        transform: translateY(-50%);
        color: #b0b8c1;
        font-size: 1.1rem;
        pointer-events: none;
        z-index: 2;
    }

    .input-with-icon {
        padding-left: 2.2rem !important;
    }

    .btn-primary {
        background: linear-gradient(90deg, #1e90ff 0%, #00bfff 100%);
        border: none;
        font-weight: 600;
        letter-spacing: .03em;
        transition: background .2s, transform .1s;
        border-radius: .8rem;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #00bfff 0%, #1e90ff 100%);
        transform: translateY(-2px) scale(1.03);
    }

    .btn-back {
        background: #f5f7fa;
        color: #0d6efd;
        border: none;
        transition: background .2s;
    }

    .btn-back:hover {
        background: #e8f0fe;
    }

    .progress {
        height: 5px;
        margin-bottom: 1.1rem;
        background: #e6f0fa;
        border-radius: 1rem;
        display: none;
    }

    .show-progress .progress {
        display: block;
        animation: progressBar 1.2s linear forwards;
    }

    @keyframes progressBar {
        from {
            width: 0;
        }

        to {
            width: 100%;
        }
    }

    @media (max-width: 768px) {
        .glass-card {
            padding: 1rem;
        }
    }
</style>
<div class="row justify-content-center my-4">
    <div class="col-lg-7 col-md-10">
        <div class="glass-card position-relative">
            <div class="d-flex align-items-center mb-4">
                <a href="{{ url()->previous() }}" class="btn btn-back btn-sm rounded-circle shadow-sm me-3"
                    title="Kembali">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h4 class="mb-0 fw-bold text-primary"><i class="fas fa-bed me-2"></i>Tambah Kamar Baru</h4>
            </div>
            <div class="progress">
                <div class="progress-bar bg-primary" style="width: 0%"></div>
            </div>
            <form id="roomForm" action="/dashboard/data/room/post" method="POST" enctype="multipart/form-data"
                autocomplete="off">
                @csrf
                <div class="row g-4">
                    <div class="col-md-4 position-relative">
                        <label for="no" class="form-label">Nomor Kamar <span class="text-danger">*</span></label>
                        <i class="fas fa-hashtag icon-input"></i>
                        <input type="text" class="form-control input-with-icon" id="no" name="no" required
                            placeholder="Contoh: 10A">
                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="status_id" class="form-label">Status <span class="text-danger">*</span></label>
                        <i class="fas fa-circle-notch icon-input"></i>
                        <select name="status_id" id="status_id" class="form-select input-with-icon" required>
                            <option value="" disabled selected>-- Pilih --</option>
                            @foreach ($status as $s)
                            <option value="{{ $s->id }}">{{ $s->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="type_id" class="form-label">Tipe <span class="text-danger">*</span></label>
                        <i class="fas fa-layer-group icon-input"></i>
                        <select class="form-select input-with-icon" name="type_id" id="type_id" required>
                            <option value="" disabled selected>-- Pilih --</option>
                            @foreach ($type as $t)
                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row g-4 mt-1">
                    <div class="col-md-6 position-relative">
                        <label for="capacity" class="form-label">Kapasitas <span class="text-danger">*</span></label>
                        <i class="fas fa-user-friends icon-input"></i>
                        <input type="number" min="1" class="form-control input-with-icon" id="capacity" name="capacity"
                            required placeholder="Jumlah orang">
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="price" class="form-label">Harga / Hari <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                            <input type="number" class="form-control" id="price" name="price" required placeholder="0">
                        </div>
                    </div>
                </div>
                <div class="row g-4 mt-1">
                    <div class="col-12 position-relative">
                        <label for="info" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <i class="fas fa-align-left icon-input"></i>
                        <textarea name="info" id="info" rows="3" class="form-control input-with-icon" required
                            placeholder="Contoh: Beach view, king bed, AC, balkon, dll"></textarea>
                    </div>
                </div>
                <div class="row g-4 mt-1">
                    <div class="col-12 position-relative">
                        <label for="image" class="form-label">Foto Kamar</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-primary btn-lg px-4 shadow-sm" type="submit" id="submitBtn">
                        <i class="fas fa-plus-circle me-2"></i>Tambah Kamar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // Progress bar dummy saat submit
    document.getElementById('roomForm').addEventListener('submit', function(e) {
        document.querySelector('.glass-card').classList.add('show-progress');
        document.querySelector('.progress-bar').style.width = '100%';
        document.getElementById('submitBtn').disabled = true;
    });
</script>
@endsection
