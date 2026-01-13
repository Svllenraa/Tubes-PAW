<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">

                    <!-- Order Information -->
                    <div class="mb-8">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">Order #{{ $order->id }}</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h4 class="font-semibold text-gray-700 mb-2">Customer Information</h4>
                                <p class="text-gray-600"><strong>Name:</strong> {{ $order->user->name }}</p>
                                <p class="text-gray-600"><strong>Email:</strong> {{ $order->user->email }}</p>
                            </div>

                            <div>
                                <h4 class="font-semibold text-gray-700 mb-2">Order Information</h4>
                                <p class="text-gray-600"><strong>Status:</strong>
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full
                                        @if($order->status == 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($order->status == 'processing') bg-blue-100 text-blue-800
                                        @elseif($order->status == 'shipped') bg-purple-100 text-purple-800
                                        @elseif($order->status == 'delivered') bg-green-100 text-green-800
                                        @else bg-red-100 text-red-800 @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </p>
                                <p class="text-gray-600"><strong>Date:</strong> {{ $order->created_at->format('d M Y H:i') }}</p>
                                <p class="text-gray-600"><strong>Total:</strong> Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Order Items -->
                    <div class="mb-8">
                        <h4 class="font-semibold text-gray-700 mb-4">Order Items</h4>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @forelse($order->items as $item)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $item->product->name ?? 'Product Deleted' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->quantity }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp {{ number_format($item->quantity * $item->price, 0, ',', '.') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">No items found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Shipping Information -->
                    @if($order->recipient_name || $order->address || $order->phone)
                    <div class="mb-8">
                        <h4 class="font-semibold text-gray-700 mb-4">Shipping Information</h4>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-gray-600"><strong>Recipient:</strong> {{ $order->recipient_name }}</p>
                            <p class="text-gray-600"><strong>Address:</strong> {{ $order->address }}</p>
                            <p class="text-gray-600"><strong>Phone:</strong> {{ $order->phone }}</p>
                        </div>
                    </div>
                    @endif

                    <!-- Status Update Form -->
                    <div class="mb-8">
                        <h4 class="font-semibold text-gray-700 mb-4">Update Order Status</h4>
                        <form method="POST" action="{{ route('admin.orders.updateStatus', $order) }}" class="flex gap-4 items-end">
                            @csrf
                            @method('PATCH')

                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                <select name="status" id="status" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                                    <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>

                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Update Status
                            </button>
                        </form>
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('admin.orders.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Back to Orders
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
