<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .animate-fade-up {
            animation: fadeInUp 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
            opacity: 0;
            transform: translateY(30px);
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }

        .delay-300 {
            animation-delay: 0.3s;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex-grow: 1;
        }
    </style>
</head>

<body class="antialiased bg-theme-bg text-theme-dark font-sans overflow-x-hidden">

    <nav
        class="flex items-center justify-between p-6 lg:px-16 fixed w-full z-50 bg-theme-bg/80 backdrop-blur-md animate-fade-up">
        <div class="flex items-center gap-2">
            <x-application-logo class="w-10 h-10 fill-current text-theme-main" />
            <span class="font-extrabold text-2xl tracking-tighter text-theme-dark">{{ config('app.name') }}<span
                    class="text-theme-main">.</span></span>
        </div>

        <div class="flex items-center gap-6 font-medium">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="px-4 py-2 rounded-lg hover:bg-theme-main/20 text-theme-dark transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 text-theme-dark hover:text-theme-main transition hidden sm:block">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-8 py-3 rounded-full bg-theme-dark text-white hover:bg-theme-main transition shadow-lg hover:shadow-theme-main/50 transform hover:-translate-y-0.5">Register
                            Now</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <main>
        <section class="relative pt-32 pb-20 lg:pt-40 lg:pb-32 px-6 lg:px-20 w-full">

            <div
                class="flex flex-col-reverse lg:flex-row items-center justify-between gap-16 lg:gap-0 max-w-[1600px] mx-auto">

                <div class="lg:w-1/2 space-y-8 text-center lg:text-left animate-fade-up delay-100 z-10">
                    <div>
                        <span
                            class="inline-block px-5 py-2 rounded-full bg-theme-main/20 text-theme-dark text-sm font-bold tracking-widest mb-6 border border-theme-soft uppercase">
                            New Drop 2026
                        </span>
                        <h1 class="text-8xl lg:text-8xl font-black leading-none tracking-tight text-theme-dark">
                            Bajamas <br>
                            <span
                                class="text-transparent bg-clip-text bg-gradient-to-br from-theme-main via-theme-dark to-gray-800">
                                Gaya Keren,
                            </span>
                        </h1>
                        <h2 class="text-8xl lg:text-8xl font-bold text-gray-80 mt-2">
                            Bumi Aman.
                        </h2>
                    </div>
                    <p class="text-xl text-gray-600 max-w-lg mx-auto lg:mx-0 leading-relaxed">
                        Produk eco-friendly yang bikin kamu tampil beda, tanpa bikin bumi menderitaDesain eksklusif
                        untuk mereka yang peduli masa depan.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-5 justify-center lg:justify-start pt-4">
                        <a href="{{ route('register') }}"
                            class="px-10 py-5 bg-theme-dark text-white rounded-2xl font-bold text-xl hover:bg-theme-main transition shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                            Mulai Belanja 🔥
                        </a>
                        <a href="#features"
                            class="px-10 py-5 bg-white/50 border-2 border-theme-soft text-theme-dark rounded-2xl font-bold text-xl hover:bg-white hover:border-theme-main transition">
                            Explore More
                        </a>
                    </div>
                </div>

                <div class="lg:w-1/2 w-full relative animate-fade-up delay-300 flex justify-end">
                    <div
                        class="absolute top-1/2 right-0 -translate-y-1/2 w-[140%] h-[140%] bg-gradient-to-l from-theme-main/20 to-transparent rounded-full blur-[120px] -z-10 pointer-events-none">
                    </div>

                    <div
                        class="relative z-10 transform rotate-2 hover:rotate-0 transition-all duration-700 ease-out group w-full lg:w-[90%]">
                        <div
                            class="rounded-[2.5rem] overflow-hidden shadow-2xl border-4 border-white/60 relative aspect-[4/3]">
                            <div
                                class="absolute inset-0 bg-theme-dark/5 group-hover:bg-transparent transition-colors z-10">
                            </div>
                            <img src="{{ asset('images/showcase.jpg') }}" alt="Showcase Collection"
                                class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-1000">
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section id="features" class="py-24 bg-white/60 border-y border-theme-soft relative">
            <div class="max-w-[1600px] mx-auto px-6 lg:px-20 relative z-10">
                <div class="text-center mb-20 animate-fade-up delay-100">
                    <h2 class="text-4xl font-black text-theme-dark uppercase tracking-wide">Why Choose Us?</h2>
                    <div class="w-24 h-1.5 bg-theme-main mx-auto mt-5 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-16">
                    <div
                        class="bg-theme-bg p-10 rounded-3xl border border-theme-soft hover:shadow-xl transition hover:-translate-y-2 animate-fade-up delay-200 text-center group">
                        <div
                            class="w-20 h-20 bg-theme-main/20 text-theme-main rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:bg-theme-main group-hover:text-white transition-colors">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 3.214L13 21l-2.286-6.857L5 12l5.714-3.214L13 3z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-theme-dark mb-4">Premium Quality</h3>
                        <p class="text-gray-600 text-lg">Bahan terbaik dan aman , awet, dan tidak mudah rusak.</p>
                    </div>
                    <div
                        class="bg-theme-bg p-10 rounded-3xl border border-theme-soft hover:shadow-xl transition hover:-translate-y-2 animate-fade-up delay-300 text-center group">
                        <div
                            class="w-20 h-20 bg-theme-main/20 text-theme-main rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:bg-theme-main group-hover:text-white transition-colors">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-theme-dark mb-4">Fast Shipping</h3>
                        <p class="text-gray-600 text-lg">Pesanan dikirim di hari yang sama. Gak pake lama, langsung
                            sampai tujuan.</p>
                    </div>
                    <div
                        class="bg-theme-bg p-10 rounded-3xl border border-theme-soft hover:shadow-xl transition hover:-translate-y-2 animate-fade-up delay-300 text-center group">
                        <div
                            class="w-20 h-20 bg-theme-main/20 text-theme-main rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:bg-theme-main group-hover:text-white transition-colors">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-theme-dark mb-4">Secure Payment</h3>
                        <p class="text-gray-600 text-lg">Transaksi aman dengan berbagai metode pembayaran terpercaya.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-24 bg-theme-dark relative overflow-hidden">
            <div
                class="absolute inset-0 opacity-10 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNGRkZGRkYiLz48L3N2Zz4=')]">
            </div>
            <div class="max-w-[1200px] mx-auto text-center px-6 relative z-10 animate-fade-up">
                <h2 class="text-5xl lg:text-7xl font-extrabold text-white mb-10 leading-tight">
                    "Don't just dream it. <br> <span class="text-theme-soft">Wear it.</span>"
                </h2>
                <a href="{{ route('register') }}"
                    class="inline-block px-12 py-5 bg-white text-theme-dark rounded-full font-bold text-2xl hover:bg-theme-main hover:text-white transition shadow-2xl hover:shadow-white/20 transform hover:scale-105">
                    Join the Movement &rarr;
                </a>
            </div>
        </section>
    </main>

    <footer class="bg-theme-bg pt-20 pb-10 border-t-2 border-theme-soft mt-auto">
        <div class="max-w-[1600px] mx-auto px-6 lg:px-20 grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center gap-2 mb-6">
                    <x-application-logo class="w-10 h-10 fill-current text-theme-main" />
                    <span class="font-extrabold text-3xl text-theme-dark">{{ config('app.name') }}</span>
                </div>
                <p class="text-gray-600 pr-6 mb-6 text-lg">
                    Menghadirkan solusi ramah lingkungan untuk kebutuhan sehari-hari.
                    Dari kemasan hingga alat rumah tangga, semua dirancang untuk mengurangi jejak karbon dan menjaga
                    bumi tetap lestari.
                </p>
            </div>
            <div>
                <h4 class="font-bold text-theme-dark mb-8 uppercase tracking-wider text-lg">Quick Links</h4>
                <ul class="space-y-3 text-gray-600 font-medium">
                    <li><a href="#" class="hover:text-theme-main transition">New Arrivals</a></li>
                    <li><a href="#" class="hover:text-theme-main transition">Best Sellers</a></li>
                    <li><a href="#" class="hover:text-theme-main transition">About Us</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-theme-dark mb-8 uppercase tracking-wider text-lg">Contact</h4>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-theme-main" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                        hello@example.com
                    </li>
                    <li class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-theme-main" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Surabaya, Indonesia
                    </li>
                </ul>
            </div>
        </div>
        <div class="text-center py-6 border-t border-theme-soft/50 text-sm text-gray-500 font-medium">
            &copy; {{ date('Y') }} {{ config('app.name') }}. Crafted with <span class="text-red-400">❤</span> for
            Tubes.
        </div>
    </footer>
</body>

</html>
