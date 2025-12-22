@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4">
    <h1 class="text-2xl font-bold mb-4">Products</h1>

    <div class="mb-4">
        <form method="GET" action="{{ route('products.index') }}" class="flex gap-2">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Search..." class="border rounded p-2 w-64">
            <select name="category_id" class="border rounded p-2">
                <option value="">All categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected(request('category_id') == $cat->id)>{{ $cat->name }}</option>
                @endforeach
            </select>
            <button class="px-3 py-2 bg-indigo-600 text-white rounded">Filter</button>
        </form>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($products as $product)
            <div class="border rounded p-4">
                @if($product->image)
                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-full h-40 object-cover mb-2">
                @endif
                <h2 class="font-semibold text-lg"><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h2>
                <p class="text-sm text-gray-600">{{ $product->category?->name }}</p>
                <p class="mt-2 font-medium">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                <div class="mt-3">
                    @auth
                        <form action="{{ route('cart.add') }}" method="POST" class="flex gap-2 items-center">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="number" name="qty" value="1" min="1" class="w-20 border rounded p-1">
                            <button class="px-2 py-1 text-green-600 font-semibold rounded text-sm">Add</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="px-2 py-1 bg-gray-600 text-white rounded text-sm">Login to buy</a>
                    @endauth
                </div>
            </div>
        @empty
            <p>No products found.</p>
        @endforelse
    </div>

    <div class="mt-6">{{ $products->links() }}</div>
</div>
@endsection
