<?php

use Illuminate\Database\Seeder;
use App\Models\Flight;
use App\Models\City;

class FlightSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = City::all();
        $cabins = ['A320',"300ER"];
        for ($i = 0; $i < 5; $i++){
            for ($k = 0; $k <= 100; $k ++){
                $from_city = $cities[rand(0,5)];
                $to_city = $cities[rand(0,5)];
                if ($from_city == $to_city){
                    continue;
                }
                $fno = "NO.JG".rand(1,10).rand(0,10).rand(0,100);
                $flight_type = $cabins[rand(0,1)];
                $date = date("Y-m-d",strtotime("+{$i} day"));
                $time = date(rand(0,23).":".rand(0,59));
                Flight::create([
                    "fno" => $fno,
                    "flight_type" => $flight_type,
                    "from_city" => $from_city->city_name,
                    "to_city" => $to_city->city_name,
                    "date" => $date,
                    "time" => $time,
                    "f_tol" => 8,
                    "b_tol" => $flight_type === "A320" ? 0 : 42,
                    "e_tol" => $flight_type === "A320" ? 150 : 264
                ]);
            }
        }

    }
}
