{{-- ================================================
 FILE: resources/views/partials/footer.blade.php
 FUNGSI: Footer website modern (dark / black)
================================================ --}}

<footer class="footer-dark mt-5">
    <style>
        :root {
            --orange: #f39c12;
        }

        .footer-dark {
            background: #0f0f0f;
            color: #b5b5b5;
            padding: 70px 0 25px;
        }

        .footer-dark h4,
        .footer-dark h6 {
            color: #fff;
            font-weight: 700;
        }

        .footer-dark p {
            color: #aaa;
        }

        .footer-link {
            color: #aaa;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 8px;
            transition: .25s;
        }

        .footer-link:hover {
            color: var(--orange);
            transform: translateX(4px);
        }

        .social-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #1a1a1a;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ccc;
            transition: .3s;
        }

        .social-icon:hover {
            background: var(--orange);
            color: #000;
            transform: translateY(-4px);
        }

        .footer-divider {
            border-top: 1px solid #222;
            margin: 40px 0 20px;
        }

        /* PAYMENT */
        .payment-wrapper {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .payment-img {
            height: 32px;
            background: #fff;
            padding: 6px 10px;
            border-radius: 14px;
            box-shadow: 0 4px 10px rgba(0,0,0,.25);
            transition: .3s;
        }

        .payment-img:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 16px rgba(243,156,18,.5);
        }

        @media (max-width: 768px) {
            .payment-wrapper {
                justify-content: center;
            }
        }
    </style>

    <div class="container">
        <div class="row g-4">

            {{-- Brand --}}
            <div class="col-lg-4 col-md-6">
                <h4>
                    <i class="bi bi-camera-fill me-2 text-warning"></i>
                    Camera Instax ddnzz
                </h4>
                <p class="mt-3">
                    Toko kamera Instax terpercaya dengan produk original,
                    harga bersahabat, dan pengiriman cepat.
                </p>
                <div class="d-flex gap-3 mt-4">
                    <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="social-icon"><i class="bi bi-youtube"></i></a>
                </div>
            </div>

            {{-- Menu --}}
            <div class="col-lg-2 col-md-6">
                <h6 class="mb-3">Menu</h6>
                <a href="{{ route('catalog.index') }}" class="footer-link">Katalog Produk</a><br>
                <a href="#" class="footer-link">Tentang Kami</a><br>
                <a href="#" class="footer-link">Kontak</a>
            </div>

            {{-- Bantuan --}}
            <div class="col-lg-2 col-md-6">
                <h6 class="mb-3">Bantuan</h6>
                <a href="#" class="footer-link">FAQ</a><br>
                <a href="#" class="footer-link">Cara Belanja</a><br>
                <a href="#" class="footer-link">Kebijakan Privasi</a>
            </div>

            {{-- Kontak --}}
            <div class="col-lg-4 col-md-6">
                <h6 class="mb-3">Hubungi Kami</h6>
                <p><i class="bi bi-geo-alt me-2 text-warning"></i>Bandung</p>
                <p><i class="bi bi-telephone me-2 text-warning"></i>(022) 123-4567</p>
                <p><i class="bi bi-envelope me-2 text-warning"></i>info@instaxddnzz.com</p>
            </div>
        </div>

        {{-- Bottom --}}
        <div class="row align-items-center footer-divider">
            <div class="col-md-6 text-center text-md-start">
                <p class="small mb-0 text-muted">
                    &copy; {{ date('Y') }} Camera Instax ddnzz. All rights reserved.
                </p>
            </div>

            <div class="col-md-6 mt-3 mt-md-0">
                <div class="payment-wrapper">
                    <img src="{{ asset('assets/images/gambar2.png') }}" class="payment-img" alt="DANA">
                    <img src="{{ asset('assets/images/gambar5.png') }}" class="payment-img" alt="OVO">
                    <img src="{{ asset('assets/images/gambar6.jpg') }}" class="payment-img" alt="GOPAY">
                     <img src="{{ asset('assets/images/gambar7.png') }}" class="payment-img" alt="SHOOPE PAY">
                </div>
            </div>
        </div>
    </div>
</footer>
