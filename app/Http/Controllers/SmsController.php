<?php

namespace App\Http\Controllers;
use App\Models\SmsOut;
use Illuminate\Http\Request;

class SmsController extends Controller
{
    public function custom_all(Request $request){
        return view('sms.custom_all');
    }
}
