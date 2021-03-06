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
        $guests = session("user")->Guests()->get();

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

        foreach ($guests as $guest){
            foreach ($guest->ticket()->get() as $item) {
                if ($item->order()->first()->flight_id){
                    $guest['status'] = false;
                }else{
                    $guest['status'] = true;
                }
            }
        }

        return view("Airx.Media.buy_info",[
            "flight_id" => $id,
            "flight" => $flight,
            "guests" => $guests,
            "user" => session("user"),
            "class" => $class,
            "classArr" => $classArr
        ]);
    }

    public function selectTicket(){
        $orders = session("user")->order()->get();

        return view("Airx.Media.select_ticket",[
            "orders" => $orders
        ]);
    }

    public function selectTicketGuest(Request $request){

        $guest = guest::where('card',$request['card'])
                ->where("phone",$request['phone'])->first();

        if (!$guest){
            return back()->with("error","card or phone error!");
        }

        $tickets = $guest->ticket()->get();

        if (count($tickets) <= 0){
            return back()->with("error","This user has no available tickets!");
        }

        return view("Airx.Media.select_ticket_guest",[
            "guest" => $guest,
            "tickets" => $tickets
        ]);
    }

    public function selectSeat(){
        return view("Airx.Media.select_seat");
    }

    public function login(){
        return view("Airx.Media.login");
    }

    public function register(){
        return view("Airx.Media.register");
    }

}
