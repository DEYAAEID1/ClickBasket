@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
            <!-- Product Image -->
            <div>
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full rounded shadow">
            </div>

            <!-- Product Info -->
            <div>
                <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
                <p class="text-gray-600 mb-4 text-lg">{{ $product->description }}</p>
                <p class="text-2xl font-semibold text-blue-600 mb-6">${{ number_format($product->price, 2) }}</p>

                <a href="#" class="inline-block bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 transition">Add to Cart</a>
            </div>
        </div>
    </div>
@endsection
