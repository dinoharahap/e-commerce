@extends('layouts.main')

@section('content')

<div class="max-w-6xl mx-auto px-4 sm:px-6 py-8 sm:py-12">

    <!-- Judul & Deskripsi -->
    <div class="text-center mb-8 sm:mb-10">
        <button class="bg-orange-500 text-white px-4 py-1 rounded-full text-xs sm:text-sm mb-3 sm:mb-4">
            Promo Spesial
        </button>

        <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-2 sm:mb-3">Promo Spesial</h2>
        <p class="text-gray-600 text-sm sm:text-base">
            Dapatkan penawaran terbaik dan hemat lebih banyak dengan promo-promo menarik kami!
        </p>
    </div>

    <!-- Promo Besar -->
    <div class="bg-orange-400 rounded-xl shadow-md p-4 sm:p-6 md:p-8 flex flex-col md:flex-row items-center gap-6 md:gap-8 mb-10 sm:mb-12">

        <div class="flex-1 order-2 md:order-1 text-center md:text-left">
            <h3 class="text-lg sm:text-xl md:text-2xl font-semibold mb-2 sm:mb-3">Paket Hemat Mahasiswa</h3>
            <p class="text-xs sm:text-sm mb-1">1 Ayam Geprek + Es Teh Manis</p>
            <p class="text-xs sm:text-sm mb-3 sm:mb-4">Hemat Banget!</p>

            <p class="font-bold text-white text-xl sm:text-2xl md:text-3xl mb-3 sm:mb-4">Rp 10.000</p>

            <button class="bg-white text-orange-600 px-4 sm:px-5 py-2 sm:py-2.5 rounded-lg shadow hover:shadow-md hover:bg-orange-50 transition text-sm sm:text-base font-medium">
                Order Sekarang
            </button>
        </div>

        <div class="flex-1 order-1 md:order-2 w-full">
            <img src="https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/37b9d42e-0207-4cd5-8f5d-b1b6c17b0414_Go-Biz_20220411_143149.jpeg"
                 class="w-full h-40 sm:h-48 md:h-56 lg:h-64 object-cover rounded-md">
        </div>

    </div>

    <!-- Grid Promo Kecil -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-5 md:gap-6 mb-10 sm:mb-12">

        <!-- Card 1 -->
        <div class="border rounded-lg shadow hover:shadow-lg transition bg-white p-3 sm:p-4 flex flex-col h-full">
            <img src="https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/37b9d42e-0207-4cd5-8f5d-b1b6c17b0414_Go-Biz_20220411_143149.jpeg"
                 class="w-full h-32 sm:h-40 md:h-48 object-cover rounded-md mb-3 sm:mb-4">

            <h3 class="font-semibold text-sm sm:text-base md:text-lg">Paket Hemat Mahasiswa</h3>
            <p class="text-gray-600 text-xs sm:text-sm mb-2">Ayam Geprek + Mendoan</p>
            <p class="font-semibold text-orange-600 text-sm sm:text-base mb-3 sm:mb-4">Rp 10.000</p>

            <button class="mt-auto bg-orange-500 text-white w-full py-2 sm:py-2.5 rounded-md hover:bg-orange-600 transition text-xs sm:text-sm font-medium">
                Masukkan ke Keranjang
            </button>
        </div>

        <!-- Card 2 -->
        <div class="border rounded-lg shadow hover:shadow-lg transition bg-white p-3 sm:p-4 flex flex-col h-full">
            <img src="https://tse3.mm.bing.net/th/id/OIP.2IHBfx3kZn02hV7kDuUaowAAAA?pid=ImgDet&w=202&h=202&c=7&dpr=1,3&o=7&rm=3"
                 class="w-full h-32 sm:h-40 md:h-48 object-cover rounded-md mb-3 sm:mb-4">

            <h3 class="font-semibold text-sm sm:text-base md:text-lg">Promo Malam Hari</h3>
            <p class="text-gray-600 text-xs sm:text-sm mb-3 sm:mb-4">Diskon 15% untuk pembelian di atas jam 8 malam</p>

            <button class="mt-auto bg-orange-500 text-white w-full py-2 sm:py-2.5 rounded-md hover:bg-orange-600 transition text-xs sm:text-sm font-medium">
                Masukkan ke Keranjang
            </button>
        </div>

        <!-- Card 3 -->
        <div class="border rounded-lg shadow hover:shadow-lg transition bg-white p-3 sm:p-4 flex flex-col h-full">
            <img src="https://awsimages.detik.net.id/community/media/visual/2019/11/29/77ab918c-f6ad-4a9b-a739-7c6c530619fe.jpeg?w=700&q=90"
                 class="w-full h-32 sm:h-40 md:h-48 object-cover rounded-md mb-3 sm:mb-4">

            <h3 class="font-semibold text-sm sm:text-base md:text-lg">Beli 2 Gratis 1 Minuman</h3>
            <p class="text-gray-600 text-xs sm:text-sm mb-3 sm:mb-4">Dapat 2 Paket Ayam Geprek gratis Teh Manis dingin!</p>

            <button class="mt-auto bg-orange-500 text-white w-full py-2 sm:py-2.5 rounded-md hover:bg-orange-600 transition text-xs sm:text-sm font-medium">
                Masukkan ke Keranjang
            </button>
        </div>

    </div>

    <!-- Info Penting -->
    <div class="bg-orange-50 p-4 sm:p-6 md:p-8 rounded-xl shadow-sm border border-orange-100">
        <h3 class="font-semibold text-center text-gray-800 mb-3 sm:mb-4 text-sm sm:text-base md:text-lg">Info Penting</h3>
        <ul class="text-gray-600 text-xs sm:text-sm list-disc pl-5 space-y-1 sm:space-y-2">
            <li>Promo berlaku untuk pembelian langsung</li>
            <li>Syarat dan ketentuan berlaku</li>
            <li>Hubungi kami melalui WhatsApp untuk info lebih lanjut</li>
        </ul>
    </div>

</div>

@endsection
