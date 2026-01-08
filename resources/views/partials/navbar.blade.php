{{-- ================================================
 FILE: resources/views/partials/navbar.blade.php
 FUNGSI: Navbar modern Instax Shop (Putih + Oren)
================================================ --}}

<style>
:root {
    --orange: #f39c12;
    --orange-dark: #e67e22;
}

/* ===== NAVBAR ===== */
.navbar-modern {
    background: #ffffff;
    border-bottom: 1px solid #f1f1f1;
}

/* ===== BRAND ===== */
.brand-icon {
    background: linear-gradient(135deg, var(--orange), var(--orange-dark));
    color: #fff;
    width: 36px;
    height: 36px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.brand-text {
    font-size: 1.1rem;
    font-weight: 800;
    color: #222;
}

/* ===== SEARCH ===== */
.search-box .form-control {
    border-radius: 14px 0 0 14px;
    border-right: none;
}

.btn-search {
    background: var(--orange);
    color: #fff;
    border-radius: 0 14px 14px 0;
    border: none;
}

.btn-search:hover {
    background: var(--orange-dark);
}

/* ===== ICON ===== */
.icon-link {
    font-size: 1.2rem;
    color: #333;
}

/* ===== BADGE ===== */
.badge-dot {
    position: absolute;
    top: 0;
    right: -6px;
    background: var(--orange);
    color: #fff;
    font-size: 0.65rem;
    padding: 2px 6px;
    border-radius: 999px;
}

/* ===== BUTTON ===== */
.btn-orange {
    background: var(--orange);
    color: #fff;
    border-radius: 14px;
    font-weight: 600;
    padding: 6px 18px;
}

.btn-orange:hover {
    background: var(--orange-dark);
    color: #fff;
}

/* ===== DROPDOWN ===== */
.dropdown-menu {
    border-radius: 14px;
}
</style>

<nav class="navbar navbar-expand-lg navbar-light sticky-top navbar-modern shadow-sm">
    <div class="container">

        {{-- BRAND --}}
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <span class="brand-icon me-2">
                <i class="bi bi-camera-fill"></i>
            </span>
            <span class="brand-text">Camera Instax ddnzzcam</span>
        </a>

        {{-- TOGGLER --}}
        <button class="navbar-toggler border-0" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- CONTENT --}}
        <div class="collapse navbar-collapse" id="navbarMain">

            {{-- SEARCH --}}
            <form class="mx-lg-auto my-3 my-lg-0" style="max-width:420px;width:100%;"
                  action="{{ route('catalog.index') }}" method="GET">
                <div class="input-group search-box">
                    <input type="text"
                           name="q"
                           class="form-control"
                           placeholder="Cari kamera instax..."
                           value="{{ request('q') }}">
                    <button class="btn btn-search" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>

            {{-- MENU --}}
            <ul class="navbar-nav ms-lg-auto align-items-lg-center gap-lg-2">

                <li class="nav-item">
                    <a class="nav-link fw-semibold" href="{{ route('catalog.index') }}">
                        Katalog
                    </a>
                </li>

                @auth
                    {{-- WISHLIST --}}
                    <li class="nav-item">
                        <a class="nav-link position-relative icon-link"
                           href="{{ route('wishlist.index') }}">
                            <i class="bi bi-heart"></i>
                            @if(auth()->user()->wishlists()->count())
                                <span class="badge-dot">
                                    {{ auth()->user()->wishlists()->count() }}
                                </span>
                            @endif
                        </a>
                    </li>

                    {{-- CART --}}
                    <li class="nav-item">
                        <a class="nav-link position-relative icon-link"
                           href="{{ route('cart.index') }}">
                            <i class="bi bi-cart3"></i>
                            @php
                                $cartCount = auth()->user()->cart?->items()->count() ?? 0;
                            @endphp
                            @if($cartCount)
                                <span class="badge-dot">{{ $cartCount }}</span>
                            @endif
                        </a>
                    </li>

                    {{-- USER --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center"
                           href="#" data-bs-toggle="dropdown">
                            <img src="{{ auth()->user()->avatar_url }}"
                                 class="rounded-circle me-2"
                                 width="32" height="32">
                            <span class="fw-semibold d-none d-lg-inline">
                                {{ auth()->user()->name }}
                            </span>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    Profil Saya
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('orders.index') }}">
                                    Pesanan Saya
                                </a>
                            </li>

                            @if(auth()->user()->isAdmin())
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item text-warning"
                                       href="{{ route('admin.dashboard') }}">
                                        Admin Panel
                                    </a>
                                </li>
                            @endif

                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    {{-- GUEST --}}
                    <li class="nav-item">
                        <a class="nav-link fw-semibold" href="{{ route('login') }}">
                            Masuk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-orange ms-lg-2" href="{{ route('register') }}">
                            Daftar
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
