<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = false;

    public $fillable = [
        'user_id',
        "order_time",
        "flight_id"
    ];
}
