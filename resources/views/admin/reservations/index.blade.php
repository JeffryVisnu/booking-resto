<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Reservations</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Add button -->
            <div class="flex justify-end mb-4">
                <a href="{{ route('admin.reservations.create') }}"
                    class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow">
                    + New Reservation
                </a>
            </div>

            <div class="overflow-hidden bg-gray-900 border border-gray-800 shadow-xl rounded-xl">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead class="bg-gray-800">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Reservation ID</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Phone</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Guests</th>
                            <th class="px-6 py-3"></th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-800">
                        @foreach ($reservations as $reservation)
                            <tr class="hover:bg-gray-800/50">
                                <td class="px-6 py-4 text-gray-100">
                                    {{ $reservation->id }}
                                </td>
                                <td class="px-6 py-4 text-gray-100">
                                    {{ $reservation->first_name }} {{ $reservation->last_name }}
                                </td>

                                <td class="px-6 py-4 text-gray-300">
                                    {{ $reservation->email }}
                                </td>

                                <td class="px-6 py-4 text-gray-300">
                                    {{ $reservation->tel_number }}
                                </td>

                                <td class="px-6 py-4 text-gray-300">
                                    {{ $reservation->res_date }}
                                </td>

                                <td class="px-6 py-4 text-gray-300">
                                    {{ $reservation->guest_number }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('admin.reservations.edit', $reservation->id) }}"
                                            class="px-3 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
                                            Edit
                                        </a>

                                        <form method="POST" action="{{ route('admin.reservations.destroy', $reservation->id) }}"
                                            onsubmit="return confirm('Are you sure?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="px-3 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
