<x-guest-layout>
    <div class="w-full min-h-screen bg-[#FFF7E8] flex items-center justify-center py-10 px-5">

        <div class="bg-white shadow-lg rounded-2xl p-10 max-w-3xl w-full">

            <h3 class="text-3xl font-bold text-[#4A3F35] mb-6">
                Confirm Your Reservation
            </h3>

            <!-- Step Indicator -->
            <div class="w-full bg-gray-200 rounded-full mb-6">
                 <div class="w-1/4 p-1 text-xs font-medium text-center text-white rounded-full" style="background-color:#2f2f2f;">
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
                @if(!empty($orderItems))
                <div class="mt-8">
                    <h3 class="text-xl font-semibold mb-4">Your Order</h3>
            
                    {{-- Foods --}}
                    @if(!empty($orderItems['foods']))
                        <h4 class="font-bold mt-2 text-lg">Foods</h4>
                        <ul class="list-disc ml-6">
                            @foreach($orderItems['foods'] as $food)
                                <li>
                                    {{ $food['name'] }} (Qty: {{ $food['qty'] }})
                                </li>
                            @endforeach
                        </ul>
                    @endif
            
                    {{-- Drinks --}}
                    @if(!empty($orderItems['drinks']))
                        <h4 class="font-bold mt-4 text-lg">Drinks</h4>
                        <ul class="list-disc ml-6">
                            @foreach($orderItems['drinks'] as $drink)
                                <li>
                                    {{ $drink['name'] }} (Qty: {{ $drink['qty'] }})
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            @endif
            

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
                       class="px-6 py-2 text-white rounded-lg font-medium"
                                style="background-color:#2f2f2f;"
                                onmouseover="this.style.backgroundColor='#1f1f1f';"
                                onmouseout="this.style.backgroundColor='#2f2f2f';">
                        Previous
                    </a>

                    <button type="submit" 
                                class="px-6 py-2 text-white rounded-lg font-medium"
                                style="background-color:#2f2f2f;"
                                onmouseover="this.style.backgroundColor='#1f1f1f';"
                                onmouseout="this.style.backgroundColor='#2f2f2f';">
                        Confirm Reservation
                    </button>
                </div>
            </form>

        </div>

    </div>
</x-guest-layout>
