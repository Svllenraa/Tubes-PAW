<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center mb-6">
        <h2 class="text-2xl font-bold text-theme-dark">Welcome Back</h2>
        <p class="text-gray-500 text-sm">Please login to your account</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" :value="__('Email')" class="text-theme-dark" />
            <x-text-input id="email" class="block mt-1 w-full border-theme-soft focus:border-theme-main focus:ring-theme-main rounded-lg" 
                          type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-theme-dark" />

            <x-text-input id="password" class="block mt-1 w-full border-theme-soft focus:border-theme-main focus:ring-theme-main rounded-lg"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-theme-soft text-theme-main shadow-sm focus:ring-theme-main" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-4 p-3 bg-theme-bg/50 rounded-lg border border-theme-soft">
            <span class="block text-sm font-semibold text-theme-dark mb-2">{{ __('Login as:') }}</span>
            <div class="flex gap-4">
                <label class="inline-flex items-center cursor-pointer">
                    <input type="radio" name="login_as" value="user" checked class="rounded-full border-theme-soft text-theme-main focus:ring-theme-main">
                    <span class="ms-2 text-sm text-gray-700">Customer</span>
                </label>
                <label class="inline-flex items-center cursor-pointer">
                    <input type="radio" name="login_as" value="admin" class="rounded-full border-theme-soft text-theme-main focus:ring-theme-main">
                    <span class="ms-2 text-sm text-gray-700">Administrator</span>
                </label>
            </div>
        </div>

        <div class="flex items-center justify-end mt-6">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-500 hover:text-theme-main rounded-md focus:outline-none transition-colors" href="{{ route('password.request') }}">
                    {{ __('Forgot password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3 !bg-theme-dark hover:!bg-theme-main focus:!bg-theme-main active:!bg-theme-dark transition-colors">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>