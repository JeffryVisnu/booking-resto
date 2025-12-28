<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-[#FFF7E8] min-h-screen">
        <div class="backdrop-blur-md bg-[#FFF7E8]/90 border-b border-[#E5C07B]/40 shadow-sm" x-data="{ isOpen: false }">
            <nav class="container mx-auto px-6 py-4 flex items-center justify-between">
        
                <!-- Logo -->
                <a href="/" class="flex items-center">
                    <img src="{{ asset('storage/assets/Gusteaus_logo.png') }}"
                        alt="Gusteau Logo"
                        class="h-20 w-auto object-contain drop-shadow-sm">
                </a>
        
                <!-- Mobile Menu Button -->
                <button @click="isOpen = !isOpen"
                    class="md:hidden text-[#3A3A3A] hover:text-[#C9A35A] transition">
                    <svg viewBox="0 0 24 24" class="w-8 h-8 fill-current">
                        <path fill-rule="evenodd"
                            d="M4 5h16a1 1 0 1 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 1 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 1 1 0 2H4a1 1 0 1 1 0-2z" />
                    </svg>
                </button>
        
                <!-- Desktop Menu -->
                <div :class="isOpen ? 'flex' : 'hidden'"
                    class="flex-col md:flex md:flex-row md:items-center md:space-x-12 mt-6 md:mt-0 
                        space-y-4 md:space-y-0 text-lg font-medium tracking-wide">
        
                    <a href="/" 
                    class="text-[#3A3A3A] hover:text-[#C9A35A] transition duration-200">
                    Home
                    </a>
        
                    <a href="{{ route('menus.index') }}" 
                    class="text-[#3A3A3A] hover:text-[#C9A35A] transition duration-200">
                    Our Menu
                    </a>
        
                    <a href="{{ route('reservations.step.one') }}"
                    class="px-5 py-2 rounded-full border border-[#C9A35A] text-[#3A3A3A] 
                            hover:bg-[#C9A35A] hover:text-white transition duration-300">
                    Reserve Now
                    </a>
                </div>
        
            </nav>
        </div>
        
        
        <div class="min-h-screen bg-[#FFF7E8]">
                {{ $slot }}
            </div>
            <footer class="bg-[#2F2F2F] py-14 border-t border-gray-700">
                <div class="container mx-auto px-6 flex flex-col items-center">
                    
                    <h2 class="text-3xl font-serif text-[#E5C07B] mb-6">
                        Gusteau's Restaurant
                    </h2>
            
                    <p class="text-gray-500 text-sm mt-6">
                        © 2025 Gusteau's. All rights reserved.
                    </p>
            
                </div>
            </footer>
            
        </div>
    </body>
</html>
