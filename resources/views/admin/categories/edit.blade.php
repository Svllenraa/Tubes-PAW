@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Category</h1>
    <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')
        <div>
            <label class="block">Name</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" class="w-full border px-2 py-1">
            @error('name')<div class="text-red-600">{{ $message }}</div>@enderror
        </div>
        <div>
            <label class="block">Slug (optional)</label>
            <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" class="w-full border px-2 py-1">
            @error('slug')<div class="text-red-600">{{ $message }}</div>@enderror
        </div>
        <div>
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.categories.index') }}" class="ml-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
