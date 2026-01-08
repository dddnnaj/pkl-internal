{{-- ================================================
 FILE: resources/views/catalog/index.blade.php
 FUNGSI: Halaman katalog modern (FIX NO BIRU)
================================================ --}}

@extends('layouts.app')

@section('title', 'Katalog Produk')

@section('content')

<style>
:root {
    --orange: #f39c12;
    --orange-dark: #e67e22;
}

/* ===== MATIKAN WARNA BIRU BOOTSTRAP ===== */
.text-primary,
.link-primary,
.btn-primary,
.bg-primary,
.badge.bg-primary {
    color: #000 !important;
    background-color: var(--orange) !important;
    border-color: var(--orange) !important;
}

/* ===== GLOBAL ===== */
a {
    color: #000;
    text-decoration: none;
}
a:hover {
    color: var(--orange);
}

/* ===== CARD ===== */
.card-modern {
    border: none;
    border-radius: 18px;
    box-shadow: 0 10px 30px rgba(0,0,0,.05);
}

/* ===== SIDEBAR ===== */
.filter-title {
    font-weight: 700;
}

.form-check-input:checked {
    background-color: var(--orange);
    border-color: var(--orange);
}

/* ===== SORT ===== */
.sort-select {
    border-radius: 14px;
}

/* ===== PRODUCT ===== */
.product-card img {
    border-radius: 18px;
    transition: transform .3s ease;
}
.product-card:hover img {
    transform: scale(1.05);
}

/* ===== HARGA (HITAM) ===== */
.product-price,
.product-price * {
    color: #000 !important;
    font-weight: 700;
}
.product-price del {
    color: #888 !important;
}

/* ===== BUTTON ORANGE ===== */
.btn-orange {
    background: var(--orange);
    color: #fff !important;
    border-radius: 999px;
    border: none;
    font-weight: 600;
}
.btn-orange:hover {
    background: var(--orange-dark);
}

/* ===== EMPTY ===== */
.empty-icon {
    font-size: 4rem;
    color: #ddd;
}


</style>

<div class="container py-5">
    <div class="row g-4">

        {{-- SIDEBAR --}}
        <div class="col-lg-3">
            <div class="card card-modern">
                <div class="card-body">
                    <h5 class="filter-title mb-4">
                        <i class="bi bi-funnel me-2"></i>Filter
                    </h5>

                    <form action="{{ route('catalog.index') }}" method="GET">
                        @if(request('q'))
                            <input type="hidden" name="q" value="{{ request('q') }}">
                        @endif

                        {{-- KATEGORI --}}
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Kategori</h6>
                            @foreach($categories as $category)
                                <div class="form-check mb-2">
                                    <input class="form-check-input"
                                           type="radio"
                                           name="category"
                                           id="cat-{{ $category->slug }}"
                                           value="{{ $category->slug }}"
                                           {{ request('category') == $category->slug ? 'checked' : '' }}
                                           onchange="this.form.submit()">
                                    <label class="form-check-label d-flex justify-content-between"
                                           for="cat-{{ $category->slug }}">
                                        {{ $category->name }}
                                        <span class="badge bg-light text-dark">
                                            {{ $category->products_count }}
                                        </span>
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        {{-- HARGA --}}
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Rentang Harga</h6>
                            <div class="row g-2">
                                <div class="col-6">
                                    <input type="number"
                                           class="form-control form-control-sm rounded-pill"
                                           name="min_price"
                                           placeholder="Min"
                                           value="{{ request('min_price') }}">
                                </div>
                                <div class="col-6">
                                    <input type="number"
                                           class="form-control form-control-sm rounded-pill"
                                           name="max_price"
                                           placeholder="Max"
                                           value="{{ request('max_price') }}">
                                </div>
                            </div>
                            <button class="btn btn-orange btn-sm w-100 mt-3">
                                Terapkan
                            </button>
                        </div>

                        {{-- DISKON --}}
                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       name="on_sale"
                                       id="on_sale"
                                       value="1"
                                       {{ request('on_sale') ? 'checked' : '' }}
                                       onchange="this.form.submit()">
                                <label class="form-check-label" for="on_sale">
                                    <i class="bi bi-tag-fill text-danger"></i> Sedang Diskon
                                </label>
                            </div>
                        </div>

                        {{-- RESET --}}
                        @if(request()->hasAny(['category','min_price','max_price','on_sale']))
                            <a href="{{ route('catalog.index') }}"
                               class="btn btn-sm btn-outline-secondary w-100 rounded-pill">
                                Reset Filter
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>

        {{-- MAIN --}}
        <div class="col-lg-9">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold mb-1">
                        @if(request('q'))
                            Hasil pencarian: "{{ request('q') }}"
                        @elseif(request('category'))
                            {{ $categories->firstWhere('slug', request('category'))?->name ?? 'Produk' }}
                        @else
                            Semua Produk
                        @endif
                    </h4>
                    <small class="text-muted">{{ $products->total() }} produk</small>
                </div>

                <select class="form-select form-select-sm sort-select"
                        onchange="window.location.href=this.value">
                    <option value="{{ request()->fullUrlWithQuery(['sort'=>'newest']) }}">Terbaru</option>
                    <option value="{{ request()->fullUrlWithQuery(['sort'=>'price_asc']) }}">Harga ↑</option>
                    <option value="{{ request()->fullUrlWithQuery(['sort'=>'price_desc']) }}">Harga ↓</option>
                    <option value="{{ request()->fullUrlWithQuery(['sort'=>'name_asc']) }}">Nama A-Z</option>
                </select>
            </div>

            @if($products->count())
                <div class="row g-4">
                    @foreach($products as $product)
                        <div class="col-6 col-md-4 product-card">
                            @include('partials.product-card', ['product' => $product])
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-5">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-search empty-icon"></i>
                    <h5 class="mt-3">Produk tidak ditemukan</h5>
                    <p class="text-muted">Coba ubah filter atau pencarian</p>
                    <a href="{{ route('catalog.index') }}" class="btn btn-orange">
                        Lihat Semua Produk
                    </a>
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
