<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("cities")->insert([
            [
                'city_name' => "Shanghai"
            ],
            [
                'city_name' => "Beijing"
            ],
            [
                'city_name' => "Guangzhou"
            ],
            [
                'city_name' => "Hangzhou"
            ],
            [
                'city_name' => "Xiamen"
            ],
            [
                "city_name" => "Shenzhen"
            ]
        ]);
    }
}
