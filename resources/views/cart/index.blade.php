@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-theme-dark mb-6">Keranjang Belanja</h1>

    {{-- Alert Success --}}
    @if(session('success'))
        <div class="mb-6 bg-theme-main/20 border border-theme-main text-theme-dark px-4 py-3 rounded-lg flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    @if(empty($items))
        {{-- Tampilan Kosong --}}
        <div class="text-center py-16 bg-white border border-dashed border-theme-soft rounded-xl shadow-sm">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-theme-bg rounded-full mb-4 text-theme-dark">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
            <h3 class="text-xl font-bold text-theme-dark">Keranjangmu masih kosong</h3>
            <p class="text-gray-500 mt-2 mb-6">Sepertinya kamu belum menambahkan apapun.</p>
            <a href="{{ route('products.index') }}" class="px-6 py-3 bg-theme-dark text-white font-medium rounded-lg hover:bg-theme-main transition-colors shadow-lg">
                Mulai Belanja
            </a>
        </div>
    @else
        <div class="flex flex-col lg:flex-row gap-8">
            
            {{-- KOLOM KIRI: Daftar Barang --}}
            <div class="lg:w-2/3">
                <div class="bg-white border border-theme-soft rounded-xl shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-theme-bg text-theme-dark text-sm uppercase tracking-wider font-semibold border-b border-theme-soft">
                                <tr>
                                    <th class="px-6 py-4">Produk</th>
                                    <th class="px-6 py-4">Harga</th>
                                    <th class="px-6 py-4">Qty</th>
                                    <th class="px-6 py-4 text-right">Subtotal</th>
                                    <th class="px-6 py-4"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @foreach($items as $it)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    {{-- Nama Produk --}}
                                    <td class="px-6 py-4 font-medium text-theme-dark">
                                        {{ $it['product']->name }}
                                    </td>
                                    
                                    {{-- Harga Satuan --}}
                                    <td class="px-6 py-4 text-gray-500">
                                        Rp {{ number_format($it['product']->price, 0, ',', '.') }}
                                    </td>

                                    {{-- Form Update Qty --}}
                                    <td class="px-6 py-4">
                                        <form action="{{ route('cart.update') }}" method="POST" class="flex items-center gap-2">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $it['product']->id }}">
                                            
                                            <input type="number" name="qty" value="{{ $it['qty'] }}" min="1" 
                                                   class="w-16 border-theme-soft rounded-lg p-2 text-center text-sm focus:ring-theme-main focus:border-theme-main">
                                            
                                            {{-- Tombol Update (Checkmark) --}}
                                            <button title="Update Quantity" class="p-2 text-theme-main hover:text-theme-dark hover:bg-theme-bg rounded-full transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                                            </button>
                                        </form>
                                    </td>

                                    {{-- Subtotal --}}
                                    <td class="px-6 py-4 text-right font-bold text-theme-dark">
                                        Rp {{ number_format(($it['product']->price * $it['qty']), 0, ',', '.') }}
                                    </td>

                                    {{-- Tombol Hapus (Sampah) --}}
                                    <td class="px-6 py-4 text-right">
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $it['product']->id }}">
                                            <button class="text-red-400 hover:text-red-600 transition-colors p-2 hover:bg-red-50 rounded-lg">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{-- Tombol Lanjut Belanja (Mobile/Bawah Tabel) --}}
                    <div class="p-4 bg-gray-50 border-t border-gray-100 lg:hidden">
                        <a href="{{ route('products.index') }}" class="text-sm text-theme-main hover:text-theme-dark flex items-center gap-1">
                            &larr; Lanjut Belanja
                        </a>
                    </div>
                </div>
            </div>

            {{-- KOLOM KANAN: Ringkasan Belanja (Summary) --}}
            <div class="lg:w-1/3">
                <div class="bg-white border border-theme-soft rounded-xl p-6 shadow-sm sticky top-24">
                    <h2 class="text-lg font-bold text-theme-dark mb-4 pb-4 border-b border-theme-soft">Ringkasan Pesanan</h2>
                    
                    <div class="flex justify-between items-center mb-6">
                        <span class="text-gray-600">Total Belanja</span>
                        <span class="text-2xl font-bold text-theme-dark">Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>

                    <div class="space-y-3">
                        <a href="{{ route('checkout.create') }}" class="block w-full py-3 bg-theme-dark text-white text-center font-bold rounded-xl hover:bg-theme-main hover:shadow-lg transition-all transform hover:-translate-y-1">
                            Checkout Sekarang &rarr;
                        </a>
                        
                        <a href="{{ route('products.index') }}" class="block w-full py-3 bg-transparent border border-theme-soft text-theme-dark text-center font-medium rounded-xl hover:bg-theme-bg transition-colors">
                            Lanjut Belanja
                        </a>
                    </div>

                    <div class="mt-6 pt-4 border-t border-gray-100">
                        <div class="flex items-center justify-center gap-2 text-xs text-gray-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            Transaksi Aman & Terenkripsi
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endif
</div>
@endsection