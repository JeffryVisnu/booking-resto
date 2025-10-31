<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex m-2 p-2">
                <a href="{{ route('admin.categories.index') }}" 
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Category Index</a>
            </div>

            <div class="m-2 p-2 bg-slate-100 rounded">
                <div class="mt-10 w-1/2 space-y-8 divide-y divide-gray-200">
                    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Edit Name -->
                        @method('PUT')
                        <div class="sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <div class="mt-1">
                                <input type="text" id="title" name="name" value="{{ $category->name }}"
                                class="block w-full rounded-md border border-gray-400 bg-white px-3 py-2 focus:border-indigo-500 focus:ring-indigo-500" />
                            </div>
                        </div>
                
                        <!-- Edit Image -->
                        <div class="sm:col-span-6">
                            <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                            <div>
                                <img class="w-32 h-32" src="{{ Storage::url($category->image) }}">
                            </div>
                            <div class="mt-1">
                            <input type="file" id="image" name="image" class="block w-full rounded-md border border-gray-400 bg-white px-2 py-1/>
                            </div>
                        </div>
                    
                        <!-- Edit Description -->
                        <div class="pt-5 sm:col-span-6">
                            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                            <div class="mt-1">
                            <textarea id="description" name="description" rows="3" class="block w-full appearance-none rounded-md border border-gray-400 bg-white px-3 py-2 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                {{ $category->description }}
                            </textarea>
                            </div>
                        </div>
                        <div class="mt-6 p-4">
                            <button type='sumbit' class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
