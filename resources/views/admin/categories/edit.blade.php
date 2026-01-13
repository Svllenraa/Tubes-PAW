@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    
    <div class="text-center mb-8">
        <h1 class="text-3xl font-black text-theme-dark">Edit Category</h1>
        <p class="text-gray-500 mt-1">Update details for <span class="font-bold text-theme-main">{{ $category->name }}</span>.</p>
    </div>

    <div class="bg-white rounded-3xl border border-theme-soft shadow-lg p-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-32 h-32 bg-theme-main/10 rounded-full blur-2xl"></div>

        <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-6 relative z-10">
            @csrf @method('PUT')
            
            <div>
                <label class="block text-sm font-bold text-theme-dark mb-2">Category Name</label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}" 
                       class="w-full border-theme-soft rounded-xl focus:ring-theme-main focus:border-theme-main py-3 px-4 bg-gray-50 focus:bg-white transition-colors">
                @error('name')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-theme-dark mb-2">Slug (URL)</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400 text-sm font-mono">/</span>
                    <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" 
                           class="w-full pl-6 border-theme-soft rounded-xl focus:ring-theme-main focus:border-theme-main py-3 px-4 bg-gray-50 focus:bg-white transition-colors">
                </div>
                @error('slug')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="pt-4 flex items-center gap-4">
                <a href="{{ route('admin.categories.index') }}" class="flex-1 py-3 text-center rounded-xl border border-theme-soft text-gray-600 hover:bg-gray-50 transition-colors font-bold">
                    Cancel
                </a>
                <button type="submit" class="flex-1 py-3 rounded-xl bg-theme-dark text-white hover:bg-theme-main hover:shadow-lg transition-all transform hover:-translate-y-1 font-bold">
                    Update Category
                </button>
            </div>
        </form>
    </div>
</div>
@endsection