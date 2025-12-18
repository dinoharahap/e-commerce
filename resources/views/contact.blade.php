@extends('layouts.main')

@section('content')

<div class="pt-10 text-center">
    <h1 class="text-2xl md:text-3xl font-bold">Hubungi Kami</h1>
    <p class="text-gray-600 mt-2">Ada pertanyaan atau saran? Jangan ragu untuk menghubungi kami!</p>
</div>

<div class="max-w-7xl mx-auto px-6 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">

        <!-- Left: Form & Social -->
        <div>
            <div class="bg-white border rounded-lg p-6 shadow-sm">
                <h2 class="font-semibold mb-4">Kirim Pesan</h2>

                <form action="#" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Nama</label>
                        <input type="text" name="nama" class="w-full border rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-orange-300" placeholder="Nama Anda">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Email</label>
                        <input type="email" name="email" class="w-full border rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-orange-300" placeholder="email@contoh.com">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Pesan</label>
                        <textarea name="pesan" rows="5" class="w-full border rounded-md px-3 py-2 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-orange-300" placeholder="Tulis pesan Anda..."></textarea>
                    </div>

                    <div>
                        <button type="submit" class="w-full bg-orange-500 text-white py-2 rounded-md hover:bg-orange-600 transition">Kirim Pesan</button>
                    </div>
                </form>
            </div>

            <!-- social / contact quick -->
            <div class="mt-6 space-y-4">
                <div class="border rounded-lg p-3 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-pink-400 to-yellow-400 flex items-center justify-center text-white text-lg"><img src="{{asset('images/instagram.png')}}" alt="Instagram"></div>
                    <div>
                        <div class="text-sm font-medium">Instagram</div>
                        <div class="text-xs text-gray-600">@ayamkampus</div>
                    </div>
                </div>

                <div class="border rounded-lg p-3 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center text-white text-lg"><img src="{{asset('images/whatsapp.png')}}" alt="WhatsApp" class="rounded-full tems-center justify-center w-10 h-10"></div>
                    <div>
                        <div class="text-sm font-medium">WhatsApp</div>
                        <div class="text-xs text-gray-600">+62 838 7580 7838</div>
                    </div>
                </div>

                <div class="border rounded-lg p-3">
                    <div class="text-sm font-semibold mb-1">Lokasi Outlet Kami</div>
                    <div class="text-xs text-gray-600">Kami berlokasi strategis dekat kampus untuk memudahkan akses mahasiswa. Klik peta untuk mendapatkan arah menuju outlet kami.</div>
                </div>
            </div>
        </div>

        <!-- Right: Contact Info -->
        <div class="space-y-4">
            <div class="border rounded-lg p-4 flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 text-xl">📍</div>
                <div>
                    <div class="font-semibold">Alamat</div>
                    <div class="text-sm text-gray-600">Jl. Abdul Hakim No. 111, Padang Bulan</div>
                </div>
            </div>

            <div class="border rounded-lg p-4 flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 text-xl">📞</div>
                <div>
                    <div class="font-semibold">Telepon</div>
                    <div class="text-sm text-gray-600">+62 813 7643 8890</div>
                </div>
            </div>

            <div class="border rounded-lg p-4 flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 text-xl">✉️</div>
                <div>
                    <div class="font-semibold">Email</div>
                    <div class="text-sm text-gray-600">hello@ayamkampus.id</div>
                </div>
            </div>

            <div class="border rounded-lg p-4 flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 text-xl">⏰</div>
                <div>
                    <div class="font-semibold">Jam Buka</div>
                    <div class="text-sm text-gray-600">Setiap hari: 10.00 - 23.59 WIB</div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ / Info -->
    <div class="mt-10 bg-amber-50 border rounded-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h4 class="font-semibold mb-3">Pertanyaan Umum</h4>
                <div class="space-y-4 text-sm text-gray-700">
                    <div>
                        <div class="font-medium">Apakah menerima pesanan delivery?</div>
                        <div class="text-gray-600">Ya, kami menerima pesanan delivery melalui WhatsApp atau aplikasi online.</div>
                    </div>

                    <div>
                        <div class="font-medium">Apakah ada promo khusus?</div>
                        <div class="text-gray-600">Ya, kami punya berbagai promo menarik. Cek halaman Promo untuk info lebih lanjut.</div>
                    </div>
                </div>
            </div>

            <div>
                <h4 class="font-semibold mb-3 invisible md:visible">Pertanyaan Umum - kolom 2</h4>
                <div class="space-y-4 text-sm text-gray-700">
                    <div>
                        <div class="font-medium">Berapa minimal order untuk delivery?</div>
                        <div class="text-gray-600">Minimal order untuk delivery adalah Rp 30.000.</div>
                    </div>

                    <div>
                        <div class="font-medium">Bagaimana cara memesan?</div>
                        <div class="text-gray-600">Anda bisa datang langsung, pesan via WhatsApp, atau melalui website kami.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection