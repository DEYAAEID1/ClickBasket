<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <a href="{{ route('home') }}" class="text-xl font-bold text-blue-700">
            {{ config('app.name', 'ClickBasket') }}
        </a>

        <div class="space-x-4">
            <a href="{{ route('shop.index') }}" class="hover:text-blue-600">Shop</a>
            <a href="{{ route('cart.index') }}" class="hover:text-blue-600">Cart</a>

            @auth
                <a href="{{ route('dashboard') }}" class="hover:text-blue-600">Dashboard</a>
                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf
                    <button class="hover:text-red-500">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hover:text-blue-600">Login</a>
                <a href="{{ route('register') }}" class="hover:text-blue-600">Register</a>
            @endauth
        </div>
    </div>
</nav>
