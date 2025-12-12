<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'res_date', 
        'tel_number',
        'guest_number',
        'order_menu',
    ];

    protected $casts = [
        'res_date' => 'datetime'
    ];

    public function orderItems()
{
    return $this->hasMany(ReservationOrderItem::class);
}


}
