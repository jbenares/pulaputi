<?php

namespace App\Http\Controllers;
use App\Models\WalletKing;
use App\Models\WalletMayor;
use App\Models\WalletCoridor;
use App\Models\WalletUser;
use App\Models\WalletLiaison;
use App\Models\WalletAdmin;
use App\Models\WalletMisc;
use App\Models\User;
use App\Models\TransactionHistory;
use Illuminate\Http\Request;

class TransactionHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $usertype=auth()->user()->usertype;
         $userid=auth()->user()->id;
         if($usertype=="King"){
            $getwallet = WalletKing::where('king_id', $userid)->get();
         } else if($usertype=="Mayor"){
            $getwallet = WalletMayor::where('mayor_id', $userid)->get();
         } else if($usertype=="Coridor"){
            $getwallet = WalletCoridor::where('coridor_id', $userid)->get();
         } else if($usertype=="Phakbet"){
            $getwallet = WalletUser::where('user_id', $userid)->get();
         } else if($usertype=="Liaison"){
            $getwallet = WalletLiaison::where('liaison_id', $userid)->get();
         } else if($usertype=="Admin"){
            $getwallet = WalletAdmin::where('admin_id', $userid)->get();
         } else if($usertype=="Operator"){
            $getwallet = WalletMisc::where('operator_id','0')->get();
         }
         $curr_wallet = getUserDetails($userid, 'curr_wallet');
         return view('transactionhistory.index',compact('getwallet','curr_wallet','usertype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function transaction_receipt($id)
    {
        $usertype=auth()->user()->usertype;
        if($usertype == "King"){
         $details = WalletKing::where('id',$id)->get();   
        } else if($usertype == "Admin"){
            $details = WalletAdmin::where('id',$id)->get();   
        } else if($usertype == "Mayor"){
            $details = WalletMayor::where('id',$id)->get();   
        } else if($usertype == "Coridor"){
            $details = WalletCoridor::where('id',$id)->get();   
        } else if($usertype == "Phakbet"){
            $details = WalletUser::where('id',$id)->get();   
        }  else if($usertype == "Liaison"){
            $details = WalletLiaison::where('id',$id)->get();   
        } else if($usertype == "Operator"){
            $details = WalletMisc::where('id',$id)->get();   
        } 
        return view('transactionhistory.receipt',compact('id', 'details')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function user_wallets()
    {
         $usertype=auth()->user()->usertype;
         $userid=auth()->user()->id;
        
         $getwallet = User::where('usertype','!=', 'Admin')->where('usertype','!=', 'Operator')->get();
        
         return view('transactionhistory.user_wallets',compact('getwallet'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransactionHistory  $transactionHistory
     * @return \Illuminate\Http\Response
     */
    public function viewtransaction($id)
    {
         $userid=$id;
         $usertype=getUserDetails($userid, 'usertype');
         $name=getUserDetails($userid, 'name');
        
         if($usertype=="King"){
            $getwallet = WalletKing::where('king_id', $userid)->get();
         } else if($usertype=="Mayor"){
            $getwallet = WalletMayor::where('mayor_id', $userid)->get();
         } else if($usertype=="Coridor"){
            $getwallet = WalletCoridor::where('coridor_id', $userid)->get();
         } else if($usertype=="Phakbet"){
            $getwallet = WalletUser::where('user_id', $userid)->get();
         } else if($usertype=="Liaison"){
            $getwallet = WalletLiaison::where('liaison_id', $userid)->get();
         } 
         $curr_wallet = getUserDetails($userid, 'curr_wallet');
         return view('transactionhistory.viewtransaction',compact('getwallet','curr_wallet','usertype','name'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransactionHistory  $transactionHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionHistory $transactionHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransactionHistory  $transactionHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransactionHistory $transactionHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransactionHistory  $transactionHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionHistory $transactionHistory)
    {
        //
    }
}
