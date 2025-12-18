@extends('layouts.main')

@section('content')
<div class="container mx-auto mt-10">

    <h2 class="text-lg font-semibold mb-4">Keranjang Belanja</h2>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- BAGIAN KIRI (LIST ITEM) -->
        <div class="lg:col-span-2 space-y-4">
            @forelse ($cart as $id => $item)
                <div class="border rounded-lg flex p-4 items-center justify-between">

                    <!-- Gambar Produk -->
                    <div class="flex items-center gap-4">
                        <img src="{{ $item['gambar'] }}" class="w-24 h-24 object-cover rounded" alt="gambar">

                        <div>
                            <h3 class="font-semibold">{{ $item['nama'] }}</h3>
                            <p class="text-sm">Rp {{ number_format($item['harga'], 0, ',', '.') }}</p>

                            <!-- Quantity -->
                            <form action="{{ route('cart.update', $id) }}" method="POST" class="flex items-center gap-2 mt-2">
                                @csrf
                                <button name="qty" value="{{ $item['qty'] - 1 }}" class="border px-2 py-1 rounded">-</button>

                                <span class="px-3">{{ $item['qty'] }}</span>

                                <button name="qty" value="{{ $item['qty'] + 1 }}" class="border px-2 py-1 rounded">+</button>
                            </form>
                        </div>
                    </div>

                    <!-- Hapus item -->
                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        <button class="text-red-600 text-xl">
                            🗑
                        </button>
                    </form>

                </div>
            @empty
                <p class="text-gray-500">Keranjang kosong</p>
            @endforelse
        </div>

        <!-- BAGIAN KANAN (RINGKASAN PESANAN) -->
        <div class="border rounded-lg p-4 h-fit">
            <h3 class="font-semibold mb-4">Ringkasan Pesanan</h3>

            <div class="flex justify-between mb-2">
                <span>Subtotal</span>
                <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
            </div>

            <div class="flex justify-between mb-2">
                <span>Biaya Pengiriman</span>
                <span>Rp {{ number_format($biaya_pengiriman, 0, ',', '.') }}</span>
            </div>

            <div class="flex justify-between font-semibold border-t pt-2 mt-2">
                <span>Total</span>
                <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
            </div>

            <a href="{{ route('checkout') }}" onclick="gotoCheckout(event)" class="block bg-orange-500 text-white text-center py-2 rounded mt-4">
                Lanjut ke Checkout
            </a>

            <a href="/menu" class="block border border-orange-500 text-orange-500 text-center py-2 rounded mt-2">
                Tambah Menu Lain
            </a>
        </div>

    </div>
</div>

<script>
function gotoCheckout(e) {
    e.preventDefault();

    // Ambil isi cart dari Laravel ke JS
    let cart = @json(session('cart', []));

    if (Object.keys(cart).length === 0) {
        Swal.fire({
            title: "Keranjang Kosong!",
            text: "Silakan tambahkan produk terlebih dahulu sebelum checkout.",
            icon: "warning",
            confirmButtonText: "OK"
        });
        return;
    }

    // Jika keranjang ada -> redirect ke checkout
    window.location.href = "{{ route('checkout') }}";
}
</script>
@endsection
