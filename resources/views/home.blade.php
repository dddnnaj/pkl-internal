{{-- ================================================
FILE: resources/views/home.blade.php
FUNGSI: Halaman Utama Modern - Tema Aqua Mint (Ijo Telor Asin)
================================================ --}}

@extends('layouts.app')

@section('title', 'Beranda - Camera Instax Shop')

@push('styles')
<style>
   /* ================================================
   TEMA RETRO INSTAX SHOP (SUNSET & TEAL)
   Cocok dengan Logo Instax – Tanpa Pelangi
================================================ */

/* ========= ROOT COLOR ========= */
:root {
    --instax-cream: #f5efe6;
    --instax-orange: #f39c12;
    --instax-orange-dark: #e67e22;
    --instax-teal: #2aa198;
    --instax-teal-soft: #dff3f1;
    --instax-dark: #1e272e;
    --glass-white: rgba(255,255,255,0.85);
}

/* ========= GLOBAL ========= */
body {
    background-color: var(--instax-cream);
    color: var(--instax-dark);
    font-family: 'Plus Jakarta Sans', sans-serif;
}

/* ========= HERO SECTION ========= */
.hero-section {
    background: linear-gradient(
        135deg,
        var(--instax-teal-soft) 0%,
        var(--instax-cream) 60%,
        #ffffff 100%
    );
    padding: 100px 0;
    border-radius: 0 0 60px 60px;
    position: relative;
    overflow: hidden;
}

.hero-section::after {
    content: '';
    position: absolute;
    top: -10%;
    right: -5%;
    width: 420px;
    height: 420px;
    background: var(--instax-orange);
    filter: blur(120px);
    opacity: 0.25;
    z-index: 0;
}

.hero-tagline {
    background: var(--instax-orange);
    color: #fff;
    font-weight: 700;
    padding: 6px 18px;
    border-radius: 50px;
    font-size: 0.8rem;
    display: inline-block;
}

/* ========= CARD ========= */
.custom-card {
    background: #fff;
    border-radius: 24px;
    border: 1px solid rgba(0,0,0,0.05);
    transition: all 0.4s ease;
}

.custom-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(243,156,18,0.25);
    border-color: var(--instax-orange);
}

/* ========= CATEGORY ========= */
.category-circle {
    width: 100px;
    height: 100px;
    background-color: var(--instax-teal-soft);
    border-radius: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 15px;
    transition: 0.3s ease;
}

.custom-card:hover .category-circle {
    background-color: var(--instax-teal);
    transform: rotate(-5deg);
}

/* ========= BUTTON ========= */
.btn-modern {
    background-color: var(--instax-orange);
    color: #fff;
    border-radius: 16px;
    padding: 14px 32px;
    font-weight: 700;
    border: none;
    transition: 0.3s ease;
    box-shadow: 0 10px 20px rgba(243,156,18,0.35);
}

.btn-modern:hover {
    background-color: var(--instax-orange-dark);
    transform: translateY(-2px);
    box-shadow: 0 15px 25px rgba(230,126,34,0.5);
}

/* ========= TEXT ========= */
.section-title {
    font-weight: 800;
    font-size: 2.2rem;
    letter-spacing: -1px;
}

.text-aqua {
    color: var(--instax-teal);
}

/* ========= BADGE ========= */
.badge.bg-soft-aqua {
    background-color: var(--instax-teal-soft);
    color: var(--instax-teal);
}

/* ========= PROMO ========= */
.promo-banner {
    background: var(--instax-dark);
    border-radius: 35px;
    padding: 60px;
    position: relative;
    z-index: 1;
}

.promo-banner::before {
    content: '';
    position: absolute;
    right: 0;
    bottom: 0;
    width: 220px;
    height: 100%;
    background: var(--instax-orange);
    clip-path: polygon(100% 0, 0% 100%, 100% 100%);
    z-index: -1;
    border-radius: 0 0 35px 0;
}

</style>
@endpush

@section('content')
{{-- Hero Section --}}
<section class="hero-section mb-5">
    <div class="container position-relative" style="z-index: 1;">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <span class="hero-tagline mb-3 shadow-sm">PREMIUM CAMERA SHOP</span>
                <h1 class="display-3 fw-extrabold mb-4">Abadikan Momen dengan <span class="text-aqua">Gaya Berbeda</span></h1>
                <p class="lead mb-5 text-muted">Koleksi Instax terbaru dengan pilihan warna estetik. Mulai petualangan fotografimu hari ini bersama Camera Instax Shop.</p>
                <div class="d-flex gap-3">
                    <a href="{{ route('catalog.index') }}" class="btn btn-modern px-5">Jelajahi Produk</a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block text-center">
                <div class="position-relative">
                    <img src="{{ asset('assets/images/gambar1.png') }}" class="img-fluid" style="max-height: 450px; filter: drop-shadow(20px 30px 50px rgba(0,0,0,0.1));">
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Kategori Section --}}
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h3 class="section-title">Kategori <span class="text-aqua">Camera</span></h3>
            <p class="text-muted">Pilih jenis kamera yang sesuai dengan karaktermu</p>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($categories as $category)
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route('catalog.index', ['category' => $category->slug]) }}" class="text-decoration-none">
                    <div class="card custom-card h-100 py-4 text-center border-0 shadow-sm">
                        <div class="card-body">
                            <div class="category-circle">
                                <img src="{{ $category->image_url }}" alt="{{ $category->name }}" class="w-75 h-75" style="object-fit: contain;">
                            </div>
                            <h6 class="text-dark fw-bold mb-1">{{ $category->name }}</h6>
                            <span class="badge bg-soft-aqua text-aqua rounded-pill px-3">{{ $category->products_count }} Item</span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Featured Products --}}
<section class="py-5 bg-light" style="border-radius: 60px;">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5 px-3">
            <div>
                <h3 class="section-title m-0">Produk <span class="text-aqua">Unggulan</span></h3>
                <p class="text-muted mb-0">Paling banyak dicari minggu ini</p>
            </div>
            <a href="{{ route('catalog.index') }}" class="btn btn-outline-dark rounded-pill px-4 fw-bold">Semua Produk</a>
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

{{-- Promo Minimalis Modern --}}
<section class="py-5 mb-5">
    <div class="container">
        <div class="promo-banner text-white shadow-lg overflow-hidden">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h2 class="display-5 fw-bold mb-3">Gabung Member Instax</h2>
                    <p class="opacity-75 fs-5 mb-4">Dapatkan diskon 15% untuk pembelian pertama dan akses ke koleksi edisi terbatas kami.</p>
                    <a href="{{ route('register') }}" class="btn btn-modern px-5 py-3 shadow-none">Daftar Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection