<nav class="w-full bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 md:px-6 py-4">
        <!-- Desktop & Mobile Header -->
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center gap-2 md:gap-3 flex-shrink-0">
                <img src="{{asset('images/ayam_kampus.png')}}" alt="Ayam Kampus" class="h-8 w-auto">
                <div class="text-sm md:text-lg font-semibold text-orange-600">Ayam Kampus</div>
            </div>

            <!-- Desktop Menu (Hidden on Mobile) -->
            <ul class="hidden md:flex gap-4 lg:gap-6 font-medium flex-1 justify-center ml-8">
                <li>
                    <a href="/"
                       class="{{ request()->is('/') ? 'text-orange-500 font-semibold' : 'text-gray-700 hover:text-orange-500' }}"
                       @if(request()->is('/')) aria-current="page" @endif>
                       Home
                    </a>
                </li>
                <li>
                    <a href="/menu"
                       class="{{ request()->is('menu*') ? 'text-orange-500 font-semibold' : 'text-gray-700 hover:text-orange-500' }}"
                       @if(request()->is('menu*')) aria-current="page" @endif>
                       Menu
                    </a>
                </li>
                <li>
                    <a href="/promo"
                       class="{{ request()->is('promo*') ? 'text-orange-500 font-semibold' : 'text-gray-700 hover:text-orange-500' }}"
                       @if(request()->is('promo*')) aria-current="page" @endif>
                       Promo
                    </a>
                </li>
                <li>
                    <a href="/about"
                       class="{{ request()->is('about*') ? 'text-orange-500 font-semibold' : 'text-gray-700 hover:text-orange-500' }}"
                       @if(request()->is('about*')) aria-current="page" @endif>
                       About
                    </a>
                </li>
                <li>
                    <a href="/contact"
                       class="{{ request()->is('contact*') ? 'text-orange-500 font-semibold' : 'text-gray-700 hover:text-orange-500' }}"
                       @if(request()->is('contact*')) aria-current="page" @endif>
                       Contact
                    </a>
                </li>
                @auth
                <li>
                    <a href="{{ route('orders.history') }}"
                       class="{{ request()->is('orders*') ? 'text-orange-500 font-semibold' : 'text-gray-700 hover:text-orange-500' }}"
                       @if(request()->is('orders*')) aria-current="page" @endif>
                       Order History
                    </a>
                </li>
                @endauth
            </ul>

            <!-- Right Side Icons & Auth -->
            <div class="flex items-center gap-3 md:gap-4">
                <!-- Cart Icon -->
                <a href="#" onclick="checkCartAccess(event)" id="cartButton" 
                   class="text-xl md:text-2xl {{ request()->is('cart*') ? 'text-orange-500' : 'text-gray-700 hover:text-orange-500' }} transition">
                   🛒
                </a>

                <!-- Desktop Auth Section -->
                <div class="hidden md:flex items-center gap-3">
                    @auth
                        <span class="text-sm text-gray-700">Hi, {{ auth()->user()->name }}</span>
                        <form action="{{ route('logout.post') }}" method="POST" class="inline">
                            @csrf
                            <button class="text-sm text-orange-500 hover:underline">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-orange-500">Login</a>
                        <a href="{{ route('register.view') }}" class="text-sm bg-orange-500 text-white px-3 py-1 rounded-md hover:bg-orange-600 transition">Daftar</a>
                    @endauth
                </div>

                <!-- Hamburger Menu Button (Mobile) -->
                <button id="hamburger" class="md:hidden p-2 hover:bg-gray-100 rounded-lg transition">
                    <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu (Hidden by default) -->
        <div id="mobileMenu" class="hidden md:hidden mt-4 pb-4 border-t border-gray-200">
            <ul class="flex flex-col gap-3 mt-4 font-medium">
                <li>
                    <a href="/" onclick="closeMobileMenu()"
                       class="{{ request()->is('/') ? 'text-orange-500 font-semibold' : 'text-gray-700 hover:text-orange-500' }} block py-2"
                       @if(request()->is('/')) aria-current="page" @endif>
                       Home
                    </a>
                </li>
                <li>
                    <a href="/menu" onclick="closeMobileMenu()"
                       class="{{ request()->is('menu*') ? 'text-orange-500 font-semibold' : 'text-gray-700 hover:text-orange-500' }} block py-2"
                       @if(request()->is('menu*')) aria-current="page" @endif>
                       Menu
                    </a>
                </li>
                <li>
                    <a href="/promo" onclick="closeMobileMenu()"
                       class="{{ request()->is('promo*') ? 'text-orange-500 font-semibold' : 'text-gray-700 hover:text-orange-500' }} block py-2"
                       @if(request()->is('promo*')) aria-current="page" @endif>
                       Promo
                    </a>
                </li>
                <li>
                    <a href="/about" onclick="closeMobileMenu()"
                       class="{{ request()->is('about*') ? 'text-orange-500 font-semibold' : 'text-gray-700 hover:text-orange-500' }} block py-2"
                       @if(request()->is('about*')) aria-current="page" @endif>
                       About
                    </a>
                </li>
                <li>
                    <a href="/contact" onclick="closeMobileMenu()"
                       class="{{ request()->is('contact*') ? 'text-orange-500 font-semibold' : 'text-gray-700 hover:text-orange-500' }} block py-2"
                       @if(request()->is('contact*')) aria-current="page" @endif>
                       Contact
                    </a>
                </li>
                @auth
                <li>
                    <a href="{{ route('orders.history') }}" onclick="closeMobileMenu()"
                       class="{{ request()->is('orders*') ? 'text-orange-500 font-semibold' : 'text-gray-700 hover:text-orange-500' }} block py-2"
                       @if(request()->is('orders*')) aria-current="page" @endif>
                       Order History
                    </a>
                </li>
                @endauth
            </ul>

            <!-- Mobile Auth Section -->
            <div class="mt-4 pt-4 border-t border-gray-200">
                @auth
                    <div class="mb-3">
                        <p class="text-sm text-gray-700 mb-2">Hi, {{ auth()->user()->name }}</p>
                        <form action="{{ route('logout.post') }}" method="POST">
                            @csrf
                            <button class="text-sm text-orange-500 hover:underline">Logout</button>
                        </form>
                    </div>
                @else
                    <div class="flex flex-col gap-2">
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-orange-500 py-2">Login</a>
                        <a href="{{ route('register.view') }}" class="text-sm bg-orange-500 text-white px-3 py-2 rounded-md hover:bg-orange-600 transition text-center">Daftar</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Hamburger Menu Toggle
const hamburger = document.getElementById('hamburger');
const mobileMenu = document.getElementById('mobileMenu');

hamburger.addEventListener('click', () => {
    mobileMenu.classList.toggle('hidden');
});

function closeMobileMenu() {
    mobileMenu.classList.add('hidden');
}

// Close mobile menu when clicking outside
document.addEventListener('click', (e) => {
    if (!hamburger.contains(e.target) && !mobileMenu.contains(e.target)) {
        mobileMenu.classList.add('hidden');
    }
});

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

