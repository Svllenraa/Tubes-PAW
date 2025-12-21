@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">{{ $product->name }}</h1>
    @if($product->image)
        <img src="{{ asset('storage/'.$product->image) }}" class="w-48 mb-4">
    @endif
    <p class="mb-2">Price: {{ number_format($product->price,2) }}</p>
    <div>{{ $product->description }}</div>
    <a href="{{ route('admin.products.index') }}" class="mt-4 inline-block">Back</a>
</div>
@endsection
