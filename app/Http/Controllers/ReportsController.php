<?php

namespace App\Http\Controllers;
use App\Models\EventNoWins;
use App\Models\User;
use App\Models\Events;
use App\Models\WalletKing;
use App\Models\WalletMayor;
use App\Models\WalletCoridor;
use App\Models\WalletUser;
use App\Models\EventWinners;
use Illuminate\Http\Request;
use DateInterval;
use DatePeriod;
use DateTime;

class ReportsController extends Controller
{
    public function events_summary(Request $request)
    {
        $curr_year = date("Y");
        $kings = User::where('usertype','King')->get();
        $totalpot=0;
        $events=array();
        $totalwins=0;
        $filters = array(
            'month'=>'',
            'year'=>'',
            'king'=>'',
            'status'=>''
        );

        if($request->has('filter')){
            $filters = array(
                'month'=>$request->month,
                'year'=>$request->year,
                'king'=>$request->king,
                'status'=>'filter'
            );
            $king =$request->king;
            $month =$request->month;
            $year= $request->year;
            $pot = EventNoWins::where("king_id",$king)->get();
            
            if(!empty($year) && !empty($month)){
                $events = Events::where("king_id",$king)->whereYear("date_start",$year)->whereMonth("date_start",$month)->get();
                $totalpot = Events::where("king_id",$king)->whereYear("date_start",$year)->whereMonth("date_start",$month)->sum('running_balance');
                $totalwins = Events::where("king_id",$king)->whereYear("date_start",$year)->whereMonth("date_start",$month)->where('no_of_winners','>','0')->sum('running_balance');
            }
            if(!empty($year) && empty($month)){
            
                $events = Events::where("king_id",$king)->whereYear("date_start",$year)->get();
                $totalpot = Events::where("king_id",$king)->whereYear("date_start",$year)->sum('running_balance');
                $totalwins = Events::where("king_id",$king)->whereYear("date_start",$year)->where('no_of_winners','>','0')->sum('running_balance');
            }
            if(!empty($king) && empty($month) && empty($year)){
                $events = Events::where("king_id",$king)->get();
                $totalpot = Events::where("king_id",$king)->sum('running_balance');
                $totalwins = Events::where("king_id",$king)->where('no_of_winners','>','0')->sum('running_balance');
            }
            if(!empty($king) && !empty($month) && empty($year)){
                $events = Events::where("king_id",$king)->get();
                $totalpot = Events::where("king_id",$king)->whereMonth("date_start",$month)->sum('running_balance');
                $totalwins = Events::where("king_id",$king)->whereMonth("date_start",$month)->where('no_of_winners','>','0')->sum('running_balance');
            }
             
        }

        return view('reports.events_summary',compact('curr_year', 'kings','totalpot','filters','events','totalwins'));
    }


    public function all_transactions(Request $request)
    {
        $consolidated=array();
        $walletking = WalletKing::all();
        $walletmayor = WalletMayor::all();
        $walletcoridor = WalletCoridor::all();
        $walletphakbet = WalletUser::all();
        foreach($walletking AS $king){
            $name = getUserDetails($king->king_id, 'name');
            if($king->event_id != 0){
                $event = getEventdetails($king->event_id, 'event_name');
            } else {
                $event ='';
            }
            $consolidated[]=array(
                'date'=>$king->transaction_date,
                'name'=>$name,
                'usertype'=>"King",
                'event'=>$event,
                'transactiontype'=>$king->transaction_type,
                'debit'=>$king->debit,
                'credit'=>$king->credit,
                'reference'=>$king->transaction_reference
            );
        }

        foreach($walletmayor AS $mayor){
            $name = getUserDetails($mayor->mayor_id, 'name');
            if($mayor->event_id != 0){
                $event = getEventdetails($mayor->event_id, 'event_name');
            } else {
                $event ='';
            }
            $consolidated[]=array(
                'date'=>$mayor->transaction_date,
                'name'=>$name,
                'usertype'=>"Mayor",
                'event'=>$event,
                'transactiontype'=>$mayor->transaction_type,
                'debit'=>$mayor->debit,
                'credit'=>$mayor->credit,
                'reference'=>$mayor->transaction_reference
            );
        }

        foreach($walletcoridor AS $coridor){
            $name = getUserDetails($coridor->coridor_id, 'name');
            if($coridor->event_id != 0){
                $event = getEventdetails($coridor->event_id, 'event_name');
            } else {
                $event ='';
            }
            $consolidated[]=array(
                'date'=>$coridor->transaction_date,
                'name'=>$name,
                'usertype'=>"Kuridor",
                'event'=>$event,
                'transactiontype'=>$coridor->transaction_type,
                'debit'=>$coridor->debit,
                'credit'=>$coridor->credit,
                'reference'=>$coridor->transaction_reference
            );
        }

        foreach($walletphakbet AS $phakbet){
            $name = getUserDetails($phakbet->user_id, 'name');
            if($phakbet->event_id != 0){
                $event = getEventdetails($phakbet->event_id, 'event_name');
            } else {
                $event ='';
            }
            $consolidated[]=array(
                'date'=>$phakbet->transaction_date,
                'name'=>$name,
                'usertype'=>"Phakbet",
                'event'=>$event,
                'transactiontype'=>$phakbet->transaction_type,
                'debit'=>$phakbet->debit,
                'credit'=>$phakbet->credit,
                'reference'=>$phakbet->transaction_reference
            );
        }


        return view('reports.all_transactions',compact('consolidated'));
    }

    public function user_summary(Request $request)
    {
      
        $accounts=array();
        $filters = array(
            'date_from'=>'',
            'date_to'=>'',
            'status'=>''
        );

        if($request->has('filter')){
            $filters = array(
                'date_from'=>$request->date_from,
                'date_to'=>$request->date_to,
                'status'=>'filter'
            );
            $from = $request->date_from;
            $to = $request->date_to;
        
        $users = User::where("banned","0")->get();

        $users =User::where('banned','0')->where(function($query){
            $query->where('usertype', 'King')
                  ->orWhere('usertype', 'Mayor')
                  ->orWhere('usertype', 'Kuridor')
                  ->orWhere('usertype', 'Phakbet');
        })->get();

        foreach($users AS $u){

            if($u->usertype == "King"){
                $commission = WalletKing::whereBetween("transaction_date", [$from, $to])->where('king_id',$u->id)->where(function($query){
                    $query->where('transaction_type', 'Betting')
                          ->orWhere('transaction_type', 'Betting Commission');
                })->sum('debit');

                $winnings = 0;
                $load = WalletKing::whereBetween("transaction_date", [$from, $to])->where('king_id',$u->id)->where(function($query){
                    $query->where('transaction_type', 'like', '%Wallet top-up%')
                          ->orWhere('transaction_type', 'like', '%Wallet transfer from%');
                })->sum('debit');
                $betting = 0;
                $registration = WalletKing::whereBetween("transaction_date", [$from, $to])->where('king_id',$u->id)->where('transaction_type', 'like', '%Registration%')->sum('credit');
                $eventcreation = WalletKing::whereBetween("transaction_date", [$from, $to])->where('king_id',$u->id)->where('transaction_type', 'Event Creation')->sum('credit');
                $transfers = WalletKing::whereBetween("transaction_date", [$from, $to])->where('king_id',$u->id)->where('transaction_type', 'like', '%Wallet transfer to%')->sum('credit');
            
               
            } else if($u->usertype == "Mayor"){
                $commission = WalletMayor::whereBetween("transaction_date", [$from, $to])->where('mayor_id',$u->id)->where(function($query){
                    $query->where('transaction_type', 'Betting')
                          ->orWhere('transaction_type', 'Betting Commission');
                })->sum('debit');

                $winnings = WalletMayor::whereBetween("transaction_date", [$from, $to])->where('mayor_id',$u->id)->where('transaction_type', 'like', '%Winnings%')->sum('debit');
                $load = WalletMayor::whereBetween("transaction_date", [$from, $to])->where('mayor_id',$u->id)->where(function($query){
                    $query->where('transaction_type', 'like', '%Wallet top-up%')
                          ->orWhere('transaction_type', 'like', '%Wallet transfer from%');
                })->sum('debit');
                $betting = WalletMayor::whereBetween("transaction_date", [$from, $to])->where('mayor_id',$u->id)->where('transaction_type', 'Betting Amount')->sum('credit');
                $registration = 0;
                $eventcreation = 0;
                $transfers = WalletMayor::whereBetween("transaction_date", [$from, $to])->where('mayor_id',$u->id)->where('transaction_type', 'like', '%Wallet transfer to%')->sum('credit');
            } else if($u->usertype == "Coridor"){
                $commission = WalletCoridor::whereBetween("transaction_date", [$from, $to])->where('coridor_id',$u->id)->where(function($query){
                    $query->where('transaction_type', 'Betting')
                          ->orWhere('transaction_type', 'Betting Commission');
                })->sum('debit');

                $winnings = WalletCoridor::whereBetween("transaction_date", [$from, $to])->where('coridor_id',$u->id)->where('transaction_type', 'like', '%Winnings%')->sum('debit');
                $load = WalletCoridor::whereBetween("transaction_date", [$from, $to])->where('coridor_id',$u->id)->where(function($query){
                    $query->where('transaction_type', 'like', '%Wallet top-up%')
                          ->orWhere('transaction_type', 'like', '%Wallet transfer from%');
                })->sum('debit');
                $betting = WalletCoridor::whereBetween("transaction_date", [$from, $to])->where('coridor_id',$u->id)->where('transaction_type', 'Betting Amount')->sum('credit');
                $registration = 0;
                $eventcreation = 0;
                $transfers = WalletCoridor::whereBetween("transaction_date", [$from, $to])->where('coridor_id',$u->id)->where('transaction_type', 'like', '%Wallet transfer to%')->sum('credit');
            } else if($u->usertype == "Phakbet"){
                $commission = WalletUser::whereBetween("transaction_date", [$from, $to])->where('user_id',$u->id)->where(function($query){
                    $query->where('transaction_type', 'Betting')
                          ->orWhere('transaction_type', 'Betting Commission');
                })->sum('debit');

                $winnings = WalletUser::whereBetween("transaction_date", [$from, $to])->where('user_id',$u->id)->where('transaction_type', 'like', '%Winnings%')->sum('debit');
                $load = WalletUser::whereBetween("transaction_date", [$from, $to])->where('user_id',$u->id)->where(function($query){
                    $query->where('transaction_type', 'like', '%Wallet top-up%')
                          ->orWhere('transaction_type', 'like', '%Wallet transfer from%');
                })->sum('debit');
                $betting = WalletUser::whereBetween("transaction_date", [$from, $to])->where('user_id',$u->id)->where('transaction_type', 'Betting Amount')->sum('credit');
                $registration = 0;
                $eventcreation = 0;
                $transfers = WalletUser::whereBetween("transaction_date", [$from, $to])->where('user_id',$u->id)->where('transaction_type', 'like', '%Wallet transfer to%')->sum('credit');
            }
            $daily=($commission + $winnings + $load) - $betting - $registration - $eventcreation - $transfers;
            $accounts[] = array([
                "name"=>$u->name,
                "usertype"=>$u->usertype,
                "date"=>$from . " to " . $to,
                "commission"=>$commission,
                "winnings"=>$winnings,
                "load"=>$load,
                "betting"=>$betting,
                "registration"=>$registration,
                "event_creation"=>$eventcreation,
                "transfers"=>$transfers,  
                "daily"=>$daily  
            ]);
        }
            
             
        }

        return view('reports.user_summary',compact('accounts','filters'));
    }

    public function event_winners()
    {
        $winners=array();
        $wins = EventWinners::all();
        foreach($wins AS $win){
            $winners[]=array([
                'date'=>$win->win_date,
                'winner'=>getUserDetails($win->user_id,'name'),
                'mobile'=>getUserDetails($win->user_id,'mobile'),
                'event'=>getEventdetails($win->event_id, 'event_name'),
                'win_array'=>$win->winning_array,
                'win_amount'=>$win->winning_amount
            ]);
        }
        $totalwins = EventWinners::sum('winning_amount');
        return view('reports.event_winners',compact('totalwins','winners'));
    }

    public function daily_bets(Request $request)
    {
        $arr=array();
        $filters = array(
            'date_from'=>'',
            'date_to'=>'',
            'status'=>''
        );

        if($request->has('filter')){
            $filters = array(
                'date_from'=>$request->date_from,
                'date_to'=>$request->date_to,
                'status'=>'filter'
            );
            $from = $request->date_from;
            $to = $request->date_to;
        
            $interval = DateInterval::createFromDateString('1 day');
            $period = new DatePeriod(new DateTime($from), $interval, new DateTime($to)) ;

            
            foreach ($period as $dt) {
                $arr[] = array([
                    "date"=>$dt->format("Y-m-d"),
                    "bets"=>getBetsPerDate($dt->format("Y-m-d")),
                    "pots_win"=>getWinsPerDate($dt->format("Y-m-d")),
                ]);
             
            }
     }
       
        return view('reports.daily_bets',compact('filters','arr'));
    }



}
