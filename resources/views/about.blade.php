@extends('layouts.main')

@section('content')

<div class="pt-10 text-center">
    <h1 class="text-2xl md:text-3xl font-bold">Tentang Ayam Kampus</h1>
    <p class="text-gray-600 mt-2">Cerita kami dalam menyajikan ayam geprek terbaik untuk mahasiswa</p>
</div>

<div class="max-w-7xl mx-auto px-6 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
        <!-- Kiri: teks -->
        <div class="space-y-4 text-sm text-gray-700">
            <h4 class="font-semibold">Dari Mahasiswa, Untuk Mahasiswa</h4>

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
tidak sesuai.  Jadi, tunggu apa lagi? Pilih menu favoritmu, pesan sekarang lewat 
GoFood/GrabFood atau langsung datang ke outlet.
            </p>
        </div>

        <!-- Kanan: logo / ilustrasi -->
        <div class="flex justify-center md:justify-end">
            <img src="{{ asset('images/ayam_kampus.png') }}" alt="Ayam Kampus Logo" class="w-64 md:w-80 object-contain rounded-md shadow-md">
        </div>
    </div>

    <!-- Visi & Misi -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10">
        <div class="bg-orange-500 text-white rounded-lg p-6 shadow-md">
            <h5 class="font-semibold mb-2">Visi Kami</h5>
            <p class="text-sm">
                Menjadi brand fried chicken terdepan di Indonesia yang dikenal karena standar kualitas, inovasi rasa yang teruji, dan komitmen terhadap keunggulan layanan.
                Menjadi pilihan utama bagi generasi muda dan seluruh masyarakat.
            </p>
        </div>

        <div class="bg-yellow-300 rounded-lg p-6 shadow-md">
            <h5 class="font-semibold mb-2">Misi Kami</h5>
            <p class="text-sm text-gray-800">
                Menyajikan fried chicken kualitas "Lulusan Terbaik" yang teruji resep dan rasanya. Berkomitmen pada inovasi berkelanjutan, pengalaman layanan unggul,
                dan memastikan produk premium tetap terjangkau terutama bagi kalangan mahasiswa.
            </p>
        </div>
    </div>
</div>

@endsection