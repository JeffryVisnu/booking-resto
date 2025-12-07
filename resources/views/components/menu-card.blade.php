<div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 w-64">
    <div class="overflow-hidden rounded-t-2xl">
        <img class="w-full h-48 object-cover hover:scale-105 transition-all duration-300"
            src="{{ Storage::url($menu->image) }}" alt="{{ $menu->name }}" />
    </div>

    <div class="px-6 py-4 text-center">
        <h4 class="mb-2 text-xl font-semibold text-[#4A3F35] hover:text-[#2F4F3A] transition-colors duration-300 uppercase tracking-wide">
            {{ $menu->name }}
        </h4>
        <p class="text-gray-600 leading-normal">{{ $menu->description }}</p>
    </div>

    <div class="px-6 py-4 flex items-center justify-center">
        <p class="text-lg font-semibold text-green-700">
            Rp {{ number_format($menu->price, 2, ',', '.') }}
        </p>
    </div>
</div>
