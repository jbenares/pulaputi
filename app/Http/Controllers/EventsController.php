<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Bets;
use App\Models\Events;
use App\Models\EventWinners;
use App\Models\EventNoWins;
use App\Models\WalletUser;
use App\Models\WalletKing;
use App\Models\WalletCoridor;
use App\Models\WalletMayor;
use App\Models\GameCategory;
use App\Models\SmsOut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid=auth()->user()->id;
     
        $usertype= auth()->user()->usertype;
        $today = date("Y-m-d H:i:s");
      
        $events = Events::where('king_id',$userid)->where(function($query) use ($today){
            $query->where('date_start', '>', $today)
            ->orwhere('date_start', '<=', $today)
            ->where('date_end', '>=', $today);
        })->get();
              
       
            return view('events.index', compact('events'));
        
    }

    public function finishedevents()
    {
        $today = date("Y-m-d H:i:s");
        $events = Events::where('king_id',auth()->user()->id)
                        ->where('date_end', '<', $today)
                        ->orderBy('win_flag','asc')
                        ->orderBy('date_end','desc')
                        ->get();
       
         return view('events.finishedevents', compact('events'));
        
    }

    public function joined()
    {
        $userid= auth()->user()->id;
        $bets = Bets::select("events.id", "events.event_name", "bets.user_id", "bets.event_id","bets.bet_date", "bets.bet_choice", "bets.slot_price", "bets.bet_slots", "bets.bet_total", "events.running_balance",
                        "events.no_of_winners", "events.win_array", "events.result_image", "events.url_result")
                    ->join("events", "events.id", "=", "bets.event_id")
                    ->where('bets.user_id', $userid)
                    ->get();
       
         return view('events.joined',compact('bets'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userid= auth()->user()->id;
        $game_category = GameCategory::all();
        $curr_wallet = getUserDetails($userid, 'curr_wallet');
        return view('events.create',compact('game_category', 'curr_wallet','userid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userid= auth()->user()->id;
        $potmoney =getPotMoney($userid);
        $now= date("Y-m-d");
        $curr_wallet = getUserDetails($userid, 'curr_wallet')+$potmoney;
        $payment_ref = date("YmdHis").generateRandom('6');
        $validated = $request->validate([
            'event_name' => 'required|max:255',
            'event_desc' => 'required',
            'start_date'=>'required|date',
            'end_date'=>'required|date|after_or_equal:start_date',
            'event_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'initial_pot'=>'required|numeric|min:100|max:'.$curr_wallet,
            'slot_price'=>'required|numeric|min:1|max:10',
            'game_category'=>'required',
        ],
        [
            'initial_pot.max' => 'Initial pot must not be greater than current wallet balance: '.number_format($curr_wallet,2) ,
        ]);

     

        $get_choice_no = GameCategory::where('id',$request->input('game_category'))->get();
        $firsttime = $get_choice_no[0]['firsttime'];
        $choice_array = $get_choice_no[0]['choice_array'];
        $outcomes=0;

       
        if($choice_array =="" || empty($choice_array)){
            $outcomes = $get_choice_no[0]['no_of_outcomes'];
        }
        $choices = "";
    
            if($outcomes >0){
                for($x=1;$x<=$outcomes;$x++){
                  
                    $choices .= $request->input('choice_array_'.$x) .", ";
                    
                }
            }
        $choices = substr($choices,0,-2);
      
        //echo $choices;
        $game_cat = explode("_", $request->input('game_category'));
        $game_cat_id = $game_cat[0];
        
        if(!empty($request->event_image)){
            $imageName = time().'.'.$request->event_image->extension();  
            $request->event_image->move(public_path('images/game_category'), $imageName);
         } else{
            $imageName = gamecate_image($game_cat_id);
         }
       
      
        $eventid = Events::insertGetId([
            'king_id'=>auth()->user()->id,
            'event_name'=>$request->input('event_name'),
            'event_description'=>$request->input('event_desc'),
            'date_start'=>$request->input('start_date'),
            'date_end'=>$request->input('end_date'),
            'event_image' => $imageName,
            'initial_pot'=>$request->input('initial_pot'),
            'running_balance'=>$request->input('initial_pot'),
            'slot_price'=>$request->input('slot_price'),
            'game_category_id'=>$game_cat_id,
            'choice_array'=>$choices,
            'firsttime'=>$firsttime
        ]);

       
        if($potmoney==0){
            $userupdate = User::find($userid);
            $userupdate->curr_wallet = $userupdate->curr_wallet - $request->input('initial_pot');
            $userupdate->save();

            WalletKing::create([
                'transaction_date'=>$now,
                'king_id'=>$userid,
                'event_id'=>$eventid,
                'transaction_type'=>'Event Creation',
                'credit'=>$request->input('initial_pot'),
                'transaction_reference'=>$payment_ref
            ]);

        } else {
            $getnowins=EventNoWins::where('king_id',$userid)->get();
            $id = $getnowins[0]['id'];
            $transfer_to = $getnowins[0]['transferred_to'];
            if(!empty($transfer_to)){
                $t_to = $transfer_to . ", " . $eventid;
            } else {
                $t_to = $eventid;
            }

            if($potmoney >= $request->input('initial_pot')){
               

                $nowinupdate=EventNoWins::find($id);
                $nowinupdate->transferred_amount = $nowinupdate->transferred_amount + $request->input('initial_pot');
                $nowinupdate->balance = $nowinupdate->balance-$request->input('initial_pot');
                $nowinupdate->transferred_to =$t_to;
                $nowinupdate->save();

            } else {
                $deductedwallet = $request->input('initial_pot') - $potmoney;

                $nowinupdate=EventNoWins::find($id);
                $nowinupdate->transferred_amount = $nowinupdate->transferred_amount + $potmoney;
                $nowinupdate->balance = $nowinupdate->balance-$potmoney;
                $nowinupdate->transferred_to =$t_to;
                $nowinupdate->save();

                $userupdate2=User::find($userid);
                $userupdate2->curr_wallet = $userupdate2->curr_wallet -$deductedwallet;
                $userupdate2->save();

                WalletKing::create([
                    'transaction_date'=>$now,
                    'king_id'=>$userid,
                    'event_id'=>$eventid,
                    'transaction_type'=>'Event Creation',
                    'credit'=>$deductedwallet,
                    'transaction_reference'=>$payment_ref
                ]);
            }
        }
       return redirect()->route('events.index')->with('status','Event Successfully added!');
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $today = date("Y-m-d H:i:s");
        $event = Events::find($id);
        $game_category = GameCategory::all();
        $done = Events::where('king_id',auth()->user()->id)
        ->where('date_end', '<', $today)
        ->where('id', $id)
        ->count();

      
        return view('events.edit', compact('game_category', 'event', 'done'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'event_name' => 'required|max:255',
            'event_desc' => 'required',
            'event_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $event = Events::find($id);
    
      
        if(!empty($request->event_image)){
            $image_path = $image_path = "images/game_category/".$request->event_image;
                if(File::exists($image_path)) {
                
                    File::delete($image_path);
                } 

                $imageName = time().'.'.$request->event_image->extension();  
                $request->event_image->move(public_path('images/game_category/'), $imageName);
        } else {
            $imageName = $event->event_image;
        }

        // if($request->remove_photo==1){
        //     $image_path = $image_path = "images/gamecategory/".$request->event_image;
        //         if(File::exists($image_path)) {
                
        //             File::delete($image_path);
        //         } 
               
        // }


            // $get_choice_no = GameCategory::where('id',$request->input('game_category'))->get();
            // $choice_array = $get_choice_no[0]['choice_array'];
            // $outcomes=0;
            // if($choice_array =="" || empty($choice_array)){
            //     $outcomes = $get_choice_no[0]['no_of_outcomes'];
            // }
            // $choices = "";
            //     if($outcomes >0){
            //     for($x=0;$x<$outcomes;$x++){
            //         echo $request->input('choice_array_'.$x) .", ";
            //         $choices .= $request->input('choice_array_'.$x) .", ";
            //     }
            // }
            // $choices = substr($choices,0,-2);
           
            // $game_cat = explode("_", $request->input('game_category'));
            // $game_cat_id = $game_cat[0];

       
            $event->king_id=auth()->user()->id;
            $event->event_name=$request->input('event_name');
            $event->event_description=$request->input('event_desc');
            $event->start_date=$request->input('start_date');
            $event->end_date=$request->input('end_date');
            $event->event_image=$imageName;
           
            $event->save();
            return redirect()->route('events.index')->with('status','Event Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Events  $events
     * @return \Illuminate\Http\Response
     */

    public function set_winning_array(Request $request){
        $count= $request->input('count');
        $userid = auth()->user()->id;
        $event_id = $request->input('event_'.$count);
       
        $answer="";
        $answer_array=array();
        $choice_count= $request->input('choice_count_'.$count);
     
        for($x=1;$x<=$choice_count;$x++){
            $answer.= $request->input('choice_'.$count.'_'.$x). ", ";
            $answer_array[] =$request->input('choice_'.$count.'_'.$x);
        }
       $answer = substr($answer, 0, -2);
       $winners=array();
       $get_event_win_order = Bets::where('event_id', $event_id)->get();
       $count_winners=0;
       $total_win_slots=0;
      
       foreach($get_event_win_order AS $browse){

            $choice = explode(", ", $browse['bet_choice']);

            if($browse->win_order == 1){
                $count_choices = count($choice);
                $count_winning_ans = 0;
                
               
                for($x=0;$x<$count_choices;$x++){
                    if($choice[$x] == $answer_array[$x]){
                        $count_winning_ans++;
                    }
                }
                 if($count_winning_ans == $count_choices){
                    $winners[] = array(
                        'user_id'=>$browse->user_id,
                        'bet_id'=>$browse->id,
                        'bet_slots'=>$browse->bet_slots
                    );
                    $count_winners++;
                    $total_win_slots+=$browse->bet_slots;
                 }
            } else {
                $get_diff = array_diff_assoc($answer_array, $choice);
                $count_diff = count($get_diff);

                if($count_diff==0){
                    $count_winners++;
                    $total_win_slots+=$browse->bet_slots;
                    $winners[] = array(
                        'user_id'=>$browse->user_id,
                        'bet_id'=>$browse->id,
                        'bet_slots'=>$browse->bet_slots
                    );
                    
                } 
               
            }
            $choice = array();
            
       }

        $get_event_pot = Events::where("id", $event_id)->get();
        $event_pot = $get_event_pot[0]['running_balance'];
        $now = date("Y-m-d H:i:s");
        if($count_winners>0){

            $payment_ref = date("YmdHis").generateRandom('6');
           // $winning_amount = $event_pot/$count_winners;

            foreach($winners AS $win){
                $percentage_per_user = $win['bet_slots']/$total_win_slots;
                $winning_amount = $event_pot*$percentage_per_user;
                $uid = $win['user_id'];
                $mobile = getUserDetails($uid, 'mobile');

               
                $event_name = getEventdetails($event_id, 'event_name');
                
                $insert_win = EventWinners::create([
                    'win_date'=>$now,
                    'user_id'=>$win['user_id'],
                    'event_id'=>$event_id,
                    'bet_id'=>$win['bet_id'],
                    'winning_array'=>$answer,
                    'winning_amount' =>$winning_amount,
                ]);

                SmsOut::create([
                    'sms_to'=>$mobile,
                    'sms_text'=>"Winner Winner Chicken Dinner! You've won P". $winning_amount ." from " .$event_name.". Total pot is " .$event_pot ." and there are a total of ". $count_winners ." winners. Happy Phaking!",
                    'sms_from'=>"+639668096065",
                    'sms_timestamp'=>$now
                ]);

                $update_users = User::find($win['user_id']);
                $update_users->curr_wallet = $update_users->curr_wallet+$winning_amount;
                $update_users->save();

                $usertype= getUserDetails($win['user_id'],'usertype');

                if($usertype=='Mayor'){
                    WalletMayor::create([
                       'transaction_date'=>$now,
                       'mayor_id'=>$win['user_id'],
                       'bet_id'=>$win['bet_id'],
                       'event_id'=>$event_id,
                       'transaction_type'=>'Winnings from an Event',
                       'debit'=>$winning_amount,
                       'transaction_reference'=>$payment_ref
                    ]);
                }

                if($usertype=='Coridor'){
                    WalletCoridor::create([
                       'transaction_date'=>$now,
                       'coridor_id'=>$win['user_id'],
                       'bet_id'=>$win['bet_id'],
                       'event_id'=>$event_id,
                       'transaction_type'=>'Winnings from an Event',
                       'debit'=>$winning_amount,
                       'transaction_reference'=>$payment_ref
                    
                    ]);
                }

                if($usertype=='Phakbet'){
                    WalletUser::create([
                       'transaction_date'=>$now,
                       'user_id'=>$win['user_id'],
                       'bet_id'=>$win['bet_id'],
                       'event_id'=>$event_id,
                       'transaction_type'=>'Winnings from an Event',
                       'debit'=>$winning_amount,
                       'transaction_reference'=>$payment_ref
                    ]);
                }
            }
        } else {
            $king_id = getEventdetails($event_id, 'king_id');
            $existing = EventNoWins::where('king_id',$king_id)->count();
            if($existing==0){
                EventNoWins::create([
                    'king_id'=>$king_id,
                    'amount'=>$event_pot,
                    'balance'=>$event_pot,
                ]);
            } else {
                $getid = EventNoWins::where('king_id',$king_id)->get();
                $no_win_id = $getid[0]['id'];
                $updatenowin = EventNoWins::find($no_win_id);
                $updatenowin->amount = $updatenowin->amount+$event_pot;
                $updatenowin->balance = $updatenowin->balance+$event_pot;
                $updatenowin->save();

               
            }
        }
        $imageName="";
        if(!empty($request->file('result_image_'.$count))){
            $imageName = time().'.'.$request->file('result_image_'.$count)->extension();  
            $request->file('result_image_'.$count)->move(public_path('images/results'), $imageName);
        } 

        $event_name = getEventdetails($event_id, 'event_name');
        $updateevent = Events::find($event_id);
        $updateevent->win_flag = 1;
        $updateevent->win_array = $answer;
        $updateevent->no_of_winners = $count_winners;
        $updateevent->result_image = $imageName;
        $updateevent->url_result = $request->input('url_results_'.$count);
        $updateevent->save();

       return redirect()->route('finishedevents')->with('status','Event has been finalized. There are '. $count_winners .' winner/s for '. $event_name.'.');
    }

    
    public function event_bettors()
    {
        $today = date("Y-m-d H:i:s");
        $usertype= auth()->user()->usertype;
        if($usertype=="King"){
            $events = Events::where('king_id',auth()->user()->id)
                            ->where('date_end', '<', $today)
                            ->get();
        } else {
            $events = Events::where('date_end', '<', $today)
                        ->get();
        }

        return view('events.bettors', compact('events'));
    }

    public function viewbettors($id)
    {
        
        $bets = Bets::where('event_id',$id)
                        ->get();

        return view('events.viewbettors', compact('bets','id'));
    }
}
