<style>
    @keyframes float {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }
    .animate-float { animation: float 6s ease-in-out infinite; }
    .card-zoom:hover img { transform: scale(1.1); }
    .card-zoom img { transition: transform 0.5s ease; }
</style>

<div class="pb-12 space-y-12 animate-fade-up">
    <div class="flex flex-col items-center justify-between gap-6 px-4 md:flex-row sm:px-0">
        <div>
            <h2 class="text-4xl font-black text-gray-800">
                Hello, {{ Auth::user()->name }}! 🌿
            </h2>
            <p class="mt-2 text-lg text-gray-500">Siap untuk gaya hidup yang lebih hijau hari ini?</p>
        </div>
        
        <div class="w-full md:w-1/3">
            <form action="{{ route('dashboard') }}" method="GET" class="relative">
                <input type="text" name="q" value="{{ request('q') }}" 
                       placeholder="Cari produk..." 
                       class="w-full px-4 py-3 pl-12 border border-gray-200 shadow-sm outline-none rounded-2xl focus:ring-2 focus:ring-green-400 focus:border-transparent">
                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </form>
        </div>
    </div>

    <div class="relative overflow-hidden rounded-[2.5rem] bg-gray-900 text-white shadow-2xl group mx-4 sm:mx-0">
        <div class="relative z-10 grid items-center grid-cols-1 md:grid-cols-2">
            <div class="p-10 space-y-6 md:p-16">
                <span class="inline-block px-3 py-1 text-xs font-bold tracking-wider text-green-400 uppercase border rounded-full bg-green-500/20 border-green-500/30">
                    Recommended for You
                </span>
                
                @if($bannerProduct)
                    <h3 class="text-4xl font-black leading-tight md:text-5xl">{{ $bannerProduct->name }}</h3>
                    <p class="max-w-md text-lg leading-relaxed text-gray-400">Produk pilihan minggu ini. Kualitas premium, ramah lingkungan.</p>
                    <div class="pt-4">
                        <a href="{{ route('products.show', $bannerProduct->slug) }}" class="inline-flex items-center gap-2 px-8 py-4 font-bold text-gray-900 transition-all transform bg-white shadow-lg rounded-xl hover:bg-green-500 hover:text-white hover:-translate-y-1">
                            Lihat Detail <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                @else
                    <h3 class="text-4xl font-black leading-tight md:text-5xl">Sustainable Living.</h3>
                    <p class="text-lg text-gray-400">Jelajahi koleksi produk kami.</p>
                @endif
            </div>
            
            <div class="relative h-64 md:h-full min-h-[300px] flex items-center justify-center bg-green-500/5">
                @if($bannerProduct && $bannerProduct->image)
                    <img src="{{ asset('storage/' . $bannerProduct->image) }}" alt="Hero Product" class="object-contain w-3/4 md:w-2/3 drop-shadow-2xl animate-float rounded-2xl">
                @else
                    <div class="text-8xl animate-float">🌱</div>
                @endif
            </div>
        </div>
    </div>

    <div class="px-4 sm:px-0">
        <h4 class="mb-8 text-2xl font-bold text-gray-800">Explore Categories</h4>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
            @foreach(['Kemasan Makanan' => '🍽️', 'Kemasan Minuman' => '🥤', 'Kemasan Pakaian' => '👕'] as $name => $emoji)
            <a href="{{ route('categories.show', Str::slug($name)) }}" class="group relative overflow-hidden rounded-[2.5rem] h-48 border border-gray-100 bg-white hover:border-green-400 transition-all duration-500 shadow-sm hover:shadow-md">
                <div class="absolute inset-0 z-10 flex flex-col items-center justify-center p-6">
                    <span class="mb-2 text-4xl transition-transform group-hover:scale-110">{{ $emoji }}</span>
                    <h5 class="text-xl font-black text-gray-800">{{ $name }}</h5>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    <div class="px-4 sm:px-0">
        <h4 class="mb-8 text-2xl font-bold text-gray-800">
            {{ request('q') ? 'Hasil Pencarian: "'.request('q').'"' : 'Trending Now 🔥' }}
        </h4>
        
        @if($popularProducts->isEmpty())
            <div class="p-10 text-center border-2 border-gray-200 border-dashed bg-gray-50 rounded-[2rem]">
                <p class="italic text-gray-500">Yah, produk tidak ditemukan. Coba kata kunci lain!</p>
            </div>
        @else
            <div class="grid grid-cols-2 gap-6 md:grid-cols-4 lg:grid-cols-5">
                @foreach($popularProducts as $product)
                <a href="{{ route('products.show', $product->slug) }}" class="flex flex-col overflow-hidden transition-all duration-300 bg-white border border-gray-100 shadow-sm card-zoom group rounded-2xl hover:shadow-xl hover:border-green-500">
                    <div class="relative overflow-hidden aspect-square bg-gray-50">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="object-cover w-full h-full">
                        @else
                            <div class="flex items-center justify-center w-full h-full text-gray-300 bg-gray-100">♻️</div>
                        @endif
                    </div>
                    
                    <div class="flex flex-col flex-grow p-4">
                        <p class="text-[10px] text-green-600 font-bold uppercase mb-1">{{ $product->category->name ?? 'Eco Product' }}</p>
                        <h5 class="mb-2 text-sm font-bold text-gray-800 line-clamp-1">{{ $product->name }}</h5>
                        
                        <div class="flex items-center mb-3">
                            <div class="flex text-yellow-400">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                @endfor
                            </div>
                            <span class="ml-1 text-[10px] font-bold text-gray-400">(4.9)</span>
                        </div>

                        <div class="mt-auto">
                            <p class="text-base font-black text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        @endif
    </div>
</div>