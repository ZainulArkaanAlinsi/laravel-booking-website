@extends('dashboard.layout.main')
@section('title')
<title>Dashboard | Edit Room {{ $p->no }}</title>
@endsection

@section('content')
<style>
    .glass-card {
        background: rgba(255, 255, 255, 0.96);
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

    .img-preview {
        max-width: 120px;
        max-height: 90px;
        border-radius: 1rem;
        object-fit: cover;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.10);
        margin-bottom: 1rem;
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
                <h4 class="mb-0 fw-bold text-primary">
                    <i class="fas fa-edit me-2"></i>
                    Edit Kamar No {{ $p->no }} <span class="text-muted">#{{ $p->id }}</span>
                </h4>
            </div>
            @if($p->image)
            <div class="mb-3 text-center">
                <img src="{{ asset('storage/'.$p->image) }}" class="img-preview" alt="Foto Kamar {{ $p->no }}">
                <div class="small text-muted">Foto Kamar Saat Ini</div>
            </div>
            @endif
            <form action="/dashboard/data/room/{{ $p->id }}/update" method="POST" enctype="multipart/form-data"
                autocomplete="off">
                @csrf
                <div class="row g-4">
                    <div class="col-md-4 position-relative">
                        <label for="no" class="form-label">Nomor Kamar <span class="text-danger">*</span></label>
                        <i class="fas fa-hashtag icon-input"></i>
                        <input type="text" class="form-control input-with-icon" id="no" name="no" required
                            value="{{ $p->no }}">
                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="status_id" class="form-label">Status <span class="text-danger">*</span></label>
                        <i class="fas fa-circle-notch icon-input"></i>
                        <select name="status_id" id="status_id" class="form-select input-with-icon" required>
                            <option value="{{ $p->status_id }}" selected>{{ $p->status->name }}</option>
                            @foreach ($status as $s)
                            @if($s->id != $p->status_id)
                            <option value="{{ $s->id }}">{{ $s->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 position-relative">
                        <label for="type_id" class="form-label">Tipe <span class="text-danger">*</span></label>
                        <i class="fas fa-layer-group icon-input"></i>
                        <select class="form-select input-with-icon" name="type_id" id="type_id" required>
                            <option value="{{ $p->type_id }}" selected>{{ $p->type->name }}</option>
                            @foreach ($type as $t)
                            @if($t->id != $p->type_id)
                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row g-4 mt-1">
                    <div class="col-md-6 position-relative">
                        <label for="capacity" class="form-label">Kapasitas <span class="text-danger">*</span></label>
                        <i class="fas fa-user-friends icon-input"></i>
                        <input type="number" min="1" class="form-control input-with-icon" id="capacity" name="capacity"
                            value="{{ $p->capacity }}" required>
                    </div>
                    <div class="col-md-6 position-relative">
                        <label for="price" class="form-label">Harga / Hari <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                            <input type="number" class="form-control" id="price" name="price" required
                                value="{{ $p->price }}">
                        </div>
                    </div>
                </div>
                <div class="row g-4 mt-1">
                    <div class="col-12 position-relative">
                        <label for="info" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                        <i class="fas fa-align-left icon-input"></i>
                        <textarea name="info" id="info" rows="3" class="form-control input-with-icon"
                            required>{{ $p->info }}</textarea>
                    </div>
                </div>
                <div class="row g-4 mt-1">
                    <div class="col-12 position-relative">
                        <label for="image" class="form-label">Ganti Foto Kamar</label>
                        <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button class="btn btn-primary btn-lg px-4 shadow-sm" type="submit">
                        <i class="fas fa-save me-2"></i>Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
