<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-amber-200">
            Create Menu
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-3xl mx-auto">

            <!-- Back to Menu -->
            <a href="{{ route('admin.menus.index') }}"
                class="inline-block mb-6 px-4 py-2 bg-amber-700 hover:bg-amber-800 text-white rounded-lg shadow-lg">
                ← Back to Menu List
            </a>

            <div class="bg-[#3A2A1F] shadow-xl rounded-xl p-8 border border-[#6B4B32]">

                <form method="POST" action="{{ route('admin.menus.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-semibold text-amber-200">Name</label>
                        <input type="text" name="name"
                            class="mt-1 w-full rounded-lg border-[#6B4B32] bg-[#4A3520] text-amber-100 placeholder-[#f5d7b3] font-semibold px-3 py-2 focus:border-amber-400 focus:ring-amber-400">
                        @error('name') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Image -->
                    <div>
                        <label class="block text-sm font-semibold text-amber-200">Image</label>
                        <input type="file" name="image"
                            class="mt-1 w-full rounded-lg border-[#6B4B32] bg-[#4A3520] text-amber-100 p-2 focus:border-amber-400 focus:ring-amber-400">
                        @error('image') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Price -->
                    <div>
                        <label class="block text-sm font-semibold text-amber-200">Price</label>
                        <input type="number" name="price" step="0.01"
                            class="mt-1 w-full rounded-lg border-[#6B4B32] bg-[#4A3520] text-amber-100 placeholder-[#f5d7b3] font-semibold px-3 py-2 focus:border-amber-400 focus:ring-amber-400">
                        @error('price') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-semibold text-amber-200">Description</label>
                        <textarea name="description" rows="3"
                            class="mt-1 w-full rounded-lg border-[#6B4B32] bg-[#4A3520] text-amber-100 placeholder-[#f5d7b3] font-semibold px-3 py-2 focus:border-amber-400 focus:ring-amber-400"></textarea>
                        @error('description') <p class="text-red-400 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit"
                        class="w-full py-2 bg-amber-700 hover:bg-amber-800 text-white rounded-lg font-semibold shadow-lg">
                        Submit
                    </button>
                </form>

            </div>

        </div>
    </div>
</x-admin-layout>
