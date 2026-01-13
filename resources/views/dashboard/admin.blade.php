<div class="space-y-8 animate-fade-up">

    <div class="relative overflow-hidden rounded-3xl bg-theme-dark shadow-xl">
        <div class="absolute top-0 right-0 -mt-10 -mr-10 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-40 h-40 bg-theme-main/20 rounded-full blur-2xl"></div>
        <div class="relative p-8 sm:p-10 text-white flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h3 class="text-3xl font-black tracking-tight">Admin Dashboard</h3>
                <p class="mt-2 text-theme-soft text-lg opacity-90">Welcome back, Boss! 👋 Here's what's happening today.</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm border border-white/20 px-4 py-2 rounded-xl text-sm font-medium">
                {{ now()->format('l, d M Y') }}
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <a href="{{ route('admin.products.index') }}" class="group bg-white border border-theme-soft rounded-2xl p-6 hover:shadow-lg hover:border-theme-main transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-bold text-gray-500 uppercase tracking-wider">Products</p>
                    <p class="text-3xl font-black text-theme-dark mt-1 group-hover:scale-110 origin-left transition-transform">{{ $totalProducts ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-theme-bg rounded-xl flex items-center justify-center text-theme-dark group-hover:bg-theme-dark group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-gray-400 font-medium">
                <span class="text-theme-main font-bold">In Catalog</span>
            </div>
        </a>
        <a href="{{ route('admin.categories.index') }}" class="group bg-white border border-theme-soft rounded-2xl p-6 hover:shadow-lg hover:border-theme-main transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-bold text-gray-500 uppercase tracking-wider">Categories</p>
                    <p class="text-3xl font-black text-theme-dark mt-1 group-hover:scale-110 origin-left transition-transform">{{ $totalCategories ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-theme-bg rounded-xl flex items-center justify-center text-theme-dark group-hover:bg-theme-dark group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-gray-400 font-medium">
                <span class="text-theme-main font-bold">Active</span>
            </div>
        </a>
        <a href="{{ route('admin.users.index') }}" class="group bg-white border border-theme-soft rounded-2xl p-6 hover:shadow-lg hover:border-theme-main transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-bold text-gray-500 uppercase tracking-wider">Total Users</p>
                    <p class="text-3xl font-black text-theme-dark mt-1 group-hover:scale-110 origin-left transition-transform">{{ $totalUsers ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-theme-bg rounded-xl flex items-center justify-center text-theme-dark group-hover:bg-theme-dark group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-gray-400 font-medium">
                <span class="text-green-600 font-bold">+{{ $newUsersCount ?? 0 }} New</span>
                <span class="mx-2">•</span>
                <span>This Month</span>
            </div>
        </a>
        <a href="{{ route('admin.orders.index') }}" class="group bg-white border border-theme-soft rounded-2xl p-6 hover:shadow-lg hover:border-theme-main transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-bold text-gray-500 uppercase tracking-wider">Total Orders</p>
                    <p class="text-3xl font-black text-theme-dark mt-1 group-hover:scale-110 origin-left transition-transform">{{ $totalOrders ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-theme-bg rounded-xl flex items-center justify-center text-theme-dark group-hover:bg-theme-dark group-hover:text-white transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
                </div>
            </div>
            <div class="mt-4 flex items-center text-xs text-gray-400 font-medium">
                <span class="text-theme-dark font-bold">Revenue: Rp {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}</span>
            </div>
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">

        <div class="lg:col-span-2">
            <div class="flex items-center justify-between mb-6">
                <h4 class="text-xl font-bold text-theme-dark flex items-center gap-2">
                    <span class="w-2 h-8 bg-theme-main rounded-full"></span>
                    Recent Products
                </h4>
                <a href="{{ route('admin.products.index') }}" class="text-sm font-bold text-theme-main hover:text-theme-dark hover:underline transition-colors">View All &rarr;</a>
            </div>

            <div class="bg-white border border-theme-soft rounded-2xl overflow-hidden shadow-sm">
                <div class="divide-y divide-gray-100">
                    @forelse($recentProducts ?? [] as $product)
                        <a href="{{ route('admin.products.edit', $product) }}" class="block p-4 hover:bg-theme-bg/30 transition-colors group">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <div class="h-16 w-16 rounded-xl overflow-hidden bg-gray-100 border border-gray-100 group-hover:border-theme-main transition-colors">
                                        @if($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="font-bold text-gray-800 group-hover:text-theme-dark transition-colors">{{ $product->name }}</p>
                                        <p class="text-sm text-gray-500">{{ $product->category?->name ?? 'Uncategorized' }}</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="font-bold text-theme-dark">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                    <p class="text-xs text-gray-400">{{ $product->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </a>
                    @empty
                        <div class="p-8 text-center">
                            <p class="text-gray-500">Belum ada produk.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="space-y-8">

            <div>
                 <h4 class="text-xl font-bold text-theme-dark flex items-center gap-2 mb-6">
                    <span class="w-2 h-8 bg-theme-main rounded-full"></span>
                    Quick Actions
                </h4>
                <div class="grid grid-cols-1 gap-3">
                    <a href="{{ route('admin.products.create') }}" class="flex items-center gap-4 p-4 bg-theme-dark text-white rounded-xl hover:bg-theme-main shadow-md hover:shadow-lg transition-all transform hover:-translate-y-1">
                        <div class="p-2 bg-white/20 rounded-lg"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg></div>
                        <span class="font-bold">Add Product</span>
                    </a>
                    <a href="{{ route('admin.categories.create') }}" class="flex items-center gap-4 p-4 bg-white border border-theme-soft text-theme-dark rounded-xl hover:bg-theme-bg transition-colors">
                        <div class="p-2 bg-theme-bg rounded-lg"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg></div>
                        <span class="font-medium">New Category</span>
                    </a>
                </div>
            </div>

            <div class="bg-white border border-theme-soft rounded-2xl p-6 shadow-sm">
                <div class="flex justify-between items-center mb-4">
                    <h5 class="font-bold text-theme-dark">Monthly Goal</h5>
                    <span class="text-xs font-bold text-theme-main bg-theme-bg px-2 py-1 rounded">On Track</span>
                </div>
                <div class="flex items-end gap-2 mb-2">
                    <span class="text-3xl font-black text-theme-dark">85%</span>
                    <span class="text-sm text-gray-500 mb-1">completed</span>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-2.5">
                    <div class="bg-theme-dark h-2.5 rounded-full" style="width: 85%"></div>
                </div>
                <p class="text-xs text-gray-400 mt-3">Target: 100 sales this month</p>
            </div>

            <div class="bg-theme-bg/50 border border-theme-soft rounded-2xl p-6">
                <h5 class="font-bold text-theme-dark mb-4">Platform Status</h5>
                <div class="space-y-3">
                    <div class="flex items-center justify-between text-sm">
                        <span class="flex items-center gap-2 text-gray-600">
                            <span class="w-2.5 h-2.5 bg-green-500 rounded-full animate-pulse"></span>
                            System Online
                        </span>
                        <span class="text-theme-dark font-bold">100%</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                         <span class="flex items-center gap-2 text-gray-600">
                            <span class="w-2.5 h-2.5 bg-green-500 rounded-full"></span>
                            Database
                        </span>
                        <span class="text-theme-dark font-bold">Healthy</span>
                    </div>
                </div>
            </div>

            @if(isset($lowStockProducts) && $lowStockProducts->count() > 0)
                <div class="bg-red-50 border border-red-100 rounded-2xl p-5">
                    <div class="flex items-center gap-3 mb-3 text-red-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        <h4 class="font-bold text-lg">Low Stock!</h4>
                    </div>
                    <ul class="space-y-2">
                        @foreach($lowStockProducts as $product)
                            <li class="flex justify-between items-center text-sm bg-white p-2 rounded-lg border border-red-100">
                                <span class="text-gray-700 truncate w-32">{{ $product->name }}</span>
                                <a href="{{ route('admin.products.edit', $product) }}" class="text-red-500 font-bold hover:underline text-xs">Restock</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>
</div>
