<x-app-layout>
    <x-slot name="header">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h2 class="font-black text-2xl text-theme-dark leading-tight">
                {{ __('Order Management') }}
            </h2>
            <span class="text-sm text-gray-500">Admin / Orders</span>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="bg-white p-6 rounded-3xl border border-theme-soft shadow-sm mb-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <div>
                    <h3 class="text-lg font-bold text-theme-dark">All Transactions</h3>
                    <p class="text-gray-500 text-sm">Monitor and manage all customer orders.</p>
                </div>

                <form method="GET" class="flex gap-3 w-full md:w-auto">
                    <div class="relative">
                        <select name="status" class="appearance-none pl-4 pr-10 py-3 rounded-xl border-theme-soft bg-gray-50 focus:bg-white focus:ring-theme-main focus:border-theme-main font-medium text-theme-dark cursor-pointer transition-colors">
                            <option value="">-- All Status --</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="processing" {{ request('status') == 'processing' ? 'selected' : '' }}>Processing</option>
                            <option value="shipped" {{ request('status') == 'shipped' ? 'selected' : '' }}>Shipped</option>
                            <option value="delivered" {{ request('status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                            <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                    <button type="submit" class="bg-theme-dark hover:bg-theme-main text-white font-bold py-3 px-6 rounded-xl transition-all shadow-md hover:shadow-lg transform hover:-translate-y-1">
                        Filter
                    </button>
                </form>
            </div>

            <div class="bg-white border border-theme-soft rounded-[2rem] shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-theme-bg/50 border-b border-theme-soft text-theme-dark uppercase text-xs tracking-wider">
                                <th class="px-8 py-5 font-bold">Order ID</th>
                                <th class="px-6 py-5 font-bold">Customer</th>
                                <th class="px-6 py-5 font-bold">Total Amount</th>
                                <th class="px-6 py-5 font-bold">Status</th>
                                <th class="px-6 py-5 font-bold">Date</th>
                                <th class="px-6 py-5 font-bold text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($orders as $order)
                                <tr class="hover:bg-gray-50 transition-colors group">
                                    <td class="px-8 py-5">
                                        <span class="font-mono font-bold text-theme-main">#{{ $order->id }}</span>
                                    </td>
                                    <td class="px-6 py-5">
                                        <div class="font-bold text-theme-dark">{{ $order->user->name }}</div>
                                        <div class="text-xs text-gray-400">{{ $order->user->email }}</div>
                                    </td>
                                    <td class="px-6 py-5 font-bold text-theme-dark">
                                        Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-5">
                                        @php
                                            $statusClasses = [
                                                'pending' => 'bg-yellow-100 text-yellow-700 border-yellow-200',
                                                'processing' => 'bg-blue-100 text-blue-700 border-blue-200',
                                                'shipped' => 'bg-purple-100 text-purple-700 border-purple-200',
                                                'delivered' => 'bg-green-100 text-green-700 border-green-200',
                                                'cancelled' => 'bg-red-100 text-red-700 border-red-200',
                                            ];
                                            $currentClass = $statusClasses[$order->status] ?? 'bg-gray-100 text-gray-700 border-gray-200';
                                        @endphp
                                        <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide border {{ $currentClass }}">
                                            {{ $order->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-5 text-sm text-gray-500">
                                        {{ $order->created_at->format('d M Y') }}
                                        <br>
                                        <span class="text-xs text-gray-400">{{ $order->created_at->format('H:i') }}</span>
                                    </td>
                                    <td class="px-6 py-5 text-center">
                                        <a href="{{ route('admin.orders.show', $order) }}" class="inline-flex items-center gap-1 text-sm font-bold text-theme-main hover:text-theme-dark hover:underline transition-colors">
                                            Manage
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-gray-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                                            </div>
                                            <p class="text-lg font-medium">No orders found.</p>
                                            <p class="text-sm">Try adjusting your status filter.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-8">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</x-app-layout>