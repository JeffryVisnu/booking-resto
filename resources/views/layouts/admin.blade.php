<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel Admin') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-serif antialiased bg-[#FFF7E8] text-[#4A3F35]">
    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside 
            x-data="{ open: false }"
            class="w-64 bg-[#3A3A3A] text-[#FFF7E8] border-r border-[#4A3F35] hidden md:flex flex-col relative"
        >
            <!-- Logo -->
            <div class="px-6 py-6 border-b border-[#4A3F35]">
                <h1 class="text-2xl font-extrabold tracking-wide text-white">
                    Admin Panel
                </h1>
            </div>

            <!-- Navigation -->
            <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">

                <x-admin-nav-link :href="route('admin.menus.index')"
                    :active="request()->routeIs('admin.menus.index')"
                    class="hover:bg-[#4A3F35]/40 rounded-lg text-[#FFF7E8]">
                    🍽️ Menus
                </x-admin-nav-link>

                <x-admin-nav-link :href="route('admin.reservations.index')"
                    :active="request()->routeIs('admin.reservations.index')"
                    class="hover:bg-[#4A3F35]/40 rounded-lg text-[#FFF7E8]">
                    📅 Reservations
                </x-admin-nav-link>

            </nav>

            <!-- User Dropdown -->
            <div class="border-t border-[#4A3F35] p-4">
                <div x-data="{ drop: false }" class="relative" @click.away="drop = false">
                    <button 
                        @click="drop = !drop"
                        class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium rounded-lg bg-[#4A3F35]/40 hover:bg-[#4A3F35]/60 transition duration-200"
                    >
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="drop"
                        x-transition
                        class="absolute right-0 bottom-full mb-2 w-48 bg-[#3A3A3A] rounded-lg shadow-xl z-50 border border-[#4A3F35]"
                    >
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm hover:bg-[#4A3F35]/40 rounded-lg transition text-[#FFF7E8]">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 p-8 bg-[#FFF7E8] text-[#4A3F35]">

            <!-- Alerts -->
            <div class="space-y-4 mb-6">
                @if (session()->has('danger'))
                    <div class="p-4 rounded-lg bg-red-200 text-red-900 border border-red-400">
                        ⚠️ {{ session('danger') }}
                    </div>
                @endif

                @if (session()->has('success'))
                    <div class="p-4 rounded-lg bg-green-200 text-green-900 border border-green-400">
                        ✔️ {{ session('success') }}
                    </div>
                @endif

                @if (session()->has('warning'))
                    <div class="p-4 rounded-lg bg-yellow-200 text-yellow-900 border border-yellow-400">
                        ⚠️ {{ session('warning') }}
                    </div>
                @endif
            </div>

            {{ $slot }}
        </main>

    </div>
</body>

</html>
