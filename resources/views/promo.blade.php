@extends('layouts.main')

@section('content')

<div class="max-w-6xl mx-auto px-4 py-8">

    <!-- Judul & Deskripsi -->
    <div class="text-center mb-6">
        <button class="bg-orange-500 text-white px-4 py-1 rounded-full text-sm mb-2">
            Promo Spesial
        </button>

        <h2 class="text-2xl font-bold">Promo Spesial</h2>
        <p class="text-gray-600">
            Dapatkan penawaran terbaik dan hemat lebih banyak dengan promo-promo menarik kami!
        </p>
    </div>

    <!-- Promo Besar -->
    <div class="bg-orange-400 rounded-xl shadow-md p-6 flex flex-col md:flex-row items-center mb-10">

        <div class="flex-1">
            <h3 class="text-xl font-semibold mb-2">Paket Hemat Mahasiswa</h3>
            <p class="text-sm mb-1">1 Ayam Geprek + Es Teh Manis</p>
            <p class="text-sm mb-4">Hemat Banget!</p>

            <p class="font-bold text-white text-lg mb-4">Rp 10.000</p>

            <button class="bg-white text-orange-600 px-4 py-2 rounded-lg shadow hover:shadow-md">
                Order Sekarang
            </button>
        </div>

        <div class="flex-1 flex justify-end mt-4 md:mt-0">
            <img src="https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/37b9d42e-0207-4cd5-8f5d-b1b6c17b0414_Go-Biz_20220411_143149.jpeg"
                 class="w-full h-[46vh] object-cover rounded-md mb-4">
        </div>

    </div>

    <!-- Grid Promo Kecil -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Card 1 -->
        <div class="border rounded-lg shadow hover:shadow-md transition bg-white p-4 flex flex-col">
            <img src="https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/37b9d42e-0207-4cd5-8f5d-b1b6c17b0414_Go-Biz_20220411_143149.jpeg"
                 class="w-full h-[46vh] object-cover rounded-md mb-4">

            <h3 class="font-semibold text-lg">Paket Hemat Mahasiswa</h3>
            <p class="text-gray-600 text-sm">Ayam Geprek + Mendoan</p>
            <p class="font-semibold text-orange-600 mt-2">Rp 10.000</p>

            <button class="mt-3 bg-orange-500 text-white w-full py-2 rounded-md">
                Masukkan ke Keranjang
            </button>
        </div>

        <!-- Card 2 -->
        <div class="border rounded-lg shadow hover:shadow-md transition bg-white p-4">
            <img src="https://tse3.mm.bing.net/th/id/OIP.2IHBfx3kZn02hV7kDuUaowAAAA?pid=ImgDet&w=202&h=202&c=7&dpr=1,3&o=7&rm=3"
                 class="w-full h-[46vh] object-cover rounded-md mb-4">

            <h3 class="font-semibold text-lg">Promo Malam Hari</h3>
            <p class="text-gray-600 text-sm">Diskon 15% untuk pembelian di atas jam 8 malam</p>

            <button class="mt-6 bg-orange-500 text-white w-full py-2 rounded-md">
                Masukkan ke Keranjang
            </button>
        </div>

        <!-- Card 3 -->
        <div class="border rounded-lg shadow hover:shadow-md transition bg-white p-4">
            <img src="https://awsimages.detik.net.id/community/media/visual/2019/11/29/77ab918c-f6ad-4a9b-a739-7c6c530619fe.jpeg?w=700&q=90"
                 class="w-full h-[46vh] object-cover rounded-md mb-4">

            <h3 class="font-semibold text-lg">Beli 2 Gratis 1 Minuman</h3>
            <p class="text-gray-600 text-sm">Dapat 2 Paket Ayam Geprek gratis Teh Manis dingin!</p>

            <button class="mt-6 bg-orange-500 text-white w-full py-2 rounded-md">
                Masukkan ke Keranjang
            </button>
        </div>

    </div>

    <!-- Info Penting -->
    <div class="mt-12 bg-orange-50 p-6 rounded-xl shadow-sm">
        <h3 class="font-semibold text-center text-gray-800 mb-3">Info Penting</h3>
        <ul class="text-gray-600 text-sm list-disc pl-5 space-y-1">
            <li>Promo berlaku untuk pembelian langsung</li>
            <li>Syarat dan ketentuan berlaku</li>
            <li>Hubungi kami melalui WhatsApp untuk info lebih lanjut</li>
        </ul>
    </div>

</div>

@endsection
