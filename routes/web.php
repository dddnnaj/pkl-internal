<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\GoogleController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/tentang', function () {
    return view('tentang');

});

Route::get('/sapa/{$nama}', function ($nama) {
    return "halo, $nama! selamat datang di toko online";
});

Route::get('/kategori/{$nama}', function ($nama = 'semua') {
    return "menampilkan katagori: $nama";
});

Route::get('/produk/{id}', function ($id) {
    return "Detail produk #$id";
})->name('produk.detail');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
   Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
   Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
   Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   Route::delete('/profile/avatar', [ProfileController::class, 'deleteAvatar'])->name('profile.avatar.destroy');
   Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
});

Route::controller(GoogleController::class)->group(function () {
    Route::get('/auth/google', 'redirect')
        ->name('auth.google');

    Route::get('/auth/google/callback', 'callback')
        ->name('auth.google.callback');
});
