@extends('layouts.auth')

@section('content')
<div class="pt-10 text-center">
    <img src="{{ asset('images/ayam_kampus.png') }}" class="h-12 mx-auto mb-4" alt="logo">
    <h2 class="font-semibold text-lg">Daftar Sekarang</h2>
    <p class="text-sm text-gray-500">Buat akun dan nikmati promo spesial mahasiswa</p>
</div>

<div class="mt-8 flex justify-center">
    <div class="w-full max-w-sm bg-white border rounded-md p-6">
        <form action="{{ route('register.post') }}" method="POST" class="space-y-4">
            @csrf
            <label class="text-sm font-medium">Nama Lengkap</label>
            <input name="name" value="{{ old('name') }}" class="w-full rounded-md px-3 py-2 bg-gray-50 border" required />

            <label class="text-sm font-medium">Email</label>
            <input name="email" type="email" value="{{ old('email') }}" class="w-full rounded-md px-3 py-2 bg-gray-50 border" required />

            <label class="text-sm font-medium">No. HP</label>
            <input name="no_hp" type="text" value="{{ old('no_hp') }}" class="w-full rounded-md px-3 py-2 bg-gray-50 border" required />

            <label class="text-sm font-medium">Password</label>
            <input name="password" type="password" class="w-full rounded-md px-3 py-2 bg-gray-50 border" required />

            <label class="text-sm font-medium">Konfirmasi Password</label>
            <input name="password_confirmation" type="password" class="w-full rounded-md px-3 py-2 bg-gray-50 border" required />

            <button type="submit" class="w-full mt-2 bg-orange-500 text-white py-2 rounded-md">Daftar</button>
        </form>

        <p class="text-xs text-center mt-3">Sudah punya akun? <a href="{{ route('login') }}" class="text-orange-500">Login di sini</a></p>

        @if($errors->any())
            <div class="text-sm text-red-600 mt-2">
                {{ $errors->first() }}
            </div>
        @endif
    </div>
</div>
@endsection