@extends('layouts.app')

@section('content')
<div class="container">
    <h1>My Orders</h1>

    @forelse($orders as $order)
    <div class="border rounded p-4 mb-3">
        <div class="flex justify-between">
            <div>
                <strong>Order #{{ $order->number }}</strong>
                <div>{{ $order->created_at->format('d M Y H:i') }}</div>
                <div>Recipient: {{ $order->recipient_name }}</div>
            </div>
            <div class="text-right">
                <div>Total: Rp {{ number_format($order->total,0,',','.') }}</div>
                <a href="{{ route('orders.show', $order) }}" class="text-indigo-600">View receipt</a>
            </div>
        </div>
    </div>
    @empty
    <p>No orders found.</p>
    @endforelse

    <div class="mt-4">{{ $orders->links() }}</div>
</div>
@endsection
