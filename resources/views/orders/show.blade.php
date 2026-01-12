@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-4">
    
    <a href="{{ route('orders.index') }}" class="inline-flex items-center text-gray-500 hover:text-theme-dark mb-6 transition-colors">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke List Order
    </a>

    <div class="bg-white shadow-lg rounded-2xl overflow-hidden border border-theme-soft">
        
        <div class="bg-theme-bg/50 p-6 border-b border-theme-soft flex flex-col md:flex-row justify-between md:items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-theme-dark">Order Receipt</h1>
                <p class="text-theme-main font-mono text-sm tracking-wide">#{{ $order->number }}</p>
            </div>
            <div class="text-right">
                <span class="px-3 py-1 bg-theme-main text-white text-sm font-bold rounded-full uppercase tracking-wider">
                    Success
                </span>
            </div>
        </div>

        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-8 text-sm text-gray-600">
            <div>
                <h3 class="font-bold text-theme-dark mb-2 uppercase text-xs tracking-wider">Detail Pesanan</h3>
                <p class="mb-1"><span class="w-24 inline-block text-gray-400">Tanggal:</span> {{ $order->created_at->format('d M Y, H:i') }}</p>
                @if($order->phone)
                <p class="mb-1"><span class="w-24 inline-block text-gray-400">No. HP:</span> {{ $order->phone }}</p>
                @endif
            </div>
            <div>
                <h3 class="font-bold text-theme-dark mb-2 uppercase text-xs tracking-wider">Alamat Pengiriman</h3>
                <p class="font-medium text-gray-800">{{ $order->recipient_name }}</p>
                <p class="mt-1 leading-relaxed">{{ $order->address }}</p>
            </div>
        </div>

        <div class="px-6 pb-6">
            <div class="overflow-hidden border border-theme-soft rounded-lg">
                <table class="w-full text-sm text-left">
                    <thead class="bg-theme-main text-white uppercase text-xs tracking-wider font-semibold">
                        <tr>
                            <th class="px-4 py-3">Produk</th>
                            <th class="px-4 py-3 text-right">Harga</th>
                            <th class="px-4 py-3 text-center">Qty</th>
                            <th class="px-4 py-3 text-right">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($order->items as $item)
                        <tr class="hover:bg-theme-bg/30 transition-colors">
                            <td class="px-4 py-3 font-medium text-gray-800">{{ $item->product->name }}</td>
                            <td class="px-4 py-3 text-right text-gray-500">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 text-center text-gray-500">{{ $item->quantity }}</td>
                            <td class="px-4 py-3 text-right font-medium text-theme-dark">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="bg-gray-50">
                        <tr>
                            <td colspan="3" class="px-4 py-4 text-right font-bold text-gray-600 uppercase text-xs tracking-wider">Total Pembayaran</td>
                            <td class="px-4 py-4 text-right text-lg font-bold text-theme-dark">
                                Rp {{ number_format($order->total, 0, ',', '.') }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection