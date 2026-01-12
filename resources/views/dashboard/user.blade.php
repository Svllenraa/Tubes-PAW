<div class="bg-white overflow-hidden shadow-sm sm:rounded-xl border border-theme-soft">
    <div class="p-6">
        <h3 class="text-xl font-bold text-theme-dark">User Dashboard</h3>
        
        <p class="mt-2 text-sm text-gray-600">
            Welcome back! Here are some quick actions:
        </p>

        <ul class="mt-6 space-y-3">
            <li class="flex items-center group">
                <span class="w-2 h-2 bg-theme-main rounded-full mr-3 group-hover:bg-theme-dark transition-colors"></span>
                <a href="{{ route('products.index') }}" class="font-medium text-theme-dark hover:text-theme-main hover:underline transition-colors">
                    Browse Products
                </a>
            </li>

            <li class="flex items-center group">
                <span class="w-2 h-2 bg-theme-main rounded-full mr-3 group-hover:bg-theme-dark transition-colors"></span>
                <a href="{{ route('profile.edit') }}" class="font-medium text-theme-dark hover:text-theme-main hover:underline transition-colors">
                    Edit Profile
                </a>
            </li>
        </ul>
    </div>
</div>