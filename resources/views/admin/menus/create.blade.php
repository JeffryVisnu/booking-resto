<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.menus.index') }}" 
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Menu Index</a>
            </div>

            <div class="m-2 p-2 bg-slate-100 rounded">
                <div class="mt-10 w-1/2 space-y-8 divide-y divide-gray-200">
                    <form method="POST" action="{{ route('admin.menus.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Input Name -->
                    <div class="sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                            <input type="text" id="name" name="name" class="block w-full rounded-md border border-gray-400 bg-white px-3 py-2  focus:border-indigo-500 focus:ring-indigo-500" />
                        </div>
                    </div>
            
                    <!-- Input Image -->
                    <div class="sm:col-span-6">
                        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                        <div class="mt-1">
                        <input type="file" id="image" name="image" class="block w-full rounded-md border border-gray-400 bg-white px-2 py-1" />
                        </div>
                    </div>
                
                    <!-- Input Price -->
                    <div class="sm:col-span-6">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <div class="mt-1">
                        <input type="number" min="0.00" max="1000000.00" step="0.01" id="price" name="price"
                        class="block w-full rounded-md border border-gray-400 bg-white px-2 py-1 " />
                        </div>
                    </div>

                    <!-- Input Description -->
                    <div class="pt-5 sm:col-span-6">
                        <label for="body" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                        <textarea id="body" name="description" rows="3" class="block w-full appearance-none rounded-md border border-gray-400 bg-white px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                        </div>
                    </div>
                    <!-- Choose Category -->
                    <div class="pt-5 sm:col-span-6">
                        <label for="body" class="block text-sm font-medium text-gray-700">Categories</label>
                        <div class="mt-1">
                            <select id="categories" name="categories[]" class="form-multiselect block w-full mt-1"
                            multiple>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mt-6 p-4">
                        <button type='sumbit' class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Sumbit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
