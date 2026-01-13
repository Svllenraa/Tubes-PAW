@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-black text-theme-dark">Product Catalog</h1>
            <p class="text-gray-500 text-sm mt-1">Manage all your store items here.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 bg-theme-dark text-white px-6 py-3 rounded-xl font-bold hover:bg-theme-main transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Add New Product
        </a>
=======
<div class="container p-4 mx-auto">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold">Products</h1>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Create Product</a>
>>>>>>> 609a96e8df8e2084c4a1da769e7a26f85c7bb058
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl flex items-center gap-2 animate-fade-up">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            {{ session('success') }}
        </div>
    @endif

<<<<<<< HEAD
    <div class="bg-white p-4 rounded-2xl border border-theme-soft shadow-sm mb-6">
        <form method="GET" class="flex flex-col md:flex-row gap-4">
            
            <div class="flex-1 relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Search product name..." 
                       class="pl-10 w-full border-theme-soft rounded-xl focus:ring-theme-main focus:border-theme-main py-2.5 bg-gray-50 focus:bg-white transition-colors">
            </div>

            <div class="w-full md:w-64">
                <select name="category_id" class="w-full border-theme-soft rounded-xl focus:ring-theme-main focus:border-theme-main py-2.5 bg-gray-50 focus:bg-white transition-colors cursor-pointer">
                    <option value="">-- All Categories --</option>
                    @foreach($categories ?? [] as $cat)
                        <option value="{{ $cat->id }}" {{ (string)$cat->id === (string) request('category_id') ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
=======
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
>>>>>>> 609a96e8df8e2084c4a1da769e7a26f85c7bb058

            <div class="flex gap-2">
                <button class="px-6 py-2.5 bg-theme-main text-white font-bold rounded-xl hover:bg-theme-dark transition-colors shadow-sm">
                    Filter
                </button>
                @if(request('q') || request('category_id'))
                    <a href="{{ route('admin.products.index') }}" class="px-4 py-2.5 bg-gray-100 text-gray-600 font-bold rounded-xl hover:bg-gray-200 transition-colors flex items-center justify-center">
                        Clear
                    </a>
                @endif
            </div>
        </form>
    </div>

    <div class="bg-white border border-theme-soft rounded-2xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-theme-bg/50 border-b border-theme-soft text-theme-dark uppercase text-xs tracking-wider">
                        <th class="px-6 py-4 font-bold">Product Info</th>
                        <th class="px-6 py-4 font-bold">Category</th>
                        <th class="px-6 py-4 font-bold text-right">Price</th>
                        <th class="px-6 py-4 font-bold text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($products as $product)
                    <tr class="hover:bg-gray-50 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-100 border border-gray-200 shrink-0 group-hover:border-theme-main transition-colors">
                                    @if($product->image)
                                        <img src="{{ asset('storage/'.$product->image) }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <div class="font-bold text-theme-dark text-lg">{{ $product->name }}</div>
                                    <div class="text-xs text-gray-500">ID: #{{ $product->id }}</div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            @if($product->category)
                                <span class="px-3 py-1 bg-theme-bg text-theme-dark text-xs font-bold rounded-full border border-theme-soft">
                                    {{ $product->category->name }}
                                </span>
                            @else
                                <span class="text-gray-400 text-sm italic">Uncategorized</span>
                            @endif
                        </td>

                        <td class="px-6 py-4 text-right">
                            <span class="font-bold text-theme-dark">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('admin.products.edit', $product) }}" title="Edit" class="p-2 text-yellow-500 hover:bg-yellow-50 rounded-lg transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete {{ $product->name }}?');">
                                    @csrf @method('DELETE')
                                    <button type="submit" title="Delete" class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path></svg>
                                </div>
                                <p class="text-lg font-medium">No products found.</p>
                                <p class="text-sm">Try adjusting your search or add a new product.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
</div>
@endsection