@extends('layouts.app')

@section('content')
<div class="min-h-screen py-12 px-4 sm:px-6 lg:px-8 bg-theme-bg">
    
    <div class="max-w-6xl mx-auto mb-8 text-center lg:text-left">
        <h1 class="text-3xl font-black text-theme-dark tracking-tight">Checkout</h1>
        <p class="text-gray-500 mt-1">Selesaikan pesananmu dan kami akan segera mengirimkannya.</p>
    </div>

    <div class="max-w-6xl mx-auto">
        <form method="POST" action="{{ route('checkout.store') }}">
            @csrf

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
                
                <div class="lg:col-span-2 space-y-6">
                    
                    @if($errors->any())
                        <div class="bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl flex items-center gap-2 animate-pulse">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            <span>{{ $errors->first() }}</span>
                        </div>
                    @endif

                    <div class="bg-white p-6 sm:p-8 rounded-3xl border border-theme-soft shadow-sm">
                        <h2 class="text-xl font-bold text-theme-dark mb-6 flex items-center gap-2">
                            <span class="w-8 h-8 bg-theme-bg rounded-lg flex items-center justify-center text-theme-dark">1</span>
                            Informasi Pengiriman
                        </h2>

                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-bold text-theme-dark mb-2">Nama Penerima</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    </div>
                                    <input type="text" name="recipient_name" 
                                           class="pl-10 block w-full border-theme-soft rounded-xl focus:ring-theme-main focus:border-theme-main py-3 transition-colors bg-gray-50 focus:bg-white" 
                                           required value="{{ old('recipient_name') }}" placeholder="Contoh: Budi Santoso">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-theme-dark mb-2">Nomor WhatsApp / HP</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                    </div>
                                    <input type="text" name="phone" 
                                           class="pl-10 block w-full border-theme-soft rounded-xl focus:ring-theme-main focus:border-theme-main py-3 transition-colors bg-gray-50 focus:bg-white" 
                                           value="{{ old('phone') }}" placeholder="08123456789">
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-theme-dark mb-2">Alamat Lengkap</label>
                                <div class="relative">
                                    <textarea name="address" rows="4" 
                                              class="block w-full border-theme-soft rounded-xl focus:ring-theme-main focus:border-theme-main py-3 px-4 transition-colors bg-gray-50 focus:bg-white resize-none" 
                                              required placeholder="Nama Jalan, No. Rumah, Kecamatan, Kota, Kode Pos...">{{ old('address') }}</textarea>
                                </div>
                                <p class="text-xs text-gray-400 mt-2 text-right">Pastikan alamat jelas agar kurir tidak nyasar.</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="block lg:hidden">
                         <a href="{{ route('cart.index') }}" class="text-theme-dark font-medium hover:underline">&larr; Kembali ke Keranjang</a>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-white p-6 rounded-3xl border border-theme-soft shadow-lg sticky top-24">
                        <h3 class="text-lg font-bold text-theme-dark mb-4 pb-4 border-b border-theme-soft">Ringkasan Pesanan</h3>
                        
                        <div class="space-y-4 max-h-60 overflow-y-auto pr-2 custom-scrollbar mb-6">
                            @foreach($items as $it)
                            <div class="flex justify-between items-start text-sm">
                                <div class="flex gap-3">
                                    <div class="w-6 h-6 bg-theme-bg rounded flex items-center justify-center text-xs font-bold text-theme-dark shrink-0">
                                        {{ $it['qty'] }}x
                                    </div>
                                    <span class="text-gray-600 line-clamp-2">{{ $it['product']->name }}</span>
                                </div>
                                <span class="font-medium text-theme-dark whitespace-nowrap">
                                    Rp {{ number_format($it['product']->price * $it['qty'], 0, ',', '.') }}
                                </span>
                            </div>
                            @endforeach
                        </div>

                        <div class="border-t border-dashed border-theme-soft pt-4 space-y-2">
                            <div class="flex justify-between text-gray-500 text-sm">
                                <span>Subtotal</span>
                                <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between text-gray-500 text-sm">
                                <span>Ongkos Kirim</span>
                                <span class="text-theme-main font-medium">Gratis</span>
                            </div>
                            <div class="flex justify-between items-center pt-2 mt-2 border-t border-theme-soft">
                                <span class="text-lg font-bold text-theme-dark">Total Bayar</span>
                                <span class="text-2xl font-black text-theme-dark">Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                        </div>

                        <button class="w-full mt-8 py-4 bg-theme-dark text-white font-bold rounded-xl shadow-lg hover:bg-theme-main hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex justify-center items-center gap-2">
                            <span>Buat Pesanan</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </button>

                        <div class="mt-6 grid grid-cols-3 gap-2 text-center">
                            <div class="flex flex-col items-center gap-1">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                <span class="text-[10px] text-gray-400 uppercase tracking-wide">Secure</span>
                            </div>
                            <div class="flex flex-col items-center gap-1">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                                <span class="text-[10px] text-gray-400 uppercase tracking-wide">Fast</span>
                            </div>
                            <div class="flex flex-col items-center gap-1">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                <span class="text-[10px] text-gray-400 uppercase tracking-wide">Support</span>
                            </div>
                        </div>

                        <div class="mt-6 text-center lg:block hidden">
                             <a href="{{ route('cart.index') }}" class="text-sm text-gray-400 hover:text-theme-dark transition-colors">Ubah Pesanan</a>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection