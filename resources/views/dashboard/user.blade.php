<div class="space-y-8">
    <div class="max-w-2xl mx-auto">
        <form action="{{ route('dashboard') }}" method="GET" class="relative">
            <input type="text" name="q" value="{{ request('q') }}" 
                   placeholder="Cari produk ramah lingkungan..." 
                   class="w-full px-4 py-3 pl-12 border border-gray-200 rounded-full shadow-sm outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent">
            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <button type="submit" class="absolute px-4 py-1 text-white transition-colors bg-green-500 rounded-full right-2 top-2 hover:bg-green-600">
                Cari
            </button>
        </form>
    </div>

    <a href="{{ $bannerProduct ? route('products.show', $bannerProduct->slug) : '#' }}" class="block p-6 text-white transition-all rounded-xl bg-gradient-to-r from-green-400 to-blue-500 hover:shadow-lg">
        @if($bannerProduct && $bannerProduct->image)
            <div class="flex flex-col items-center md:flex-row md:justify-around">
                <img src="{{ asset('storage/' . $bannerProduct->image) }}" alt="Banner" class="object-cover w-40 h-40 mb-4 rounded-lg shadow-md md:mb-0">
                <div class="text-center md:text-left">
                    <h3 class="text-2xl italic font-bold">Rekomendasi Hari Ini</h3>
                    <p class="text-lg opacity-90">{{ $bannerProduct->name }}</p>
                    <span class="inline-block px-4 py-1 mt-2 text-sm rounded-full bg-white/20">Lihat Detail →</span>
                </div>
            </div>
        @else
            <div class="text-center">
                <div class="flex items-center justify-center w-24 h-24 mx-auto mb-4 text-4xl rounded-full bg-white/20">♻️</div>
                <h3 class="text-xl font-bold">Produk Ramah Lingkungan</h3>
                <p class="text-sm opacity-90">Mulai langkah hijau kamu dari sini</p>
            </div>
        @endif
    </a>

    <div>
        <h4 class="flex items-center mb-4 text-lg font-bold text-gray-800">
            <span class="w-2 h-6 mr-2 bg-green-500 rounded-full"></span>
            Kategori Barang
        </h4>
        <div class="grid grid-cols-2 gap-4 md:grid-cols-3">
            @foreach(['Kemasan Makanan' => '🍽️', 'Kemasan Minuman' => '🥤', 'Kemasan Pakaian' => '👕'] as $name => $emoji)
            <a href="{{ route('categories.show', Str::slug($name)) }}" class="block p-4 transition-all bg-white border border-gray-100 rounded-xl hover:border-green-400 hover:shadow-md group">
                <div class="text-center">
                    <span class="block mb-2 text-4xl transition-transform group-hover:scale-110">{{ $emoji }}</span>
                    <h5 class="font-semibold text-gray-700">{{ $name }}</h5>
                    <p class="text-xs text-gray-400">Jelajahi produk</p>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    <div>
        <h4 class="flex items-center mb-4 text-lg font-bold text-gray-800">
            <span class="w-2 h-6 mr-2 bg-blue-500 rounded-full"></span>
            {{ request('q') ? 'Hasil Pencarian: "'.request('q').'"' : 'Barang yang Paling Dicari' }}
        </h4>
        
        @if($popularProducts->isEmpty())
            <div class="p-10 text-center border-2 border-gray-200 border-dashed bg-gray-50 rounded-xl">
                <p class="text-gray-500">Yah, produk yang kamu cari tidak ditemukan. Coba kata kunci lain!</p>
            </div>
        @else
            <div class="grid grid-cols-2 gap-4 md:grid-cols-5">
                @foreach($popularProducts as $product)
                <a href="{{ route('products.show', $product->slug) }}" class="flex flex-col p-3 transition-all bg-white border border-gray-100 rounded-xl hover:shadow-xl group">
                    <div class="relative mb-3 overflow-hidden rounded-lg aspect-square">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="object-cover w-full h-full transition-transform duration-300 group-hover:scale-110">
                        @else
                            <div class="flex items-center justify-center w-full h-full text-gray-400 bg-gray-100">No Image</div>
                        @endif
                        <div class="absolute px-2 py-1 rounded-md shadow-sm top-2 right-2 bg-white/90">
                            <span class="text-xs font-bold text-green-600">Terlaris</span>
                        </div>
                    </div>
                    
                    <h5 class="text-sm font-semibold text-gray-800 truncate">{{ $product->name }}</h5>
                    <p class="mb-2 text-xs text-gray-500">{{ $product->category->name ?? 'Uncategorized' }}</p>
                    
                    <div class="flex items-center mb-3">
                        <div class="flex text-yellow-400">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20">
                                    <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                </svg>
                            @endfor
                        </div>
                        <span class="ml-1 text-[10px] font-bold text-gray-400">(4.9)</span>
                    </div>

                    <div class="mt-auto">
                        <p class="text-sm font-black text-green-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        @endif
    </div>

    <div class="pt-4 text-center">
        <a href="{{ route('products.index') }}" class="inline-flex items-center px-6 py-3 font-bold text-white transition-all bg-blue-600 rounded-full hover:bg-blue-700 hover:shadow-lg active:scale-95">
            Lihat Produk Lainnya
            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </a>
    </div>
</div>