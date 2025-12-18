@extends('layouts.main')

@section('content')

<div class="pt-6 sm:pt-10 px-4 sm:px-6 text-center">
    <h1 class="text-2xl sm:text-3xl md:text-4xl font-bold">Tentang Ayam Kampus</h1>
    <p class="text-gray-600 mt-2 text-sm sm:text-base">Cerita kami dalam menyajikan ayam geprek terbaik untuk mahasiswa</p>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-8 sm:py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 sm:gap-8 items-start">
        <!-- Kiri: teks -->
        <div class="space-y-3 sm:space-y-4 text-xs sm:text-sm md:text-base text-gray-700">
            <h4 class="font-semibold text-sm sm:text-base md:text-lg">Dari Mahasiswa, Untuk Mahasiswa</h4>

            <p>
                Siang lapar atau malam kumpul bareng tapi bingung cari makan yang enak, 
cepat, dan mengenyangkan? Kami punya solusinya! Sebagai UMKM kuliner fried chicken, 
kami memilih ayam segar lokal terbaik, dibalut tepung bumbu rahasia, dan digoreng 
dengan minyak baru setiap hari. Hasilnya? Crispy luar biasa di luar dan juicy di dalam 
yang rasanya konsisten, baik itu varian Original, Spicy, maupun Geprek Sambal. 
            </p>

            <p>
               Rasanya premium tapi harganya rakyat, dengan paket hemat mulai Rp15.000-an. 
Kami sudah teruji, ratusan porsi terjual setiap hari dan mendapatkan review pelanggan 
⭐⭐⭐⭐⭐. Tak perlu ragu, karena kami juga memberikan Garansi ganti baru jika pesanan 
tidak sesuai. Jadi, tunggu apa lagi? Pilih menu favoritmu, pesan sekarang lewat 
GoFood/GrabFood atau langsung datang ke outlet.
            </p>
        </div>

        <!-- Kanan: logo / ilustrasi -->
        <div class="flex justify-center md:justify-end order-first md:order-last mb-4 md:mb-0">
            <img src="{{ asset('images/ayam_kampus.png') }}" alt="Ayam Kampus Logo" class="w-40 sm:w-56 md:w-64 lg:w-80 object-contain rounded-md shadow-md">
        </div>
    </div>

    <!-- Visi & Misi -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6 mt-8 sm:mt-10 md:mt-12">
        <div class="bg-orange-500 text-white rounded-lg p-4 sm:p-6 shadow-md hover:shadow-lg transition">
            <h5 class="font-semibold text-sm sm:text-base md:text-lg mb-2 sm:mb-3">Visi Kami</h5>
            <p class="text-xs sm:text-sm md:text-base leading-relaxed">
                Menjadi brand fried chicken terdepan di Indonesia yang dikenal karena standar kualitas, inovasi rasa yang teruji, dan komitmen terhadap keunggulan layanan.
                Menjadi pilihan utama bagi generasi muda dan seluruh masyarakat.
            </p>
        </div>

        <div class="bg-yellow-300 rounded-lg p-4 sm:p-6 shadow-md hover:shadow-lg transition">
            <h5 class="font-semibold text-sm sm:text-base md:text-lg mb-2 sm:mb-3 text-gray-800">Misi Kami</h5>
            <p class="text-xs sm:text-sm md:text-base text-gray-800 leading-relaxed">
                Menyajikan fried chicken kualitas "Lulusan Terbaik" yang teruji resep dan rasanya. Berkomitmen pada inovasi berkelanjutan, pengalaman layanan unggul,
                dan memastikan produk premium tetap terjangkau terutama bagi kalangan mahasiswa.
            </p>
        </div>
    </div>
</div>

@endsection