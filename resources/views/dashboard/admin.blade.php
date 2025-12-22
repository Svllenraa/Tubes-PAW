<div>
    <h3 class="text-lg font-medium">Admin Dashboard</h3>
    <p class="mt-2 text-sm text-gray-600">Welcome, admin — quick links:</p>
    <ul class="mt-4 list-disc list-inside text-sm">
        <li><a href="{{ route('admin.products.index') }}" class="text-indigo-600">Manage Products</a></li>
        <li class="mt-1"><a href="{{ route('admin.categories.index') }}" class="text-indigo-600">Manage Categories</a></li>
        <li class="mt-1"><a href="{{ route('admin.users.index') }}" class="text-indigo-600">View Users</a></li>
    </ul>
</div>
