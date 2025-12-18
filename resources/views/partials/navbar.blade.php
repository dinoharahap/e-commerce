<nav class="w-full bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        {{-- <div class="text-xl font-semibold text-orange-600">Ayam Kampus</div> --}}
        <div class="flex items-center gap-3">
            <img src="{{asset('images/ayam_kampus.png')}}" alt="Ayam Kampus" class="h-8 w-auto">
            <div class="text-l font-semibold text-orange-600">Ayam Kampus</div>
        </div>

        <ul class="flex gap-6 font-medium">
            <li>
                <a href="/"
                   class="{{ request()->is('/') ? 'text-orange-500 font-semibold' : 'hover:text-orange-500' }}"
                   @if(request()->is('/')) aria-current="page" @endif>
                   Home
                </a>
            </li>
            <li>
                <a href="/menu"
                   class="{{ request()->is('menu*') ? 'text-orange-500 font-semibold' : 'hover:text-orange-500' }}"
                   @if(request()->is('menu*')) aria-current="page" @endif>
                   Menu
                </a>
            </li>
            <li>
                <a href="/promo"
                   class="{{ request()->is('promo*') ? 'text-orange-500 font-semibold' : 'hover:text-orange-500' }}"
                   @if(request()->is('promo*')) aria-current="page" @endif>
                   Promo
                </a>
            </li>
            <li>
                <a href="/about"
                   class="{{ request()->is('about*') ? 'text-orange-500 font-semibold' : 'hover:text-orange-500' }}"
                   @if(request()->is('about*')) aria-current="page" @endif>
                   About
                </a>
            </li>
            <li>
                <a href="/contact"
                   class="{{ request()->is('contact*') ? 'text-orange-500 font-semibold' : 'hover:text-orange-500' }}"
                   @if(request()->is('contact*')) aria-current="page" @endif>
                   Contact
                </a>
            </li>
            @auth
            <li>
                <a href="{{ route('orders.history') }}"
                   class="{{ request()->is('orders*') ? 'text-orange-500 font-semibold' : 'hover:text-orange-500' }}"
                   @if(request()->is('orders*')) aria-current="page" @endif>
                   Order History
                </a>
            </li>
            @endauth
        </ul>

        <div class="flex items-center gap-4">
            <a href="#" onclick="checkCartAccess(event)"  id="cartButton" class="{{ request()->is('cart*') ? 'text-orange-500' : 'text-2xl hover:text-orange-500' }}">🛒</a>

            @auth
                <span class="hidden md:inline text-sm">Hi, {{ auth()->user()->name }}</span>
                <form action="{{ route('logout.post') }}" method="POST" class="inline">
                    @csrf
                    <button class="text-sm text-orange-500 hover:underline ml-2">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm hover:text-orange-500">Login</a>
                <a href="{{ route('register.view') }}" class="ml-2 text-sm bg-orange-500 text-white px-3 py-1 rounded-md hidden md:inline">Daftar</a>
            @endauth
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function checkCartAccess(e) {
    @if(auth()->guest())
        e.preventDefault();
        Swal.fire({
            title: "Login diperlukan!",
            text: "Silakan login terlebih dahulu untuk membuka keranjang.",
            icon: "warning",
            confirmButtonText: "Login Sekarang",
            showCancelButton: true,
            cancelButtonText: "Nanti Dulu",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('login') }}";
            }
        });
    @else
        window.location.href = "{{ route('cart.index') }}";
    @endif
}
</script>

