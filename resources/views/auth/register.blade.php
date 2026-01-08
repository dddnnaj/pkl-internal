@extends('layouts.app')

@section('title', 'Register - Instax Shop')

@push('styles')
<style>
    .auth-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        background: linear-gradient(135deg, #dff3f1, #f5efe6);
    }

    .auth-card {
        border-radius: 28px;
        border: none;
        box-shadow: 0 30px 60px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .auth-header {
        background: linear-gradient(135deg, #f39c12, #e67e22);
        color: #fff;
        padding: 32px;
        text-align: center;
    }

    .auth-header h4 {
        font-weight: 800;
        margin-bottom: 6px;
    }

    .auth-header p {
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

    .btn-auth {
        background: #f39c12;
        color: #fff;
        border-radius: 16px;
        font-weight: 700;
        padding: 14px;
        transition: 0.3s;
    }

    .btn-auth:hover {
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
<div class="auth-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card auth-card">

                    {{-- HEADER --}}
                    <div class="auth-header">
                        <h4>✨ Buat Akun Baru</h4>
                        <p>Daftar dan mulai abadikan momen bersama Instax</p>
                    </div>

                    {{-- BODY --}}
                    <div class="card-body p-4 p-md-5">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- NAME --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text"
                                       class="form-control @error('name') is-invalid @enderror"
                                       name="name"
                                       value="{{ old('name') }}"
                                       placeholder="Nama lengkap"
                                       required autofocus>
                                @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- EMAIL --}}
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Email</label>
                                <input type="email"
                                       class="form-control @error('email') is-invalid @enderror"
                                       name="email"
                                       value="{{ old('email') }}"
                                       placeholder="nama@email.com"
                                       required>
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
                                       placeholder="Minimal 8 karakter"
                                       required>
                                @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- CONFIRM PASSWORD --}}
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Konfirmasi Password</label>
                                <input type="password"
                                       class="form-control"
                                       name="password_confirmation"
                                       placeholder="Ulangi password"
                                       required>
                            </div>

                            {{-- BUTTON REGISTER --}}
                            <div class="d-grid mb-4">
                                <button type="submit" class="btn btn-auth btn-lg">
                                    Daftar Sekarang
                                </button>
                            </div>

                            {{-- DIVIDER --}}
                            <div class="position-relative my-4">
                                <hr>
                                <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted">
                                    atau daftar dengan
                                </span>
                            </div>

                            {{-- GOOGLE --}}
                            <div class="d-grid mb-3">
                                <a href="{{ route('auth.google') }}" class="btn btn-outline-danger google-btn">
                                    <img src="https://www.svgrepo.com/show/475656/google-color.svg"
                                         width="20" class="me-2">
                                    Daftar dengan Google
                                </a>
                            </div>

                            {{-- LOGIN --}}
                            <p class="text-center mb-0">
                                Sudah punya akun?
                                <a href="{{ route('login') }}" class="fw-bold text-decoration-none">
                                    Login
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
