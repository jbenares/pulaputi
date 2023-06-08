<?php

namespace App\Http\Controllers;
use App\Models\WalletLiaison;
use App\Models\Events;
use Illuminate\Http\Request;

class LiaisonController extends Controller
{
    public function index()
    {
        $usertype= auth()->user()->usertype;
        $userid= auth()->user()->id;
        $alltransactions = WalletLiaison::where('liaison_id',$userid)->orderBy('transaction_date','desc')->take(5)->get();

        $today = date("Y-m-d H:i:s");
        $events = Events::where('date_start', '>', $today)
                        ->orwhere('date_start', '<=', $today)
                        ->where('date_end', '>=', $today)
                        ->get();
        return view('liaison.index', compact('usertype', 'userid','alltransactions', 'events'));
    }
}
