<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Booking-aj | Contact Us</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        .contact-card {
            transition: box-shadow 0.3s, transform 0.3s;
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.06);
            border-radius: 1rem;
            background: linear-gradient(135deg, #f8fafc 80%, #e2eafc 100%);
        }

        .contact-card:hover {
            box-shadow: 0 8px 32px rgba(0, 123, 255, 0.18);
            transform: translateY(-5px) scale(1.03);
        }

        .contact-icon {
            transition: color 0.2s, transform 0.2s;
            font-size: 1.5rem;
        }

        .contact-link:hover .contact-icon {
            color: #0d6efd;
            transform: scale(1.2) rotate(-10deg);
        }

        .social-badge {
            transition: background 0.2s, color 0.2s, transform 0.2s;
            cursor: pointer;
        }

        .social-badge:hover {
            background: #0d6efd !important;
            color: #fff !important;
            transform: scale(1.08) rotate(-3deg);
        }

        .map-animate {
            box-shadow: 0 2px 16px rgba(0, 0, 0, 0.08);
            border-radius: 1rem;
            overflow: hidden;
            animation: fadeInUp 1s;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }
    </style>
</head>

<body style="background: #f8fafc;">
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold animate__animated animate__fadeInDown"
        style="font-family: 'Poppins', sans-serif;">Our Contact</h2>
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-8 col-md-8 mb-lg-0 mb-3 animate__animated animate__fadeInLeft">
                <div class="map-animate">
                    <iframe class="w-100" height="320px"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.729472588433!2d106.92765581426374!3d-6.586679295238573!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69b9df518b588d%3A0x2e3c9705698fa0fd!2sIDN%20Boarding%20School%20Sentul!5e0!3m2!1sid!2sid!4v1680000000000"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 d-flex flex-column gap-4">
                <div class="contact-card p-4 animate__animated animate__fadeInRight animate__delay-1s">
                    <h5 class="mb-3"><i class="bi bi-telephone-fill text-primary me-2"></i>Call us</h5>
                    <a href="tel:+625555555555"
                        class="d-flex align-items-center mb-2 text-decoration-none text-dark contact-link">
                        <span class="contact-icon me-2"><i class="bi bi-telephone-fill"></i></span> +62 5555555555
                    </a>
                    <a href="tel:+625555555555"
                        class="d-flex align-items-center mb-2 text-decoration-none text-dark contact-link">
                        <span class="contact-icon me-2"><i class="bi bi-telephone-fill"></i></span> +62 5555555555
                    </a>
                </div>
                <div class="contact-card p-4 animate__animated animate__fadeInRight animate__delay-2s">
                    <h5 class="mb-3"><i class="bi bi-share-fill text-primary me-2"></i>Follow us</h5>
                    <a href="#" class="d-inline-block mb-2">
                        <span class="badge social-badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-twitter me-1"></i>Twitter
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block mb-2">
                        <span class="badge social-badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1"></i>Facebook
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block">
                        <span class="badge social-badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram me-1"></i>Instagram
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS (optional, for interactivity) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
