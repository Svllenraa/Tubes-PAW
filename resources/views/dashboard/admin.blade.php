<div class="space-y-8">
    <!-- Welcome Header -->
    <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg p-6 text-white">
        <h3 class="text-2xl font-bold">Admin Dashboard</h3>
        <p class="mt-2 text-blue-100">Welcome back! Here's an overview of your store.</p>
    </div>

    <!-- Statistics Cards -->
    <div>
        <h4 class="text-lg font-semibold mb-4">Overview</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <a href="{{ route('admin.products.index') }}" class="block bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow hover:bg-gray-50">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-full">
                        <span class="text-2xl">📦</span>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Total Products</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $totalProducts ?? 0 }}</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('admin.categories.index') }}" class="block bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow hover:bg-gray-50">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 rounded-full">
                        <span class="text-2xl">🏷️</span>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Categories</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $totalCategories ?? 0 }}</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('admin.users.index') }}" class="block bg-white border border-gray-200 rounded-lg p-4 hover:shadow-md transition-shadow hover:bg-gray-50">
                <div class="flex items-center">
                    <div class="p-3 bg-yellow-100 rounded-full">
                        <span class="text-2xl">👥</span>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Users</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $totalUsers ?? 0 }}</p>
                    </div>
                </div>
            </a>
            <div class="bg-white border border-gray-200 rounded-lg p-4">
                <div class="flex items-center">
                    <div class="p-3 bg-purple-100 rounded-full">
                        <span class="text-2xl">🛒</span>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Orders</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $totalOrders ?? 0 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Products -->
    <div>
        <div class="flex items-center justify-between mb-4">
            <h4 class="text-lg font-semibold">Recent Products</h4>
            <a href="{{ route('admin.products.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All</a>
        </div>
        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
            <div class="divide-y divide-gray-200">
                @forelse($recentProducts ?? [] as $product)
                    <a href="{{ route('admin.products.edit', $product) }}" class="block p-4 hover:bg-gray-50 transition-colors">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-12 h-12 object-cover rounded-lg mr-4">
                                @else
                                    <div class="w-12 h-12 bg-gray-200 rounded-lg mr-4 flex items-center justify-center">
                                        <span class="text-xs text-gray-500">No Image</span>
                                    </div>
                                @endif
                                <div>
                                    <p class="font-medium text-gray-900">{{ $product->name }}</p>
                                    <p class="text-sm text-gray-600">{{ $product->category?->name ?? 'No Category' }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                <p class="text-sm text-gray-500">{{ $product->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="p-4 text-center text-gray-500">
                        No products yet.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div>
        <div class="flex items-center justify-between mb-4">
            <h4 class="text-lg font-semibold">Recent Orders</h4>
            <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All</a>
        </div>
        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
            <div class="divide-y divide-gray-200">
                @forelse($recentOrders ?? [] as $order)
                    <div class="p-4 hover:bg-gray-50 transition-colors">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-medium text-gray-900">Order #{{ $order->id }}</p>
                                <p class="text-sm text-gray-600">{{ $order->user?->name ?? 'Unknown User' }}</p>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-gray-900">Rp {{ number_format($order->total ?? 0, 0, ',', '.') }}</p>
                                <p class="text-sm text-gray-500">{{ $order->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="p-4 text-center text-gray-500">
                        No orders yet.
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Low Stock Alert -->
    @if(isset($lowStockProducts) && $lowStockProducts->count() > 0)
    <div>
        <div class="flex items-center justify-between mb-4">
            <h4 class="text-lg font-semibold text-red-600">Low Stock Alert</h4>
            <a href="{{ route('admin.products.index') }}" class="text-red-600 hover:text-red-800 text-sm font-medium">Manage Stock</a>
        </div>
        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
            <p class="text-sm text-red-800 mb-2">{{ $lowStockProducts->count() }} products are running low on stock:</p>
            <ul class="list-disc list-inside text-sm text-red-700">
                @foreach($lowStockProducts as $product)
                    <li><a href="{{ route('admin.products.edit', $product) }}" class="hover:underline">{{ $product->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <!-- Quick Actions -->
    <div>
        <h4 class="text-lg font-semibold mb-4">Quick Actions</h4>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <a href="{{ route('admin.products.create') }}" class="block bg-blue-500 hover:bg-blue-600 text-white rounded-lg p-4 text-center transition-colors">
                <span class="text-2xl block mb-2">➕</span>
                <span class="font-medium">Add New Product</span>
            </a>
            <a href="{{ route('admin.categories.create') }}" class="block bg-green-500 hover:bg-green-600 text-white rounded-lg p-4 text-center transition-colors">
                <span class="text-2xl block mb-2">🏷️</span>
                <span class="font-medium">Add New Category</span>
            </a>
            <a href="{{ route('admin.users.index') }}" class="block bg-purple-500 hover:bg-purple-600 text-white rounded-lg p-4 text-center transition-colors">
                <span class="text-2xl block mb-2">👥</span>
                <span class="font-medium">Manage Users</span>
            </a>
        </div>
    </div>
</div>
