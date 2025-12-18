@extends('layouts.main')

@section('content')

<div class="max-w-7xl mx-auto mt-28 px-6 lg:px-0">

    <h1 class="text-3xl font-semibold text-center mb-10">Checkout Pesanan</h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- ====================== -->
        <!-- KIRI: FORM DATA PEMBELI -->
        <!-- ====================== -->
        <div class="col-span-2 bg-white shadow rounded-xl p-6">

            <h2 class="text-xl font-semibold mb-4">Informasi Pembeli</h2>

            <form id="checkoutForm">
                @csrf

                <div class="mb-4">
                    <label class="font-medium">Nama Lengkap</label>
                    <input type="text" name="nama_penerima" class="w-full mt-2 p-3 border rounded-lg bg-gray-100 cursor-not-allowed" value="{{ auth()->user()->name }}" readonly required>
                </div>

                <div class="mb-4">
                    <label class="font-medium">Nomor Handphone</label>
                    <input type="text" name="no_hp" class="w-full mt-2 p-3 border rounded-lg" placeholder="08xxxxxxxxxx" required>
                </div>

                <div class="mb-4">
                    <label class="font-medium">Alamat Lengkap</label>
                    <textarea name="alamat" class="w-full mt-2 p-3 border rounded-lg focus:ring-2 focus:ring-orange-500" rows="3" required></textarea>
                </div>

                <div class="mb-4">
                    <label class="font-medium">Catatan Tambahan (Opsional)</label>
                    <textarea name="catatan" class="w-full mt-2 p-3 border rounded-lg focus:ring-2 focus:ring-orange-500" rows="2"></textarea>
                </div>

                <button type="submit" class="w-full bg-orange-500 text-white py-3 rounded-lg hover:bg-orange-600 transition">
                    Buat Pesanan
                </button>

            </form>
        </div>


        <!-- ====================== -->
        <!-- KANAN: RINGKASAN PESANAN -->
        <!-- ====================== -->
        <div class="bg-white shadow rounded-xl p-6">

            <h2 class="text-xl font-semibold mb-4">Ringkasan Pesanan</h2>

            @foreach ($cartItems as $item)
            <div class="flex justify-between items-center mb-4 border-b pb-3">
                <div>
                    <p class="font-medium">{{ $item['nama'] }}</p>
                    <p class="text-sm text-gray-500">Qty: {{ $item['qty'] }}</p>
                </div>
                <p class="font-semibold">
                    Rp {{ number_format($item['harga'] * $item['qty'], 0, ',', '.') }}
                </p>
            </div>
            @endforeach


            <div class="mt-4 space-y-2">
                <div class="flex justify-between text-sm">
                    <span>Subtotal</span>
                    <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                </div>
                <div class="flex justify-between text-sm">
                    <span>Biaya Pengiriman</span>
                    <span>Rp {{ number_format($biaya_pengiriman, 0, ',', '.') }}</span>
                </div>

                <div class="flex justify-between font-semibold text-lg mt-3">
                    <span>Total</span>
                    <span class="text-orange-500">Rp {{ number_format($total, 0, ',', '.') }}</span>
                </div>
            </div>

        </div>

    </div>


    <!-- ====================== -->
    <!-- LOKASI OUTLET -->
    <!-- ====================== -->
    <div class="bg-orange-100 mt-12 p-6 rounded-xl shadow">
        <h3 class="font-semibold text-lg mb-2">Lokasi Outlet Kami</h3>
        <p>Kami berlokasi strategis dekat kampus untuk memudahkan akses mahasiswa.</p>
    </div>


    <!-- ====================== -->
    <!-- FAQ -->
    <!-- ====================== -->
    <div class="bg-orange-50 mt-8 p-8 rounded-xl shadow">

        <h3 class="text-xl font-semibold mb-4">Pertanyaan Umum</h3>

        <div class="grid md:grid-cols-2 gap-8">

            <div>
                <p class="font-medium mb-1">Apakah menerima pesanan delivery?</p>
                <p class="text-gray-600">Ya, kami menerima pesanan delivery melalui WhatsApp atau aplikasi online.</p>
            </div>

            <div>
                <p class="font-medium mb-1">Berapa minimal order untuk delivery?</p>
                <p class="text-gray-600">Minimal order untuk delivery adalah Rp 30.000.</p>
            </div>

            <div>
                <p class="font-medium mb-1">Apakah ada promo khusus?</p>
                <p class="text-gray-600">Ya, kami punya berbagai promo menarik setiap minggu.</p>
            </div>

            <div>
                <p class="font-medium mb-1">Bagaimana cara memesan?</p>
                <p class="text-gray-600">Pesan langsung di website, WhatsApp, atau datang ke outlet kami.</p>
            </div>

        </div>

    </div>

</div>

<!-- Midtrans Snap.js -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<script>
document.getElementById('checkoutForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const csrfToken = document.querySelector('input[name="_token"]').value;

    Swal.fire({
        title: 'Memproses pesanan...',
        allowOutsideClick: false,
        didOpen: () => Swal.showLoading()
    });

    try {
        const res = await fetch("{{ route('proses.checkout') }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: formData
        });

        const data = await res.json();
        console.log('Response:', data);

        if (data.success && data.snap_token) {
            Swal.close();
            
            snap.pay(data.snap_token, {
                onSuccess: function(result) {
                    window.location.href = "{{ route('orders.history') }}";
                },
                onPending: function(result) {
                    Swal.fire('Pending', 'Pembayaran pending, silakan selesaikan pembayaran', 'info')
                        .then(() => window.location.href = "{{ route('orders.history') }}");
                },
                onError: function(result) {
                    Swal.fire('Error', 'Pembayaran gagal, silakan coba lagi', 'error');
                },
                onClose: function() {
                    Swal.fire('Dibatalkan', 'Anda menutup halaman pembayaran', 'info');
                }
            });
        } else {
            Swal.fire('Error', data.message || 'Terjadi kesalahan', 'error');
        }
    } catch (err) {
        console.error('Fetch error:', err);
        Swal.fire('Error', 'Kesalahan jaringan: ' + err.message, 'error');
    }
});
</script>

@endsection
