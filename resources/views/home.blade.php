@extends('layouts.app')

@section('title', 'Beranda - Toko Kamera Instax')

@push('styles')
<style>
    :root {
        --glass-bg: rgba(255, 255, 255, 0.15);
        --glass-border: rgba(255, 255, 255, 0.2);
        --primary-gradient: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
    }

    /* Hero Section Modern */
    .hero-container {
        background: #0f172a; /* Dark Navy */
        border-radius: 0 0 50px 50px;
        padding: 100px 0;
        position: relative;
        overflow: hidden;
    }

    .hero-circle {
        position: absolute;
        width: 500px;
        height: 500px;
        background: var(--primary-gradient);
        filter: blur(120px);
        border-radius: 50%;
        opacity: 0.3;
        top: -100px;
        right: -100px;
    }

    /* Typography */
    .display-text {
        font-weight: 800;
        letter-spacing: -2px;
        line-height: 1.1;
        background: linear-gradient(to right, #fff, #94a3b8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    /* Modern Category Card */
    .cat-card {
        background: white;
        border: 1px solid #f1f5f9;
        border-radius: 24px;
        padding: 24px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .cat-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        border-color: #6366f1;
    }

    .cat-img-wrapper {
        width: 80px;
        height: 80px;
        margin: 0 auto 15px;
        border-radius: 20px;
        overflow: hidden;
        background: #f8fafc;
    }

    /* Bento Box Promo */
    .bento-item {
        border-radius: 30px;
        padding: 40px;
        height: 100%;
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease;
    }
    
    .bento-item:hover { transform: scale(0.98); }

    .bg-bento-1 { background: #e0e7ff; color: #3730a3; }
    .bg-bento-2 { background: #fef3c7; color: #92400e; }

    /* Floating Animation */
    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0); }
        50% { transform: translateY(-20px) rotate(2deg); }
    }
    .img-float { animation: float 5s ease-in-out infinite; }

    /* Custom Button */
    .btn-modern {
        padding: 14px 32px;
        border-radius: 16px;
        font-weight: 600;
        transition: all 0.3s;
    }
    .btn-gradient {
        background: var(--primary-gradient);
        color: white;
        border: none;
    }
    .btn-gradient:hover {
        box-shadow: 0 10px 20px rgba(99, 102, 241, 0.4);
        color: white;
    }
</style>
@endpush

@section('content')
    {{-- Hero Section --}}
    <section class="hero-container">
        <div class="hero-circle"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <span class="badge bg-glass text-white border border-secondary mb-4 px-3 py-2">
                        ✨ Koleksi Terbaru 2026 Tersedia
                    </span>
                    <h1 class="display-text display-3 mb-4">
                        Tangkap Momen,<br>Cetak <span class="text-primary">Kebahagiaan.</span>
                    </h1>
                    <p class="text-secondary mb-5 fs-5">
                        Jelajahi dunia fotografi instan dengan teknologi kamera terbaru. 
                        Hasil cetak berkualitas hanya dalam hitungan detik.
                    </p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('catalog.index') }}" class="btn btn-modern btn-gradient shadow-lg">
                            Mulai Belanja <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                        <a href="#produk-unggulan" class="btn btn-modern btn-outline-light">
                            Lihat Galeri
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="{{ asset('assets/images/img.0.jpg') }}" 
                         alt="Instax" class="img-fluid img-float ms-5" 
                         style="max-height: 500px; filter: drop-shadow(0 30px 60px rgba(0,0,0,0.5));">
                </div>
            </div>
        </div>
    </section>

    {{-- Categories --}}
    <section class="py-5 mt-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Pilih Gaya Instax-mu</h2>
                <p class="text-muted">Kategori kamera yang sesuai dengan kepribadianmu</p>
            </div>
            <div class="row g-4">
                @foreach($categories as $category)
                    <div class="col-6 col-md-4 col-lg-2">
                        <a href="{{ route('catalog.index', ['category' => $category->slug]) }}" class="text-decoration-none text-dark">
                            <div class="cat-card text-center">
                                <div class="cat-img-wrapper">
                                    <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="img-fluid w-100 h-100 object-fit-cover">
                                </div>
                                <h6 class="fw-bold mb-1">{{ $category->name }}</h6>
                                <span class="small text-muted">{{ $category->products_count }} Produk</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Produk Unggulan --}}
    <section id="produk-unggulan" class="py-5 bg-light rounded-5 mx-2 mx-md-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end mb-5">
                <div>
                    <h2 class="fw-bold mb-0">Pilihan Editor</h2>
                    <p class="text-muted">Produk yang paling banyak dicari minggu ini</p>
                </div>
                <a href="{{ route('catalog.index') }}" class="text-primary fw-bold text-decoration-none">
                    Lihat Semua <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="row g-4">
                @foreach($featuredProducts as $product)
                    <div class="col-6 col-md-4 col-lg-3">
                        @include('partials.product-card', ['product' => $product])
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Bento Promo Section --}}
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-7">
                    <div class="bento-item bg-bento-1">
                        <div class="row align-items-center">
                            <div class="col-7">
                                <h2 class="fw-bold">Flash Sale 50%</h2>
                                <p>Hanya berlaku untuk koleksi Instax Mini 11 & 12.</p>
                                <button class="btn btn-dark rounded-pill px-4">Klaim Promo</button>
                            </div>
                            <div class="col-5">
                                <i class="bi bi-lightning-charge-fill display-1 opacity-25"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="bento-item bg-bento-2">
                        <h2 class="fw-bold">Member Baru</h2>
                        <p>Dapatkan Voucher Cashback Rp 50rb</p>
                        <a href="{{ route('register') }}" class="btn btn-outline-dark rounded-pill px-4">Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Latest Products --}}
    <section class="py-5 mb-5">
        <div class="container">
            <h2 class="fw-bold text-center mb-5">Koleksi Terkini</h2>
            <div class="row g-4">
                @foreach($latestProducts as $product)
                    <div class="col-6 col-md-4 col-lg-3">
                        @include('partials.product-card', ['product' => $product])
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection