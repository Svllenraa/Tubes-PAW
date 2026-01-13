<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth overflow-x-hidden">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Bajamas') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* --- 1. INTRO ANIMATION STYLES --- */
        #intro-overlay {
            position: fixed;
            inset: 0;
            z-index: 9999;
            background-color: #fdfbf7;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            transition: transform 1.5s cubic-bezier(0.77, 0, 0.175, 1);
        }

        .intro-text-wrapper {
            overflow: hidden;
        }

        .intro-text {
            transform: translateY(120%);
            opacity: 0;
            animation: textUp 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94) forwards;
        }

        @keyframes textUp {
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .blob {
            position: absolute;
            filter: blur(100px);
            opacity: 0.5;
            animation: moveBlob 15s infinite alternate;
        }

        @keyframes moveBlob {
            0% {
                transform: translate(0, 0) scale(1);
            }

            100% {
                transform: translate(30px, -30px) scale(1.1);
            }
        }

        .slide-out {
            transform: translateY(-100%);
        }

        body.locked {
            overflow: hidden;
        }

        /* --- 2. EXISTING ANIMATIONS --- */
        .animate-gradient-text {
            background-size: 200% auto;
            animation: shine 4s linear infinite;
        }

        @keyframes shine {
            to {
                background-position: 200% center;
            }
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .reveal {
            opacity: 0;
            transform: translateY(50px);
            transition: all 1s cubic-bezier(0.5, 0, 0, 1);
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        .delay-100 {
            transition-delay: 0.1s;
        }

        .delay-200 {
            transition-delay: 0.2s;
        }

        .delay-300 {
            transition-delay: 0.3s;
        }

        .marquee-container {
            overflow: hidden;
            white-space: nowrap;
            position: relative;
        }

        .marquee-content {
            display: inline-block;
            animation: marquee 20s linear infinite;
        }

        @keyframes marquee {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
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

<body class="antialiased bg-theme-bg text-theme-dark font-sans overflow-x-hidden locked">

    <div id="intro-overlay">
        <div
            class="blob bg-theme-main w-[500px] h-[500px] rounded-full top-0 left-0 -translate-x-1/3 -translate-y-1/3 mix-blend-multiply">
        </div>
        <div
            class="blob bg-yellow-200 w-[600px] h-[600px] rounded-full bottom-0 right-0 translate-x-1/3 translate-y-1/3 mix-blend-multiply animation-delay-2000">
        </div>
        <div
            class="blob bg-emerald-200 w-[400px] h-[400px] rounded-full top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 mix-blend-multiply opacity-30">
        </div>

        <div class="relative z-10 text-center text-theme-dark px-6">
            <div class="intro-text-wrapper mb-2">
                <p class="intro-text text-lg md:text-xl font-bold tracking-[0.4em] text-theme-main uppercase"
                    style="animation-delay: 0.8s;">
                    Welcome To
                </p>
            </div>

            <div class="intro-text-wrapper mb-4">
                <h1 class="intro-text text-7xl md:text-9xl font-black tracking-tighter text-theme-dark"
                    style="animation-delay: 1.2s;">
                    BAJAMAS<span class="text-theme-main">.</span>
                </h1>
            </div>

            <div class="intro-text-wrapper">
                <p class="intro-text text-xl md:text-2xl font-medium text-gray-500 italic"
                    style="animation-delay: 1.8s;">
                    "Save the planet, <span class="text-theme-main font-bold not-italic decoration-wavy">Elevate your
                        style.</span>"
                </p>
            </div>

            <div class="w-32 h-1.5 bg-gray-200 rounded-full mx-auto mt-16 overflow-hidden intro-text"
                style="animation-delay: 2.2s;">
                <div class="h-full bg-theme-main animate-[loading_3.5s_ease-in-out_forwards]"></div>
            </div>
            <style>
                @keyframes loading {
                    0% {
                        width: 0;
                    }

                    100% {
                        width: 100%;
                    }
                }
            </style>
        </div>
    </div>

    <div id="main-site" class="opacity-0 transition-opacity duration-1000">

        <nav class="flex items-center justify-between p-6 lg:px-16 fixed w-full z-50 bg-theme-bg/80 backdrop-blur-md border-b border-theme-soft/30 transition-all duration-300"
            id="navbar">
            <div class="flex items-center gap-2">
                <x-application-logo class="w-10 h-10 fill-current text-theme-main animate-spin-slow" />
                <span class="font-extrabold text-2xl tracking-tighter text-theme-dark">{{ config('app.name') }}<span
                        class="text-theme-main text-4xl leading-none">.</span></span>
            </div>

            <div class="flex items-center gap-6 font-medium">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="px-4 py-2 rounded-lg hover:bg-theme-main/20 text-theme-dark transition font-bold">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 text-theme-dark hover:text-theme-main transition hidden sm:block font-bold">Log
                            in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="px-8 py-3 rounded-full bg-theme-dark text-white hover:bg-theme-main transition shadow-lg hover:shadow-theme-main/50 transform hover:-translate-y-1 font-bold">Register
                                Now</a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>

        <main>
            <section class="relative pt-32 pb-20 lg:pt-40 lg:pb-32 px-6 lg:px-20 w-full overflow-hidden">
                <div
                    class="absolute top-0 right-0 w-[500px] h-[500px] bg-theme-main/10 rounded-full blur-[100px] -z-10 animate-pulse">
                </div>

                <div
                    class="flex flex-col-reverse lg:flex-row items-center justify-between gap-16 lg:gap-0 max-w-[1600px] mx-auto">

                    <div class="lg:w-1/2 space-y-8 text-center lg:text-left z-10">
                        <div class="reveal active">
                            <span
                                class="inline-block px-5 py-2 rounded-full bg-theme-main/10 text-theme-dark text-sm font-bold tracking-[0.2em] mb-6 border border-theme-main/20 uppercase hover:bg-theme-main hover:text-white transition-colors duration-300 cursor-default">
                                New Drop 2026 🚀
                            </span>
                            <h1
                                class="text-9xl lg:text-9xl font-black leading-none tracking-tighter text-theme-dark mb-4">
                                Bajamas<br>
                                <span
                                    class="text-transparent bg-clip-text bg-gradient-to-r from-theme-main via-green-600 to-theme-main animate-gradient-text">
                                    Gaya Keren,
                                </span>
                            </h1>
                            <h2 class="text-9xl lg:text-9xl font-black leading-none tracking-tighter text-theme-dark mb-4">
                                Bumi Aman.
                            </h2>
                        </div>

                        <p class="text-xl text-gray-500 max-w-lg mx-auto lg:mx-0 leading-relaxed reveal delay-100">
                            Produk eco-friendly yang bikin kamu tampil beda, tanpa bikin bumi menderita. Desain
                            eksklusif untuk mereka yang peduli masa depan.
                        </p>

                        <div
                            class="flex flex-col sm:flex-row gap-5 justify-center lg:justify-start pt-4 reveal delay-200">
                            <a href="{{ route('register') }}"
                                class="group relative px-10 py-5 bg-theme-dark text-white rounded-2xl font-bold text-xl overflow-hidden shadow-2xl transition-all hover:scale-105">
                                <span
                                    class="absolute inset-0 w-full h-full bg-theme-main/50 group-hover:translate-x-full ease-out duration-500 transition-transform -translate-x-full"></span>
                                <span class="relative">Mulai Belanja 🔥</span>
                            </a>
                            <a href="#features"
                                class="px-10 py-5 bg-transparent border-2 border-theme-dark/10 text-theme-dark rounded-2xl font-bold text-xl hover:bg-white hover:border-transparent hover:shadow-xl transition-all">
                                Explore More
                            </a>
                        </div>
                    </div>

                    <div class="lg:w-1/2 w-full relative flex justify-end">
                        <div
                            class="absolute top-1/2 right-0 -translate-y-1/2 w-[140%] h-[140%] bg-gradient-to-l from-theme-main/20 to-transparent rounded-full blur-[120px] -z-10 pointer-events-none">
                        </div>

                        <div class="relative z-10 w-full lg:w-[90%] animate-float">
                            <div
                                class="rounded-[3rem] overflow-hidden shadow-2xl border-8 border-white relative aspect-[4/3] group transform transition-transform hover:scale-[1.02] duration-500">
                                <div
                                    class="absolute inset-0 bg-black/10 group-hover:bg-transparent transition-colors z-10">
                                </div>
                                <img src="{{ asset('images/showcase.jpg') }}"
                                    onerror="this.src='https://images.unsplash.com/photo-1523381210434-271e8be1f52b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80'"
                                    alt="Showcase Collection"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-[2s]">
                            </div>

                            <div
                                class="absolute -bottom-10 -left-10 bg-white p-6 rounded-3xl shadow-xl animate-float delay-300 hidden lg:block">
                                <p class="font-black text-4xl text-theme-dark">100%</p>
                                <p class="text-sm font-bold text-gray-400 uppercase tracking-wider">Recycled Material
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="w-full overflow-hidden py-12 -my-4">
                <section
                    class="py-8 bg-theme-dark text-white border-y border-white/10 rotate-1 scale-110 transform origin-center shadow-2xl z-20 relative">
                    <div class="marquee-container">
                        <div class="marquee-content font-black text-4xl uppercase tracking-tighter opacity-80">
                            Sustainable Fashion • Eco Friendly • High Quality • Save The Earth • Bajamas Official •
                            Sustainable Fashion • Eco Friendly • High Quality • Save The Earth • Bajamas Official •
                        </div>
                    </div>
                </section>
            </div>

            <section id="features" class="py-32 bg-white/50 relative">
                <div class="max-w-[1600px] mx-auto px-6 lg:px-20 relative z-10">
                    <div class="text-center mb-20 reveal">
                        <h2 class="text-5xl font-black text-theme-dark uppercase tracking-tight">Why Choose Us?</h2>
                        <div class="w-24 h-2 bg-theme-main mx-auto mt-6 rounded-full"></div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 lg:gap-12">
                        <div
                            class="bg-white p-12 rounded-[2.5rem] border border-gray-100 shadow-xl shadow-gray-200/50 hover:shadow-2xl hover:shadow-theme-main/20 transition-all duration-500 hover:-translate-y-4 reveal delay-100 group">
                            <div
                                class="w-24 h-24 bg-theme-bg text-theme-main rounded-3xl flex items-center justify-center mx-auto mb-10 group-hover:rotate-12 transition-transform duration-500">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 3.214L13 21l-2.286-6.857L5 12l5.714-3.214L13 3z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-3xl font-black text-theme-dark mb-4">Premium Quality</h3>
                            <p class="text-gray-500 leading-relaxed">Bahan terbaik dan aman, awet, dan tidak mudah
                                rusak. Dijamin puas.</p>
                        </div>
                        <div
                            class="bg-white p-12 rounded-[2.5rem] border border-gray-100 shadow-xl shadow-gray-200/50 hover:shadow-2xl hover:shadow-theme-main/20 transition-all duration-500 hover:-translate-y-4 reveal delay-200 group">
                            <div
                                class="w-24 h-24 bg-theme-bg text-theme-main rounded-3xl flex items-center justify-center mx-auto mb-10 group-hover:rotate-12 transition-transform duration-500">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-3xl font-black text-theme-dark mb-4">Fast Shipping</h3>
                            <p class="text-gray-500 leading-relaxed">Pesanan dikirim di hari yang sama. Gak pake lama,
                                langsung sampai tujuan.</p>
                        </div>
                        <div
                            class="bg-white p-12 rounded-[2.5rem] border border-gray-100 shadow-xl shadow-gray-200/50 hover:shadow-2xl hover:shadow-theme-main/20 transition-all duration-500 hover:-translate-y-4 reveal delay-300 group">
                            <div
                                class="w-24 h-24 bg-theme-bg text-theme-main rounded-3xl flex items-center justify-center mx-auto mb-10 group-hover:rotate-12 transition-transform duration-500">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                            </div>
                            <h3 class="text-3xl font-black text-theme-dark mb-4">Secure Payment</h3>
                            <p class="text-gray-500 leading-relaxed">Transaksi aman dengan berbagai metode pembayaran
                                terpercaya.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="py-32 bg-theme-dark relative overflow-hidden group">
                <div
                    class="absolute inset-0 opacity-5 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMiIgY3k9IjIiIHI9IjIiIGZpbGw9IiNGRkZGRkYiLz48L3N2Zz4=')] group-hover:scale-110 transition-transform duration-[3s]">
                </div>
                <div
                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-theme-main/20 rounded-full blur-[150px]">
                </div>

                <div class="max-w-[1200px] mx-auto text-center px-6 relative z-10 reveal">
                    <h2 class="text-6xl lg:text-8xl font-black text-white mb-10 leading-tight tracking-tighter">
                        "Don't just dream it. <br> <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-theme-main to-green-300">Wear
                            it.</span>"
                    </h2>
                    <a href="{{ route('register') }}"
                        class="inline-block px-12 py-6 bg-white text-theme-dark rounded-full font-black text-2xl hover:bg-theme-main hover:text-white transition-all shadow-[0_0_40px_rgba(255,255,255,0.3)] hover:shadow-[0_0_60px_rgba(34,197,94,0.6)] transform hover:scale-110">
                        Join the Movement &rarr;
                    </a>
                </div>
            </section>
        </main>

        <footer class="bg-white pt-20 pb-10 border-t border-gray-100 mt-auto reveal">
            <div class="max-w-[1600px] mx-auto px-6 lg:px-20 grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-2 mb-6">
                        <x-application-logo class="w-10 h-10 fill-current text-theme-main" />
                        <span
                            class="font-black text-3xl text-theme-dark tracking-tighter">{{ config('app.name') }}.</span>
                    </div>
                    <p class="text-gray-500 pr-6 mb-6 text-lg leading-relaxed">
                        Menghadirkan solusi ramah lingkungan untuk kebutuhan sehari-hari. Dari kemasan hingga alat rumah
                        tangga.
                    </p>
                </div>
                <div>
                    <h4 class="font-black text-theme-dark mb-8 uppercase tracking-widest text-sm">Quick Links</h4>
                    <ul class="space-y-4 text-gray-500 font-bold">
                        <li><a href="#" class="hover:text-theme-main hover:pl-2 transition-all">New Arrivals</a>
                        </li>
                        <li><a href="#" class="hover:text-theme-main hover:pl-2 transition-all">Best Sellers</a>
                        </li>
                        <li><a href="#" class="hover:text-theme-main hover:pl-2 transition-all">About Us</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-black text-theme-dark mb-8 uppercase tracking-widest text-sm">Contact</h4>
                    <ul class="space-y-4 text-gray-500 font-medium">
                        <li class="flex items-center gap-3">
                            <div
                                class="w-8 h-8 rounded-full bg-theme-bg flex items-center justify-center text-theme-main">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            hello@bajamas.com
                        </li>
                        <li class="flex items-center gap-3">
                            <div
                                class="w-8 h-8 rounded-full bg-theme-bg flex items-center justify-center text-theme-main">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            Surabaya, Indonesia
                        </li>
                    </ul>
                </div>
            </div>
            <div class="text-center py-8 border-t border-gray-100 text-sm text-gray-400 font-bold tracking-wider">
                &copy; {{ date('Y') }} {{ config('app.name') }}. CRAFTED FOR THE FUTURE.
            </div>
        </footer>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const introOverlay = document.getElementById('intro-overlay');
            const mainSite = document.getElementById('main-site');
            const body = document.body;

            // Durasi diperlama jadi 5.5 detik (5500ms)
            setTimeout(() => {
                introOverlay.classList.add('slide-out');
                mainSite.classList.remove('opacity-0');
                body.classList.remove('locked');
                revealOnScroll();
            }, 5500);

            // Scroll Reveal Logic
            const reveals = document.querySelectorAll('.reveal');

            function revealOnScroll() {
                const windowHeight = window.innerHeight;
                const elementVisible = 150;
                reveals.forEach((reveal) => {
                    const elementTop = reveal.getBoundingClientRect().top;
                    if (elementTop < windowHeight - elementVisible) {
                        reveal.classList.add('active');
                    }
                });
            }
            window.addEventListener('scroll', revealOnScroll);
        });
    </script>
</body>

</html>
