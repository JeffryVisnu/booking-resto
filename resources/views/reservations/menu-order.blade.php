<x-guest-layout>

    <div class="container w-full px-5 py-10 mx-auto bg-[#FFF7E8] min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-md rounded-lg p-10 w-full max-w-3xl">
    
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-[#4A3F35]">Menu Order</h2>
    
                <a href="{{ route('menus.index') }}" target="_blank" 
                   class="text-sm text-gray-600 hover:text-black underline">
                    Click here to see our menu
                </a>
            </div>
    
            <form method="POST" action="{{ route('reservations.menu.order.store') }}">
                @csrf
    
    
                <!-- ================= FOOD SECTION ================= -->
                <h3 class="text-xl font-semibold mb-3">Foods</h3>
    
                <div id="food-list">
                    <div class="menu-row flex items-end gap-3 mb-4">
    
                        <div class="flex-1">
                            <label class="text-sm">Food 1</label>
                            <select name="foods[0][menu_id]" class="w-full border p-2 rounded-lg">
                                <option value="">--Pick One--</option>
                                @foreach($foods as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="w-32">
                            <label class="text-sm">Quantity</label>
                            <input type="number" min="1" 
                                   name="foods[0][qty]" 
                                   class="w-full border p-2 rounded-lg">
                        </div>
    
                        <button type="button"
                            class="delete-row text-gray-500 text-xl pb-3 hover:text-red-600">
                            🗑️
                        </button>
                    </div>
                </div>
    
                <button type="button"
                    onclick="addRow('food')"
                    class="text-2xl text-gray-700 hover:text-black mb-6">
                    +
                </button>
    
    
    
                <!-- ================= DRINK SECTION ================= -->
                <h3 class="text-xl font-semibold mt-6 mb-3">Drinks</h3>
    
                <div id="drink-list">
                    <div class="menu-row flex items-end gap-3 mb-4">
    
                        <div class="flex-1">
                            <label class="text-sm">Drink 1</label>
                            <select name="drinks[0][menu_id]" class="w-full border p-2 rounded-lg">
                                <option value="">--Pick One--</option>
                                @foreach($drinks as $menu)
                                    <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="w-32">
                            <label class="text-sm">Quantity</label>
                            <input type="number" min="1" 
                                   name="drinks[0][qty]" 
                                   class="w-full border p-2 rounded-lg">
                        </div>
    
                        <button type="button"
                            class="delete-row text-gray-500 text-xl pb-3 hover:text-red-600">
                            🗑️
                        </button>
                    </div>
                </div>
    
                <button type="button"
                    onclick="addRow('drink')"
                    class="text-2xl text-gray-700 hover:text-black">
                    +
                </button>
    
    
    
                <!-- ================= FOOTER BUTTONS ================= -->
                <div class="flex justify-between mt-10">
    
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
                            Next
                        </button>
                </div>
    
            </form>
    
        </div>
    </div>
    
    
    
    <!-- ================= JS ================= -->
    <script>
    function addRow(type) {
        const box = document.getElementById(type + "-list");
        const index = box.querySelectorAll(".menu-row").length;
    
        let optionsFood = "";
        @foreach($foods as $m)
            optionsFood += `<option value="{{ $m->id }}">{{ $m->name }}</option>`;
        @endforeach
    
        let optionsDrink = "";
        @foreach($drinks as $m)
            optionsDrink += `<option value="{{ $m->id }}">{{ $m->name }}</option>`;
        @endforeach
    
        let realOptions = type === "food" ? optionsFood : optionsDrink;
    
        let html = `
            <div class="menu-row flex items-end gap-3 mb-4">
    
                <div class="flex-1">
                    <label class="text-sm">${type === 'food' ? 'Food' : 'Drink'} ${index + 1}</label>
                    <select class="w-full border p-2 rounded-lg"
                            name="${type}s[${index}][menu_id]">
                        <option value="">--Pick One--</option>
                        ${realOptions}
                    </select>
                </div>
    
                <div class="w-32">
                    <label class="text-sm">Quantity</label>
                    <input type="number" min="1"
                           name="${type}s[${index}][qty]"
                           class="w-full border p-2 rounded-lg">
                </div>
    
                <button type="button"
                    class="delete-row text-gray-500 text-xl pb-3 hover:text-red-600">
                    🗑️
                </button>
    
            </div>
        `;
    
        box.insertAdjacentHTML("beforeend", html);
    }
    
    
    // delete row
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("delete-row")) {
            e.target.closest(".menu-row").remove();
        }
    });
    </script>
    
    </x-guest-layout>
    