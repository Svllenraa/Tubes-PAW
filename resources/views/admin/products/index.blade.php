@extends('layouts.app')

@section('content')
<div class="container p-4 mx-auto">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">Products</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Create Product</a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-600">{{ session('success') }}</div>
    @endif

    <form method="GET" class="flex items-end gap-2 mb-4">
        <div>
            <label class="block text-sm">Search</label>
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Name" class="px-2 py-1 border">
        </div>
        <div>
            <label class="block text-sm">Category</label>
            <select name="category_id" class="px-2 py-1 border">
                <option value="">-- All --</option>
                @foreach($categories ?? [] as $cat)
                    <option value="{{ $cat->id }}" {{ (string)$cat->id === (string) request('category_id') ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button class="btn btn-secondary" type="submit">Filter</button>
            <a href="{{ route('admin.products.index') }}" class="ml-2">Clear</a>
        </div>
    </form>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Category</th>
                <th class="px-4 py-2">Price</th>
                <th class="px-4 py-2">Image</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td class="px-4 py-2 border">{{ $product->id }}</td>
                <td class="px-4 py-2 border">{{ $product->name }}</td>
                <td class="px-4 py-2 border">{{ optional($product->category)->name ?? '-' }}</td>
                <td class="px-4 py-2 border">{{ number_format($product->price,2) }}</td>
                <td class="px-4 py-2 border">@if($product->image)<img src="{{ asset('storage/'.$product->image) }}" alt="" class="w-16">@endif</td>
                <td class="px-4 py-2 border">
                    <a href="{{ route('admin.products.edit', $product) }}" class="text-blue-600">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="ml-2 text-red-600" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">{{ $products->links() }}</div>
</div>
@endsection