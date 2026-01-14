<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <div class="lg:col-span-2 space-y-6">
        
        <div>
            <label class="block text-sm font-bold text-theme-dark mb-2">Product Name</label>
            <input type="text" name="name" 
                   value="{{ old('name', $product->name ?? '') }}" 
                   class="w-full border-theme-soft rounded-xl focus:ring-theme-main focus:border-theme-main py-3 px-4 bg-gray-50 focus:bg-white transition-colors"
                   placeholder="e.g. Organic Cotton T-Shirt">
            @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-bold text-theme-dark mb-2">Description</label>
            <textarea name="description" rows="5" 
                      class="w-full border-theme-soft rounded-xl focus:ring-theme-main focus:border-theme-main py-3 px-4 bg-gray-50 focus:bg-white transition-colors resize-none"
                      placeholder="Explain your product details here...">{{ old('description', $product->description ?? '') }}</textarea>
            @error('description')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-theme-dark mb-2">Price (IDR)</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-500 text-sm">Rp</span>
                    <input type="number" step="1" name="price" 
                           value="{{ old('price', $product->price ?? '') }}" 
                           class="w-full pl-10 border-theme-soft rounded-xl focus:ring-theme-main focus:border-theme-main py-3 px-4 bg-gray-50 focus:bg-white transition-colors"
                           placeholder="0">
                </div>
                @error('price')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-theme-dark mb-2">Category</label>
                <select name="category_id" 
                        class="w-full border-theme-soft rounded-xl focus:ring-theme-main focus:border-theme-main py-3 px-4 bg-gray-50 focus:bg-white transition-colors cursor-pointer">
                    <option value="">-- Select Category --</option>
                    @foreach($categories ?? [] as $cat)
                        <option value="{{ $cat->id }}" {{ (string)($cat->id) === (string) old('category_id', $product->category_id ?? '') ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>
        </div>
    </div>

    <div class="lg:col-span-1">
        <label class="block text-sm font-bold text-theme-dark mb-2">Product Image</label>
        
        <div class="relative w-full h-80 bg-gray-50 border-2 border-dashed border-theme-soft rounded-2xl flex flex-col items-center justify-center overflow-hidden hover:bg-theme-bg/30 transition-colors group">
            
            <input type="file" name="image" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10">
            
            @if(!empty($product->image))
                <img src="{{ asset('storage/'.$product->image) }}" class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/50 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                    <p class="text-white font-medium text-sm">Click to Change</p>
                </div>
            @else
                <div class="text-center p-6 space-y-3">
                    <div class="w-12 h-12 bg-theme-main/20 text-theme-main rounded-full flex items-center justify-center mx-auto">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <p class="text-gray-500 text-sm">Drag & Drop or <span class="text-theme-main font-bold">Click</span> to Upload</p>
                    <p class="text-xs text-gray-400">JPG, PNG</p>
                </div>
            @endif
        </div>
        @error('image')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-8 pt-6 border-t border-theme-soft flex justify-end gap-4">
    <a href="{{ route('admin.products.index') }}" class="px-6 py-3 rounded-xl border border-theme-soft text-gray-600 hover:bg-gray-50 transition-colors font-medium">
        Cancel
    </a>
    <button type="submit" class="px-6 py-3 rounded-xl bg-theme-dark text-white hover:bg-theme-main hover:shadow-lg transition-all transform hover:-translate-y-1 font-bold">
        Save Product
    </button>
</div>