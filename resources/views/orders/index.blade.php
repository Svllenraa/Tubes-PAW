@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-theme-dark mb-8">Riwayat Pesanan</h1>

    <div class="space-y-6">
        @forelse($orders as $order)
        <div class="bg-white border border-theme-soft rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow duration-300">
            <div class="flex flex-col md:flex-row justify-between md:items-center gap-4">
                
                <div class="space-y-1">
                    <div class="flex items-center gap-3">
                        <span class="text-lg font-bold text-theme-dark">Order #{{ $order->number }}</span>
                        <span class="px-2 py-1 text-xs font-bold uppercase bg-theme-bg text-theme-dark rounded">
                            {{ $order->status ?? 'Processed' }}
                        </span>
                    </div>
                    <p class="text-sm text-gray-500 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        {{ $order->created_at->format('d M Y, H:i') }} WIB
                    </p>
                    <p class="text-sm text-gray-600">
                        Penerima: <span class="font-medium">{{ $order->recipient_name }}</span>
                    </p>
                </div>

                <div class="flex flex-row md:flex-col justify-between items-center md:items-end gap-4 md:gap-1">
                    <div class="text-right">
                        <span class="text-xs text-gray-500">Total Belanja</span>
                        <div class="text-xl font-bold text-theme-main">
                            Rp {{ number_format($order->total, 0, ',', '.') }}
                        </div>
                    </div>
                    
                    <a href="{{ route('orders.show', $order) }}" 
                       class="inline-flex items-center px-4 py-2 bg-theme-dark text-white text-sm font-medium rounded-lg hover:bg-theme-main transition-colors mt-2">
                        Lihat Detail &rarr;
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="text-center py-16 bg-white border border-dashed border-theme-soft rounded-xl">
            <svg class="w-16 h-16 mx-auto text-theme-soft mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
            <h3 class="text-lg font-medium text-theme-dark">Belum ada pesanan</h3>
            <p class="text-gray-500 mb-6">Yuk mulai belanja koleksi terbaik kami!</p>
            <a href="{{ route('products.index') }}" class="px-6 py-2 bg-theme-main text-white rounded-lg hover:bg-theme-dark transition-colors">
                Browse Products
            </a>
        </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $orders->links() }}
    </div>
</div>
@endsection