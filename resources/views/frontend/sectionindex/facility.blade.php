<h2 class="mb-5 text-center fw-bold h-font section-title animate__animated animate__fadeInDown">OUR FACILITIES</h2>
<div class="container">
    <div class="row justify-content-center g-4">
        <!-- Swimming Pool -->
        <div class="col-lg-2 col-md-4 col-6">
            <div class="facility-card shadow-lg rounded-4 bg-white animate__animated animate__fadeInUp">
                <div class="facility-img-wrap mb-3">
                    <img src="/frontend/img/fasilitas/1.jpg" class="facility-img" alt="Swimming Pool">
                    <span class="facility-icon bg-info"><i class="bi bi-water"></i></span>
                </div>
                <h5 class="facility-title">Swimming Pool</h5>
            </div>
        </div>
        <!-- Wifi -->
        <div class="col-lg-2 col-md-4 col-6">
            <div
                class="facility-card shadow-lg rounded-4 bg-white animate__animated animate__fadeInUp animate__delay-1s">
                <div class="facility-img-wrap mb-3">
                    <img src="/frontend/img/fasilitas/2.jpg" class="facility-img" alt="Wifi">
                    <span class="facility-icon bg-success"><i class="bi bi-wifi"></i></span>
                </div>
                <h5 class="facility-title">Wifi</h5>
            </div>
        </div>
        <!-- Breakfast -->
        <div class="col-lg-2 col-md-4 col-6">
            <div
                class="facility-card shadow-lg rounded-4 bg-white animate__animated animate__fadeInUp animate__delay-2s">
                <div class="facility-img-wrap mb-3">
                    <img src="/frontend/img/fasilitas/3.jpg" class="facility-img" alt="Breakfast">
                    <span class="facility-icon bg-warning"><i class="bi bi-cup-hot"></i></span>
                </div>
                <h5 class="facility-title">Breakfast</h5>
            </div>
        </div>
        <!-- Warm Water -->
        <div class="col-lg-2 col-md-4 col-6">
            <div
                class="facility-card shadow-lg rounded-4 bg-white animate__animated animate__fadeInUp animate__delay-3s">
                <div class="facility-img-wrap mb-3">
                    <img src="/frontend/img/fasilitas/4.jpg" class="facility-img" alt="Warm Water">
                    <span class="facility-icon bg-primary"><i class="bi bi-droplet-half"></i></span>
                </div>
                <h5 class="facility-title">Warm Water</h5>
            </div>
        </div>
        <!-- Lunch -->
        <div class="col-lg-2 col-md-4 col-6">
            <div
                class="facility-card shadow-lg rounded-4 bg-white animate__animated animate__fadeInUp animate__delay-4s">
                <div class="facility-img-wrap mb-3">
                    <img src="/frontend/img/fasilitas/5.jpg" class="facility-img" alt="Lunch">
                    <span class="facility-icon bg-danger"><i class="bi bi-egg-fried"></i></span>
                </div>
                <h5 class="facility-title">Lunch</h5>
            </div>
        </div>
    </div>
</div>

<style>
    .section-title {
        font-size: 2.3rem;
        font-weight: 800;
        color: #232323;
        letter-spacing: 0.04em;
        margin-bottom: 2.2rem;
        text-shadow: 0 6px 32px #e0e0e0;
        display: inline-block;
        position: relative;
        z-index: 2;
        background: linear-gradient(90deg, #757575 10%, #bdbdbd 80%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .facility-card {
        background: rgba(255, 255, 255, 0.98);
        border-radius: 1.4rem;
        box-shadow: 0 8px 32px rgba(120, 120, 120, 0.13), 0 2px 12px rgba(160, 160, 160, 0.08);
        border: 1.5px solid #e0e0e0;
        padding: 2.2rem 1rem 1.2rem 1rem;
        transition: box-shadow 0.3s, border 0.2s, transform 0.3s;
        position: relative;
        overflow: hidden;
        min-height: 230px;
        margin: 0 auto;
    }

    .facility-card:hover {
        box-shadow: 0 18px 48px #bdbdbd44;
        border: 1.5px solid #bdbdbd;
        transform: translateY(-7px) scale(1.04);
    }

    .facility-img-wrap {
        position: relative;
        width: 90px;
        height: 90px;
        margin: 0 auto;
        border-radius: 1.2rem;
        overflow: hidden;
        box-shadow: 0 2px 12px #bdbdbd22;
        background: #f4f4f6;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .facility-img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 1.1rem;
        transition: transform 0.4s, box-shadow 0.3s;
    }

    .facility-card:hover .facility-img {
        transform: scale(1.08) rotate(-2deg);
        box-shadow: 0 8px 24px #bdbdbd44;
    }

    .facility-icon {
        position: absolute;
        bottom: -12px;
        right: -12px;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 1.3rem;
        box-shadow: 0 2px 8px #bdbdbd33;
        border: 2.5px solid #fff;
        z-index: 2;
    }

    .facility-title {
        font-size: 1.13rem;
        font-weight: 700;
        color: #333;
        margin-top: 1.2rem;
        letter-spacing: 0.01em;
    }

    @media (max-width: 991px) {
        .facility-card {
            padding: 1.5rem 0.6rem 1rem 0.6rem;
            min-height: 180px;
        }

        .facility-img-wrap {
            width: 68px;
            height: 68px;
        }

        .facility-img {
            width: 60px;
            height: 60px;
        }
    }

    @media (max-width: 575px) {
        .facility-card {
            min-height: 140px;
        }

        .facility-img-wrap {
            width: 54px;
            height: 54px;
        }

        .facility-img {
            width: 46px;
            height: 46px;
        }
    }
</style>
