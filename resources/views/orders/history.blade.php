@extends('layouts.main')

@section('content')
<div class="max-w-7xl mx-auto mt-24 px-6 lg:px-0">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-semibold">Riwayat Pesanan</h1>
            <p class="text-sm text-gray-600">Lihat status dan detail pesanan Anda</p>
        </div>
        <a href="{{ route('menu') }}" class="text-sm text-orange-600 hover:text-orange-700">Belanja lagi →</a>
    </div>

    @if($orders->isEmpty())
        <div class="bg-white border rounded-xl p-6 text-center text-gray-600">
            Belum ada pesanan. Yuk mulai belanja!
        </div>
    @else
        <div class="space-y-4">
            @foreach($orders as $order)
            <div class="bg-white border rounded-xl p-5 shadow-sm">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                    <div>
                        <p class="text-sm text-gray-500">Order ID</p>
                        <p class="font-semibold">{{ $order->order_id }}</p>
                        <p class="text-xs text-gray-500">{{ optional($order->created_at ?? $order->tanggal)->format('d M Y H:i') }}</p>
                    </div>
                    <div class="flex items-center gap-3 flex-wrap">
                        @php
                            $status = strtolower($order->status);
                            $badge = match($status) {
                                'paid' => 'bg-green-100 text-green-700',
                                'pending' => 'bg-yellow-100 text-yellow-700',
                                'expired', 'cancel', 'deny' => 'bg-red-100 text-red-700',
                                default => 'bg-gray-100 text-gray-700'
                            };
                        @endphp
                        <span class="px-3 py-1 text-xs font-semibold rounded-full {{ $badge }}">{{ strtoupper($order->status) }}</span>
                        <p class="text-lg font-semibold text-orange-600">Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                        <a href="{{ route('order.status', $order->id) }}" class="text-sm text-orange-600 hover:text-orange-700">Lihat detail</a>
                    </div>
                </div>
                <div class="mt-4 grid md:grid-cols-2 gap-4 text-sm text-gray-700">
                    <div>
                        <p class="font-semibold mb-1">Items</p>
                        <ul class="space-y-1">
                            @foreach($order->items as $item)
                                <li class="flex justify-between">
                                    <span>{{ $item->menu->nama ?? 'Item' }} x{{ $item->qty }}</span>
                                    <span>Rp {{ number_format($item->harga * $item->qty, 0, ',', '.') }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div>
                        <p class="font-semibold mb-1">Pengiriman</p>
                        <p>{{ $order->nama_penerima }} — {{ $order->no_hp }}</p>
                        <p class="text-gray-600">{{ $order->alamat }}</p>
                        @if($order->catatan)
                        <p class="text-gray-500">Catatan: {{ $order->catatan }}</p>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
