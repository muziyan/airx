<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Flight;
use App\Models\guest;
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
        $guests = guest::where("user_id",session("user_id"))->get();

        return view("Airx.Media.ucenter",[
            "guests" => $guests,
            "user" => session("user")
        ]);
    }

    public function checkIn(){
        return view("Airx.Media.check_in");
    }

    public function search(){

        $cities = City::all();

        $flight = Flight::where("time",">",date("H:i:s",strtotime("+1 hours")))
                        ->where('date',">=",date("Y-m-d"))
                        ->orderBy("date","asc")
                        ->orderBy("time",'asc')
                        ->get();

        return view("Airx.Media.search",[
            "flights" => $flight,
            'cities' => $cities
        ]);
    }

    public function buyInfo($id,$class){

        $flight = Flight::find($id);
        $guests = guest::where("user_id",session("user_id"))->get();

        $classArr = $this->convertFlightType($class);

        return view("Airx.Media.buy_info",[
            "flight" => $flight,
            "guests" => $guests,
            "user" => session("user"),
            "class" => $class,
            "classArr" => $classArr
        ]);
    }

    public function login(){
        return view("Airx.Media.login");
    }

    public function register(){
        return view("Airx.Media.register");
    }
}
