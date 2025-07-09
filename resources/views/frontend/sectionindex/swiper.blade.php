<div class="container-fluid px-lg-4 pt-4">
    <div class="swiper cinematic-swiper">
        <div class="swiper-wrapper">
            @for ($i = 1; $i <= 6; $i++) <div class="swiper-slide">
                <div class="cinematic-slide-wrapper">
                    <img src="/nyoba/images/carousel/{{ $i }}.png" class="cinematic-image" alt="carousel-{{ $i }}">
                    <div class="cinematic-gradient"></div>
                    <div class="cinematic-caption animate__animated animate__fadeInUp">
                        <h2 class="slide-title">Luxury Experience {{ $i }}</h2>
                        <p class="slide-desc">Nikmati kenyamanan dan kemewahan di setiap sudut hotel kami.</p>
                    </div>
                </div>
        </div>
        @endfor
    </div>
    <div class="swiper-button-next cinematic-nav"></div>
    <div class="swiper-button-prev cinematic-nav"></div>
    <div class="swiper-pagination"></div>
</div>
</div>

<style>
    .cinematic-swiper {
        border-radius: 2rem;
        box-shadow: 0 16px 64px rgba(90, 90, 90, 0.13), 0 2px 12px rgba(120, 120, 120, 0.09);
        overflow: hidden;
        background: #fff;
        position: relative;
    }

    .cinematic-slide-wrapper {
        position: relative;
        width: 100%;
        height: 420px;
        overflow: hidden;
        border-radius: 2rem;
        display: flex;
        align-items: flex-end;
    }

    .cinematic-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        filter: brightness(0.95) contrast(1.08);
        transition: transform 0.7s cubic-bezier(.34, 1.56, .64, 1), filter 0.5s;
    }

    .swiper-slide-active .cinematic-image {
        transform: scale(1.08);
        filter: brightness(1) contrast(1.12);
        z-index: 2;
    }

    .swiper-slide:not(.swiper-slide-active) .cinematic-image {
        filter: blur(2px) grayscale(0.15) brightness(0.8);
    }

    .cinematic-gradient {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        top: 0;
        background: linear-gradient(120deg, rgba(60, 60, 60, 0.15) 60%, rgba(40, 40, 40, 0.38) 100%);
        z-index: 2;
        border-radius: 2rem;
    }

    .cinematic-caption {
        position: absolute;
        left: 5%;
        bottom: 10%;
        z-index: 3;
        color: #fff;
        max-width: 55%;
        text-shadow: 0 4px 24px rgba(40, 40, 40, 0.19);
    }

    .slide-title {
        font-size: 2.2rem;
        font-weight: 700;
        margin-bottom: 0.4rem;
        letter-spacing: 0.01em;
    }

    .slide-desc {
        font-size: 1.1rem;
        font-weight: 400;
        margin-bottom: 1.2rem;
    }

    .btn-cinematic {
        background: linear-gradient(90deg, #bdbdbd 60%, #757575 100%);
        color: #fff;
        border: none;
        border-radius: 0.7rem;
        font-weight: 600;
        padding: 0.7rem 2.2rem;
        box-shadow: 0 4px 16px #bdbdbd33;
        transition: background 0.2s, box-shadow 0.2s;
        text-decoration: none;
    }

    .btn-cinematic:hover {
        background: linear-gradient(90deg, #757575 20%, #bdbdbd 100%);
        color: #fff;
        box-shadow: 0 8px 24px #bdbdbd33;
    }

    .cinematic-nav {
        color: #757575;
        background: rgba(255, 255, 255, 0.85);
        border-radius: 50%;
        width: 48px;
        height: 48px;
        box-shadow: 0 2px 8px #bdbdbd33;
        transition: background 0.2s;
    }

    .cinematic-nav:hover {
        background: #e0e0e0;
        color: #333;
    }

    .swiper-pagination-bullet {
        background: #bdbdbd;
        opacity: 1;
        transition: background 0.2s;
    }

    .swiper-pagination-bullet-active {
        background: #757575;
    }

    @media (max-width: 768px) {
        .cinematic-slide-wrapper {
            height: 200px;
        }

        .cinematic-caption {
            max-width: 94%;
            left: 6%;
            bottom: 10%;
        }

        .slide-title {
            font-size: 1.2rem;
        }

        .slide-desc {
            font-size: 0.95rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
  new Swiper('.cinematic-swiper', {
    loop: true,
    spaceBetween: 28,
    slidesPerView: 1,
    effect: 'slide',
    speed: 900,
    autoplay: {
      delay: 3500,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
});
</script>
