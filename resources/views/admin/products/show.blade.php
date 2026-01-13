@extends('layouts.app')

@section('content')
<div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <div class="flex justify-between items-center mb-8">
        <div class="flex items-center gap-2 text-sm text-gray-500">
            <a href="{{ route('admin.products.index') }}" class="hover:text-theme-main transition-colors">Products</a>
            <span>/</span>
            <span class="text-theme-dark font-bold">Details</span>
        </div>
        <a href="{{ route('admin.products.index') }}" class="text-sm font-bold text-theme-main hover:text-theme-dark transition-colors flex items-center gap-1">
            &larr; Back to List
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start">
        
        <div class="bg-white p-4 rounded-3xl border border-theme-soft shadow-sm">
            <div class="relative aspect-square rounded-2xl overflow-hidden bg-gray-50 flex items-center justify-center">
                @if($product->image)
                    <img src="{{ asset('storage/'.$product->image) }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                @else
                    <div class="text-gray-400 flex flex-col items-center">
                        <svg class="w-20 h-20 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <span>No Image Available</span>
                    </div>
                @endif
                
                @if($product->category)
                    <div class="absolute top-4 left-4">
                        <span class="px-4 py-2 bg-white/90 backdrop-blur-sm text-theme-dark text-sm font-bold rounded-full shadow-sm">
                            {{ $product->category->name }}
                        </span>
                    </div>
                @endif
            </div>
        </div>

        <div class="space-y-8">
            <div>
                <h1 class="text-4xl font-black text-theme-dark mb-2">{{ $product->name }}</h1>
                <div class="flex items-center gap-3">
                    <span class="text-2xl font-bold text-theme-main">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                    <span class="text-sm text-gray-400">|</span>
                    <span class="text-sm text-gray-500">ID: #{{ $product->id }}</span>
                </div>
            </div>

            <div class="bg-white p-6 rounded-2xl border border-theme-soft shadow-sm">
                <h3 class="text-sm font-bold text-gray-400 uppercase tracking-wider mb-4">Description</h3>
                <div class="prose prose-stone text-gray-600 leading-relaxed">
                    {{ $product->description ?? 'No description provided.' }}
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 pt-4 border-t border-theme-soft">
                <a href="{{ route('admin.products.edit', $product) }}" class="flex-1 flex justify-center items-center gap-2 px-6 py-4 bg-theme-dark text-white font-bold rounded-xl hover:bg-theme-main transition-all shadow-lg hover:shadow-xl hover:-translate-y-1">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    Edit Product
                </a>
                
                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="flex-1" onsubmit="return confirm('Delete this product permanently?');">
                    @csrf @method('DELETE')
                    <button type="submit" class="w-full flex justify-center items-center gap-2 px-6 py-4 bg-white border-2 border-red-100 text-red-500 font-bold rounded-xl hover:bg-red-50 hover:border-red-200 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        Delete Product
                    </button>
                </form>
            </div>
            
            <div class="text-xs text-gray-400 text-center">
                Last updated: {{ $product->updated_at->format('d M Y, H:i') }}
            </div>
        </div>

    </div>
</div>
@endsection