@extends('layouts.app')

@section('title', 'Login - Instax Shop')

@push('styles')
<style>
    .login-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, #dff3f1, #f5efe6);
    }

    .login-card {
        border-radius: 28px;
        border: none;
        box-shadow: 0 30px 60px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .login-header {
        background: linear-gradient(135deg, #f39c12, #e67e22);
        color: #fff;
        padding: 30px;
        text-align: center;
    }

    .login-header h4 {
        font-weight: 800;
        margin-bottom: 5px;
    }

    .login-header p {
        opacity: 0.9;
        font-size: 0.9rem;
        margin: 0;
    }

    .form-control {
        border-radius: 14px;
        padding: 14px 16px;
    }

    .form-control:focus {
        border-color: #f39c12;
        box-shadow: 0 0 0 0.2rem rgba(243,156,18,0.25);
    }

    .btn-login {
        background: #f39c12;
        color: #fff;
        border-radius: 16px;
        font-weight: 700;
        padding: 14px;
        transition: 0.3s;
    }

    .btn-login:hover {
        background: #e67e22;
        transform: translateY(-2px);
    }

    .google-btn {
        border-radius: 16px;
        padding: 12px;
        font-weight: 600;
    }
</style>
@endpush

@section('content')
<div class="login-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card login-card">
                    
                    {{-- HEADER --}}
                    <div class="login-header">
                        <h4>🔐 Selamat Datang</h4>
                        <p>Masuk ke akun Instax Shop</p>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            {{-- EMAIL --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email"
                                       value="{{ old('email') }}"
                                       placeholder="nama@email.com"
                                       required autofocus>
                                @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- PASSWORD --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Password</label>
                                <input type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       name="password"
                                       placeholder="••••••••"
                                       required>
                                @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- REMEMBER --}}
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                    <label class="form-check-label" for="remember">
                                        Ingat Saya
                                    </label>
                                </div>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-decoration-none small">
                                        Lupa Password?
                                    </a>
                                @endif
                            </div>

                            {{-- BUTTON LOGIN --}}
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn btn-login btn-lg">
                                    Login
                                </button>
                            </div>

                            <hr>

                            {{-- GOOGLE LOGIN --}}
                            <div class="d-grid mb-3">
                                <a href="{{ route('auth.google') }}" class="btn btn-outline-danger google-btn">
                                    <img src="https://www.svgrepo.com/show/475656/google-color.svg"
                                         width="20"
                                         class="me-2">
                                    Login dengan Google
                                </a>
                            </div>

                            {{-- REGISTER --}}
                            <p class="text-center mb-0">
                                Belum punya akun?
                                <a href="{{ route('register') }}" class="fw-bold text-decoration-none">
                                    Daftar Sekarang
                                </a>
                            </p>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
