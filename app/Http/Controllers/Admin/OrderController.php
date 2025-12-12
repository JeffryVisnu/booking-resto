<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\ReservationOrderItem;

class OrderController extends Controller
{
    public function index()
    {
        // Ambil semua reservation beserta order items-nya
        $reservations = Reservation::with('orderItems')->get();

        return view('admin.orders.index', compact('reservations'));
    }
}
