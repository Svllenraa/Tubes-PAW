@extends('layouts.app')

@section('content')
<div class="px-4 py-8 mx-auto max-w-7xl">
    <div class="text-center mb-12">
        <h1 class="text-4xl font-black text-theme-dark mb-4">Pilih Kategori Produk</h1>
        <p class="text-gray-600 text-lg">Jelajahi berbagai kategori produk ramah lingkungan kami</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($categories as $category)
            <a href="{{ route('categories.show', $category->slug) }}" class="group bg-white border border-theme-soft rounded-2xl p-8 hover:shadow-xl hover:border-theme-main transition-all duration-300 text-center">
                <div class="w-20 h-20 bg-theme-bg rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-theme-main group-hover:text-white transition-colors">
                    <span class="text-3xl">
                        @if($category->slug == 'kemasan-makanan')
                            🍽️
                        @elseif($category->slug == 'kemasan-minuman')
                            🥤
                        @elseif($category->slug == 'kemasan-pakaian')
                            👕
                        @else
                            📦
                        @endif
                    </span>
                </div>
                <h3 class="text-2xl font-bold text-theme-dark mb-2">{{ $category->name }}</h3>
                <p class="text-gray-600 mb-4">{{ $category->products->count() }} produk tersedia</p>
                <span class="inline-block text-theme-main font-bold group-hover:text-theme-dark transition-colors">
                    Jelajahi Kategori &rarr;
                </span>
            </a>
        @endforeach
    </div>

    <div class="text-center mt-12">
        <a href="{{ route('products.index') }}" class="inline-block px-8 py-4 bg-theme-dark text-white font-bold rounded-xl shadow-lg hover:bg-theme-main transition-colors">
            Lihat Semua Produk
        </a>
    </div>
</div>
@endsection
