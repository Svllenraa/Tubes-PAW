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

<div class="space-y-16 animate-fade-up pb-12"> <div class="flex flex-col md:flex-row justify-between items-end gap-6 px-4 sm:px-0">
        <div>
            <h2 class="text-4xl font-black text-theme-dark">
                Hello, {{ Auth::user()->name }}! 🌿
            </h2>
            <p class="text-gray-500 mt-2 text-lg">Siap untuk gaya hidup yang lebih hijau hari ini?</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('orders.index') }}" class="group flex items-center gap-3 bg-white border border-theme-soft px-5 py-3 rounded-2xl hover:border-theme-main transition-all shadow-sm hover:shadow-md">
                <div class="bg-theme-bg p-2 rounded-lg text-theme-dark group-hover:bg-theme-dark group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                </div>
                <div>
                    <p class="text-xs text-gray-400 font-bold uppercase">My Orders</p>
                    <p class="text-theme-dark font-bold">Cek Status</p>
                </div>
            </a>
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
                @else
                    <h3 class="text-4xl md:text-5xl font-black leading-tight">Sustainable<br>Living Starts Here.</h3>
                    <p class="text-theme-soft text-lg max-w-md leading-relaxed">Jelajahi koleksi produk ramah lingkungan kami.</p>
                    <div class="pt-4">
                        <a href="{{ route('products.index') }}" class="inline-flex items-center gap-2 bg-white text-theme-dark px-8 py-4 rounded-xl font-bold hover:bg-theme-main hover:text-white transition-all transform hover:-translate-y-1 shadow-lg">
                            Mulai Belanja <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
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
                    <div class="w-24 h-24 bg-white/80 backdrop-blur-xl border border-white/50 rounded-3xl flex items-center justify-center shadow-sm mb-6 group-hover:scale-110 group-hover:shadow-md group-hover:bg-white transition-all duration-500 relative overflow-hidden">
                        <div class="absolute inset-0 bg-theme-main/20 opacity-0 group-hover:opacity-100 blur-xl transition-opacity duration-500"></div>
                        <svg class="w-12 h-12 text-theme-dark group-hover:text-theme-main transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 15.97V8.03C21 5.27614 18.7614 3.03 16 3.03H8C5.23858 3.03 3 5.27614 3 8.03V15.97C3 18.7239 5.23858 20.97 8 20.97H16C18.7614 20.97 21 18.7239 21 15.97Z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12H21"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 12V20.97"/></svg>
                    </div>
                    <h5 class="text-2xl font-black text-theme-dark mb-1">Kemasan Makanan</h5>
                    <p class="text-theme-main font-bold text-sm uppercase tracking-wider translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                        Food Packaging &rarr;
                    </p>
                </div>
            </a>
            
            <a href="{{ route('categories.show', 'kemasan-minuman') }}" class="group relative overflow-hidden rounded-[2.5rem] h-80 border border-theme-soft hover:border-theme-main transition-all duration-500">
                <div class="absolute inset-0 bg-gradient-to-br from-theme-bg via-white to-theme-bg group-hover:from-theme-main/10 group-hover:via-white group-hover:to-theme-main/5 transition-all duration-500"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center z-10 p-6">
                    <div class="w-24 h-24 bg-white/80 backdrop-blur-xl border border-white/50 rounded-3xl flex items-center justify-center shadow-sm mb-6 group-hover:scale-110 group-hover:shadow-md group-hover:bg-white transition-all duration-500 relative overflow-hidden">
                        <div class="absolute inset-0 bg-theme-main/20 opacity-0 group-hover:opacity-100 blur-xl transition-opacity duration-500"></div>
                        <svg class="w-12 h-12 text-theme-dark group-hover:text-theme-main transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18.75 9.5625V18.1875C18.75 20.5631 16.8256 22.5 14.4375 22.5H9.5625C7.17437 22.5 5.25 20.5631 5.25 18.1875V9.5625M21 9.5625C21 11.9381 19.0756 13.875 16.6875 13.875H7.3125C4.92437 13.875 3 11.9381 3 9.5625C3 7.18687 4.92437 5.25 7.3125 5.25H16.6875C19.0756 5.25 21 7.18687 21 9.5625Z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 5.25V1.5"/></svg>
                    </div>
                    <h5 class="text-2xl font-black text-theme-dark mb-1">Kemasan Minuman</h5>
                    <p class="text-theme-main font-bold text-sm uppercase tracking-wider translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                        Drink Containers &rarr;
                    </p>
                </div>
            </a>

            <a href="{{ route('categories.show', 'kemasan-pakaian') }}" class="group relative overflow-hidden rounded-[2.5rem] h-80 border border-theme-soft hover:border-theme-main transition-all duration-500">
                <div class="absolute inset-0 bg-gradient-to-br from-theme-bg via-white to-theme-bg group-hover:from-theme-main/10 group-hover:via-white group-hover:to-theme-main/5 transition-all duration-500"></div>
                <div class="absolute inset-0 flex flex-col items-center justify-center z-10 p-6">
                    <div class="w-24 h-24 bg-white/80 backdrop-blur-xl border border-white/50 rounded-3xl flex items-center justify-center shadow-sm mb-6 group-hover:scale-110 group-hover:shadow-md group-hover:bg-white transition-all duration-500 relative overflow-hidden">
                        <div class="absolute inset-0 bg-theme-main/20 opacity-0 group-hover:opacity-100 blur-xl transition-opacity duration-500"></div>
                        <svg class="w-12 h-12 text-theme-dark group-hover:text-theme-main transition-colors duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                    </div>
                    <h5 class="text-2xl font-black text-theme-dark mb-1">Kemasan Pakaian</h5>
                    <p class="text-theme-main font-bold text-sm uppercase tracking-wider translate-y-4 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-500">
                        Eco Apparel &rarr;
                    </p>
                </div>
            </a>
        </div>
    </div>

    <div class="px-4 sm:px-0">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h4 class="text-2xl font-bold text-theme-dark">Trending Now 🔥</h4>
                <p class="text-gray-500 text-sm mt-1">Produk paling dicari minggu ini.</p>
            </div>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-6">
            @foreach($popularProducts as $product)
                <a href="{{ route('products.show', $product->slug) }}" class="card-zoom group bg-white border border-theme-soft rounded-2xl overflow-hidden hover:shadow-xl hover:border-theme-main transition-all duration-300 relative flex flex-col">
                    <div class="aspect-square bg-gray-50 relative overflow-hidden">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-300 bg-gray-100">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <span class="bg-white text-theme-dark text-xs font-bold px-4 py-2 rounded-full shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-transform">View Product</span>
                        </div>
                    </div>
                    <div class="p-4 flex flex-col flex-grow">
                        <p class="text-xs text-theme-main font-bold uppercase mb-1">{{ $product->category->name ?? 'Product' }}</p>
                        <h5 class="font-bold text-gray-800 text-sm mb-2 line-clamp-2 flex-grow">{{ $product->name }}</h5>
                        <div class="flex items-center justify-between mt-2">
                            <p class="text-base font-black text-theme-dark">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <div class="bg-theme-soft/30 rounded-[3rem] p-12 text-center border border-theme-soft relative overflow-hidden mx-4 sm:mx-0">
        <div class="relative z-10">
            <h2 class="text-3xl font-black text-theme-dark mb-4">Belum menemukan yang dicari?</h2>
            <p class="text-gray-600 mb-8 max-w-xl mx-auto">Kami memiliki ratusan produk ramah lingkungan lainnya.</p>
            <a href="{{ route('products.index') }}" class="inline-block px-10 py-4 bg-theme-dark text-white font-bold rounded-xl shadow-lg hover:bg-theme-main transition-colors transform hover:-translate-y-1">
                Jelajahi Semua Produk &rarr;
            </a>
        </div>
        <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-white rounded-full opacity-50 blur-3xl"></div>
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-theme-main/20 rounded-full blur-3xl"></div>
    </div>

</div>