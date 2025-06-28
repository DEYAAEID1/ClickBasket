<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
    <div class="max-w-6xl mx-auto px-4 py-8">
        <h2 class="text-xl font-bold mb-4">Product List</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($products as $product)
                <div class="bg-white rounded shadow p-4">
                    <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                    <p class="text-gray-600">${{ number_format($product->price, 2) }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
</x-app-layout>
