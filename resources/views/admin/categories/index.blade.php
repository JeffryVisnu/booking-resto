<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Tombol Tambah Kategori -->
            <div class="flex justify-end m-2 p-2">
                <a 
                    href="{{ route('admin.categories.create') }}" 
                    class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                    New Category
                </a>
            </div>

            <!-- Tabel Kategori -->
            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                            <table class="min-w-full">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th 
                                            scope="col" 
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"
                                        >
                                            Name
                                        </th>
                                        <th 
                                            scope="col" 
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"
                                        >
                                            Image
                                        </th>
                                        <th 
                                            scope="col" 
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"
                                        >
                                            Description
                                        </th>
                                        <th 
                                            scope="col" 
                                            class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400"
                                        >
                                            Actions
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $category->name }}
                                            </td>

                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <img 
                                                    src="{{ Storage::url($category->image) }}" 
                                                    class="w-16 h-16 rounded object-cover"
                                                >
                                            </td>

                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $category->description }}
                                            </td>

                                            <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="flex space-x-2">
                                                    <a 
                                                        href="{{ route('admin.categories.edit', $category->id) }}" 
                                                        class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-lg text-white"
                                                    >
                                                        Edit
                                                    </a>

                                                    <form 
                                                        method="POST" 
                                                        action="{{ route('admin.categories.destroy', $category->id) }}"
                                                        onsubmit="return confirm('Are you sure?');"
                                                    >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button 
                                                            type="submit" 
                                                            class="px-4 py-2 bg-red-500 hover:bg-red-700 rounded-lg text-white"
                                                        >
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            @if ($categories->isEmpty())
                                <div class="text-center py-6 text-gray-500 dark:text-gray-400">
                                    No categories found.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
