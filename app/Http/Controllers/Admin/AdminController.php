<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index', [
            'categoryCount' => \App\Models\Category::count(),
            'menuCount' => \App\Models\Menu::count(),
            'reservationCount' => \App\Models\Reservation::count(),
        ]);
    }

}
