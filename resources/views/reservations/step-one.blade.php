<x-guest-layout>
    <div class="container w-full px-5 py-10 mx-auto bg-[#FFF7E8] min-h-screen flex items-center justify-center">
        <div class="flex-1 max-w-4xl bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col md:flex-row">
            
            <!-- Left image -->
            <div class="md:w-1/2 h-64 md:h-auto">
                <img class="w-full h-full object-cover"
                    src="https://cdn.pixabay.com/photo/2021/01/15/17/01/green-5919790__340.jpg" alt="Reservation Image" />
            </div>

            <!-- Form -->
            <div class="md:w-1/2 p-8 sm:p-12 flex flex-col justify-center">
                <h3 class="mb-6 text-2xl font-bold text-[#4A3F35]">Make Reservation</h3>

                <!-- Step Indicator -->
                <div class="w-full bg-gray-200 rounded-full mb-6">
                    <div class="w-1/4 p-1 text-xs font-medium text-center text-white rounded-full" style="background-color:#2f2f2f;">
                        Step 1
                    </div>
                </div>

                <form method="POST" action="{{ route('reservations.store.step.one') }}">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-[#4A3F35]">First Name</label>
                            <input type="text" id="first_name" name="first_name"
                                value="{{ $reservation->first_name ?? '' }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" />
                            @error('first_name')<div class="text-sm text-red-500">{{ $message }}</div>@enderror
                        </div>

                        <div>
                            <label for="last_name" class="block text-sm font-medium text-[#4A3F35]">Last Name</label>
                            <input type="text" id="last_name" name="last_name"
                                value="{{ $reservation->last_name ?? '' }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" />
                            @error('last_name')<div class="text-sm text-red-500">{{ $message }}</div>@enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-[#4A3F35]">Email</label>
                            <input type="email" id="email" name="email"
                                value="{{ $reservation->email ?? '' }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" />
                            @error('email')<div class="text-sm text-red-500">{{ $message }}</div>@enderror
                        </div>

                        <div>
                            <label for="tel_number" class="block text-sm font-medium text-[#4A3F35]">Phone Number</label>
                            <input type="text" id="tel_number" name="tel_number"
                                value="{{ $reservation->tel_number ?? '' }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" />
                            @error('tel_number')<div class="text-sm text-red-500">{{ $message }}</div>@enderror
                        </div>

                        <div>
                            <label for="res_date" class="block text-sm font-medium text-[#4A3F35]">Reservation Date</label>
                            <input type="datetime-local" id="res_date" name="res_date"
                                min="{{ $min_date->format('Y-m-d\TH:i:s') }}"
                                max="{{ $max_date->format('Y-m-d\TH:i:s') }}"
                                value="{{ $reservation ? $reservation->res_date->format('Y-m-d\TH:i:s') : '' }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" />
                            <span class="text-xs text-gray-500">Please choose a date between today and one week from today and Please choose a time between 17:00-23:00.</span>
                            @error('res_date')<div class="text-sm text-red-500">{{ $message }}</div>@enderror
                        </div>

                        <div>
                            <label for="guest_number" class="block text-sm font-medium text-[#4A3F35]">Guest Number</label>
                            <input type="number" id="guest_number" name="guest_number"
                                value="{{ $reservation->guest_number ?? '' }}"
                                class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-green-500 focus:border-green-500" />
                            @error('guest_number')<div class="text-sm text-red-500">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="submit" 
                                class="px-6 py-2 text-white rounded-lg font-medium"
                                style="background-color:#2f2f2f;"
                                onmouseover="this.style.backgroundColor='#1f1f1f';"
                                onmouseout="this.style.backgroundColor='#2f2f2f';">
                            Next
                        </button>

                    </div>
                </form>
            </div>

        </div>
    </div>
</x-guest-layout>
