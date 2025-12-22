@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Keranjang</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(empty($items))
        <p>Keranjang kosong.</p>
    @else
        <table class="table">
            <thead>
                <tr><th>Produk</th><th>Harga</th><th>Qty</th><th>Subtotal</th><th></th></tr>
            </thead>
            <tbody>
                @foreach($items as $it)
                <tr>
                    <td>{{ $it['product']->name }}</td>
                    <td>{{ number_format($it['product']->price,0,',','.') }}</td>
                    <td>
                        <form action="{{ route('cart.update') }}" method="POST" style="display:inline">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $it['product']->id }}">
                            <input type="number" name="qty" value="{{ $it['qty'] }}" min="0" style="width:70px">
                            <button class="btn btn-sm btn-primary">Update</button>
                        </form>
                    </td>
                    <td>{{ number_format(($it['product']->price*$it['qty']),0,',','.') }}</td>
                    <td>
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $it['product']->id }}">
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center">
            <strong>Total: Rp {{ number_format($total,0,',','.') }}</strong>
            <a href="{{ route('checkout.create') }}" class="btn btn-success">Checkout</a>
        </div>
    @endif
</div>
@endsection
