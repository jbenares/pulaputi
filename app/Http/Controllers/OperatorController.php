<?php

namespace App\Http\Controllers;
use App\Models\WalletMisc;
use App\Models\Events;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function index()
    {
        $usertype= auth()->user()->usertype;
        $userid= auth()->user()->id;
       
        $alltransactions = WalletMisc::where('operator_id',$userid)->orWhere('operator_id','0')->orderBy('transaction_date','desc')->take(5)->get();

        $today = date("Y-m-d H:i:s");
        $events = Events::where('date_start', '>', $today)
                        ->orwhere('date_start', '<=', $today)
                        ->where('date_end', '>=', $today)
                        ->get();

        $allearnings = WalletMisc::Where('operator_id','0')->sum('debit');
        return view('operator.index', compact('usertype', 'userid','alltransactions', 'events', 'allearnings'));
    }
}
