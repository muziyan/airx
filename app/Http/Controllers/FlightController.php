<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        if (!$request['date'] && $request['from'] == 'Any city' && $request['to'] == "Select a city"){
            return redirect("/search");
        }

        $cities = City::all();

        $flights = Flight::where(function ($query) use($request){
                $request['date'] && $query->where("date",$request['date']);
                if ($request['from'] && $request['from'] != "Any city"){
                    $query->where("from_city",$request['from']);
                };
                if ($request['to'] && $request['to'] != "Select a city"){
                    $query->where("to_city",$request['to']);
                };
                if ($request['date'] && $request['date'] == date("Y-m-d")){
                    $query->where("time",">",date("H:i:s",strtotime("+1 hours")));
                }
            })
            ->orderBy("date","asc")
            ->orderBy("time",'asc')
            ->get();

        return view("Airx.Media.search",[
            "flights" => $flights,
            'cities' => $cities
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flight $flight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        //
    }
}
