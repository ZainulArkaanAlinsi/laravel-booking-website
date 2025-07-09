<div class="container availability-form my-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="availability-card shadow-lg p-4 rounded-4 animate__animated animate__fadeInDown">
                <div class="text-center mb-4">
                    <i class="bi bi-calendar-check display-5 text-primary mb-2"></i>
                    <h4 class="fw-bold mb-0" style="letter-spacing:0.02em;">Check Booking Availability</h4>
                </div>
                <form method="get" action="/rooms">
                    @csrf
                    <div class="row g-3">
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label fw-semibold" for="from">
                                <i class="bi bi-box-arrow-in-right me-2 text-secondary"></i>
                                Check-in
                            </label>
                            <input type="date" name="from" id="from" class="form-control shadow-none rounded-3"
                                required>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <label class="form-label fw-semibold" for="to">
                                <i class="bi bi-box-arrow-left me-2 text-secondary"></i>
                                Check-out
                            </label>
                            <input type="date" name="to" id="to" class="form-control shadow-none rounded-3" required>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <label class="form-label fw-semibold" for="count">
                                <i class="bi bi-people-fill me-2 text-secondary"></i>
                                Person
                            </label>
                            <input type="number" name="count" id="count" class="form-control shadow-none rounded-3"
                                value="1" min="1" required>
                        </div>
                        <div class="col-lg-1 col-md-6 d-grid align-items-end">
                            <button type="submit"
                                class="btn btn-primary rounded-3 fw-semibold shadow animate__animated animate__pulse animate__delay-1s">
                                <i class="bi bi-search"></i>
                                <span class="d-none d-lg-inline ms-1">Search</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .availability-card {
        background: rgba(255, 255, 255, 0.97);
        backdrop-filter: blur(5px);
        border: 1.5px solid #e0e0e0;
        border-radius: 1.5rem;
        box-shadow: 0 10px 36px rgba(180, 180, 180, 0.14);
        transition: box-shadow 0.3s, border 0.2s;
    }

    .availability-card:hover {
        box-shadow: 0 18px 48px #bdbdbd44;
        border: 1.5px solid #bdbdbd;
    }

    .form-label {
        font-size: 1.07rem;
        color: #444;
        margin-bottom: 0.4rem;
    }

    .form-control {
        font-size: 1.05rem;
        padding: 0.7rem 1rem;
        background: #f4f4f6;
        border: 1.2px solid #e0e0e0;
        transition: border 0.2s, box-shadow 0.2s;
    }

    .form-control:focus {
        border: 1.2px solid #757575;
        box-shadow: 0 2px 8px #bdbdbd33;
        background: #fff;
    }

    .btn-primary {
        background: linear-gradient(90deg, #bdbdbd 60%, #757575 100%);
        border: none;
        color: #fff;
        font-size: 1.07rem;
        transition: background 0.2s, color 0.2s, box-shadow 0.2s;
        padding: 0.7rem 0;
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #757575 20%, #bdbdbd 100%);
        color: #fff;
        box-shadow: 0 4px 16px #bdbdbd33;
    }

    @media (max-width:991px) {
        .availability-card {
            padding: 1.5rem 0.7rem;
        }

        .form-label {
            font-size: 1rem;
        }

        .col-lg-1,
        .col-lg-3,
        .col-lg-4 {
            flex: 0 0 100%;
            max-width: 100%;
        }

        .d-grid {
            margin-top: 1rem;
        }
    }
</style>
