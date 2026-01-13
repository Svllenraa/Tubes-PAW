@extends('layouts.app')

@section('content')
<div class="px-4 py-8 mx-auto max-w-7xl">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold text-theme-dark">{{ $categoryName }}</h1>
            <p class="text-sm text-gray-600 mt-1">Produk dalam kategori {{ $categoryName }}</p>
        </div>
    </div>

    <!-- Kategori Lainnya -->
    <div class="mb-6">
        <h2 class="mb-3 text-lg font-semibold text-theme-dark">Kategori Lainnya</h2>
        <div class="flex flex-wrap gap-2">
            @foreach($categories as $cat)
                @if($cat->id != $category->id)
                    <a href="{{ route('categories.show', $cat->slug) }}" class="px-3 py-2 text-sm font-medium text-theme-main bg-theme-bg rounded-lg hover:bg-theme-main hover:text-white transition-colors">
                        {{ $cat->name }}
                    </a>
                @endif
            @endforeach
        </div>
    </div>

    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
        @forelse($products as $product)
            <div class="flex flex-col h-full overflow-hidden transition-all duration-300 bg-white border group rounded-xl border-theme-soft hover:shadow-lg">

                <div class="relative w-full h-48 overflow-hidden bg-gray-100">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}"
                             alt="{{ $product->name }}"
                             class="object-cover w-full h-full transition-transform duration-500 transform group-hover:scale-105"
                             onerror="this.onerror=null;this.src='https://placehold.co/600x400?text=File+Tidak+Ada';">
                    @else
                        <div class="flex items-center justify-center w-full h-full text-xs italic text-theme-dark/50">
                            No Image Available
                        </div>
                    @endif
                </div>

                <div class="flex flex-col flex-grow p-5">
                    <div class="mb-2">
                        <span class="inline-block px-2 py-1 text-xs font-bold tracking-wider uppercase rounded-md text-theme-main bg-theme-bg">
                            {{ $category->name }}
                        </span>
                    </div>

                    <h2 class="mb-1 text-xl font-bold transition-colors text-theme-dark hover:text-theme-main">
                        <a href="{{ route('products.show', $product) }}">
                            {{ $product->name }}
                        </a>
                    </h2>

                    <p class="mb-4 text-lg font-semibold text-gray-600">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>

                    <div class="pt-4 mt-auto border-t border-gray-100">
                        @auth
                            <form action="{{ route('cart.add') }}" method="POST" class="flex items-center w-full gap-2">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="number" name="qty" value="1" min="1"
                                       class="w-16 p-2 text-center rounded-lg border-theme-soft focus:ring-theme-main focus:border-theme-main">

                                <button class="flex-1 px-4 py-2 font-medium text-white transition-colors rounded-lg bg-theme-dark hover:bg-theme-main">
                                    + Add to Cart
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="block w-full px-4 py-2 font-medium text-center transition-colors rounded-lg bg-theme-soft text-theme-dark hover:bg-theme-main hover:text-white">
                                Login to Buy
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <div class="py-12 text-center col-span-full">
                <p class="text-lg text-theme-dark">Tidak ada produk dalam kategori ini.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
@endsection
