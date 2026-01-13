<x-app-layout>
    <div class="py-12 animate-fade-up">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            
            <nav class="flex items-center text-sm font-medium text-gray-500 mb-8">
                <a href="{{ route('products.index') }}" class="hover:text-theme-main transition-colors flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Back to Shop
                </a>
                <span class="mx-3 text-gray-300">/</span>
                <span class="text-theme-main font-bold truncate">{{ $product->name }}</span>
            </nav>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-start">
                
                <div class="relative group">
                    <div class="aspect-square bg-white rounded-[2.5rem] border border-theme-soft shadow-xl overflow-hidden relative z-10 flex items-center justify-center p-8">
                        @if($product->image)
                            <img src="{{ Storage::url($product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="w-full h-full object-contain hover:scale-110 transition-transform duration-700 ease-out cursor-zoom-in">
                        @else
                            <div class="text-gray-300 flex flex-col items-center">
                                <svg class="w-32 h-32 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                <span class="text-lg font-medium">No Image Available</span>
                            </div>
                        @endif
                    </div>
                    
                    <div class="absolute -top-10 -left-10 w-72 h-72 bg-theme-main/20 rounded-full blur-3xl -z-0 opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                </div>

                <div class="space-y-8 relative z-10">
                    
                    <div>
                        <div class="flex items-center gap-3 mb-4">
                            @if($product->category)
                                <span class="px-3 py-1 text-xs font-bold uppercase tracking-wider text-theme-dark bg-theme-bg border border-theme-soft rounded-full">
                                    {{ $product->category->name }}
                                </span>
                            @endif
                            <div class="flex items-center text-yellow-400 text-sm">
                                ★★★★★ <span class="text-gray-400 ml-2 text-xs font-medium">(New Arrival)</span>
                            </div>
                        </div>

                        <h1 class="text-4xl lg:text-5xl font-black text-theme-dark leading-tight mb-4">
                            {{ $product->name }}
                        </h1>
                        
                        <p class="text-3xl font-bold text-theme-main">
                            Rp {{ number_format($product->price, 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="prose prose-stone text-gray-600 leading-relaxed border-t border-b border-theme-soft py-6">
                        <p>{{ $product->description ?? 'Tidak ada deskripsi untuk produk ini.' }}</p>
                    </div>

                    <div class="pt-2">
                        @auth
                            <form action="{{ route('cart.add') }}" method="POST" class="space-y-6">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                
                                <div>
                                    <label class="block text-sm font-bold text-theme-dark mb-2 uppercase tracking-wide">Quantity</label>
                                    <div class="flex items-center w-40 border border-theme-soft rounded-xl bg-white overflow-hidden shadow-sm">
                                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="w-12 h-12 flex items-center justify-center text-gray-500 hover:bg-theme-bg hover:text-theme-dark transition-colors font-bold text-xl">-</button>
                                        <input type="number" name="qty" value="1" min="1" class="w-full h-12 text-center border-none focus:ring-0 text-theme-dark font-black text-lg appearance-none bg-transparent">
                                        <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="w-12 h-12 flex items-center justify-center text-gray-500 hover:bg-theme-bg hover:text-theme-dark transition-colors font-bold text-xl">+</button>
                                    </div>
                                </div>

                                <button type="submit" class="w-full md:w-auto min-w-[200px] bg-theme-dark text-white font-bold text-lg py-4 px-8 rounded-2xl shadow-xl hover:bg-theme-main hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-3">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                                    Add to Cart
                                </button>
                            </form>
                        @else
                            <div class="bg-gray-50 border border-gray-200 rounded-2xl p-6 text-center">
                                <p class="text-gray-600 mb-4">Ingin membeli produk keren ini?</p>
                                <a href="{{ route('login') }}" class="inline-block bg-theme-dark text-white font-bold py-3 px-8 rounded-xl hover:bg-theme-main transition-colors shadow-lg">
                                    Login to Buy
                                </a>
                            </div>
                        @endauth
                    </div>

                    <div class="grid grid-cols-2 gap-4 mt-8">
                        <div class="flex items-center gap-3 p-4 rounded-xl bg-white border border-theme-soft shadow-sm hover:shadow-md transition-shadow">
                            <div class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-theme-dark">Eco-Friendly</p>
                                <p class="text-xs text-gray-500">Sustainable Materials</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 p-4 rounded-xl bg-white border border-theme-soft shadow-sm hover:shadow-md transition-shadow">
                            <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                            </div>
                            <div>
                                <p class="text-sm font-bold text-theme-dark">Guaranteed</p>
                                <p class="text-xs text-gray-500">Quality Checked</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>