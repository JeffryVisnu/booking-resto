<x-guest-layout>
    <div class="w-full min-h-screen px-6 py-10 mx-auto bg-[#FFF7E8]">

        <h2 class="text-4xl font-bold text-center text-[#4A3F35] mb-10 tracking-wide">
            Our Menu
        </h2>

        <!-- Filter & Sort -->
        <div class="w-full mb-10 flex flex-col md:flex-row items-start justify-start gap-4">

            <form method="GET" class="flex items-center gap-3">
                <!-- Filter Category -->
                <select name="category" onchange="this.form.submit()"
                    class="px-4 py-2 rounded-lg border border-[#4A3F35] bg-white text-[#4A3F35] shadow-sm focus:ring focus:ring-[#4A3F35]">
                    <option value="">All Categories</option>

                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ $categoryFilter == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>

                <!-- Sorting -->
                <select name="sort" onchange="this.form.submit()"
                    class="px-4 py-2 rounded-lg border border-[#4A3F35] bg-white text-[#4A3F35] shadow-sm">
                    <option value="">Sort by</option>
                    <option value="price_asc" {{ $sort == 'price_asc' ? 'selected' : '' }}>Cheapest → Expensive</option>
                    <option value="price_desc" {{ $sort == 'price_desc' ? 'selected' : '' }}>Expensive → Cheapest</option>
                </select>
            </form>

        </div>


        <!-- Jika user memilih filter/sort → tampilkan normal -->
        @if ($categoryFilter || $sort)
            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 place-items-center">
                @forelse ($menus as $menu)
                    @include('components.menu-card', ['menu' => $menu])
                @empty
                    <p class="col-span-full text-center text-[#4A3F35] text-lg font-semibold mt-10">
                        No menu available for this category.
                    </p>
                @endforelse
            </div>

        @else
        <!-- Jika user BELUM melakukan filter/sort → tampil per kategori -->
        
            @foreach ($groupedMenus as $categoryName => $items)
                <h3 class="text-3xl font-semibold text-[#4A3F35] mt-12 mb-6">
                    {{ $categoryName }}
                </h3>

                <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 place-items-center">
                    @foreach ($items as $menu)
                        @include('components.menu-card', ['menu' => $menu])
                    @endforeach
                </div>
            @endforeach

        @endif

    </div>
</x-guest-layout>
