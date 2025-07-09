<!DOCTYPE html>
<html lang="en">

<head>
    <title>Booking-Aj | LOGIN</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Google Fonts & Bootstrap Icons -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/bs/css/bootstrap.min.css">
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background: linear-gradient(120deg, #e0eafc 60%, #cfdef3 100%);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .login-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 2rem;
            box-shadow: 0 10px 36px rgba(120, 120, 120, 0.12);
            padding: 2.5rem 2rem 2rem 2rem;
            width: 100%;
            max-width: 410px;
            position: relative;
            animation: fadeInUp 1.2s;
        }

        .login-avatar {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            margin: 0 auto 1.2rem auto;
            display: block;
            box-shadow: 0 2px 14px #b9c9d9;
            background: #f4f4f6;
        }

        .login-title {
            font-weight: 800;
            font-size: 2rem;
            color: #4a6fa5;
            text-align: center;
            margin-bottom: 1.5rem;
            letter-spacing: 0.04em;
        }

        .form-floating .form-control {
            border-radius: 1.1rem;
            background: #f7fafd;
            border: 1.3px solid #e0e0e0;
            font-size: 1.08rem;
            transition: border .2s, box-shadow .2s;
        }

        .form-floating .form-control:focus {
            border: 1.3px solid #4a6fa5;
            box-shadow: 0 2px 8px #b9c9d933;
            background: #fff;
        }

        .input-icon {
            position: absolute;
            left: 1.1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #5bb0ba;
            font-size: 1.2rem;
            z-index: 2;
        }

        .form-floating>.form-control,
        .form-floating>label {
            padding-left: 2.6rem;
        }

        .remember-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.2rem;
        }

        .login-btn {
            width: 100%;
            border-radius: 1.1rem;
            background: linear-gradient(90deg, #4a6fa5 60%, #5bb0ba 100%);
            color: #fff;
            font-weight: 700;
            font-size: 1.13rem;
            padding: 0.7rem 0;
            border: none;
            transition: background 0.2s, box-shadow 0.2s;
            box-shadow: 0 2px 8px #b9c9d933;
        }

        .login-btn:hover {
            background: linear-gradient(90deg, #5bb0ba 20%, #4a6fa5 100%);
            color: #fff;
            box-shadow: 0 4px 16px #b9c9d933;
        }

        .register-link {
            display: block;
            text-align: center;
            margin-top: 1.2rem;
            color: #4a6fa5;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.18s;
        }

        .register-link:hover {
            color: #5bb0ba;
            text-decoration: underline;
        }

        @media (max-width: 575px) {
            .login-card {
                padding: 1.2rem 0.5rem 1.5rem 0.5rem;
            }
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
    </style>
</head>

<body>
    <!-- SweetAlert2 Session Alerts -->
    @if(session('loginError'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal',
            text: '{{ session('loginError') }}',
            confirmButtonColor: '#4a6fa5',
            confirmButtonText: 'OK'
        });
    </script>
    @endif
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: '{{ session('success') }}',
            confirmButtonColor: '#4a6fa5',
            confirmButtonText: 'OK'
        });
    </script>
    @endif
    @if(session('asking'))
    <script>
        Swal.fire({
            icon: 'info',
            title: 'Info',
            text: '{{ session('asking') }}',
            confirmButtonColor: '#4a6fa5',
            confirmButtonText: 'OK'
        });
    </script>
    @endif

    <section class="login-section">
        <div class="login-card shadow">
            <img src="/loginn/img/avatar.svg" alt="Avatar" class="login-avatar animate__animated animate__fadeInDown">
            <div class="login-title animate__animated animate__fadeInDown">Login to Booking-Aj</div>
            <form action="/login" method="post" autocomplete="off">
                @csrf
                <div class="form-floating mb-3 position-relative">
                    <i class="bi bi-person input-icon"></i>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username"
                        required autofocus @if(Cookie::has('username')) value="{{ Cookie::get('username') }}" @endif>
                    <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3 position-relative">
                    <i class="bi bi-lock input-icon"></i>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                        required @if(Cookie::has('password')) value="{{ Cookie::get('password') }}" @endif>
                    <label for="password">Password</label>
                </div>
                <div class="remember-row mb-2">
                    <div>
                        <input type="checkbox" id="remember" name="remember" value="1" @if(Cookie::has('username'))
                            checked @endif>
                        <label for="remember" class="ms-1" style="font-size: 1rem;">Remember me</label>
                    </div>
                    <a href="/register" class="register-link">Register?</a>
                </div>
                <button type="submit" class="login-btn animate__animated animate__pulse animate__delay-1s">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                </button>
            </form>
        </div>
    </section>

    <script src="/bs/js/bootstrap.bundle.min.js"></script>
</body>

</html>
