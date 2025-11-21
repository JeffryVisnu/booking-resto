<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel Admin') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-950 text-gray-200">
    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside 
            x-data="{ open: false }"
            class="w-64 bg-gray-900 border-r border-gray-800 hidden md:flex flex-col relative"
        >
            <!-- Logo -->
            <div class="px-6 py-6 border-b border-gray-800">
                <h1 class="text-xl font-bold tracking-wide text-indigo-400">
                    Admin Panel
                </h1>
            </div>

            <!-- Nav -->
            <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">

                <x-admin-nav-link :href="route('admin.menus.index')"
                    :active="request()->routeIs('admin.menus.index')">
                    🍽️ Menus
                </x-admin-nav-link>

                <x-admin-nav-link :href="route('admin.reservations.index')"
                    :active="request()->routeIs('admin.reservations.index')">
                    📅 Reservations
                </x-admin-nav-link>
            </nav>

            <!-- User Dropdown -->
            <div class="border-t border-gray-800 p-4">
                <div x-data="{ drop: false }" class="relative" @click.away="drop = false">
                    <button 
                        @click="drop = !drop"
                        class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium rounded-lg bg-gray-800/50 hover:bg-gray-800 transition duration-200"
                    >
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="drop"
                        x-transition
                        class="absolute right-0 bottom-full mb-2 w-48 bg-gray-900 rounded-lg shadow-xl z-50"
                    >
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm hover:bg-gray-800 rounded-lg transition">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 p-8 bg-gray-950">
            <!-- Alerts -->
            <div class="space-y-4 mb-6">
                @if (session()->has('danger'))
                    <div class="p-4 rounded-lg bg-red-900/30 text-red-300 border border-red-800">
                        ⚠️ {{ session('danger') }}
                    </div>
                @endif

                @if (session()->has('success'))
                    <div class="p-4 rounded-lg bg-green-900/30 text-green-300 border border-green-800">
                        ✔️ {{ session('success') }}
                    </div>
                @endif

                @if (session()->has('warning'))
                    <div class="p-4 rounded-lg bg-yellow-900/30 text-yellow-300 border border-yellow-800">
                        ⚠️ {{ session('warning') }}
                    </div>
                @endif
            </div>

            {{ $slot }}
        </main>

    </div>
</body>

</html>
