<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-amber-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-10 max-w-6xl mx-auto">

        {{-- CARD SELAMAT DATANG --}}
        <div class="bg-[#3A2A1F] border border-[#6B4B32] p-6 rounded-xl shadow-lg mb-10">
            <h3 class="text-2xl font-bold text-amber-300 mb-3">
                Selamat Datang di Admin Panel
            </h3>
            <p class="text-amber-100">
                Anda berhasil login! Gunakan menu di samping untuk mengelola kategori, menu,
                dan reservasi pelanggan.
            </p>
        </div>

        {{-- STATISTIC CARDS --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

            {{-- Jumlah Kategori --}}
            <div class="bg-[#3A2A1F] border border-[#6B4B32] p-6 rounded-xl shadow-lg">
                <h4 class="text-lg font-semibold text-amber-300">Total Kategori</h4>
                <p class="text-3xl font-bold text-amber-200 mt-2">{{ $categoryCount ?? 0 }}</p>
            </div>

            {{-- Jumlah Menu --}}
            <div class="bg-[#3A2A1F] border border-[#6B4B32] p-6 rounded-xl shadow-lg">
                <h4 class="text-lg font-semibold text-amber-300">Total Menu</h4>
                <p class="text-3xl font-bold text-amber-200 mt-2">{{ $menuCount ?? 0 }}</p>
            </div>

            {{-- Jumlah Reservasi --}}
            <div class="bg-[#3A2A1F] border border-[#6B4B32] p-6 rounded-xl shadow-lg">
                <h4 class="text-lg font-semibold text-amber-300">Total Reservasi</h4>
                <p class="text-3xl font-bold text-amber-200 mt-2">{{ $reservationCount ?? 0 }}</p>
            </div>

        </div>

    </div>
</x-admin-layout>
