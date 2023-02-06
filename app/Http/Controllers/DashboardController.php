<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $usertype = auth()->user()->usertype;
        return view('mayor.dashboard',compact('usertype'));
    }

 
}
