@extends('layouts.main')

@section('content')

<div class="pt-10 text-center">
    <h1 class="text-3xl font-bold">Menu Kami</h1>
    <p class="text-gray-600 mt-2">Pilih menu favorit kamu dan rasakan kelezatannya!</p>
</div>

{{-- Kategori --}}
<div class="flex justify-center mt-6 space-x-4">
    <a href="/menu" class="border px-4 py-2 rounded-full hover:bg-gray-100 transition">Semua</a>
    <a href="/menu/ayam" class="border px-4 py-2 rounded-full hover:bg-gray-100 transition">Ayam Geprek</a>
    <a href="/menu/minuman" class="bg-orange-500 text-white px-4 py-2 rounded-full hover:bg-orange-600 transition">Minuman</a>
    <a href="/menu/paket" class="border px-4 py-2 rounded-full hover:bg-gray-100 transition">Paket Mahasiswa</a>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-10 py-10">

    @foreach ($menus as $menu)
    <div class="border rounded-lg shadow hover:shadow-md transition bg-white p-4 flex flex-col h-full">

        {{-- Gambar --}}
        <img src="{{ $menu->gambar }}"
             class="w-full h-[46vh] object-cover rounded-md mb-4">

        {{-- Nama --}}
        <div class="flex-1">
        <h3 class="font-semibold text-lg line-clamp-2">{{ $menu->nama }}</h3>

        {{-- Deskripsi --}}
        <p class="text-gray-600 text-sm mb-2 line-clamp-2">{{ $menu->deskripsi }}</p>
        </div>
        {{-- Harga --}}
        <p class="text-orange-600 font-semibold mb-3">
            Rp {{ number_format($menu->harga, 0, ',', '.') }}
        </p>

        {{-- Tombol --}}
         @auth
            <form action="{{ route('cart.add', $menu->id) }}" method="POST" class="mt-auto">
                @csrf
                <button type="submit" class="w-full bg-orange-500 text-white py-2 rounded-md hover:bg-orange-600 transition">
                    Masukkan ke Keranjang
                </button>
            </form>
        @else
            <button type="button" onclick="handleGuestAddToCart()" class="mt-auto w-full bg-orange-500 text-white py-2 rounded-md hover:bg-orange-600 transition">
                Masukkan ke Keranjang
            </button>
        @endauth
    </div>
    @endforeach

</div>

@endsection