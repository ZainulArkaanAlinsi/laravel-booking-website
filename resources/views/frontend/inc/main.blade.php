<!DOCTYPE html>
<html>

<head>
    @yield('title')
    <!-- CSS only -->
    @include('frontend.inc.links')
    @yield('link')
    @yield('css')
    {{--
    <link rel="shortcut icon" href="/img/logo.png"> --}}
    <style type="text/css">
        :root {
            --primary: #4a6fa5;
            --primary-dark: #38557a;
            --primary-light: #b9c9d9;
            --accent: #5bb0ba;
            --teal: #5bb0ba;
        }

        body {
            background: #f6f8fa;
        }

        .availability-form {
            margin-top: -50px;
            z-index: 2;
            position: relative;
        }

        .bg-custom,
        .btn-custom {
            background-color: var(--primary);
            color: #fff;
        }

        .btn-custom:hover {
            background-color: var(--primary-dark);
            color: #fff;
        }

        .footer-index.bg-custom {
            background: linear-gradient(90deg, var(--primary-dark) 0%, var(--primary) 100%);
        }

        .swiper-slide img {
            width: 100%;
            height: auto;
            object-fit: cover;
            object-position: center;
            border-radius: 1.2rem;
            box-shadow: 0 2px 12px #b9c9d9;
        }

        @media screen and (max-width: 575px) {
            .availability-form {
                margin-top: 25px;
                padding: 0 18px;
            }

            .swiper-slide img {
                width: 100%;
                height: 50vh;
            }
        }

        .pop:hover,
        .box:hover {
            border-top-color: var(--accent) !important;
            transform: scale(1.04);
            transition: all 0.3s;
        }

        .navbar {
            background-color: var(--primary);
            /* Warna latar belakang navbar */
            transition: background-color 0.3s ease;
        }

        .navbar.scrolled {
            background-color: rgba(74, 111, 165, 0.92);
            /* Lebih transparan saat scroll */
        }

        .box {
            border-top-color: var(--accent) !important;
        }

        /* Footer */
        .footer-index {
            color: #fff;
            padding: 2.5rem 0 1.2rem 0;
            font-size: 1.08rem;
            letter-spacing: 0.01em;
        }
    </style>
</head>

<body>

    @include('frontend.inc.header')
    @include('frontend.inc.logout')

    @yield('content')

    <hr class="mt-4">
    <section class="bg-custom footer-index" id="footer-index">
        @include('frontend.inc.footer')
    </section>

    @include('vendor.sweetalert.alert')

    <section class="script" id="script">
        @include('frontend.inc.scripts')
    </section>

</body>

</html>
