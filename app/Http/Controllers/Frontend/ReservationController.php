<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\Menu;
use App\Rules\DateBetween;
use App\Rules\TimeBetween;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /* ==============================
         STEP 1
    ===============================*/
    public function stepOne(Request $request)
    {
        $reservation = $request->session()->get('reservation');

        if (is_array($reservation)) {
            $reservation = new Reservation($reservation);
        }

        $min_date = Carbon::today();
        $max_date = Carbon::now()->addWeek();

        return view('reservations.step-one', compact('reservation', 'min_date', 'max_date'));
    }

    public function storeStepOne(Request $request)
    {
        $validated = $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email'],
            'res_date' => ['required', 'date', new DateBetween, new TimeBetween],
            'tel_number' => ['required'],
            'guest_number' => ['required'],
            'wants_menu' => ['nullable']
        ]);

        $reservation = $request->session()->get('reservation');

        if (is_array($reservation)) {
            $reservation = new Reservation($reservation);
        }

        if (!$reservation) {
            $reservation = new Reservation();
        }

        $reservation->fill($validated);
        $request->session()->put('reservation', $reservation);

        // Jika centang → pergi ke menu order
        if ($request->has('wants_menu')) {
            return redirect()->route('reservations.menu.order');
        }

        return redirect()->route('reservations.step.two');
    }

    /* ==============================
         MENU ORDER (STEP 1.5)
    ===============================*/
    public function menuOrder()
    {
        $foods = Menu::whereHas('category', function ($q) {
            $q->where('parent_id', 1); // Category FOOD
        })->get();

        $drinks = Menu::whereHas('category', function ($q) {
            $q->where('parent_id', 2); // Category DRINK
        })->get();

        return view('reservations.menu-order', compact('foods', 'drinks'));
    }


    public function storeMenuOrder(Request $request)
    {
        $foods  = $request->input('foods', []);
        $drinks = $request->input('drinks', []);

        // Remove rows tanpa menu_id
        $foods  = array_filter($foods, fn($item) => !empty($item['menu_id']));
        $drinks = array_filter($drinks, fn($item) => !empty($item['menu_id']));

        if (empty($foods) && empty($drinks)) {
            return back()->with('error', 'Please select at least one menu item.');
        }

        $reservation = $request->session()->get('reservation');

        if (!$reservation) {
            return redirect()->route('reservations.step.one');
        }

        // Simpan menu ke session
        $reservation->order_items = [
            'foods' => array_values($foods),
            'drinks' => array_values($drinks)
        ];

        $request->session()->put('reservation', $reservation);

        return redirect()->route('reservations.step.two');
    }

    /* ==============================
         STEP 2 VIEW
    ===============================*/
    public function stepTwo(Request $request)
    {
        $reservation = $request->session()->get('reservation');

        if (is_array($reservation)) {
            $reservation = new Reservation($reservation);
        }

        $orderItems = null;

        if (!empty($reservation->order_items)) {
            $orderItems = [
                'foods' => [],
                'drinks' => [],
            ];

            // FOODS
            foreach ($reservation->order_items['foods'] ?? [] as $item) {
                $menu = Menu::find($item['menu_id']);
                if ($menu) {
                    $orderItems['foods'][] = [
                        'name' => $menu->name,
                        'qty'  => $item['qty'],
                    ];
                }
            }

            // DRINKS
            foreach ($reservation->order_items['drinks'] ?? [] as $item) {
                $menu = Menu::find($item['menu_id']);
                if ($menu) {
                    $orderItems['drinks'][] = [
                        'name' => $menu->name,
                        'qty'  => $item['qty'],
                    ];
                }
            }
        }

        return view('reservations.step-two', compact('reservation', 'orderItems'));
    }

    /* ==============================
         STEP 2 CONFIRM & SAVE
    ===============================*/
public function storeStepTwo(Request $request)
{
    $request->validate([
        'confirm' => ['required']
    ]);

    $reservationSession = $request->session()->get('reservation');

    if (!$reservationSession) {
        return redirect()->route('reservations.step.one');
    }

    // 1. Simpan reservation ke database
    $reservation = Reservation::create([
        'first_name'    => $reservationSession->first_name,
        'last_name'     => $reservationSession->last_name,
        'email'         => $reservationSession->email,
        'tel_number'    => $reservationSession->tel_number,
        'res_date'      => $reservationSession->res_date,
        'guest_number'  => $reservationSession->guest_number,
    ]);

    // 2. Simpan order items ke tabel reservation_order_items
foreach ($reservationSession->order_items['foods'] ?? [] as $item) {
    $menu = Menu::find($item['menu_id']);

    \App\Models\ReservationOrderItem::create([
        'reservation_id' => $reservation->id,
        'menu_id'        => $menu->id,
        'menu_name'      => $menu->name,
        'qty'            => $item['qty'],
        'price'          => $menu->price * $item['qty'], // total price sesuai qty
    ]);
}

foreach ($reservationSession->order_items['drinks'] ?? [] as $item) {
    $menu = Menu::find($item['menu_id']);

    \App\Models\ReservationOrderItem::create([
        'reservation_id' => $reservation->id,
        'menu_id'        => $menu->id,
        'menu_name'      => $menu->name,
        'qty'            => $item['qty'],
        'price'          => $menu->price * $item['qty'], // total price sesuai qty
    ]);
}


    // 3. Bersihkan session
    $request->session()->forget('reservation');

    return redirect()->route('thankyou');
}
    
}
