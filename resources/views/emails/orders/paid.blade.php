<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesanan Dibayar</title>
</head>
<body style="background-color:#f8f9fa; padding:20px; font-family:Arial, Helvetica, sans-serif;">

<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">
            <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:6px; padding:20px;">
                
                {{-- Header --}}
                <tr>
                    <td style="padding-bottom:20px;">
                        <h2 style="margin:0;">Halo, {{ $order->user->name }}</h2>
                    </td>
                </tr>

                {{-- Content --}}
                <tr>
                    <td style="padding-bottom:20px; color:#333;">
                        <p>
                            Terima kasih! Pembayaran untuk pesanan
                            <strong>#{{ $order->order_number }}</strong>
                            telah kami terima.
                        </p>
                        <p>Kami sedang memproses pesanan Anda.</p>
                    </td>
                </tr>

                {{-- Table --}}
                <tr>
                    <td style="padding-bottom:20px;">
                        <table width="100%" cellpadding="6" cellspacing="0" style="border-collapse:collapse;">
                            <thead>
                                <tr style="background:#f1f1f1;">
                                    <th align="left" style="border:1px solid #ddd;">Produk</th>
                                    <th align="center" style="border:1px solid #ddd;">Qty</th>
                                    <th align="right" style="border:1px solid #ddd;">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                <tr>
                                    <td style="border:1px solid #ddd;">{{ $item->product_name }}</td>
                                    <td align="center" style="border:1px solid #ddd;">{{ $item->quantity }}</td>
                                    <td align="right" style="border:1px solid #ddd;">
                                        Rp {{ number_format($item->price, 0, ',', '.') }}
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2" align="right" style="border:1px solid #ddd;">
                                        <strong>Total</strong>
                                    </td>
                                    <td align="right" style="border:1px solid #ddd;">
                                        <strong>
                                            Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                {{-- Button --}}
                <tr>
                    <td align="center" style="padding-bottom:20px;">
                        <a href="{{ route('orders.show', $order) }}"
                           style="background:#0d6efd; color:#ffffff; padding:12px 24px;
                                  text-decoration:none; border-radius:4px; display:inline-block;">
                            Lihat Detail Pesanan
                        </a>
                    </td>
                </tr>

                {{-- Footer --}}
                <tr>
                    <td style="color:#555; font-size:14px;">
                        <p>Jika ada pertanyaan, silakan balas email ini.</p>
                        <p>Salam,<br><strong>{{ config('app.name') }}</strong></p>
                    </td>
                </tr>

            </table>
        </td>
    </tr>
</table>

</body>
</html>
