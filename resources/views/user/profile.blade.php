@extends('frontend.inc.main')
@section('title')
<title>booking-aj | PROFILE EDIT</title>
@endsection

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<style>
    .profile-card {
        background: linear-gradient(135deg, #f8fafc 60%, #e2eafc 100%);
        border: none;
        border-radius: 1.25rem;
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.12);
        transition: box-shadow 0.3s;
    }

    .profile-card:hover {
        box-shadow: 0 16px 48px 0 rgba(31, 38, 135, 0.18);
    }

    .profile-avatar {
        border: 5px solid #fff;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.13);
        background: #e9ecef;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .profile-avatar:hover {
        transform: scale(1.06) rotate(-2deg);
    }

    .animated-btn {
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .animated-btn:hover,
    .animated-btn:focus {
        transform: translateY(-2px) scale(1.05);
        box-shadow: 0 2px 16px rgba(0, 123, 255, 0.2);
    }

    .card-form {
        border-radius: 1rem;
        border: none;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
    }

    .form-label {
        font-weight: 500;
        color: #495057;
    }

    .divider {
        border-top: 2px solid #e2eafc;
        margin: 1.5rem 0;
    }
</style>
<section style="background: linear-gradient(120deg, #f8fafc 70%, #e2eafc 100%); min-height: 100vh; margin-bottom:65px;">
    <div class="container py-5">
        <div class="row justify-content-center align-items-start g-4">
            <!-- Profile Card -->
            <div class="col-lg-4 mb-4 animate__animated animate__fadeInLeft">
                <div class="card profile-card p-4 text-center">
                    @php
                    use Illuminate\Support\Str;
                    $isExternal = $user->image && Str::startsWith($user->image, ['http://', 'https://']);
                    @endphp
                    <img src="{{ $user->image == null ? '/img/default-user.jpg' : ($isExternal ? $user->image : asset('storage/' . $user->image)) }}"
                        alt="avatar"
                        class="rounded-circle img-thumbnail profile-avatar animate__animated animate__zoomIn"
                        style="width: 150px; height: 150px;">
                    <h4 class="mt-3 mb-1 fw-bold"><i class="bi bi-person-badge"></i>{{ $user->Customer->name }}</h4>
                    <div class="mb-2">
                        <span class="badge bg-info bg-opacity-10 text-info">
                            <i class="bi bi-briefcase"></i>
                            {{ $user->Customer->job ?? '-' }}
                        </span>
                    </div>
                    <div class="mb-4 text-muted small">
                        <i class="bi bi-geo-alt"></i>
                        {{ $user->Customer->address ?? '-' }}
                    </div>
                    <a href="/myaccount/edit" class="btn btn-outline-primary btn-sm animated-btn">
                        <i class="bi bi-camera"></i>
                        {{ $user->image == null ? 'Tambah Foto' : 'Edit Foto' }}
                    </a>
                </div>
            </div>
            <!-- End Profile Card -->

            <!-- Edit Profile Form -->
            <div class="col-lg-8 animate__animated animate__fadeInRight">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeInDown"
                    role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show animate__animated animate__shakeX"
                    role="alert">
                    <i class="bi bi-x-circle-fill me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                @endif

                <div class="card card-form mb-4 animate__animated animate__fadeInUp">
                    <div class="card-body">
                        <form action="/myaccount/{{ $user->id }}/update" method="post" autocomplete="off">
                            @csrf
                            <h5 class="mb-4 fw-bold text-primary"><i class="bi bi-pencil-square me-2"></i>Edit Profile
                            </h5>
                            <div class="row mb-3 align-items-center">
                                <label class="col-sm-3 form-label">Name <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ old('name', $user->Customer->name) }}" required>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-sm-3 form-label">Username <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username" id="username"
                                        value="{{ old('username', $user->username) }}" required>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-sm-3 form-label">Email <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ old('email', $user->email) }}" required>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-sm-3 form-label">NIK <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nik" id="nik"
                                        value="{{ old('nik', $user->Customer->nik) }}" required>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-sm-3 form-label">Phone <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="telp" id="telp"
                                        value="{{ old('telp', $user->telp) }}" required>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-sm-3 form-label">Birthday</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="birthdate" id="birthdate"
                                        value="{{ old('birthdate', $user->Customer->birthdate) }}">
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-sm-3 form-label">Address</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="address" id="address"
                                        value="{{ old('address', $user->Customer->address) }}">
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-sm-3 form-label">Gender</label>
                                <div class="col-sm-9 d-flex align-items-center gap-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk" value="L" id="jkpria" {{
                                            $user->Customer->jk == 'L' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="jkpria">Pria</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk" value="P" id="jkwanita"
                                            {{ $user->Customer->jk == 'P' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="jkwanita">Wanita</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-sm-3 form-label">Job</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="job" id="job"
                                        value="{{ old('job', $user->Customer->job) }}">
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-sm-3 form-label">Card Number</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="card_number" id="card_number"
                                        value="{{ old('card_number', $user->card_number) }}">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary animated-btn">
                                    <i class="bi bi-save me-1"></i>Update!
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Change Password Card -->
                <div class="card card-form animate__animated animate__fadeInUp">
                    <div class="card-body">
                        <form action="/myaccount/{{ $user->id }}/update" method="post">
                            @csrf
                            <h5 class="mb-3 fw-bold text-danger"><i class="bi bi-lock-fill me-2"></i>Change Password
                            </h5>
                            <div class="row mb-3 align-items-center">
                                <label class="col-sm-3 form-label">New Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="newpassword" id="newpassword"
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3 align-items-center">
                                <label class="col-sm-3 form-label">Confirmation Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" name="confirmation" id="confirmation"
                                        required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-danger animated-btn">
                                    <i class="bi bi-arrow-repeat me-1"></i>Change Password!
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Change Password Card -->
            </div>
            <!-- End Edit Profile Form -->
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Example: Animate alert on success/error (already uses Animate.css classes)
    // Additional custom animation can be added here if needed
</script>
@endsection
