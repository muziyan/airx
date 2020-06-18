<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Flight;
use Illuminate\Http\Request;

class BaseRouterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home()
    {
        $cities = City::all();
        return view("Airx.Media.index",[
            "cities" => $cities
        ]);
    }

    public function ucenter(){
        return view("Airx.Media.ucenter");
    }

    public function checkIn(){
        return view("Airx.Media.check_in");
    }

    public function search(){

        $cities = City::all();

        $flight = Flight::where("time",">",date("H:i:s",strtotime("+30 minute")))
                        ->where('date',">=",date("Y-m-d"))
                        ->orderBy("date","asc")
                        ->orderBy("time",'asc')
                        ->get();

        return view("Airx.Media.search",[
            "flights" => $flight,
            'cities' => $cities
        ]);
    }

    public function buyInfo(){
        return view("Airx.Media.buy_info");
    }
}
