<?php

namespace App\Http\Controllers;

use App\Models\RegisterMayor;
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

        return view('registermayor.index',compact('usertype'));
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
    public function store(Request $request)
    {
        //
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
