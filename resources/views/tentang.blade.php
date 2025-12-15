<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tentang kami</title>

    <style>
        body {
            font-family: system-iu, -apple-system, sans-serif;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px:
        }
        h1 {
            color: #4f46e5;
        }
    </style>
</head>
<body>
    <h1>tentang toko online</h1>
    <p>selamat datang di toko onlinae kami.</p>
    <p>dibuat dengan ❤️ menggunakan laravel.</p>
     <p>waktu saat ini: {{ now()->format('d M Y, H:i:s') }}</p>
    
    <a href="/">← kembali ke home</a>
    <a href="{{ route('produk.detail', ['id' => 1]) }}">Lihat Produk 1</a>
    <a href="{{ route('produk.detail', ['id' => 2]) }}">Lihat Produk 2</a>
</body>
</html>