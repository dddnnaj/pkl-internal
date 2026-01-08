{{-- ================================================
 FILE: resources/views/cart/index.blade.php
 FUNGSI: Halaman keranjang belanja modern
================================================ --}}

@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')

<style>
:root {
    --orange: #f39c12;
    --orange-dark: #e67e22;
}

/* ===== CARD ===== */
.card-modern {
    border: none;
    border-radius: 18px;
    box-shadow: 0 12px 35px rgba(0,0,0,.06);
}

/* ===== TABLE ===== */
.table thead th {
    border-bottom: none;
    font-weight: 600;
}

.cart-img {
    width: 70px;
    height: 70px;
    object-fit: cover;
    border-radius: 14px;
}

/* ===== QTY INPUT ===== */
.qty-input {
    width: 70px;
    border-radius: 999px;
    text-align: center;
}

/* ===== BUTTON ===== */
.btn-orange {
    background: var(--orange);
    color: #fff;
    border-radius: 999px;
    border: none;
}

.btn-orange:hover {
    background: var(--orange-dark);
    color: #fff;
}

/* ===== EMPTY ===== */
.empty-icon {
    font-size: 4rem;
    color: #ddd;
}
</style>

<div class="container py-5">
    <h3 class="fw-bold mb-4">
        <i class="bi bi-cart3 me-2"></i>Keranjang Belanja
    </h3>

    @if($cart && $cart->items->count())
        <div class="row g-4">

            {{-- CART ITEMS --}}
            <div class="col-lg-8">
                <div class="card card-modern">
                    <div class="card-body p-0">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Produk</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-end">Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart->items as $item)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $item->product->image_url }}"
                                                     class="cart-img me-3">
                                                <div>
                                                    <a href="{{ route('catalog.show', $item->product->slug) }}"
                                                       class="fw-semibold text-dark text-decoration-none">
                                                        {{ Str::limit($item->product->name, 45) }}
                                                    </a>
                                                    <div class="small text-muted">
                                                        {{ $item->product->category->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            {{ $item->product->formatted_price }}
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('cart.update', $item->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="number"
                                                       name="quantity"
                                                       value="{{ $item->quantity }}"
                                                       min="1"
                                                       max="{{ $item->product->stock }}"
                                                       class="form-control form-control-sm qty-input"
                                                       onchange="this.form.submit()">
                                            </form>
                                        </td>
                                        <td class="text-end fw-bold">
                                            Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                        </td>
                                        <td>
                                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger rounded-circle"
                                                        onclick="return confirm('Hapus item ini?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- SUMMARY --}}
            <div class="col-lg-4">
                <div class="card card-modern">
                    <div class="card-body">
                        <h5 class="fw-bold mb-4">Ringkasan Belanja</h5>

                        <div class="d-flex justify-content-between mb-2">
                            <span>Total ({{ $cart->items->sum('quantity') }} barang)</span>
                            <span>
                                Rp {{ number_format($cart->items->sum('subtotal'), 0, ',', '.') }}
                            </span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between mb-4">
                            <span class="fw-bold">Total</span>
                            <span class="fw-bold fs-5 text-warning">
                                Rp {{ number_format($cart->items->sum('subtotal'), 0, ',', '.') }}
                            </span>
                        </div>

                        <a href="{{ route('checkout.index') }}"
                           class="btn btn-orange w-100 btn-lg mb-2">
                            <i class="bi bi-credit-card me-2"></i>Checkout
                        </a>

                        <a href="{{ route('catalog.index') }}"
                           class="btn btn-outline-secondary w-100 rounded-pill">
                            <i class="bi bi-arrow-left me-2"></i>Lanjut Belanja
                        </a>
                    </div>
                </div>
            </div>

        </div>
    @else
        {{-- EMPTY CART --}}
        <div class="text-center py-5">
            <i class="bi bi-cart-x empty-icon"></i>
            <h4 class="mt-3">Keranjang Kosong</h4>
            <p class="text-muted">Belum ada produk di keranjang kamu</p>
            <a href="{{ route('catalog.index') }}" class="btn btn-orange px-4">
                <i class="bi bi-bag me-2"></i>Mulai Belanja
            </a>
        </div>
    @endif
</div>
@endsection
