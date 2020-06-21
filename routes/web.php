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

// Go to page
Route::get("/","BaseRouterController@home")->name("home");
Route::get("/ucenter","BaseRouterController@ucenter")->name("ucenter")->middleware("auth");
Route::get("/check_in","BaseRouterController@checkIn")->name("check_in");
Route::get("/buy_info/{id}/{class}","BaseRouterController@buyInfo")->name("buy_info")->middleware("auth");

// search
Route::get("/search","BaseRouterController@search")->name("search");
Route::post("/search","FlightController@store")->name("search");

// auth
Route::get("/login","BaseRouterController@login")->name("login");
Route::post("/login","UserController@login")->name("login");
Route::get("/register","BaseRouterController@register")->name("register");
Route::post("/register","UserController@register")->name("register");
Route::get("/logout","UserController@logout")->name("logout");

// user
Route::resource("/user","UserController")->only(['update']);

// order
Route::post("/order/{flight_id}/{class_type}","OrderController@create")->name("order");
