<x-app-layout>
    <x-slot name="header">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h2 class="font-bold text-2xl text-theme-dark leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <span class="text-xs font-bold tracking-wider text-theme-dark bg-theme-main/20 px-3 py-1 rounded-full border border-theme-soft uppercase">
                {{ Auth::user()->role === 'admin' ? 'Administrator Mode' : 'Customer Area' }}
            </span>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="text-gray-900">
                @php
                    $mode = session('login_as') ?? ($mode ?? null);
                @endphp

                @if($mode === 'admin' || (auth()->check() && auth()->user()->role === 'admin' && $mode === null))
                    @include('dashboard.admin')
                @else
                    @include('dashboard.user') 
                @endif
            </div>
        </div>
    </div>
</x-app-layout>