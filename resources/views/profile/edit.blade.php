<x-app-layout>
    <x-slot name="header">
        <h2 class="font-black text-3xl text-theme-dark leading-tight tracking-tight">
            {{ __('Account Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-1">
                    <div class="bg-white border border-theme-soft rounded-3xl p-8 text-center shadow-lg sticky top-24">
                        <div class="w-32 h-32 bg-theme-bg mx-auto rounded-full flex items-center justify-center mb-6 border-4 border-white shadow-md relative">
                            <span class="text-5xl font-black text-theme-dark">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </span>
                            <div class="absolute bottom-2 right-2 w-6 h-6 bg-green-500 border-4 border-white rounded-full"></div>
                        </div>

                        <h3 class="text-2xl font-bold text-theme-dark">{{ Auth::user()->name }}</h3>
                        <p class="text-gray-500 mb-6">{{ Auth::user()->email }}</p>

                        <div class="space-y-3">
                            <div class="px-4 py-2 bg-theme-bg rounded-xl flex justify-between items-center text-sm">
                                <span class="text-gray-600">Role</span>
                                <span class="font-bold text-theme-dark uppercase">{{ Auth::user()->role ?? 'Member' }}</span>
                            </div>
                            <div class="px-4 py-2 bg-theme-bg rounded-xl flex justify-between items-center text-sm">
                                <span class="text-gray-600">Joined</span>
                                <span class="font-bold text-theme-dark">{{ Auth::user()->created_at->format('M Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-2 space-y-8">
                    
                    <div class="bg-white p-8 rounded-3xl border border-theme-soft shadow-sm hover:shadow-md transition-shadow duration-300">
                        @include('profile.partials.update-profile-information-form')
                    </div>

                    <div class="bg-white p-8 rounded-3xl border border-theme-soft shadow-sm hover:shadow-md transition-shadow duration-300">
                        @include('profile.partials.update-password-form')
                    </div>

                    <div class="bg-red-50 p-8 rounded-3xl border border-red-100">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>