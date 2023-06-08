<?php

namespace App\Http\Controllers;
use App\Models\WalletTransfer;
use App\Models\WalletUser;
use App\Models\WalletKing;
use App\Models\WalletCoridor;
use App\Models\WalletMayor;
use App\Models\WalletLiaison;
use App\Models\WalletAdmin;
use App\Models\User;
use Illuminate\Http\Request;
use Session;

class WalletTransferController extends Controller
{
    public function index()
    {
        $userid = auth()->user()->id;
        return view('wallettransfer.index',compact('userid')); 
    }

    public function transferwallet(Request $request){
        $userid = auth()->user()->id;
        $usertype = auth()->user()->usertype;
        $curr_wallet = getUserDetails($userid, 'curr_wallet');
        $refcode= $request->input('ref_code');
        $que_self =User::where('id',$userid)->where(function($query) use ($refcode){
            $query->where('ref_code', $refcode)
                  ->orWhere('mobile', $refcode);
        })->count();

        if($que_self != 0){
          
           return redirect()->route('wallet_transfer')->with('err_message','Invalid! You are trying to transfer wallet to yourself.');
        } else {
            $que = User::where('ref_code',$refcode)->orWhere('mobile',$refcode)->count();
            if($que==0){
                return redirect()->route('wallet_transfer')->with('err_message','Referral code/Mobile number unverified! User does not exist.');
            } else{
    
                $user = User::where("ref_code", $request->input('ref_code'))->orWhere("mobile", $request->input('ref_code'))->get();
                $transfer_to = $user[0]['id'];
                $transfer_usertype = $user[0]['usertype'];
                if($transfer_usertype == 'Coridor'){
                    $transfer_usertype="Kuridor";
                } else {
                    $transfer_usertype=$transfer_usertype;
                }
    
                $transfer_name = $user[0]['name'];
                $transfer_mobile = $user[0]['mobile'];
                $validated = $request->validate([
                    'ref_code' => 'required',
                    'amount'=>'required|numeric|min:1|max:'.$curr_wallet
                ],
                [
                    'amount.max' => 'Amount to transfer must not be greater than current wallet balance: '.number_format($curr_wallet,2) ,
                ]);
                $now=date("Y-m-d H:i:s");
                $payment_ref = date("YmdHis").generateRandom('6');
            
                $walletid = WalletTransfer::insertGetId([
                    "transaction_date"=>$now,
                    "user_id"=>$userid,
                    "ref_code"=>$request->input('ref_code'),
                    "transfer_to"=>$transfer_to,
                    "transfer_amount"=>$request->input('amount'),
                    "remarks"=>$request->input('remarks'),
                    "payment_reference"=>$payment_ref
                ]);
    
                if($usertype=='King'){
                    WalletKing::create([
                        "transaction_date"=>date("Y-m-d"),
                        "king_id"=>$userid,
                        "transfer_id"=>$walletid,
                        "transaction_type"=>"Wallet transfer to " .$transfer_usertype . " " .$transfer_name . "/".$transfer_mobile,
                        "credit"=>$request->input('amount'),
                        "transaction_reference"=>$payment_ref
                    ]);
    
                
                } else if($usertype=='Mayor'){
                    WalletMayor::create([
                        "transaction_date"=>date("Y-m-d"),
                        "mayor_id"=>$userid,
                        "transfer_id"=>$walletid,
                        "transaction_type"=>"Wallet transfer to ".$transfer_usertype . " " .$transfer_name . "/".$transfer_mobile,
                        "credit"=>$request->input('amount'),
                        "transaction_reference"=>$payment_ref
                    ]);
    
                } else if($usertype=='Kuridor'){
                    WalletCoridor::create([
                        "transaction_date"=>date("Y-m-d"),
                        "coridor_id"=>$userid,
                        "transfer_id"=>$walletid,
                        "transaction_type"=>"Wallet transfer to " .$transfer_usertype . " " .$transfer_name . "/".$transfer_mobile,
                        "credit"=>$request->input('amount'),
                        "transaction_reference"=>$payment_ref
                    ]);
    
                } else if($usertype=='Phakbet'){
                
                    WalletUser::create([
                        "transaction_date"=>date("Y-m-d"),
                        "user_id"=>$userid,
                        "transfer_id"=>$walletid,
                        "transaction_type"=>"Wallet transfer to " .$transfer_usertype . " " .$transfer_name . "/".$transfer_mobile,
                        "credit"=>$request->input('amount'),
                        "transaction_reference"=>$payment_ref
                    ]);
    
                } else if($usertype=='Liaison'){
                
                    WalletLiaison::create([
                        "transaction_date"=>date("Y-m-d"),
                        "liaison_id"=>$userid,
                        "transfer_id"=>$walletid,
                        "transaction_type"=>"Wallet transfer to " .$transfer_usertype . " " .$transfer_name . "/".$transfer_mobile,
                        "credit"=>$request->input('amount'),
                        "transaction_reference"=>$payment_ref
                    ]);
    
                } else if($usertype=='Admin'){
                
                    WalletAdmin::create([
                        "transaction_date"=>date("Y-m-d"),
                        "admin_id"=>$userid,
                        "transfer_id"=>$walletid,
                        "transaction_type"=>"Wallet transfer to " .$transfer_usertype . " " .$transfer_name . "/".$transfer_mobile,
                        "credit"=>$request->input('amount'),
                        "transaction_reference"=>$payment_ref
                    ]);
    
                }
    
    
                $userdata = User::find($userid);
                $userdata->curr_wallet = $userdata->curr_wallet-$request->input('amount');
                $userdata->save();
                $from_refcode = getUserDetails($userid, 'ref_code');
                $from_usertype = getUserDetails($userid, 'usertype');
                if($from_usertype == 'Coridor'){
                    $from_usertype="Kuridor";
                } else {
                    $from_usertype=$from_usertype;
                }
                $from_name = getUserDetails($userid, 'name');
                $from_mobile = getUserDetails($userid, 'mobile');
    
                if($transfer_usertype == "King"){
    
                
                    WalletKing::create([
                        "transaction_date"=>date("Y-m-d"),
                        "king_id"=>$transfer_to,
                        "transfer_id"=>$walletid,
                        "transaction_type"=>"Wallet transfer from " .$from_usertype ." " .$from_name . "/".$from_mobile,
                        "debit"=>$request->input('amount'),
                        "transaction_reference"=>$payment_ref
                    ]);
    
                    $userdata = User::find($transfer_to);
                    $userdata->curr_wallet = $userdata->curr_wallet+$request->input('amount');
                    $userdata->save();
                } else if($transfer_usertype == "Mayor"){
                
                    WalletMayor::create([
                        "transaction_date"=>date("Y-m-d"),
                        "mayor_id"=>$transfer_to,
                        "transfer_id"=>$walletid,
                        "transaction_type"=>"Wallet transfer from " .$from_usertype ." " .$from_name . "/".$from_mobile,
                        "debit"=>$request->input('amount'),
                        "transaction_reference"=>$payment_ref
                    ]);
    
                    $userdata = User::find($transfer_to);
                    $userdata->curr_wallet = $userdata->curr_wallet+$request->input('amount');
                    $userdata->save();
                } else if($transfer_usertype == "Kuridor"){
                
                    WalletCoridor::create([
                        "transaction_date"=>date("Y-m-d"),
                        "coridor_id"=>$transfer_to,
                        "transfer_id"=>$walletid,
                        "transaction_type"=>"Wallet transfer from " .$from_usertype ." " .$from_name . "/".$from_mobile,
                        "debit"=>$request->input('amount'),
                        "transaction_reference"=>$payment_ref
                    ]);
    
                    $userdata = User::find($transfer_to);
                    $userdata->curr_wallet = $userdata->curr_wallet+$request->input('amount');
                    $userdata->save();
                } else if($transfer_usertype == "Phakbet"){
                
                    WalletUser::create([
                        "transaction_date"=>date("Y-m-d"),
                        "user_id"=>$transfer_to,
                        "transfer_id"=>$walletid,
                        "transaction_type"=>"Wallet transfer from " .$from_usertype ." " .$from_name . "/".$from_mobile,
                        "debit"=>$request->input('amount'),
                        "transaction_reference"=>$payment_ref
                    ]);
    
                    $userdata = User::find($transfer_to);
                    $userdata->curr_wallet = $userdata->curr_wallet+$request->input('amount');
                    $userdata->save();
                }  else if($transfer_usertype == "Liaison"){
                
                    WalletLiaison::create([
                        "transaction_date"=>date("Y-m-d"),
                        "liaison_id"=>$transfer_to,
                        "transfer_id"=>$walletid,
                        "transaction_type"=>"Wallet transfer from " .$from_usertype ." " .$from_name . "/".$from_mobile,
                        "debit"=>$request->input('amount'),
                        "transaction_reference"=>$payment_ref
                    ]);
    
                    $userdata = User::find($transfer_to);
                    $userdata->curr_wallet = $userdata->curr_wallet+$request->input('amount');
                    $userdata->save();
                }
    
    
                return redirect()->route('receipt',$walletid);
            }
        }

       

    }

    public function receipt($id)
    {
        $details = WalletTransfer::where('id',$id)->get();   
        return view('wallettransfer.receipt',compact('id', 'details')); 
    }

    public function cashin()
    {
        $userid = auth()->user()->id;
        return view('wallettransfer.cashin',compact('userid')); 
    }

    public function cashin_process(Request $request){
        $userid = auth()->user()->id;
        $now=date("Y-m-d H:i:s");
        $payment_ref = date("YmdHis").generateRandom('6');

        
        $userdata = User::find($userid);
        $userdata->curr_wallet = $userdata->curr_wallet+$request->input('amount');
        $userdata->save();

        WalletAdmin::create([
            "transaction_date"=>$now,
            "admin_id"=>$userid,
            "cashin_method"=>$request->input('method'),
            "source"=>$request->input('source'),
            "transaction_type"=>"Cashin",
            "debit"=>$request->input('amount'),
            "transaction_reference"=>$payment_ref,
            "remarks"=>$request->input('remarks'),

        ]);

        return redirect("cashin")->with('status','Cash-in transaction successful!');
    }
}
