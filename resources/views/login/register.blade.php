<!DOCTYPE html>
<html>

<head>
    <title>Booking-Aj | REGISTER</title>
    <link rel="stylesheet" type="text/css" href="/loginn/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    @if (session()->has('loginError'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Register Gagal',
            text: '{{ session('loginError') }}',
            confirmButtonColor: '#4a6fa5'
        });
    </script>
    @endif
    @if (session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: '{{ session('success') }}',
            confirmButtonColor: '#4a6fa5'
        });
    </script>
    @endif

    <img class="wave" src="/loginn/img/wave.png">
    <div class="container">
        <div class="img">
            <img src="/loginn/img/bg.svg">
        </div>
        <div class="login-content">
            <form action="/register" method="post">
                @csrf
                <img src="/loginn/img/avatar.svg">
                <h2 class="title">Register</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <input type="text" name="name" id="name" required autofocus value="{{ old('name') }}"
                            class="input" placeholder="Name">
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <input type="text" name="username" id="username" required value="{{ old('username') }}"
                            class="input" placeholder="Username">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <input type="password" name="password" id="password" required class="input"
                            placeholder="Password">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                            class="input" placeholder="Confirmation Password">
                    </div>
                </div>
                <a href="/login" class="nav-link">Login</a>
                <button type="submit" class="btn btn-primary w-100 py-2 fw-bold shadow register-btn">
                    <i class="bi bi-person-plus me-2"></i> Register
                </button>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="/loginn/js/main.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>
