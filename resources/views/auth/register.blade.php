<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - {{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-gray-900">

    <div class="min-h-screen flex">
        
        <div class="hidden lg:block lg:w-1/2 relative overflow-hidden bg-theme-main">
            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-theme-dark/90 z-10"></div>
            
            <img src="{{ asset('images/imagelogin.jpg') }}" alt="Register Background" 
                 class="absolute inset-0 w-full h-full object-cover opacity-90 hover:scale-105 transition-transform duration-[20s]">
            
            <div class="absolute bottom-0 left-0 p-16 z-20 text-white">
                <div class="w-16 h-1 bg-white mb-6 rounded-full"></div>
                <h3 class="text-5xl font-black mb-4 leading-tight">Join the<br>Eco Movement.</h3>
                <p class="text-lg text-gray-100 max-w-md leading-relaxed opacity-90">
                    Buat akun barumu sekarang dan mulailah perjalanan gaya hidup yang lebih hijau dan berkelanjutan.
                </p>
            </div>
        </div>

        <div class="w-full lg:w-1/2 flex flex-col justify-center px-8 lg:px-24 py-12 relative bg-theme-bg/30">
            
            <div class="absolute top-8 right-8 lg:left-12">
                <a href="/" class="flex items-center gap-2 group">
                    <x-application-logo class="w-8 h-8 fill-current text-theme-main group-hover:text-theme-dark transition-colors" />
                    <span class="font-bold text-xl text-theme-dark group-hover:text-theme-main transition-colors">{{ config('app.name') }}</span>
                </a>
            </div>

            <div class="max-w-md w-full mx-auto mt-10 lg:mt-0">
                <div class="mb-8">
                    <h2 class="text-4xl font-black text-theme-dark mb-2">Create Account</h2>
                    <p class="text-gray-500">Lengkapi data diri untuk mendaftar.</p>
                </div>

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <div>
                        <x-input-label for="name" :value="__('Full Name')" class="text-theme-dark font-bold mb-1" />
                        <x-text-input id="name" class="block w-full border-theme-soft focus:border-theme-main focus:ring-theme-main rounded-xl py-3 px-4 bg-white shadow-sm" 
                                      type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="John Doe" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="email" :value="__('Email Address')" class="text-theme-dark font-bold mb-1" />
                        <x-text-input id="email" class="block w-full border-theme-soft focus:border-theme-main focus:ring-theme-main rounded-xl py-3 px-4 bg-white shadow-sm" 
                                      type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="name@example.com" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <x-input-label for="password" :value="__('Password')" class="text-theme-dark font-bold mb-1" />
                            <x-text-input id="password" class="block w-full border-theme-soft focus:border-theme-main focus:ring-theme-main rounded-xl py-3 px-4 bg-white shadow-sm"
                                            type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-theme-dark font-bold mb-1" />
                            <x-text-input id="password_confirmation" class="block w-full border-theme-soft focus:border-theme-main focus:ring-theme-main rounded-xl py-3 px-4 bg-white shadow-sm"
                                            type="password" name="password_confirmation" required autocomplete="new-password" placeholder="••••••••" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>

                    <div class="flex items-start mt-4">
                        <div class="flex items-center h-5">
                            <input id="terms" type="checkbox" class="w-4 h-4 border border-theme-soft rounded bg-gray-50 focus:ring-3 focus:ring-theme-main" required>
                        </div>
                        <label for="terms" class="ml-2 text-sm font-medium text-gray-500">
                            I agree to the <a href="#" class="text-theme-main hover:underline font-bold">Terms of Service</a> and <a href="#" class="text-theme-main hover:underline font-bold">Privacy Policy</a>
                        </label>
                    </div>

                    <button class="w-full py-4 px-6 mt-4 bg-theme-main hover:bg-theme-dark text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1 text-lg">
                        {{ __('Daftar Sekarang') }} &rarr;
                    </button>
                    
                    <p class="text-center text-sm text-gray-500 mt-8">
                        Sudah punya akun? <a href="{{ route('login') }}" class="font-bold text-theme-dark hover:text-theme-main transition-colors hover:underline">Masuk disini</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>