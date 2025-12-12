<x-admin-layout>
    <div class="overflow-x-auto bg-[#3A2A1F] border border-[#6B4B32] rounded-xl shadow-lg p-4">
        <table class="w-full text-left text-amber-100 border-collapse">
            <thead>
                <tr class="bg-[#6B4B32] text-amber-200">
                    <th class="px-5 py-3">Reservation ID</th>
                    <th class="px-5 py-3">Food</th>
                    <th class="px-5 py-3">Qty</th>
                    <th class="px-5 py-3">Drink</th>
                    <th class="px-5 py-3">Qty</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    @php
                        // Filter foods dan drinks menggunakan filter + closure
                        $foods = $reservation->orderItems->filter(fn($item) => $item->menu->category->parent_id == 1)->values();
                        $drinks = $reservation->orderItems->filter(fn($item) => $item->menu->category->parent_id == 2)->values();

                        $maxRows = max($foods->count(), $drinks->count(), 1);
                    @endphp

                    @for($i = 0; $i < $maxRows; $i++)
                        <tr class="border-t border-[#6B4B32]">
                            @if($i == 0)
                                <td class="px-5 py-3" rowspan="{{ $maxRows }}">{{ $reservation->id }}</td>
                            @endif

                            <td class="px-5 py-3">{{ $foods[$i]->menu->name ?? '' }}</td>
                            <td class="px-5 py-3">{{ $foods[$i]->qty ?? '' }}</td>
                            <td class="px-5 py-3">{{ $drinks[$i]->menu->name ?? '' }}</td>
                            <td class="px-5 py-3">{{ $drinks[$i]->qty ?? '' }}</td>
                        </tr>
                    @endfor
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin-layout>
