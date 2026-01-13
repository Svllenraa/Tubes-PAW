@extends('layouts.app')

@section('content')
<div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-black text-theme-dark">User Management</h1>
            <p class="text-gray-500 text-sm mt-1">Manage registered customers and administrators.</p>
        </div>
        
        <div class="bg-white border border-theme-soft px-6 py-3 rounded-xl shadow-sm flex items-center gap-3">
            <div class="w-10 h-10 bg-theme-bg rounded-full flex items-center justify-center text-theme-dark">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            <div>
                <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Total Registered</p>
                <p class="text-xl font-black text-theme-dark leading-none">{{ $users->total() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-6 rounded-3xl border border-theme-soft shadow-sm mb-8">
        <form method="GET" action="{{ route('admin.users.index') }}" class="flex flex-col md:flex-row gap-4 items-end">
            
            <div class="flex-1 w-full relative">
                <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2 ml-1">Search User</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Search by name or email..." 
                           class="w-full pl-12 pr-4 py-3 border-theme-soft rounded-xl focus:ring-theme-main focus:border-theme-main bg-gray-50 focus:bg-white transition-colors">
                </div>
            </div>

            <div class="w-full md:w-64">
                 <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2 ml-1">Role</label>
                 <select name="role" class="w-full py-3 px-4 border-theme-soft rounded-xl focus:ring-theme-main focus:border-theme-main bg-gray-50 focus:bg-white transition-colors cursor-pointer">
                     <option value="">-- All Roles --</option>
                     <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Administrator</option>
                     <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>Customer (User)</option>
                 </select>
            </div>

            <div class="flex gap-3 w-full md:w-auto">
                <button type="submit" class="flex-1 md:flex-none px-8 py-3 bg-theme-dark text-white font-bold rounded-xl hover:bg-theme-main transition-all shadow-md hover:shadow-lg transform hover:-translate-y-1">
                    Filter
                </button>
                @if(request('q') || request('role'))
                    <a href="{{ route('admin.users.index') }}" class="flex-1 md:flex-none px-6 py-3 bg-gray-100 text-gray-600 font-bold rounded-xl hover:bg-gray-200 transition-colors flex items-center justify-center">
                        Reset
                    </a>
                @endif
            </div>
        </form>
    </div>

    <div class="bg-white border border-theme-soft rounded-[2rem] shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-theme-bg/50 border-b border-theme-soft text-theme-dark uppercase text-xs tracking-wider">
                        <th class="px-8 py-5 font-bold w-20">ID</th>
                        <th class="px-6 py-5 font-bold">User Identity</th>
                        <th class="px-6 py-5 font-bold">Role Status</th>
                        <th class="px-6 py-5 font-bold">Joined Date</th>
                        </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($users as $user)
                    <tr class="hover:bg-gray-50 transition-colors group">
                        <td class="px-8 py-5">
                            <span class="font-mono font-bold text-gray-400">#{{ $user->id }}</span>
                        </td>

                        <td class="px-6 py-5">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-full bg-theme-main/10 text-theme-main flex items-center justify-center text-lg font-black shrink-0 border border-theme-main/20">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <div>
                                    <div class="font-bold text-theme-dark text-lg">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>

                        <td class="px-6 py-5">
                            @if($user->role === 'admin')
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide bg-purple-100 text-purple-700 border border-purple-200">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                    Admin
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide bg-green-100 text-green-700 border border-green-200">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    Customer
                                </span>
                            @endif
                        </td>

                        <td class="px-6 py-5">
                            <div class="text-sm font-medium text-gray-600">
                                {{ $user->created_at->format('d M Y') }}
                            </div>
                            <div class="text-xs text-gray-400">
                                {{ $user->created_at->diffForHumans() }}
                            </div>
                        </td>
                        
                        </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center">
                                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                </div>
                                <p class="text-lg font-medium">User not found.</p>
                                <p class="text-sm">Try searching with a different keyword.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-8">
        {{ $users->links() }}
    </div>
</div>
@endsection