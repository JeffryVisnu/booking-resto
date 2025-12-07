<x-guest-layout>
    <div class="w-full min-h-screen bg-[#FFF7E8] flex items-center justify-center py-10 px-5">

        <div class="bg-white shadow-lg rounded-2xl p-10 max-w-3xl w-full">

            <h3 class="text-3xl font-bold text-[#4A3F35] mb-6">
                Confirm Your Reservation
            </h3>

            <!-- Step Indicator -->
            <div class="w-full bg-gray-200 rounded-full mb-6">
                <div class="w-2/4 p-1 text-xs font-medium text-center text-white bg-green-600 rounded-full">
                    Step 2
                </div>
            </div>

            <form method="POST" action="{{ route('reservations.store.step.two') }}">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-sm font-medium">First Name</label>
                        <input disabled value="{{ $reservation->first_name }}" 
                               class="w-full p-2 bg-gray-100 border rounded-md">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Last Name</label>
                        <input disabled value="{{ $reservation->last_name }}" 
                               class="w-full p-2 bg-gray-100 border rounded-md">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Email</label>
                        <input disabled value="{{ $reservation->email }}" 
                               class="w-full p-2 bg-gray-100 border rounded-md">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Phone Number</label>
                        <input disabled value="{{ $reservation->tel_number }}" 
                               class="w-full p-2 bg-gray-100 border rounded-md">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Reservation Date</label>
                        <input disabled value="{{ $reservation->res_date->format('d/m/Y') }}"
                               class="w-full p-2 bg-gray-100 border rounded-md">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Time</label>
                        <input disabled value="{{ $reservation->res_date->format('h:i A') }}"
                               class="w-full p-2 bg-gray-100 border rounded-md">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Guest Number</label>
                        <input disabled value="{{ $reservation->guest_number }}" 
                               class="w-full p-2 bg-gray-100 border rounded-md">
                    </div>
                </div>

                <!-- Confirm -->
                <div class="mt-6 flex items-start">
                    <input type="checkbox" id="confirm" name="confirm" 
                           class="w-4 h-4 mt-1">
                    <label for="confirm" class="ml-2 text-sm">
                        I confirm that the data entered above is complete and correct.
                    </label>
                </div>
                @error('confirm')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror

                <div class="flex justify-between mt-8">
                    <a href="{{ route('reservations.step.one') }}" 
                       class="px-6 py-2 bg-gray-500 text-white rounded-md">
                        Previous
                    </a>

                    <button type="submit"
                            class="px-6 py-2 bg-green-600 text-white rounded-md">
                        Confirm Reservation
                    </button>
                </div>
            </form>

        </div>

    </div>
</x-guest-layout>
