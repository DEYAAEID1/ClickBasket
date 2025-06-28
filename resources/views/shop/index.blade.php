@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-8 text-center">Browse Our Products</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition duration-300">
                    <img src="{{ $product->image ?? 'https://via.placeholder.com/300x200' }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $product->name }}</h2>
                        <p class="text-gray-700 mb-2">${{ number_format($product->price, 2) }}</p>
                        <a href="#" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Add to Cart</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
