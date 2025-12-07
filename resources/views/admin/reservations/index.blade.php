<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-amber-200">
            Reservation List
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto space-y-6">

            <!-- Reservation Table -->
            <div class="overflow-x-auto bg-[#3A2A1F] border border-[#6B4B32] rounded-xl shadow-lg">
                <table class="w-full text-left text-amber-100">
                    <thead>
                        <tr class="bg-[#6B4B32] text-amber-200">
                            <th class="px-5 py-3">Name</th>
                            <th class="px-5 py-3">Email</th>
                            <th class="px-5 py-3">Phone</th>
                            <th class="px-5 py-3">Date</th>
                            <th class="px-5 py-3">Time</th>
                            <th class="px-5 py-3">Guests</th>
                            <th class="px-5 py-3 text-center">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($reservations as $reservation)
                            <tr class="border-b border-[#6B4B32]">
                                <td class="px-5 py-3">{{ $reservation->first_name }} {{ $reservation->last_name }}</td>
                                <td class="px-5 py-3">{{ $reservation->email }}</td>
                                <td class="px-5 py-3">{{ $reservation->tel_number}}</td>
                                <td class="px-5 py-3">{{ $reservation->res_date->format('d M Y') }}</td>
                                <td class="px-5 py-3">{{ $reservation->res_date->format('H:i') }}</td>
                                <td class="px-5 py-3">{{ $reservation->guest_number }}</td>

                                <td class="px-5 py-3 text-center">
                                    <div class="flex items-center justify-center gap-3">

                                        <!-- Delete -->
                                        <form method="POST"
                                            action="{{ route('admin.reservations.destroy', $reservation->id) }}"
                                            onsubmit="return confirm('Delete this reservation?');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="px-3 py-2 bg-red-700 hover:bg-red-800 text-white rounded-lg shadow">
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-6 text-amber-300 italic">
                                    No reservations found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-admin-layout>
