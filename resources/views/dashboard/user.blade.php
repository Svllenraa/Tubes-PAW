<div class="space-y-8">
    <!-- Gambar Sampah Daur Ulang -->
    <a href="{{ $bannerProduct ? route('products.show', $bannerProduct->slug) : '#' }}" class="block bg-gradient-to-r from-green-400 to-blue-500 rounded-lg p-6 text-white hover:opacity-90 transition-opacity">
        @if($bannerProduct && $bannerProduct->image)
            <div class="text-center">
                <img src="{{ asset('storage/' . $bannerProduct->image) }}" alt="Sampah Daur Ulang" class="w-48 h-48 object-cover rounded-lg mx-auto mb-4">
                <h3 class="text-xl font-bold">Sampah Daur Ulang</h3>
                <p class="text-sm opacity-90">{{ $bannerProduct->name }}</p>
            </div>
        @else
            <div class="text-center">
                <div class="w-48 h-48 bg-white/20 rounded-lg mx-auto mb-4 flex items-center justify-center">
                    <span class="text-4xl">♻️</span>
                </div>
                <h3 class="text-xl font-bold">Sampah Daur Ulang</h3>
                <p class="text-sm opacity-90">Produk ramah lingkungan</p>
            </div>
        @endif
    </a>

    <!-- Menu Kategori Barang -->
    <div>
        <h4 class="text-lg font-semibold mb-4">Kategori Barang</h4>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach($categories as $category)
                <div class="bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow">
                    <h5 class="font-medium">{{ $category->name }}</h5>
                    <p class="text-sm text-gray-600">Kategori produk</p>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Barang yang Paling Dicari -->
    <div>
        <h4 class="text-lg font-semibold mb-4">Barang yang Paling Dicari</h4>
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
            @foreach($popularProducts as $product)
                <a href="{{ route('products.show', $product->slug) }}" class="block bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow hover:bg-gray-50">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-32 object-cover rounded mb-2">
                    @endif
                    <h5 class="font-medium text-sm">{{ $product->name }}</h5>
                    <p class="text-xs text-gray-600">{{ $product->category->name ?? 'N/A' }}</p>
                    <p class="text-sm font-bold text-green-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                </a>
            @endforeach
        </div>
    </div>

    <!-- Navigasi ke Produk Lainnya -->
    <div class="text-center">
        <a href="{{ route('products.index') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition-colors">
            Lihat Produk Lainnya
        </a>
    </div>
</div>
