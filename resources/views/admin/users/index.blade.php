@extends('layouts.app')

@section('content')
<div class="px-4 py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
    
    {{-- Header Section --}}
    <div class="flex flex-col items-center justify-between gap-4 mb-8 md:flex-row">
        <div>
            <h1 class="text-3xl italic font-black tracking-tight uppercase text-theme-dark">Manajemen User</h1>
            <p class="text-sm text-gray-500">Daftar pelanggan dan akun yang terdaftar di sistem Bajamas.</p>
        </div>
        <div class="px-4 py-2 border bg-theme-bg rounded-xl border-theme-soft">
            <span class="text-xs italic font-bold text-gray-500 uppercase">Total User:</span>
            <span class="ml-2 font-black text-theme-main">{{ $users->total() }}</span>
        </div>
    </div>

    {{-- Filter & Search --}}
    <div class="p-6 mb-8 bg-white border shadow-sm rounded-2xl border-theme-soft">
        <form method="GET" action="{{ route('admin.users.index') }}" class="flex flex-col items-end gap-4 md:flex-row">
            <div class="flex-1 w-full space-y-1">
                <label class="ml-1 text-xs font-bold tracking-widest text-gray-400 uppercase">Cari Nama atau Email</label>
                <div class="relative">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="Contoh: Budi atau budi@email.com" 
                        class="w-full py-3 pl-4 pr-10 border-theme-soft rounded-xl focus:ring-theme-main focus:border-theme-main bg-gray-50/50">
                    <svg class="absolute w-5 h-5 text-gray-300 right-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                </div>
            </div>
            
            <div class="flex w-full gap-2 md:w-auto">
                <button type="submit" class="flex-1 px-8 py-3 text-sm italic font-black text-white uppercase transition-all shadow-lg md:flex-none bg-theme-dark rounded-xl hover:bg-theme-main active:scale-95 shadow-theme-dark/10">
                    Filter
                </button>
                <a href="{{ route('admin.users.index') }}" class="flex items-center px-6 py-3 text-sm font-bold text-gray-400 hover:text-theme-dark">
                    Reset
                </a>
            </div>
        </form>
    </div>

    {{-- Table Card --}}
    <div class="overflow-hidden bg-white border shadow-xl rounded-3xl border-theme-soft">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-xs italic tracking-widest text-white uppercase bg-theme-dark">
                        <th class="px-6 py-5 font-black">ID</th>
                        <th class="px-6 py-5 font-black">Identitas User</th>
                        <th class="px-6 py-5 font-black">Hak Akses (Role)</th>
                        <th class="px-6 py-5 font-black">Tgl Registrasi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($users as $user)
                    <tr class="transition-colors hover:bg-theme-bg/30">
                        <td class="px-6 py-4">
                            <span class="text-sm italic font-bold text-gray-300">#{{ $user->id }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="flex items-center justify-center w-10 h-10 font-black rounded-full bg-theme-main/10 text-theme-main">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <div>
                                    <div class="text-sm italic font-black uppercase text-theme-dark">{{ $user->name }}</div>
                                    <div class="text-xs text-gray-400">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-lg text-[10px] font-black uppercase tracking-tighter {{ $user->role === 'admin' ? 'bg-red-100 text-red-600 border border-red-200' : 'bg-theme-main/10 text-theme-main border border-theme-main/20' }}">
                                {{ $user->role ?? 'user' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-gray-500">
                            {{ $user->created_at->translatedFormat('d F Y') }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-20 text-center">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 mb-4 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                <p class="italic text-gray-400">Tidak ada user yang ditemukan.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Pagination --}}
    <div class="mt-8">
        {{ $users->links() }}
    </div>
</div>
@endsection