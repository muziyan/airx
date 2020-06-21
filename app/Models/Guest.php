<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class guest extends Model
{
    public $timestamps = false;

    protected $fillable = [
        "user_id",
        "guest_name",
        "phone",
        "gender",
        "card"
    ];

    public function ticket(){
        return $this->hasMany("App\Model\Ticket");
    }

}
