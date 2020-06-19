<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $validated = $request->validated();
        $user = User::find($id);
        $validated['password'] = Hash::make($validated['password']);
        $user->update($validated);
        return redirect("/ucenter")->with("success","user update success!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function login(Request $request){
        if (!$user = User::where("username",$request['username'])->first()){
            return redirect("/login")->with("error","user not found!");
        }else{
            if (Hash::check($request['password'],$user->password)){
                session([
                    "user_id"=>$user->id,
                    "user" => $user
                ]);
                return redirect("/ucenter")->with("success","login success!");
            }
            return redirect("/login")->with("error","password error!");
        }
    }

    public function register(RegisterRequest $request){

        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        session([
            "user_id" => $user['id'],
            "user" => $user
        ]);

        return redirect("/ucenter")->with("success","register success!");
    }

    public function logout(){
        session()->pull("user");
        session()->pull("user_id");
        return redirect("/login")->with("success","logout success!");
    }
}
