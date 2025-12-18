<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayam Kampus</title>

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Font --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-white">

    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Konten Dinamis --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('partials.footer')


     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function handleGuestAddToCart() {
            Swal.fire({
                icon: 'warning',
                title: 'Harus Login!',
                text: 'Silakan login terlebih dahulu untuk menambahkan item ke keranjang',
                confirmButtonText: 'Login Sekarang',
                cancelButtonText: 'Nanti Dulu',
                showCancelButton: true,
                confirmButtonColor: '#f97316',
                cancelButtonColor: '#d1d5db',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('login') }}";
                }
            });
        }

        @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            confirmButtonColor: '#f97316'
        });
    @endif
    </script>
</body>
</html>
