@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Edit Product</h1>
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf @method('PUT')
        @include('admin.products._form')
        <div>
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.products.index') }}" class="ml-2">Cancel</a>
        </div>
    </form>
</div>
@endsection
