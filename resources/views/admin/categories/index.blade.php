<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-amber-200">Categories</h2>
    </x-slot>

        <div class="py-8 max-w-6xl mx-auto">

            {{-- Add Category --}}
            <div class="flex justify-end mb-6">
                <a href="{{ route('admin.categories.create') }}"
                    class="px-4 py-2 bg-amber-700 hover:bg-amber-800 text-white rounded-lg shadow-lg">
                    + Add Category
                </a>
            </div>

            <div class="bg-[#3A2A1F] shadow-xl rounded-xl p-6 border border-[#6B4B32]">
                <table class="w-full text-amber-100">
                    <tr class="border-b border-[#6B4B32] text-left">
                        <th class="p-3">Name</th>
                        <th class="p-3">Parent</th>
                        <th class="p-3">Action</th>
                    </tr>

                    @foreach ($categories as $cat)
                        <tr class="border-b border-[#6B4B32]">
                            <td class="p-3">{{ $cat->name }}</td>
                            <td class="p-3">{{ $cat->parent->name ?? '-' }}</td>
                            <td class="p-3 flex gap-3">

                                <!-- Edit -->
                                <a href="{{ route('admin.categories.edit', $cat->id) }}"
                                   class="px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                                    Edit
                                </a>

                                <!-- Delete -->
                                <form method="POST"
                                      action="{{ route('admin.categories.destroy', $cat->id) }}"
                                      onsubmit="return confirm('Delete this category?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded-lg">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @endforeach

                </table>

            </div>
        </div>
</x-admin-layout>
