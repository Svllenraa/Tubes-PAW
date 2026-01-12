@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-theme-dark">Our Collection</h1>
    </div>

    <div class="mb-8 bg-white/60 p-4 rounded-xl border border-theme-soft shadow-sm">
        <form method="GET" action="{{ route('products.index') }}" class="flex flex-col sm:flex-row gap-3">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Search products..." 
                class="border-theme-soft rounded-lg p-2.5 w-full sm:w-64 focus:ring-theme-main focus:border-theme-main bg-white">
            
            <select name="category_id" class="border-theme-soft rounded-lg p-2.5 focus:ring-theme-main focus:border-theme-main bg-white text-gray-700">
                <option value="">All categories</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected(request('category_id') == $cat->id)>{{ $cat->name }}</option>
                @endforeach
            </select>
            
            <button class="px-5 py-2.5 bg-theme-main text-white font-medium rounded-lg hover:bg-theme-dark transition-colors shadow-sm">
                Search
            </button>
        </form>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($products as $product)
            <div class="group bg-white rounded-xl border border-theme-soft overflow-hidden hover:shadow-lg transition-all duration-300 flex flex-col h-full">
                @if($product->image)
                    <div class="relative overflow-hidden h-48 w-full">
                        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" 
                             class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                    </div>
                @else
                    <div class="h-48 w-full bg-theme-soft/30 flex items-center justify-center text-theme-dark/50">
                        No Image
                    </div>
                @endif
               
                <div class="p-5 flex flex-col flex-grow">
                    <div class="mb-2">
                         <span class="text-xs font-bold uppercase tracking-wider text-theme-main bg-theme-bg px-2 py-1 rounded-md">
                            {{ $product->category?->name ?? 'Uncategorized' }}
                        </span>
                    </div>
                    
                    <h2 class="font-bold text-xl text-theme-dark mb-1 hover:text-theme-main transition-colors">
                        <a href="{{ route('products.show', $product) }}">
                            {{ $product->name }}
                        </a>
                    </h2>
                    
                    <p class="text-lg font-semibold text-gray-600 mb-4">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>

                    <div class="mt-auto pt-4 border-t border-gray-100">
                        @auth
                            <form action="{{ route('cart.add') }}" method="POST" class="flex gap-2 items-center w-full">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="number" name="qty" value="1" min="1" 
                                       class="w-16 border-theme-soft rounded-lg p-2 text-center focus:ring-theme-main focus:border-theme-main">
                                
                                <button class="flex-1 px-4 py-2 bg-theme-dark text-white font-medium rounded-lg hover:bg-theme-main transition-colors">
                                    + Add to Cart
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="block text-center w-full px-4 py-2 bg-theme-soft text-theme-dark font-medium rounded-lg hover:bg-theme-main hover:text-white transition-colors">
                                Login to Buy
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <p class="text-theme-dark text-lg">No products found matching your criteria.</p>
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $products->links() }}
    </div>
</div>
@endsection