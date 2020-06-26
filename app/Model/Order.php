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

    public function Flight(){
        return $this->belongsTo("App\Models\Flight");
    }

    public function Ticket(){
        return $this->belongsTo("App\Model\Ticket",'id','order_id');
    }
}
