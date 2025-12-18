<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Ayam Kampus</title>

    {{-- Tailwind CDN cepat (hanya untuk development) --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- optional: juga muat app.css jika sudah ada --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-white min-h-screen flex items-start justify-center">

    <main class="w-full">
        <div class="pt-10"></div>

        <div class="flex justify-center">
            <div class="w-full max-w-sm">
                @yield('content')
            </div>
        </div>
    </main>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>