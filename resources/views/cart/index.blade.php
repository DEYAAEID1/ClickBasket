@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-12">
    <h1 class="text-2xl font-bold mb-6">Your Cart</h1>

    @if (count($cartItems))
        <div class="space-y-6">
            @foreach ($cartItems as $item)
                <div class="flex items-center bg-white p-4 rounded shadow justify-between">
                    <div class="flex items-center space-x-4">
                        <img src="{{ $item->image }}" alt="{{ $item->name }}" class="w-20 h-20 object-cover rounded">
                        <div>
                            <h2 class="text-lg font-semibold">{{ $item->name }}</h2>
                            <p class="text-gray-600">Quantity: {{ $item->quantity }}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-gray-800 font-semibold">${{ number_format($item->price * $item->quantity, 2) }}</p>
                        <button class="text-red-500 text-sm mt-2 hover:underline">Remove</button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8 text-right">
            <a href="#" class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition">
                Proceed to Checkout
            </a>
        </div>
    @else
        <p class="text-gray-500">Your cart is empty.</p>
    @endif
</div>
@endsection
