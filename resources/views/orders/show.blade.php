@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Receipt - Order #{{ $order->number }}</h1>

    <div class="mb-4">
        <strong>Placed:</strong> {{ $order->created_at->format('d M Y H:i') }}<br>
        <strong>Recipient:</strong> {{ $order->recipient_name }}<br>
        <strong>Address:</strong> {{ $order->address }}<br>
        @if($order->phone)<strong>Phone:</strong> {{ $order->phone }}<br>@endif
    </div>

    <table class="table w-full">
        <thead>
            <tr><th class="text-left">Product</th><th>Price</th><th>Qty</th><th>Subtotal</th></tr>
        </thead>
        <tbody>
            @foreach($order->items as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>Rp {{ number_format($item->price,0,',','.') }}</td>
                <td>{{ $item->quantity }}</td>
                <td>Rp {{ number_format($item->price * $item->quantity,0,',','.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4 text-right">
        <strong>Total: Rp {{ number_format($order->total,0,',','.') }}</strong>
    </div>

    <div class="mt-4">
        <a href="{{ route('orders.index') }}" class="text-indigo-600">Back to My Orders</a>
    </div>
</div>
@endsection
