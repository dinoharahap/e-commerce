@extends('layouts.main')

@section('content')
<div class="max-w-2xl mx-auto px-6 py-10 mt-20">
    <div class="text-center mb-8">
        @if ($order->status === 'paid')
            <div class="text-5xl mb-3">✅</div>
            <h1 class="text-3xl font-bold text-green-600">Pembayaran Berhasil!</h1>
            <p class="text-gray-600 mt-2">Terima kasih atas pesanan Anda</p>
        @elseif ($order->status === 'pending')
            <div class="text-5xl mb-3">⏳</div>
            <h1 class="text-3xl font-bold text-yellow-600">Pembayaran Pending</h1>
            <p class="text-gray-600 mt-2">Silakan selesaikan pembayaran Anda</p>
        @else
            <div class="text-5xl mb-3">❌</div>
            <h1 class="text-3xl font-bold text-red-600">Pembayaran Gagal</h1>
            <p class="text-gray-600 mt-2">Maaf, pembayaran Anda tidak berhasil</p>
        @endif
    </div>

    <div class="bg-white border rounded-lg p-6 space-y-4 shadow-md">
        <div class="border-b pb-4">
            <h2 class="font-semibold text-lg mb-2">Detail Pesanan</h2>
            <p class="text-gray-600">Order ID: <strong>{{ $order->order_id }}</strong></p>
            <p class="text-gray-600">Tanggal: <strong>{{ \Carbon\Carbon::parse($order->tanggal)->format('d M Y H:i') }}</strong></p>
            <p class="text-gray-600">Status: 
                <span class="font-semibold 
                    @if($order->status === 'paid') text-green-600
                    @elseif($order->status === 'pending') text-yellow-600
                    @else text-red-600
                    @endif">
                    {{ strtoupper($order->status) }}
                </span>
            </p>
        </div>

        <div class="border-b pb-4">
            <h3 class="font-semibold mb-3">Item Pesanan</h3>
            <div class="space-y-2">
                @foreach ($order->items as $item)
                <div class="flex justify-between text-sm">
                    <span>{{ $item->menu->nama }} x{{ $item->qty }}</span>
                    <span>Rp {{ number_format($item->harga * $item->qty, 0, ',', '.') }}</span>
                </div>
                @endforeach
            </div>
        </div>

        <div class="bg-gray-50 p-4 rounded-md">
            <div class="flex justify-between mb-2">
                <span>Subtotal</span>
                <span>Rp {{ number_format($order->subtotal, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between mb-3 pb-3 border-b">
                <span>Ongkos Kirim</span>
                <span>Rp {{ number_format($order->ongkos_kirim, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between font-semibold text-lg">
                <span>Total</span>
                <span class="text-orange-500">Rp {{ number_format($order->total, 0, ',', '.') }}</span>
            </div>
        </div>

        <div class="border-t pt-4">
            <h3 class="font-semibold mb-2">Informasi Pengiriman</h3>
            <p class="text-gray-600 text-sm"><strong>Nama:</strong> {{ $order->nama_penerima }}</p>
            <p class="text-gray-600 text-sm"><strong>No. HP:</strong> {{ $order->no_hp }}</p>
            <p class="text-gray-600 text-sm"><strong>Alamat:</strong> {{ $order->alamat }}</p>
            @if($order->catatan)
            <p class="text-gray-600 text-sm"><strong>Catatan:</strong> {{ $order->catatan }}</p>
            @endif
        </div>

        @if($order->payment_method)
        <div class="border-t pt-4">
            <h3 class="font-semibold mb-2">Metode Pembayaran</h3>
            <p class="text-gray-600 text-sm">{{ strtoupper($order->payment_method) }}</p>
        </div>
        @endif

        <div class="text-center mt-6 space-x-3">
            <a href="{{ route('orders.history') }}" class="inline-block bg-orange-500 text-white px-6 py-2 rounded-md hover:bg-orange-600">
                Lihat Riwayat Pesanan
            </a>
            <a href="{{ route('menu') }}" class="inline-block bg-gray-500 text-white px-6 py-2 rounded-md hover:bg-gray-600">
                Lihat Menu
            </a>
        </div>
    </div>
</div>
@endsection