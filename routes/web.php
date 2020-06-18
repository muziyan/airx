<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/","BaseRouterController@home")->name("home");
Route::get("/ucenter","BaseRouterController@ucenter")->name("ucenter");
Route::get("/check_in","BaseRouterController@checkIn")->name("check_in");
Route::get("/search","BaseRouterController@search")->name("search");
Route::get("/buy_info","BaseRouterController@buyInfo")->name("buy_info");

Route::post("/search","FlightController@store")->name("search");
