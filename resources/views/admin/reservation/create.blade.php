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
                class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Reservation Index</a>
            </div>

            <div class="m-2 p-2 bg-slate-100 rounded">
                <div class="mt-10 w-1/2 space-y-8 divide-y divide-gray-200">
                    <form enctype="multipart/form-data" class="space-y-6">
                    <!-- Input Name -->
                    <div class="sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">Name</label>
                        <div class="mt-1">
                            <input type="text" id="title" name="title" wire:model.lazy="title" class="block w-full rounded-md border border-gray-400 bg-white px-3 py-2 transition duration-150 ease-in-out focus:border-indigo-500 focus:ring-indigo-500" />
                        </div>
                    </div>
            
                    <!-- Input Image -->
                    <div class="sm:col-span-6">
                        <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                        <div class="mt-1">
                        <input type="file" id="image" name="image" wire:model="newImage" class="rounded-md border border-gray-400 bg-white px-2 py-1 transition duration-150 ease-in-out" />
                        </div>
                    </div>
                
                    <!-- Input Description -->
                    <div class="pt-5 sm:col-span-6">
                        <label for="body" class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                        <textarea id="body" name="body" rows="3" wire:model.lazy="body" class="w-full appearance-none rounded-md border border-gray-400 bg-white px-3 py-2 shadow-sm transition duration-150 ease-in-out focus:border-indigo-500 focus:ring-indigo-500"></textarea>
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
