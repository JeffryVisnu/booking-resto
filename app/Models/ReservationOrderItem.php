<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservationOrderItem extends Model
{
    protected $fillable = [
        'reservation_id',
        'menu_id',
        'menu_name',
        'qty',
        'price',
    ];

    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
