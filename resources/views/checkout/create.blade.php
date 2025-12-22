@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Checkout</h1>

    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif

    <table class="table">
        <thead><tr><th>Produk</th><th>Harga</th><th>Qty</th><th>Subtotal</th></tr></thead>
        <tbody>
            @foreach($items as $it)
            <tr>
                <td>{{ $it['product']->name }}</td>
                <td>{{ number_format($it['product']->price,0,',','.') }}</td>
                <td>{{ $it['qty'] }}</td>
                <td>{{ number_format($it['product']->price*$it['qty'],0,',','.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mb-3">Total: <strong>Rp {{ number_format($total,0,',','.') }}</strong></div>

    <form method="POST" action="{{ route('checkout.store') }}">
        @csrf

        <div class="mb-3">
            <label class="block">Recipient name</label>
            <input type="text" name="recipient_name" class="border rounded p-2 w-full" required value="{{ old('recipient_name') }}">
        </div>

        <div class="mb-3">
            <label class="block">Address</label>
            <textarea name="address" class="border rounded p-2 w-full" rows="3" required>{{ old('address') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="block">Phone (optional)</label>
            <input type="text" name="phone" class="border rounded p-2 w-full" value="{{ old('phone') }}">
        </div>

        <button class="btn btn-primary">Place Order</button>
    </form>
</div>
@endsection
