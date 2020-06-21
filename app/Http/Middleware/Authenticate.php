<?php

namespace App\Http\Middleware;

use App\User;
use App\Http\Middleware;

class Authenticate
{

    public function handle($request, $next)
    {
        $user_id = session("user_id");
        $user = User::find($user_id);
        if (!$user){
            session()->flush();
            return redirect("/login")->with("error","Log in first, please!");
        }
        session(['user'=>$user]);
        return $next($request);
    }
}
