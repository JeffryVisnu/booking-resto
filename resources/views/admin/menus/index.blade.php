<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-200">
            Menus
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto space-y-6">

            <!-- Add Menu Button -->
            <div class="flex justify-end">
                <a href="{{ route('admin.menus.create') }}"
                    class="px-4 py-2 bg-amber-700 hover:bg-amber-800 text-white rounded-lg shadow-lg">
                    + Add Menu
                </a>
            </div>

            <!-- Menu Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                @forelse ($menus as $menu)
                    <div class="bg-[#3A2A1F] shadow-md rounded-xl overflow-hidden border border-[#6B4B32]">

                        <img src="{{ Storage::url($menu->image) }}" class="w-full h-40 object-cover">

                        <div class="p-5 space-y-3">
                            <h3 class="text-lg font-semibold text-amber-200">
                                {{ $menu->name }}
                            </h3>

                            <p class="text-yellow-400 font-bold text-lg">
                                Rp {{ number_format($menu->price, 2, ',', '.') }}
                            </p>

                            <div class="flex items-center gap-3 pt-3">
                                <a href="{{ route('admin.menus.edit', $menu->id) }}"
                                   class="flex-1 text-center px-3 py-2 bg-green-700 hover:bg-green-800 text-white rounded-lg shadow">
                                    Edit
                                </a>

                                <form method="POST" action="{{ route('admin.menus.destroy', $menu->id) }}"
                                      class="flex-1"
                                      onsubmit="return confirm('Delete this menu?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="w-full px-3 py-2 bg-red-700 hover:bg-red-800 text-white rounded-lg shadow">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>

                @empty
                    <p class="text-center text-gray-400 py-10 col-span-3">
                        No menus found.
                    </p>
                @endforelse
            </div>

        </div>
    </div>
</x-admin-layout>
