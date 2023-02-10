<?php

namespace App\Http\Controllers;

use App\Models\RegisterMayor;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterMayorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usertype = auth()->user()->usertype;

        $mayors = User::where("usertype", "Mayor")
                    ->orwhere("usertype", "Coridor")
                    ->where("banned","!=","")
                    ->get();

        return view('registermayor.index',compact('usertype', 'mayors'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usertype = auth()->user()->usertype;

        return view('registermayor.create',compact('usertype'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function createphakbet()
     {
        $usertype = auth()->user()->usertype;
         return view('registermayor.createphakbet',compact('usertype'));
     }
 
     public function phakbetlist()
     {
        $usertype = auth()->user()->usertype;
        return view('registermayor.phakbetlist',compact('usertype'));
     }
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
    public function store_mayor(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'mobile' => ['required', 'string', 'mobile', 'max:11', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RegisterMayor  $registerMayor
     * @return \Illuminate\Http\Response
     */
    public function show(RegisterMayor $registerMayor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RegisterMayor  $registerMayor
     * @return \Illuminate\Http\Response
     */
    public function edit(RegisterMayor $registerMayor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RegisterMayor  $registerMayor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RegisterMayor $registerMayor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RegisterMayor  $registerMayor
     * @return \Illuminate\Http\Response
     */
    public function destroy(RegisterMayor $registerMayor)
    {
        //
    }
}
