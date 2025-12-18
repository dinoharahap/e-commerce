@extends('layouts.main')

@section('content')

<div class="pt-6 sm:pt-10 px-4 sm:px-6 text-center">
    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold">Menu Kami</h1>
    <p class="text-gray-600 mt-2 text-sm sm:text-base">Pilih menu favorit kamu dan rasakan kelezatannya!</p>
</div>

{{-- Kategori --}}
<div class="flex flex-wrap justify-center mt-4 sm:mt-6 gap-2 sm:gap-3 px-4 sm:px-6">
    <a href="/menu" class="border px-3 sm:px-4 py-2 rounded-full hover:bg-gray-100 transition text-xs sm:text-sm">Semua</a>
    <a href="/menu/ayam" class="bg-orange-500 text-white px-3 sm:px-4 py-2 rounded-full hover:bg-orange-600 transition text-xs sm:text-sm">Ayam Geprek</a>
    <a href="/menu/minuman" class="border px-3 sm:px-4 py-2 rounded-full hover:bg-gray-100 transition text-xs sm:text-sm">Minuman</a>
    <a href="/menu/paket" class="border px-3 sm:px-4 py-2 rounded-full hover:bg-gray-100 transition text-xs sm:text-sm">Paket Mahasiswa</a>
</div>

{{-- GRID MENU --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 sm:gap-5 md:gap-6 px-4 sm:px-6 md:px-8 lg:px-10 py-6 sm:py-10 max-w-7xl mx-auto">

    @foreach ($menus as $menu)
    <div class="border rounded-lg shadow hover:shadow-lg transition bg-white p-3 sm:p-4 flex flex-col h-full">

        {{-- Gambar --}}
        <img src="{{ $menu->gambar }}"
             class="w-full h-32 sm:h-40 md:h-48 lg:h-56 object-cover rounded-md mb-3 sm:mb-4">

        {{-- Nama --}}
        <div class="flex-1">
            <h3 class="font-semibold text-sm sm:text-base md:text-lg line-clamp-2">{{ $menu->nama }}</h3>

            {{-- Deskripsi --}}
            <p class="text-gray-600 text-xs sm:text-sm mb-2 line-clamp-2">{{ $menu->deskripsi }}</p>
        </div>

        {{-- Harga --}}
        <p class="text-orange-600 font-semibold mb-3 text-sm sm:text-base">
            Rp {{ number_format($menu->harga, 0, ',', '.') }}
        </p>

        {{-- Tombol --}}
        @auth
            <form action="{{ route('cart.add', $menu->id) }}" method="POST" class="mt-auto">
                @csrf
                <button type="submit" class="w-full bg-orange-500 text-white py-2 sm:py-2.5 rounded-md hover:bg-orange-600 transition text-xs sm:text-sm font-medium">
                    Masukkan ke Keranjang
                </button>
            </form>
        @else
            <button type="button" onclick="handleGuestAddToCart()" class="mt-auto w-full bg-orange-500 text-white py-2 sm:py-2.5 rounded-md hover:bg-orange-600 transition text-xs sm:text-sm font-medium">
                Masukkan ke Keranjang
            </button>
        @endauth
    </div>
    @endforeach

</div>

@endsection