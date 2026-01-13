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

<div class="space-y-16 animate-fade-up pb-12"> 
    <div class="flex flex-col md:flex-row justify-between items-end gap-6 px-4 sm:px-0">
        <div>
            <h2 class="text-4xl font-black text-theme-dark">
                Hello, {{ Auth::user()->name }}! 🌿
            </h2>
            <p class="text-gray-500 mt-2 text-lg">Siap untuk gaya hidup yang lebih hijau hari ini?</p>
        </div>
        
        <div class="w-full md:w-1/2 lg:w-1/3">
            <form action="{{ route('dashboard') }}" method="GET" class="relative">
                <input type="text" name="q" value="{{ request('q') }}" 
                       placeholder="Cari produk ramah lingkungan..." 
                       class="w-full px-5 py-3 pl-12 bg-white border border-theme-soft rounded-2xl focus:border-theme-main focus:ring-1 focus:ring-theme-main outline-none text-base shadow-sm transition-all">
                <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                    <svg class="w-5 h-5 text-theme-dark opacity-40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </form>
        </div>
    </div>

    <div class="relative overflow-hidden rounded-[2.5rem] bg-theme-dark text-white shadow-2xl group mx-4 sm:mx-0">
        <div class="absolute top-0 right-0 w-full h-full opacity-10">
            <svg class="w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0 100 C 20 0 50 0 100 100 Z" fill="white" />
            </svg>
        </div>
        <div class="relative z-10 grid grid-cols-1 md:grid-cols-2 items-center">
            <div class="p-10 md:p-16 space-y-6">
                <span class="inline-block py-1 px-3 rounded-full bg-theme-main/20 border border-theme-main/30 text-theme-soft text-xs font-bold uppercase tracking-wider mb-2">
                    Recommended for You
                </span>
                @if($bannerProduct)
                    <h3 class="text-4xl md:text-5xl font-black leading-tight">{{ $bannerProduct->name }}</h3>
                    <p class="text-theme-soft text-lg max-w-md leading-relaxed">Produk daur ulang pilihan minggu ini. Kualitas premium, ramah lingkungan.</p>
                    <div class="pt-4">
                        <a href="{{ route('products.show', $bannerProduct->slug) }}" class="inline-flex items-center gap-2 bg-white text-theme-dark px-8 py-4 rounded-xl font-bold hover:bg-theme-main hover:text-white transition-all transform hover:-translate-y-1 shadow-lg">
                            Lihat Detail <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                @endif
            </div>
            <div class="relative h-64 md:h-full min-h-[300px] flex items-center justify-center bg-theme-main/10">
                @if($bannerProduct && $bannerProduct->image)
                    <img src="{{ asset('storage/' . $bannerProduct->image) }}" alt="Hero Product" class="w-3/4 md:w-2/3 object-contain drop-shadow-2xl animate-float rounded-2xl">
                @else
                    <div class="w-48 h-48 bg-white/10 backdrop-blur-md border border-white/20 rounded-full flex items-center justify-center animate-float"><span class="text-8xl filter drop-shadow-lg">🌱</span></div>
                @endif
            </div>
        </div>
    </div>

    <div class="px-4 sm:px-0">
        <div class="flex items-center justify-between mb-8">
            <h4 class="text-2xl font-bold text-theme-dark">Explore Categories</h4>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('categories.show', 'kemasan-makanan') }}" class="group relative overflow-hidden rounded-[2.5rem] h-80 border border-theme-soft hover:border-theme-main transition-all duration-500">
                <div class="absolute inset-0 bg-gradient-to-br from-theme-bg via-white to-theme-bg group-hover:from-theme-main/10 group-hover:via-white group-hover:to-theme-main/5 transition-all duration-500"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center z-10 p-6">
                    <div class="w-24 h-24 bg-white/80 backdrop-blur-xl border border-white/50 rounded-3xl flex items-center justify-center shadow-sm mb-6 group-hover:scale-110 group-hover:shadow-md group-hover:bg-white transition-all duration-500">
                        <span class="text-4xl">🍽️</span>
                    </div>
                    <h5 class="text-2xl font-black text-theme-dark mb-1">Kemasan Makanan</h5>
                </div>
            </a>
            <a href="{{ route('categories.show', 'kemasan-minuman') }}" class="group relative overflow-hidden rounded-[2.5rem] h-80 border border-theme-soft hover:border-theme-main transition-all duration-500">
                <div class="absolute inset-0 bg-gradient-to-br from-theme-bg via-white to-theme-bg group-hover:from-theme-main/10 group-hover:via-white group-hover:to-theme-main/5 transition-all duration-500"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center z-10 p-6">
                    <div class="w-24 h-24 bg-white/80 backdrop-blur-xl border border-white/50 rounded-3xl flex items-center justify-center shadow-sm mb-6 group-hover:scale-110 group-hover:shadow-md group-hover:bg-white transition-all duration-500">
                        <span class="text-4xl">🥤</span>
                    </div>
                    <h5 class="text-2xl font-black text-theme-dark mb-1">Kemasan Minuman</h5>
                </div>
            </a>
            <a href="{{ route('categories.show', 'kemasan-pakaian') }}" class="group relative overflow-hidden rounded-[2.5rem] h-80 border border-theme-soft hover:border-theme-main transition-all duration-500">
                <div class="absolute inset-0 bg-gradient-to-br from-theme-bg via-white to-theme-bg group-hover:from-theme-main/10 group-hover:via-white group-hover:to-theme-main/5 transition-all duration-500"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center z-10 p-6">
                    <div class="w-24 h-24 bg-white/80 backdrop-blur-xl border border-white/50 rounded-3xl flex items-center justify-center shadow-sm mb-6 group-hover:scale-110 group-hover:shadow-md group-hover:bg-white transition-all duration-500">
                        <span class="text-4xl">👕</span>
                    </div>
                    <h5 class="text-2xl font-black text-theme-dark mb-1">Kemasan Pakaian</h5>
                </div>
            </a>
        </div>
    </div>

    <div class="px-4 sm:px-0">
        <div class="flex items-center justify-between mb-8">
            <h4 class="text-2xl font-bold text-theme-dark">
                {{ request('q') ? 'Hasil Pencarian: "'.request('q').'"' : 'Trending Now 🔥' }}
            </h4>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @foreach($popularProducts as $product)
                <a href="{{ route('products.show', $product->slug) }}" class="card-zoom group bg-white border border-theme-soft rounded-2xl overflow-hidden hover:shadow-xl hover:border-theme-main transition-all duration-300 relative flex flex-col shadow-sm">
                    <div class="aspect-square bg-gray-50 relative overflow-hidden">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-300 bg-gray-100">♻️</div>
                        @endif
                    </div>
                    <div class="p-4 flex flex-col flex-grow">
                        <p class="text-xs text-theme-main font-bold uppercase mb-1">{{ $product->category->name ?? 'Product' }}</p>
                        <h5 class="font-bold text-gray-800 text-sm mb-1 line-clamp-2">{{ $product->name }}</h5>
                        
                        <div class="flex items-center mb-3 text-yellow-400">
                            @for($i=0;$i<5;$i++)
                                <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                            @endfor
                            <span class="text-gray-400 text-[10px] ml-1">(5.0)</span>
                        </div>

                        <div class="flex items-center justify-between mt-auto">
                            <p class="text-base font-black text-theme-dark">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>