@extends('layouts.app')

@section('content')
<div class="min-h-screen py-12 bg-gray-50">
    {{-- Detail Produk Utama --}}
    <div class="px-4 mx-auto mb-20 max-w-7xl">
        <div class="flex flex-col md:flex-row gap-12 bg-white p-8 rounded-[2.5rem] shadow-sm border border-gray-100">
            {{-- Foto --}}
            <div class="md:w-1/2">
                <img src="{{ $product->image ? asset('storage/'.$product->image) : asset('images/logo-bajamas.png') }}" 
                     class="object-cover w-full shadow-inner aspect-square rounded-3xl">
            </div>
            {{-- Deskripsi --}}
            <div class="flex flex-col justify-center md:w-1/2">
                <span class="mb-2 text-sm italic font-black tracking-widest uppercase text-theme-main">
                    {{ optional($product->category)->name }}
                </span>
                <h1 class="mb-4 text-4xl italic font-black leading-tight uppercase text-theme-dark">{{ $product->name }}</h1>
                <p class="mb-6 text-3xl font-black text-theme-main">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                
                <div class="mb-10 leading-relaxed text-gray-500">
                    {{ $product->description }}
                </div>

                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="w-full px-12 py-4 font-black tracking-widest text-white uppercase transition-all transform shadow-lg md:w-max bg-theme-dark rounded-2xl hover:bg-theme-main hover:-translate-y-1">
                        Tambah Ke Keranjang
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- SECTION PRODUK TERKAIT --}}
    <div class="px-4 mx-auto max-w-7xl">
        <div class="flex items-center gap-4 mb-10">
            <h2 class="text-2xl italic font-black uppercase text-theme-dark whitespace-nowrap">Produk Terkait</h2>
            <div class="h-[2px] w-full bg-gray-200 rounded-full"></div>
        </div>

        <div class="grid grid-cols-2 gap-8 md:grid-cols-4">
            @forelse($relatedProducts as $related)
                <div class="group bg-white rounded-[2rem] border border-gray-100 overflow-hidden hover:shadow-2xl transition-all duration-500">
                    <a href="{{ route('products.show', $related->slug ?? $related->id) }}" class="block overflow-hidden aspect-square">
                        <img src="{{ $related->image ? asset('storage/'.$related->image) : asset('images/logo-bajamas.png') }}" 
                             class="object-cover w-full h-full transition-transform duration-700 group-hover:scale-110">
                    </a>
                    <div class="p-6">
                        <h3 class="mb-1 text-xs italic font-bold uppercase truncate text-theme-dark">{{ $related->name }}</h3>
                        <p class="text-base font-black text-theme-main">Rp {{ number_format($related->price, 0, ',', '.') }}</p>
                        <a href="{{ route('products.show', $related->slug ?? $related->id) }}" class="mt-4 block text-center py-2 bg-gray-50 text-theme-dark rounded-xl font-black text-[10px] uppercase tracking-widest hover:bg-theme-main hover:text-white transition-all">
                            Cek Detail
                        </a>
                    </div>
                </div>
            @empty
                <div class="py-10 text-center col-span-full">
                    <p class="italic text-gray-400">Tidak ada produk terkait lainnya.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection