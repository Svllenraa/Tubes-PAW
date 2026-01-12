<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-2xl text-theme-dark leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <span class="text-sm text-gray-500 bg-theme-bg px-3 py-1 rounded-full border border-theme-soft">
                {{ Auth::user()->role === 'admin' ? 'Administrator Mode' : 'Customer Area' }}
            </span>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-sm shadow-sm sm:rounded-2xl border border-theme-soft overflow-hidden">
                <div class="p-8">
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
    </div>
</x-app-layout>