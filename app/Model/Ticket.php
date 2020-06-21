<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public $timestamps = false;

    public $fillable = [
        'guest_id',
        'order_id',
        'class_type'
    ];


    public function order(){
        return $this->belongsTo("App\Model\Order");
    }
}
