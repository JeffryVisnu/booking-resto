<x-admin-layout>
    <div class="py-10">
        <div class="max-w-4xl mx-auto">

            <!-- Back Button -->
            <a href="{{ route('admin.reservations.index') }}"
                class="inline-flex items-center px-4 py-2 mb-6 text-sm font-semibold bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow">
                ← Back to Reservations
            </a>

            <!-- Card -->
            <div class="bg-gray-900 border border-gray-800 shadow-xl rounded-2xl p-8">
                <h2 class="text-2xl font-bold mb-6 text-indigo-400">Edit Reservation</h2>

                <form method="POST" action="{{ route('admin.reservations.update', $reservation->id) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- First Name -->
                    <div>
                        <label class="text-sm font-semibold text-gray-300">First Name</label>
                        <input type="text" name="first_name" value="{{ $reservation->first_name }}"
                            class="mt-1 w-full bg-gray-800 border border-gray-700 text-gray-200 rounded-lg px-4 py-2">
                    </div>

                    <!-- Last Name -->
                    <div>
                        <label class="text-sm font-semibold text-gray-300">Last Name</label>
                        <input type="text" name="last_name" value="{{ $reservation->last_name }}"
                            class="mt-1 w-full bg-gray-800 border border-gray-700 text-gray-200 rounded-lg px-4 py-2">
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="text-sm font-semibold text-gray-300">Email</label>
                        <input type="email" name="email" value="{{ $reservation->email }}"
                            class="mt-1 w-full bg-gray-800 border border-gray-700 text-gray-200 rounded-lg px-4 py-2">
                    </div>

                    <!-- Phone -->
                    <div>
                        <label class="text-sm font-semibold text-gray-300">Phone Number</label>
                        <input type="text" name="tel_number" value="{{ $reservation->tel_number }}"
                            class="mt-1 w-full bg-gray-800 border border-gray-700 text-gray-200 rounded-lg px-4 py-2">
                    </div>

                    <!-- Date -->
                    <div>
                        <label class="text-sm font-semibold text-gray-300">Reservation Date</label>
                        <input type="datetime-local" name="res_date"
                            value="{{ $reservation->res_date->format('Y-m-d\TH:i') }}"
                            class="mt-1 w-full bg-gray-800 border border-gray-700 text-gray-200 rounded-lg px-4 py-2">
                    </div>

                    <!-- Guest Number -->
                    <div>
                        <label class="text-sm font-semibold text-gray-300">Guest</label>
                        <input type="number" name="guest_number" value="{{ $reservation->guest_number }}"
                            class="mt-1 w-full bg-gray-800 border border-gray-700 text-gray-200 rounded-lg px-4 py-2">
                    </div>

                    
                    <button type="submit"
                        class="px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow">
                        Update
                    </button>

                </form>
            </div>

        </div>
    </div>
</x-admin-layout>
