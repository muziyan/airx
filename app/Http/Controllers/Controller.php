<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function convertFlightType($str){
        switch ($str){
            case "First Class":
                return ['f_tol','f_num'];
            case "Business":
                return ['b_tol',"b_num"];
            case "Economic":
                return ['e_tol','e_num'];
        }
    }

}
