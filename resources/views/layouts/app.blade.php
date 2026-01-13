<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Bajamas') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,900&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-theme-bg text-theme-dark flex flex-col min-h-screen">
        
        <div class="flex-grow">
            @include('layouts.navigation')

            @isset($header)
                <header class="bg-white/50 backdrop-blur-md shadow-sm border-b border-theme-soft sticky top-20 z-40">
                    <div class="max-w-[1680px] mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <main>
                @if (isset($slot))
                    {{ $slot }}
                @else
                    @yield('content')
                @endif
            </main>
        </div>

        <footer class="bg-theme-dark text-white pt-20 pb-10 mt-auto border-t border-theme-main/30 relative overflow-hidden">
            
            
            <div class="absolute top-0 left-0 w-64 h-64 bg-white/5 rounded-full blur-3xl -ml-20 -mt-20 pointer-events-none"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-theme-main/10 rounded-full blur-3xl -mr-20 -mb-20 pointer-events-none"></div>

            <div class="max-w-[1600px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-12 mb-16">
                    
                    <div class="lg:col-span-4 space-y-6">
                        <h4 class="text-2xl font-black tracking-tighter text-white">About Us</h4>
                        <p class="text-gray-100 text-sm leading-relaxed pr-6">
                            Solusi kemasan ramah lingkungan untuk masa depan yang berkelanjutan. Kami berkomitmen menyediakan produk berkualitas tinggi dengan jejak karbon minimal.
                        </p>
                    </div>

                    <div class="lg:col-span-2">
                        <h4 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                            <span class="w-8 h-[2px] bg-theme-main"></span> Shop
                        </h4>
                        <ul class="space-y-3 text-sm text-gray-200">
                            <li><a href="#" class="hover:text-theme-main hover:translate-x-1 transition-all inline-block">All Products</a></li>
                            <li><a href="#" class="hover:text-theme-main hover:translate-x-1 transition-all inline-block">Best Sellers</a></li>
                            <li><a href="#" class="hover:text-theme-main hover:translate-x-1 transition-all inline-block">New Arrivals</a></li>
                            <li><a href="#" class="hover:text-theme-main hover:translate-x-1 transition-all inline-block">Food Packaging</a></li>
                        </ul>
                    </div>

                    <div class="lg:col-span-2">
                        <h4 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
                            <span class="w-8 h-[2px] bg-theme-main"></span> Support
                        </h4>
                        <ul class="space-y-3 text-sm text-gray-200">
                            <li><a href="#" class="hover:text-theme-main hover:translate-x-1 transition-all inline-block">Help Center</a></li>
                            <li><a href="#" class="hover:text-theme-main hover:translate-x-1 transition-all inline-block">Shipping Info</a></li>
                            <li><a href="#" class="hover:text-theme-main hover:translate-x-1 transition-all inline-block">Returns & Refund</a></li>
                            <li><a href="#" class="hover:text-theme-main hover:translate-x-1 transition-all inline-block">Contact Us</a></li>
                        </ul>
                    </div>

                    <div class="lg:col-span-4">
                        <h4 class="text-lg font-bold text-white mb-4">Join Our Green Community 🌱</h4>
                        <p class="text-gray-100 text-sm mb-6">Ikuti perjalanan kami di media sosial untuk tips gaya hidup berkelanjutan.</p>
                        
                        <div class="flex gap-4 pt-2 mb-8">
                            <a href="#" class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center transition-all duration-300 group hover:bg-[#1DA1F2] hover:-translate-y-1 hover:shadow-lg hover:shadow-blue-400/30">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                            </a>
                            <a href="#" class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center transition-all duration-300 group hover:bg-gradient-to-tr hover:from-[#f09433] hover:via-[#dc2743] hover:to-[#bc1888] hover:-translate-y-1 hover:shadow-lg hover:shadow-pink-500/30">
                                <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </a>
                        </div>

                        <div>
                            <p class="text-xs font-bold text-white-400 uppercase tracking-widest mb-3">Secure Payment</p>
                            <div class="flex items-center gap-4">
                                <div class="h-8 w-12 bg-white rounded flex items-center justify-center shadow-sm"><span class="text-[10px] font-black text-blue-800">VISA</span></div>
                                <div class="h-8 w-12 bg-white rounded flex items-center justify-center shadow-sm"><span class="text-[10px] font-black text-red-600">Master</span></div>
                                <div class="h-8 w-12 bg-white rounded flex items-center justify-center shadow-sm"><span class="text-[10px] font-black text-blue-500">BCA</span></div>
                                <div class="h-8 w-12 bg-white rounded flex items-center justify-center shadow-sm"><span class="text-[10px] font-black text-orange-500">BNI</span></div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="border-t border-white/10 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-white">
                    <p class="text-">&copy; {{ date('Y') }} Bajamas Store. All rights reserved.</p>
                    <div class="flex gap-6">
                        <a href="#" class="text-white hover:text-white transition-colors">Privacy Policy</a>
                        <a href="#" class="text-white hover:text-white transition-colors">Cookie Policy</a>
                        <a href="#" class="text-white hover:text-white transition-colors">Sitemap</a>
                    </div>
                </div>
            </div>
        </footer>

    </body>
</html>