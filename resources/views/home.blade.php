@extends('layouts.main')

@section('content')

{{-- Hero Banner --}}
<section class="relative">
    <img src="https://d2liqplnt17rh6.cloudfront.net/coverImages/Coverparveez_340bd347-9559-4be1-ad4e-04e53f9773a4-54.jpeg"
         class="w-full h-48 sm:h-64 md:h-96 object-cover opacity-90">

    <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 mb-[-30px] bg-[#FACC15] px-4 sm:px-6 py-4 rounded-[15px] shadow-lg flex flex-col sm:flex-row items-center justify-between gap-3 w-[90%] sm:w-[80%] lg:w-[70%]">
        <p class="font-medium text-xs sm:text-sm md:text-base">Paket Hemat Mahasiswa <br> 1 Ayam Geprek + Nasi + Es Teh = Rp 13.000</p>
        <button class="bg-white px-4 sm:px-5 py-2 rounded-[25px] text-orange-600 font-semibold shadow hover:bg-orange-100 whitespace-nowrap">
            <a href="/menu/paket">Order</a>
        </button> 
    </div>
</section>

<div class="mt-16 sm:mt-20 max-w-7xl mx-auto px-4 sm:px-6">

    {{-- Menu Favorit --}}
    <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-center">Menu Favorit</h2>
    <p class="text-center text-gray-600 text-sm sm:text-base mb-6 sm:mb-8">Pilihan menu paling enak menurut pelanggan mahasiswa</p>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
 
        {{-- Card 1 --}}
        <div class="border rounded-lg shadow hover:shadow-lg transition bg-white p-3 sm:p-4">
            <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcRdCY5Li5yZVJKOlBJdcrHBor9YIofQsnP4UhqYBaBSJbghIUFT"
                 class="w-full h-40 sm:h-48 md:h-56 object-cover rounded-md mb-3 sm:mb-4">

            <h3 class="font-semibold text-base sm:text-lg">Ayam Geprek Original</h3>
            <p class="text-gray-600 text-xs sm:text-sm mb-2">Ayam geprek crispy dengan sambal sesuai level.</p>
            <p class="font-semibold text-orange-600 text-sm sm:text-base">Rp 13.000</p>
        </div>

        {{-- Card 2 --}}
        <div class="border rounded-lg shadow hover:shadow-lg transition bg-white p-3 sm:p-4">
            <img src="https://media.sukabumiupdate.com/media/2023/05/26/1685091177_6470736974b4b_MydzBPJGHC3BvF9SdRiK-medium.webp"
                 class="w-full h-40 sm:h-48 md:h-56 object-cover rounded-md mb-3 sm:mb-4">

            <h3 class="font-semibold text-base sm:text-lg">Ayam Geprek Jumbo</h3>
            <p class="text-gray-600 text-xs sm:text-sm mb-2">Ayam geprek crispy porsi jumbo.</p>
            <p class="font-semibold text-orange-600 text-sm sm:text-base">Rp 18.000</p>
        </div>

        {{-- Card 3 --}}
        <div class="border rounded-lg shadow hover:shadow-lg transition bg-white p-3 sm:p-4">
             <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQg7aKTG137x1-vRrebDivy6yqTJEQdRYYWteV5OqR88AgtAeB4"
                 class="w-full h-40 sm:h-48 md:h-56 object-cover rounded-md mb-3 sm:mb-4">

            <h3 class="font-semibold text-base sm:text-lg">Teh Manis</h3>
            <p class="text-gray-600 text-xs sm:text-sm mb-2">Minuman teh manis dingin yang menyegarkan.</p>
            <p class="font-semibold text-orange-600 text-sm sm:text-base">Rp 5.000</p>
        </div>

    </div>

    {{-- Tombol Lihat Menu --}}
    <div class="flex justify-center mt-6 sm:mt-8">
        <button class="border border-orange-600 px-4 sm:px-6 py-2 rounded-lg text-orange-600 hover:bg-orange-100 text-sm sm:text-base transition">
            <a href="/menu">Lihat Semua Menu</a>
        </button>
    </div>

</div>


{{-- Testimoni --}}
<section class="mt-16 sm:mt-20 bg-orange-50 py-8 sm:py-14">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <h2 class="text-xl sm:text-2xl md:text-3xl font-bold text-center mb-6 sm:mb-8">Apa Kata Mereka?</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">

            <div class="bg-white shadow p-4 sm:p-6 rounded-lg hover:shadow-lg transition">
                <p class="font-medium text-sm sm:text-base">Rizky</p>
                <p class="text-xs sm:text-sm text-gray-600 mt-2">Ayamnya enak, crispy banget, cocok buat makan siang.</p>
            </div>

            <div class="bg-white shadow p-4 sm:p-6 rounded-lg hover:shadow-lg transition">
                <p class="font-medium text-sm sm:text-base">Bisma</p>
                <p class="text-xs sm:text-sm text-gray-600 mt-2">Bumbunya sangat pas! Tidak terlalu pedas.</p>
            </div>

            <div class="bg-white shadow p-4 sm:p-6 rounded-lg hover:shadow-lg transition">
                <p class="font-medium text-sm sm:text-base">Nayla</p>
                <p class="text-xs sm:text-sm text-gray-600 mt-2">Porsinya besar dan harga mahasiswa banget.</p>
            </div>

        </div>
    </div>
</section>


{{-- CTA Order --}}
<section class="max-w-7xl mx-auto px-4 sm:px-6 mt-16 sm:mt-20 text-center">
    <div class="bg-orange-600 text-white py-8 sm:py-10 px-4 sm:px-6 rounded-lg shadow hover:shadow-lg transition">
        <h2 class="text-lg sm:text-xl md:text-2xl font-semibold mb-2 sm:mb-3">Siap Untuk Order?</h2>
        <p class="mb-4 text-sm sm:text-base">Pesan makananmu sekarang juga dengan harga paling hemat!</p>
        <button class="bg-white text-orange-600 px-4 sm:px-6 py-2 rounded-md font-semibold hover:bg-orange-100 text-sm sm:text-base transition">
            <a href="/menu">Mulai Order</a>
        </button>
    </div>
</section>

@endsection
