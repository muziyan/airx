<?php

namespace App\Http\Controllers;

use App\Model\Order;
use App\Model\Ticket;
use App\Models\Flight;
use App\Models\guest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create($flight_id,$class_type,Request $request){
        $flight = Flight::find($flight_id);

        $classArr = $this->convertFlightType($class_type);

        $order = Order::create([
            "user_id" => session("user_id"),
            "flight_id" => $flight_id,
            "order_time" => date("Y-m-d H:i:s")
        ]);

        $guests_id = [];
        $guests = [];

        if ($request["guest_id"]){
            $guests_id = $request['guest_id'];
        }

        if ($request['name']){
            foreach ($request['name'] as $k=>$v){
                $guest = guest::create([
                    "user_id" => session('user_id'),
                    "guest_name" => $v,
                    "phone" => $request['phone'][$k],
                    "gender" => $request['gender'][$k],
                    "card" => $request['card'][$k]
                ]);
                $guests_id[] = $guest['id'];
            }
        }

        foreach ($guests_id as $id){
            $flight->update([
                $classArr[1] => $flight[$classArr[1]] + 1
            ]);
            Ticket::create([
                "guest_id" => $id,
                "order_id" => $order->id,
                "class_type" => $class_type
            ]);
            $guests[] = guest::find($id);
        }

        return view("Airx.Media.result",[
            "order" => $order,
            "flight" => $flight,
            "guests" => $guests
        ]);
    }
}
