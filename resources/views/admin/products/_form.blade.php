<div>
    <label class="block">Name</label>
    <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" class="w-full border px-2 py-1">
    @error('name')<div class="text-red-600">{{ $message }}</div>@enderror
</div>
<div>
    <label class="block">Description</label>
    <textarea name="description" class="w-full border px-2 py-1">{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')<div class="text-red-600">{{ $message }}</div>@enderror
</div>
<div>
    <label class="block">Price</label>
    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price ?? '0.00') }}" class="w-full border px-2 py-1">
    @error('price')<div class="text-red-600">{{ $message }}</div>@enderror
</div>
<div>
    <label class="block">Image</label>
    <input type="file" name="image" class="w-full">
    @if(!empty($product->image))
        <div class="mt-2"><img src="{{ asset('storage/'.$product->image) }}" class="w-24"></div>
    @endif
    @error('image')<div class="text-red-600">{{ $message }}</div>@enderror
</div>
