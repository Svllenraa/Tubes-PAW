<x-app-layout>
    <x-slot name="header">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="font-black text-2xl text-theme-dark leading-tight flex items-center gap-3">
                    <a href="{{ route('admin.orders.index') }}" class="text-gray-400 hover:text-theme-main transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    </a>
                    Order Details <span class="text-gray-400">#{{ $order->id }}</span>
                </h2>
            </div>
            
            @php
                $statusColors = [
                    'pending' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                    'processing' => 'bg-blue-100 text-blue-800 border-blue-200',
                    'shipped' => 'bg-purple-100 text-purple-800 border-purple-200',
                    'delivered' => 'bg-green-100 text-green-800 border-green-200',
                    'cancelled' => 'bg-red-100 text-red-800 border-red-200',
                ];
                $statusBadge = $statusColors[$order->status] ?? 'bg-gray-100 text-gray-800';
            @endphp
            <div class="px-4 py-2 rounded-xl border {{ $statusBadge }} font-bold uppercase tracking-wider text-sm flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-current animate-pulse"></span>
                {{ $order->status }}
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white border border-theme-soft rounded-[2rem] shadow-sm overflow-hidden p-8">
                        <h3 class="text-xl font-bold text-theme-dark mb-6 flex items-center gap-2">
                            <svg class="w-6 h-6 text-theme-main" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                            Items Ordered
                        </h3>
                        
                        <div class="overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="border-b border-gray-100 text-gray-500 text-sm uppercase tracking-wider">
                                    <tr>
                                        <th class="py-4 font-bold">Product</th>
                                        <th class="py-4 font-bold text-center">Qty</th>
                                        <th class="py-4 font-bold text-right">Price</th>
                                        <th class="py-4 font-bold text-right">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-50">
                                    @foreach($order->items as $item)
                                        <tr>
                                            <td class="py-4">
                                                <div class="flex items-center gap-4">
                                                    <div class="h-16 w-16 rounded-xl bg-gray-100 border border-gray-100 flex-shrink-0 overflow-hidden">
                                                        @if($item->product && $item->product->image)
                                                            <img src="{{ asset('storage/' . $item->product->image) }}" class="w-full h-full object-cover">
                                                        @else
                                                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div>
                                                        <p class="font-bold text-theme-dark">{{ $item->product->name ?? 'Product Deleted' }}</p>
                                                        <p class="text-xs text-gray-400">SKU: #{{ $item->product_id }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-4 text-center font-bold text-gray-600">x{{ $item->quantity }}</td>
                                            <td class="py-4 text-right text-gray-600">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                            <td class="py-4 text-right font-bold text-theme-dark">Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="border-t-2 border-theme-soft">
                                    <tr>
                                        <td colspan="3" class="pt-6 text-right text-gray-500">Subtotal</td>
                                        <td class="pt-6 text-right font-bold text-gray-800">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="pt-2 text-right text-gray-500">Shipping (Flat)</td>
                                        <td class="pt-2 text-right font-bold text-theme-main">Free</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="pt-4 text-right text-xl font-bold text-theme-dark">Grand Total</td>
                                        <td class="pt-4 text-right text-2xl font-black text-theme-dark">Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    
                    <div class="bg-theme-dark text-white rounded-[2rem] p-8 shadow-xl relative overflow-hidden group">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full blur-3xl -mr-10 -mt-10"></div>
                        
                        <h3 class="text-lg font-bold mb-4 flex items-center gap-2 relative z-10">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Manage Status
                        </h3>

                        <form method="POST" action="{{ route('admin.orders.updateStatus', $order) }}" class="space-y-4 relative z-10">
                            @csrf
                            @method('PATCH')
                            
                            <div>
                                <label class="text-xs text-gray-400 uppercase font-bold tracking-wider">Change Status To:</label>
                                <select name="status" class="w-full mt-1 bg-white/10 border border-white/20 text-white rounded-xl focus:ring-theme-main focus:border-theme-main py-3 px-4 cursor-pointer">
                                    <option value="pending" class="text-gray-900" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" class="text-gray-900" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="shipped" class="text-gray-900" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                    <option value="delivered" class="text-gray-900" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                    <option value="cancelled" class="text-gray-900" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>

                            <button type="submit" class="w-full bg-theme-main hover:bg-white hover:text-theme-dark text-white font-bold py-3 px-4 rounded-xl transition-all shadow-lg flex justify-center items-center gap-2">
                                Update Status
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </button>
                        </form>
                    </div>

                    <div class="bg-white border border-theme-soft rounded-[2rem] p-6 shadow-sm">
                        <h4 class="font-bold text-gray-400 uppercase text-xs tracking-wider mb-4 border-b border-gray-100 pb-2">Customer Info</h4>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center text-xl font-bold text-gray-400">
                                {{ substr($order->user->name, 0, 1) }}
                            </div>
                            <div>
                                <p class="font-bold text-theme-dark text-lg">{{ $order->user->name }}</p>
                                <p class="text-gray-500 text-sm">{{ $order->user->email }}</p>
                                <p class="text-xs text-gray-400 mt-1">Member since {{ $order->user->created_at->format('Y') }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-theme-soft rounded-[2rem] p-6 shadow-sm">
                        <h4 class="font-bold text-gray-400 uppercase text-xs tracking-wider mb-4 border-b border-gray-100 pb-2">Shipping Details</h4>
                        
                        <div class="space-y-4">
                            <div class="flex gap-3">
                                <svg class="w-5 h-5 text-theme-main shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                <div>
                                    <p class="text-xs text-gray-400">Recipient</p>
                                    <p class="font-bold text-gray-800">{{ $order->recipient_name }}</p>
                                </div>
                            </div>
                            
                            <div class="flex gap-3">
                                <svg class="w-5 h-5 text-theme-main shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                                <div>
                                    <p class="text-xs text-gray-400">Phone</p>
                                    <p class="font-bold text-gray-800">{{ $order->phone }}</p>
                                </div>
                            </div>

                            <div class="flex gap-3">
                                <svg class="w-5 h-5 text-theme-main shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <div>
                                    <p class="text-xs text-gray-400">Address</p>
                                    <p class="font-medium text-gray-700 leading-relaxed">{{ $order->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>