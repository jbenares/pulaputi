<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Events;
use App\Models\GameCategory;
use App\Models\Bets;
use App\Models\WalletUser;
use App\Models\WalletTax;
use App\Models\WalletCoridor;
use App\Models\WalletMayor;
use App\Models\WalletKing;
use App\Models\WalletPot;
use App\Models\WalletWebapp;
use App\Models\WalletLiaison;
use App\Models\WalletMisc;
use App\Models\WalletAdmin;
use App\Models\PercentageDivision;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $usertype = auth()->user()->usertype;
        $userid = auth()->user()->id;
        $username = auth()->user()->name;
        $today = date("Y-m-d H:i:s");
        $kingid = getUpline("king", $userid, "id");

        $events = Events::where('king_id',$kingid)->where(function($query) use ($today){
            $query->where('date_start', '>', $today)
            ->orwhere('date_start', '<=', $today)
            ->where('date_end', '>=', $today)
            ->orderBy('date_end', 'asc');
        })->get();

        $curr_wallet = getUserDetails($userid, 'curr_wallet');
        $user_image = getUserDetails($userid, 'user_image');
        
        
        return view('mayor/dashboard',compact('usertype','userid','curr_wallet', 'events', 'user_image','username'));
    }

    public function king_dashboard()
    {
        $userid = auth()->user()->id;
        $usertype = auth()->user()->usertype;
        $username = auth()->user()->name;
   
        $today = date("Y-m-d H:i:s");
        $date_today = date("Y-m-d");
        $activeevents = Events::where('king_id',$userid)->where('date_start', '>', $today)
        ->orwhere('date_start', '<=', $today)
        ->where('date_end', '>=', $today)->count();

        $getallevents = Events::where('king_id',$userid)->sum('initial_pot');
        $getallbets = WalletKing::where('king_id',$userid)->sum('debit');
      
        $total_profit= $getallbets-$getallevents;
        $events = array();
        $all_events  = Events::where('king_id',$userid)->get();
        foreach($all_events AS $ev){
            $events[] = $ev->id;
        }

        $bettors = Bets::whereIn("event_id", $events)->count();

        $alltransactions = WalletKing::where('king_id',$userid)->orderBy('transaction_date','desc')->take(5)->get();
        $mayorcount = User::where("king_id", $userid)->where("usertype", "Mayor")->where('banned', '0')->count();
        $kuridorcount = User::where("king_id", $userid)->where("usertype", "Mayor")->where('banned', '0')->count();
        $eventcount = Events::where("king_id", $userid)->count();
       
        //$less = Events::whereRaw('DATEDIFF(date_end, "'. $date_today.'") < 5')->get();
      
        $closed_events = Events::where("king_id", $userid)->whereRaw('DATEDIFF(date_end, "'. $today.'") < 5')
                ->where('date_end','<', $today)->get();
            
       
        return view('dashboard',compact('total_profit', 'activeevents', 'alltransactions', 'bettors', 'mayorcount', 'kuridorcount', 'eventcount', 'closed_events', 'username'));
        
    }

    public function place_bet_admin(Request $request)
    {
        $count= $request->input('count');
        $userid = auth()->user()->id;
        $usertype = auth()->user()->usertype;
        $now=date("Y-m-d H:i:s");
        $perc = PercentageDivision::orderBy('date_set','DESC')->limit(1)->get();
        $tax= $perc[0]['tax'];
        $king= $perc[0]['king'];
        $mayor= $perc[0]['mayor'];
        $coridor= $perc[0]['coridor'];
        $liaison= $perc[0]['liaison'];
        $misc= $perc[0]['misc'];
        $pot= $perc[0]['pot'];
        $webapp= $perc[0]['webapp'];

        //$coridor_id= getUpline('coridor', $userid, 'id');
        $payment_ref = date("YmdHis").generateRandom('6');
        $event_id = $request->input('event_'.$count);
        $closed = checkEventStatus($event_id);

        if($closed == 0 ){
                $mayor_id= getUpline('mayor', $userid, 'id');
                $king_id = getEventdetails($request->input('event_'.$count), 'king_id');
                $liaison_id = getLiaison($king_id);
                $operator_id = getOperator();
            $gamecat= $request->input('gamecat_'.$count);

            $choice= "";
            $choice_count= $request->input('choice_count_'.$count);
            // if($choice_count == 1){
            //     $choice= $request->input('choice_'.$count);
            // } else {
                for($x=1;$x<=$choice_count;$x++){
                    $choice .= $request->input('choice_'.$count.'_'.$x) . ", ";
                }

                $choice = substr($choice, 0, -2);
            //}

            $order= getGameCatDetails($gamecat, "win_order");
            if($order == 1 || $order == 2){
                    $win_order=0;
            } else {
                    $win_order=1;
            }
            //echo $request->input('slotprice_'.$count);
            $total = $request->input('slotprice_'.$count) * $request->input('bet_'.$count);
            $maxedout = checkMaxSlotsTaken($choice, $win_order, $event_id);
           // echo "userype: " . $usertype;
            if($maxedout == 'okay'){
            ///////////////////// INSERT INTO BET TABLE ////////////////////
            $betid = Bets::insertGetId([
                'bet_date'=>$now,
                'event_id'=>$request->input('event_'.$count),
                'user_id'=>auth()->user()->id,
                'slot_price'=>$request->input('slotprice_'.$count),
                'bet_slots'=>$request->input('bet_'.$count),
                'bet_total'=>$total,
                'bet_choice' =>$choice,
                'win_order'=>$win_order
                ]);

                ///////////////////// END INSERT INTO BET TABLE ////////////////////
            
            /////////////// UPDATE USER CURRENT WALLET AND TRANSACTION TABLE ///////////////

            $wallet = User::find($userid);
            $new_wallet = $wallet->curr_wallet - $total;
            $wallet->curr_wallet=$new_wallet;
            $wallet->save();


            /////////////// END UPDATE USER CURRENT WALLET AND TRANSACTION TABLE///////////////


                /////////////// INSERT TAX WALLET ///////////////

                $wht =$total*$tax;
                WalletTax::create([
                    'transaction_date'=>$now,
                    'bet_id'=>$betid,
                    'transaction_type'=>"Betting Commission",
                    'debit' =>$wht,
                    'transaction_reference'=>$payment_ref
                    ]);
                
                $new_total = $total - $wht;
                /////////////// END INSERT TAX WALLET ///////////////

            /////////////// INSERT Coridor WALLET ///////////////
            if($usertype == 'Coridor'){
                    $coridor_amount = $new_total * $coridor;
                      
                    WalletCoridor::create([
                        'transaction_date'=>$now,
                        'coridor_id'=>$userid,
                        'bet_id'=>$betid,
                        'event_id'=>$request->input('event_'.$count),
                        'transaction_type'=>"Betting Commission",
                        'debit' =>$coridor_amount,
                        'transaction_reference'=>$payment_ref
                        ]);

                    WalletCoridor::create([
                        'transaction_date'=>$now,
                        'coridor_id'=>$userid,
                        'bet_id'=>$betid,
                        'event_id'=>$request->input('event_'.$count),
                        'transaction_type'=>"Betting Amount",
                        'credit' =>$total,
                        'transaction_reference'=>$payment_ref
                        ]);
    

                    $wallet_cor = User::find($userid);
                    $new_wallet_cor = $wallet_cor->curr_wallet + $coridor_amount;
                    $wallet_cor->curr_wallet=$new_wallet_cor;
                    $wallet_cor->save();

                    $mayor_amount = $new_total * $mayor;

                    WalletMayor::create([
                        'transaction_date'=>$now,
                        'mayor_id'=>$mayor_id,
                        'bet_id'=>$betid,
                        'event_id'=>$request->input('event_'.$count),
                        'transaction_type'=>"Betting Commission",
                        'debit' =>$mayor_amount,
                        'transaction_reference'=>$payment_ref
                        ]);
                    
                    $wallet_may = User::find($mayor_id);
                    $new_wallet_may = $wallet_may->curr_wallet + $mayor_amount;
                    $wallet_may->curr_wallet=$new_wallet_may;
                    $wallet_may->save();

            }

            /////////////// END INSERT Coridor WALLET ///////////////

                /////////////// INSERT MAYOR WALLET ///////////////
                if($usertype == 'Mayor'){
                    $withku = $mayor + $coridor;
                    $mayor_amount = $new_total * $withku;

                    WalletMayor::create([
                        'transaction_date'=>$now,
                        'mayor_id'=>$userid,
                        'bet_id'=>$betid,
                        'event_id'=>$request->input('event_'.$count),
                        'transaction_type'=>"Betting Commission",
                        'debit' =>$mayor_amount,
                        'transaction_reference'=>$payment_ref
                        ]);

                    WalletMayor::create([
                            'transaction_date'=>$now,
                            'mayor_id'=>$userid,
                            'bet_id'=>$betid,
                            'event_id'=>$request->input('event_'.$count),
                            'transaction_type'=>"Betting Amount",
                            'credit' =>$total,
                            'transaction_reference'=>$payment_ref
                            ]);

                    $wallet_may = User::find($userid);
                    $new_wallet_may = $wallet_may->curr_wallet + $mayor_amount;
                    $wallet_may->curr_wallet=$new_wallet_may;
                    $wallet_may->save();
                
                } 
        
                /////////////// END INSERT MAYOR WALLET ///////////////


                /////////////// INSERT KING WALLET ///////////////
                $king_amount = $new_total * $king;
                
                WalletKing::create([
                    'transaction_date'=>$now,
                    'king_id'=>$king_id,
                    'bet_id'=>$betid,
                    'event_id'=>$request->input('event_'.$count),
                    'transaction_type'=>"Betting Commission",
                    'debit' =>$king_amount,
                    'transaction_reference'=>$payment_ref
                    ]);
        
                $wallet_king = User::find($king_id);
                $new_wallet_king = $wallet_king->curr_wallet + $king_amount;
                $wallet_king->curr_wallet=$new_wallet_king;
                $wallet_king->save();
        
                /////////////// END INSERT KING WALLET ///////////////

                /////////////// INSERT POT WALLET ///////////////
                $pot_amount = $new_total * $pot;
                
                WalletPot::create([
                    'transaction_date'=>$now,
                    'bet_id'=>$betid,
                    'event_id'=>$request->input('event_'.$count),
                    'transaction_type'=>"Betting Commission",
                    'debit' =>$pot_amount,
                    'transaction_reference'=>$payment_ref
                    ]);
        
                $wallet_pot = Events::find($request->input('event_'.$count));
                $new_wallet_pot = $wallet_pot->running_balance + $pot_amount;
                $wallet_pot->running_balance=$new_wallet_pot;
                $wallet_pot->save();
        
                /////////////// END INSERT POT WALLET ///////////////

                /////////////// INSERT WEBAPP WALLET ///////////////
                $webapp_amount = $new_total * $webapp;
                
                WalletWebapp::create([
                    'transaction_date'=>$now,
                    'bet_id'=>$betid,
                    'event_id'=>$request->input('event_'.$count),
                    'transaction_type'=>"Betting Commission",
                    'debit' =>$webapp_amount,
                    'transaction_reference'=>$payment_ref
                    ]);
        
                /////////////// END INSERT WEBAPP WALLET ///////////////

                /////////////// INSERT LIAISON WALLET ///////////////

                
                $liaison_amount = $new_total * $liaison;
                
                WalletLiaison::create([
                    'transaction_date'=>$now,
                    'liaison_id'=>$liaison_id,
                    'bet_id'=>$betid,
                    'event_id'=>$request->input('event_'.$count),
                    'transaction_type'=>"Betting Commission",
                    'debit' =>$liaison_amount,
                    'transaction_reference'=>$payment_ref
                    ]);
                   
                    $wallet_liai = User::find($liaison_id);
                    $new_wallet_liai = $wallet_liai->curr_wallet + $liaison_amount;
                    $wallet_liai->curr_wallet=$new_wallet_liai;
                    $wallet_liai->save();
            
                  
                /////////////// END INSERT LIAISON WALLET ///////////////

                    /////////////// INSERT MISC WALLET ///////////////
                $misc_amount = $new_total * $misc;
                    if($misc_amount>0){
                        WalletMisc::create([
                            'transaction_date'=>$now,
                            'bet_id'=>$betid,
                            'event_id'=>$request->input('event_'.$count),
                            'transaction_type'=>"Betting Commission",
                            'debit' =>$misc_amount,
                            'transaction_reference'=>$payment_ref
                            ]);

                        
                            
                    $wallet_op = User::find($operator_id);
                    $new_wallet_op = $wallet_op->curr_wallet + $misc_amount;
                    $wallet_op->curr_wallet=$new_wallet_op;
                    $wallet_op->save();
                    }
        
                /////////////// END INSERT MISC WALLET ///////////////


                return redirect()->route('admin_dashboard')->with('status','success')
                                   ->with('message_success','Congratulations! You have successfully placed your bet for an event.');
            } else {
                return redirect()->route('admin_dashboard')->with('status','fail')->with('message_fail','Sorry! Your bet did not go through. Max slots taken for '.$choice.'. Please try another combination.');
            }
        } else {
           return redirect()->route('admin_dashboard')->with('status','fail')->with('message_fail','Sorry! Your bet did not go through. This event had been closed.');

        }
    }

    public function mod_dashboard()
    {
        $userid = auth()->user()->id;
        $usertype = auth()->user()->usertype;
        $username = auth()->user()->name;
        $alltransactions = WalletAdmin::where('admin_id',$userid)->orderBy('transaction_date','desc')->take(5)->get();
        $curr_wallet = getUserDetails($userid, 'curr_wallet');
        return view('admin/dashboard',compact('alltransactions','curr_wallet'));
        
    }

   public function accountant_dashboard()
    {
        $userid = auth()->user()->id;
        $usertype = auth()->user()->usertype;
        $username = auth()->user()->name;
        $alltransactions = WalletAdmin::where('admin_id',$userid)->orderBy('transaction_date','desc')->take(5)->get();
        $curr_wallet = getUserDetails($userid, 'curr_wallet');
        return view('accountant/index',compact('alltransactions','curr_wallet'));
        
    }
 
}
