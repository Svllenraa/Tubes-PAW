@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-8 px-4">
    <div class="flex gap-6">
        <div class="w-1/2">
            @if($product->image)
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-80 object-cover rounded">
            @endif
        </div>
        <div class="flex-1">
            <h1 class="text-2xl font-bold">{{ $product->name }}</h1>
            <p class="text-sm text-gray-600">{{ $product->category?->name }}</p>
            <p class="mt-4">{{ $product->description }}</p>
            <p class="mt-4 font-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <div class="mt-4">
                @auth
                    <form action="{{ route('cart.add') }}" method="POST" class="flex items-center gap-2">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="number" name="qty" value="1" min="1" class="w-20 border rounded p-1">
                        <button class="px-3 py-2 text-green-600 font-semibold rounded">Add to cart</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="px-3 py-2 bg-gray-600 text-white rounded">Login to buy</a>
                @endauth
            </div>
        </div>
    </div>

    <a href="{{ route('products.index') }}" class="inline-block mt-6">Back to products</a>
</div>
@endsection
