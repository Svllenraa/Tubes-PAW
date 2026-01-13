@extends('layouts.app')

@section('content')
<div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-black text-theme-dark">Edit Product</h1>
            <p class="text-gray-500 text-sm mt-1">Update details for <span class="font-bold text-theme-main">{{ $product->name }}</span>.</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="text-sm font-bold text-theme-main hover:text-theme-dark transition-colors flex items-center gap-1">
            &larr; Back to List
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-theme-soft shadow-sm p-8">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('admin.products._form')
        </form>
    </div>
</div>
@endsection