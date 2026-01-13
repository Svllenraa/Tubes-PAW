<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - {{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-white text-gray-900">

    <div class="min-h-screen flex">

        <div class="w-full lg:w-1/2 flex flex-col justify-center px-8 lg:px-24 py-12 relative bg-theme-bg/30">

            <div class="absolute top-8 left-8 lg:left-12">
                <a href="/" class="flex items-center gap-2 group">
                    <x-application-logo
                        class="w-8 h-8 fill-current text-theme-main group-hover:text-theme-dark transition-colors" />
                    <span
                        class="font-bold text-xl text-theme-dark group-hover:text-theme-main transition-colors">{{ config('app.name') }}</span>
                </a>
            </div>

            <div class="max-w-md w-full mx-auto">
                <div class="mb-10">
                    <h2 class="text-4xl font-black text-theme-dark mb-2">Welcome Back!</h2>
                    <p class="text-gray-500">Masuk untuk mengelola pesanan dan akunmu.</p>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="email" :value="__('Email Address')" class="text-theme-dark font-bold mb-1" />
                        <x-text-input id="email"
                            class="block w-full border-theme-soft focus:border-theme-main focus:ring-theme-main rounded-xl py-3 px-4 bg-white"
                            type="email" name="email" :value="old('email')" required autofocus
                            placeholder="name@example.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div>
                        <div class="flex justify-between items-center mb-1">
                            <x-input-label for="password" :value="__('Password')" class="text-theme-dark font-bold" />
                            @if (Route::has('password.request'))
                                <a class="text-sm font-medium text-theme-main hover:text-theme-dark transition-colors"
                                    href="{{ route('password.request') }}">
                                    {{ __('Lupa password?') }}
                                </a>
                            @endif
                        </div>
                        <x-text-input id="password"
                            class="block w-full border-theme-soft focus:border-theme-main focus:ring-theme-main rounded-xl py-3 px-4 bg-white"
                            type="password" name="password" required autocomplete="current-password"
                            placeholder="••••••••" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div>
                        <span class="block text-sm font-bold text-theme-dark mb-3">{{ __('Login Sebagai:') }}</span>
                        <div class="grid grid-cols-2 gap-4">
                            <label class="cursor-pointer">
                                <input type="radio" name="login_as" value="user" class="peer sr-only" checked>
                                <div
                                    class="rounded-xl border-2 border-theme-soft p-4 text-center transition-all hover:bg-white peer-checked:border-theme-main peer-checked:bg-theme-main/10 peer-checked:text-theme-dark">
                                    <svg class="mx-auto h-6 w-6 mb-1 text-gray-400 peer-checked:text-theme-main"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                        </path>
                                    </svg>
                                    <span class="block text-sm font-bold">Customer</span>
                                </div>
                            </label>

                            <label class="cursor-pointer">
                                <input type="radio" name="login_as" value="admin" class="peer sr-only">
                                <div
                                    class="rounded-xl border-2 border-theme-soft p-4 text-center transition-all hover:bg-white peer-checked:border-theme-main peer-checked:bg-theme-main/10 peer-checked:text-theme-dark">
                                    <svg class="mx-auto h-6 w-6 mb-1 text-gray-400 peer-checked:text-theme-main"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                        </path>
                                    </svg>
                                    <span class="block text-sm font-bold">Admin</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-2">
                        <label for="remember_me" class="inline-flex items-center cursor-pointer">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-theme-soft text-theme-main shadow-sm focus:ring-theme-main"
                                name="remember">
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <button
                        class="w-full py-4 px-6 bg-theme-dark hover:bg-theme-main text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1 text-lg">
                        {{ __('Masuk Sekarang') }} &rarr;
                    </button>

                    <p class="text-center text-sm text-gray-500 mt-6">
                        Belum punya akun? <a href="{{ route('register') }}"
                            class="font-bold text-theme-main hover:underline">Daftar disini</a>
                    </p>
                </form>
            </div>
        </div>

        <div class="hidden lg:block lg:w-1/2 relative overflow-hidden bg-theme-dark">
            <div class="absolute inset-0 bg-gradient-to-t from-theme-dark/80 to-transparent z-10"></div>

            <img src="{{ asset('images/imagelogin.jpg') }}" alt="Login Background"
                class="absolute inset-0 w-full h-full object-cover opacity-90 hover:scale-105 transition-transform duration-[20s]">

            <div class="absolute bottom-0 left-0 p-12 z-20 text-white">
                <h3 class="text-4xl font-black mb-4">Style Meets Sustainability.</h3>
                <p class="text-lg text-gray-200 max-w-md leading-relaxed">
                    Bergabunglah dengan ribuan orang yang telah beralih ke gaya hidup yang lebih ramah lingkungan.
                </p>
            </div>
        </div>

    </div>
</body>

</html>
