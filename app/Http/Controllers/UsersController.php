<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Events;
use App\Models\EventWinners;
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
use App\Models\PercentageDivision;
use App\Models\LoginLogs;
use App\Models\SmsOut;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\File;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user())  {
            return redirect(route('dashboard_phakbet'));
        }
        else {
        return view('users.index'); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function login_process(Request $request)
     {
         $request->validate([
             'mobile' => 'required',
             'password' => 'required',
         ]);
    
         $credentials = $request->only('mobile', 'password');
         if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();

            $userid = auth()->user()->id;
            $usertype = auth()->user()->usertype;
            $banned = auth()->user()->banned;

            $clientIP = "49.145.111.137";
            //$clientIP =  request()->ip(); 
            $data = \Location::get($clientIP);  
            
            $region_code= $data->regionCode;
            $region= $data->regionName;
            $city= $data->cityName;

            $hasLocation = User::where('id',$userid)->get();
            $loc = $hasLocation[0]['region'];
            if($loc == ""){
                $updateloc = User::find($userid);
                $updateloc->region_code = $region_code;
                $updateloc->region = $region;
                $updateloc->city = $city;
                $updateloc->save();

            }
            
            $firsttime = User::where('id', $userid)->get();
            $firsttimelogin = $firsttime[0]['first_time_logged_in'];
            if($banned==0){
                        if($firsttimelogin == 1){
                            return redirect()->route('change_password');
                        
                        } else {

                            if($usertype=="Phakbet" || $usertype=="Coridor"){
                                $now = date("Y-m-d H:i:s");
                                $getlogs= LoginLogs::where('user_id',$userid)->count();
                                if($getlogs==0){
                                    $message = "";
                                    LoginLogs::create([
                                        'user_id'=>$userid,
                                        'login_count'=>1,
                                        'last_login'=>$now,
                                        ]);
                                } else {
                                
                                    $log = LoginLogs::where('user_id',$userid)->get();
                                    $logid  = $log[0]['id'];
                                    $latestlogs  = $log[0]['last_login'];
                                    $count_wins = EventWinners::where('user_id',$userid)->count();
                                    if($count_wins == 0){
                                        $message = "";
                                    } else {
                                        $getlatestwin = EventWinners::where('user_id',$userid)->orderBy('win_date', 'desc')->first();
                                        
                                        if($latestlogs < $getlatestwin['win_date']){
                                            $message = "Congratulations, you have won an event! Go to Events Joined to view the event you have won.";
                                        } else {
                                            $message="";
                                        }
                                    }

                                    $logs = LoginLogs::find($logid);
                                    $logs->login_count = $logs->login_count + 1;
                                    $logs->last_login = $now;
                                    $logs->save();
                                }
                            
                                if($usertype=="Phakbet"){
                                return redirect("dashboard_phakbet")->with('lastlogin', $message);
                                } else if($usertype=="Coridor"){
                                    return redirect("mayor/dashboard")->with('lastlogin', $message);
                                }
                            // return redirect()->intended('dashboard_phakbet')->withSuccess('Signed in')->with('lastlogin',$latestlogs);
                            } else if($usertype=="Coridor"){
                                return redirect()->intended('mayor/dashboard')->withSuccess('Signed in');
                            } else {
                                Auth::guard('web')->logout();
                                $request->session()->invalidate();
                                $request->session()->regenerateToken();
                                return redirect("login_phakbet")->with('status','Login details are not valid.');
                            }
                        }
            } else {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect("login_phakbet")->with('status','Login details are not valid.');
            }
         } else {
         
      
            return redirect("login_phakbet")->with('status','Login details are not valid.');
         }
      
         
     }

     public function login_admin()
     {

       
         return view('users.login_admin'); 
        
     }

     public function login_admin_process(Request $request)
     {
         $request->validate([
             'email' => 'required',
             'password' => 'required',
         ]);
    
         $credentials = $request->only('email', 'password');
         if (Auth::attempt($credentials)) {
            
            $request->session()->regenerate();

            return redirect()->intended('mod_dashboard')->withSuccess('Signed in');
               
         } else {
         
      
            return redirect("login_admin")->with('status','Login details are not valid.');
         }
      
         
     }


     public function change_password()
     {
        $usertype = auth()->user()->usertype;
        $userid = auth()->user()->id;
        
         return view('users.change_password', compact('userid')); 
     }

     public function change_password_process(Request $request)
     {
        $request->validate([
            'password' => ['required', 'string', 'min:8'],
        ]);

        $userid = auth()->user()->id;
        $usertype = auth()->user()->usertype;
        $newpw=  $request->input('password');
        $upuser = User::find($userid);
        $upuser->password = Hash::make($newpw);
        $upuser->first_time_logged_in = '0';
        $upuser->save();

        
        if($usertype=="Phakbet"){
            $now = date("Y-m-d H:i:s");
            $getlogs= LoginLogs::where('user_id',$userid)->count();
            if($getlogs==0){
                LoginLogs::create([
                    'user_id'=>$userid,
                    'login_count'=>1,
                    'last_login'=>$now,
                    ]);
            } else {
                $log = LoginLogs::where('user_id',$userid)->get();
                $logid  = $log[0]['id'];

                $logs = LoginLogs::find($logid);
                $logs->login_count = $logs->login_count + 1;
                $logs->last_login = $now;
                $logs->save();
            }
        }
        return redirect("upload_image");
     }

     public function upload_image()
     {
        $usertype = auth()->user()->usertype;
        return view('users.upload_image',compact('usertype')); 
     }

     public function upload_image_process(Request $request)
     {
        $userid = auth()->user()->id;
        $usertype = auth()->user()->usertype;
        $validated = $request->validate([
            'user_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        $imageName = time().'.'.$request->user_image->extension();  
        $request->user_image->move(public_path('images/users'), $imageName);

        $upload= User::find($userid);
        $upload->user_image = $imageName;
        $upload->save();

        if($usertype == "Phakbet"){
            return redirect()->route('dashboard_phakbet')->with('status','success')->with('message_success','Image successfully uploaded!');
        } else {
            return redirect()->route('admin_dashboard')->with('status','success')->with('message_success','Image successfully uploaded!');
        }
     }


     public function dashboard_phakbet()
     {
        $usertype = auth()->user()->usertype;
        $userid = auth()->user()->id;
        $username = auth()->user()->name;
        $today = date("Y-m-d H:i:s");
        $kingid = getUpline("king", $userid, "id");
       
        $firstlogin_count =LoginLogs::where('user_id', $userid)->count();
     
        if($firstlogin_count>0){
            $firstlogin = LoginLogs::where('user_id', $userid)->get();
        
            $logs = $firstlogin[0]['login_count'];

          
             if($logs>1){
              
                $events = Events::where('king_id',$kingid)->where('firsttime','0')->where(function($query) use ($today){
                    $query->where('date_start', '>', $today)
                    ->orwhere('date_start', '<=', $today)
                    ->where('date_end', '>=', $today)
                    ->orderBy('date_end', 'asc');
                })->get();
                          
              

            } else {

                $events = Events::where('date_end', '>=', $today)
                            ->where('king_id',$kingid)
                            ->where('firsttime','1')
                            ->orderBy('date_end', 'asc')
                            ->get();
            }

            
        } else {
            $events = Events::where('king_id',$kingid)->where('firsttime','0')->where(function($query) use ($today){
                $query->where('date_start', '>', $today)
                ->orwhere('date_start', '<=', $today)
                ->where('date_end', '>=', $today)
                ->orderBy('date_end', 'asc');
            })->get();
                      

         
          
        }
        
      
        $curr_wallet = getUserDetails($userid, 'curr_wallet');
        $user_image = getUserDetails($userid, 'user_image');

        
         return view('users.dashboard_phakbet', compact('usertype','userid','curr_wallet', 'events', 'user_image','username')); 
     }

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
    public function place_bet(Request $request)
    {

        
        $count= $request->input('count');
        $userid = auth()->user()->id;
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
        $payment_ref = date("YmdHis").generateRandom('6');
        $event_id = $request->input('event_'.$count);
        $closed = checkEventStatus($event_id);
        if($closed == 0 ){
                $coridor_id= getUpline('coridor', $userid, 'id');
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

                WalletUser::create([
                    'transaction_date'=>$now,
                    'user_id'=>auth()->user()->id,
                    'bet_id'=>$betid,
                    'event_id'=>$request->input('event_'.$count),
                    'transaction_type'=>"Betting Amount",
                    'credit' =>$total,
                    'transaction_reference'=>$payment_ref
                ]);

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
                    $coridor_amount = $new_total * $coridor;
                    
                    WalletCoridor::create([
                        'transaction_date'=>$now,
                        'coridor_id'=>$coridor_id,
                        'bet_id'=>$betid,
                        'event_id'=>$request->input('event_'.$count),
                        'transaction_type'=>"Betting Commission",
                        'debit' =>$coridor_amount,
                        'transaction_reference'=>$payment_ref
                        ]);

                    $wallet_cor = User::find($coridor_id);
                    $new_wallet_cor = $wallet_cor->curr_wallet + $coridor_amount;
                    $wallet_cor->curr_wallet=$new_wallet_cor;
                    $wallet_cor->save();

                    /////////////// END INSERT Coridor WALLET ///////////////

                    /////////////// INSERT MAYOR WALLET ///////////////
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

                    return redirect()->route('dashboard_phakbet')->with('status','success')->with('message_success','Congratulations! You have successfully placed your bet for an event.');
                } else {
                    return redirect()->route('dashboard_phakbet')->with('status','fail')->with('message_fail','Sorry! Your bet did not go through. Max slots taken for '.$choice.'. Please try another combination.');
                }
                        
            }else {
                return redirect()->route('dashboard_phakbet')->with('status','fail')->with('message_fail','Sorry! Your bet did not go through. This event had been closed.');

            }
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function forgot_password(Request $request)
    {
        $now=date("Y-m-d H:i:s");
        $request->validate([
            'mobile' => 'required|exists:users,mobile',
        ]);

        $mobile=$request->input('mobile');
        $pw= generateRandom(4);

        $affected = User::where('mobile',$mobile)
        ->update(['password' =>Hash::make($pw)]);
       
        SmsOut::create([
            'sms_to'=>$mobile,
            'sms_text'=>"Hello! Your new Phakbet password is ".$pw.".",
            'sms_from'=>"+639668096065",
            'sms_timestamp'=>$now
        ]);
        return redirect()->route('password.request')->with('status','Your new password has been sent to your mobile number.');
      
    }

}
