<?php
use App\Models\GameCategory;
use App\Models\Events;
use App\Models\User;
use App\Models\WalletKing;
use App\Models\WalletMayor;
use App\Models\WalletCoridor;
use App\Models\WalletUser;
use App\Models\EventNoWins;
use App\Models\EventWinners;
use App\Models\Bets;
use App\Models\QuestionBank;

if (!function_exists('timeRemaining')) {
  function timeRemaining($dateto) {
    $now = new DateTime();
    $future_date = new DateTime($dateto);
    $interval = $future_date->diff($now);
    return $interval->format("%a days, %h hours, %i minutes");
   
  }
}

if (!function_exists('getOutcome')) {
  function getOutcome($categoryid) {
     $getcat = GameCategory::where("id",$categoryid)->get();
     $outcome =$getcat[0]['no_of_outcomes'];
     return $outcome;
   
  }
}

if (!function_exists('getGameCatDetails')) {
  function getGameCatDetails($categoryid, $column) {
     $getcat = GameCategory::where("id",$categoryid)->get();
     $outcome =$getcat[0][$column];
     return $outcome;
  }
}

if (!function_exists('generateRandom')) {
  function generateRandom($length_of_string)
  {
      $str_result = '0123456789ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz';
      return substr(str_shuffle($str_result),0, $length_of_string);
  }
}

if (!function_exists('getUpline')) {
  function getUpline($upline, $user_id, $returnval)
  {
      if($upline =='king'){
        $getuplineid = User::select('king_id')
                      ->where("id",$user_id)
                      ->get();
        $uplineid =$getuplineid[0]['king_id'];
      } else if($upline =='mayor'){
       
        $getuplineid = User::select('mayor_id')
                      ->where("id",$user_id)
                      ->get();
        $uplineid =$getuplineid[0]['mayor_id'];

    
      } else if($upline =='coridor'){
        $getuplineid = User::select('coridor_id')
                      ->where("id",$user_id)
                      ->get();
        $uplineid =$getuplineid[0]['coridor_id'];
      }
    
      $getname = User::select('name')
            ->where("id",$uplineid)
            ->get();
      if($returnval =='name'){
        // if($getname[0]['name']=='King' || $getname[0]['name']=='Mayor'){
        //   $upline =$getname[0]['name'];
        // } else {
        //   $upline = "Kuridor";
        // }
        $upline =$getname[0]['name'];
      } else if($returnval =='id'){
        $upline =$uplineid;
      }

      return $upline;
  }
}
if (!function_exists('getChoiceArray')) {
  function getChoiceArray($eventid)
  {
      $choices = Events::where("id", $eventid)->get();
      //echo $choices;
      if(!empty($choices[0]['choice_array'])){
        $choice_array = $choices[0]['choice_array'];
      } else {
        //$choice_array="";
         $gamecat = $choices[0]['game_category_id'];
         $outcomes = GameCategory::where("id", $gamecat)->get();

         $choice_array = $outcomes[0]['choice_array'];
      }

      return $choice_array;
  }
}

if (!function_exists('getChoicesMinmax')) {
  function getChoicesMinmax($question)
  {
      $choices = QuestionBank::where("question", $question)->get();
      $choice_array = $choices[0]['choices'];
      
      return $choice_array;
  }
}

if (!function_exists('getUserDetails')) {
  function getUserDetails($userid, $column) {
     $getuser = User::where("id",$userid)->get();
     $output =$getuser[0][$column];
     return $output;
   
  }
}

if (!function_exists('getUserDetailsCustom')) {
  function getUserDetailsCustom($whrCol, $whrVal, $column) {
     $getuser = User::where($whrCol,$whrVal)->get();
     $output =$getuser[0][$column];
     return $output;
   
  }
}

if (!function_exists('countUserBet')) {
  function countUserBet($userid, $eventid) {
     $countbets = Bets::where("user_id",$userid)
                      ->where("event_id",$eventid)
                      ->count();
     return $countbets;
   
  }
}

if (!function_exists('getBetdetails')) {   
  function getBetdetails($userid, $eventid, $column) {
     $getbet = Bets::where("user_id",$userid)
                      ->where("event_id",$eventid)
                      ->get();
     return $getbet[0][$column];
   
  }
}

if (!function_exists('getEventdetails')) {   
  function getEventdetails($eventid, $column) {
     $getevent = Events::where("id",$eventid)
                      ->get();
     return $getevent[0][$column];
   
  }
}

if (!function_exists('getBets')) {   
  function getBets($eventid, $userid) {
     $getbets = Bets::where("event_id",$eventid)
                      ->where("user_id",$userid)
                      ->get();
     return $getbets;
   
  }
}

if (!function_exists('getBetsPerDate')) {   
  function getBetsPerDate($date) {
     $bet_total = Bets::where("bet_date","like","%".$date."%")
                      ->sum("bet_total");
     return $bet_total;
   
  }
}

if (!function_exists('getWinsPerDate')) {   
  function getWinsPerDate($date) {
     $win_total = EventWinners::where("win_date","like","%".$date."%")
                      ->sum("winning_amount");
     return $win_total;
   
  }
}

if (!function_exists('getEventDetailsFromBet')) {   
  function getEventDetailsFromBet($betid, $column) {
     $getbets = Bets::where("id",$betid)->get();
     $eventid = $getbets[0]['event_id'];
     $getevent = Events::where("id",$eventid)->get();
     $col = $getevent[0][$column];
     return $col;
   
  }
}

if (!function_exists('checkEventStatus')) {   
  function checkEventStatus($eventid) {
    $today=date("Y-m-d H:i:s");
     $getevent = Events::where("id",$eventid)
                      ->where("date_end","<",$today)
                      ->count();
      if($getevent > 0){
        $closed = 1;
      } else {
        $closed = 0;
      }
     return $closed;
   
  }
}

if (!function_exists('getProfit')) {   
  function getProfit($eventid) {
     $getevent = Events::where("id",$eventid)->get();
     $initial_pot = $getevent[0]['initial_pot'];

     $get_wallet_king  = WalletKing::where("event_id", $eventid)->sum('debit');
     $wallet = $get_wallet_king;
     $profit = $wallet - $initial_pot;
     return $profit;
   
  }
}

if (!function_exists('getTotalSlots')) {   
  function getTotalSlots($eventid) {
     $getslots = Bets::where("event_id", $eventid)->sum('bet_slots');
     return $getslots;
   
  }
}

if (!function_exists('getActiveDownline')) {   
  function getActiveDownline($userid, $usertype, $status) {
    $today=date("Y-m-d");
    if($status=='all'){
      if($usertype=='King'){
        $getdownline = User::where("king_id", $userid)->where('banned', '0')->count();
      } 
      else if($usertype=='Mayor'){
      $getdownline = User::where("mayor_id", $userid)->where('banned', '0')->count();
      } else if($usertype=='Coridor'){
        $getdownline = User::where("coridor_id", $userid)->where('banned', '0')->count();
      }  
    } else {
      if($usertype=='King'){
        $getdownline = User::join('bets', 'users.id', '=', 'bets.user_id')->where("king_id", $userid)->whereRaw('DATEDIFF(bet_date, "'. $today.'") < 7')->where('banned', '0')->distinct()->count('bets.user_id');
        } 
        else if($usertype=='Mayor'){
        $getdownline = User::join('bets', 'users.id', '=', 'bets.user_id')->where("mayor_id", $userid)->whereRaw('DATEDIFF(bet_date, "'. $today.'") < 7')->where('banned', '0')->distinct()->count('bets.user_id');
        } else if($usertype=='Coridor'){
          $getdownline = User::join('bets', 'users.id', '=', 'bets.user_id')->where("coridor_id", $userid)->whereRaw('DATEDIFF(bet_date, "'. $today.'") < 7')->where('banned', '0')->distinct()->count('bets.user_id');
        }
    }
      return $getdownline;
    
    }
}


if (!function_exists('getCurrentEventsJoined')) {   
  function getCurrentEventsJoined($userid) {
    $today=date("Y-m-d");
    $getdownline = Bets::where("user_id", $userid)->whereRaw('DATEDIFF(bet_date, "'. $today.'") < 7')->count();
     return $getdownline;
   
  }
}

if (!function_exists('getRegistered')) {   
  function getRegistered($userid, $usertype, $timeline) {
    if($timeline == 'today'){
       $date = date("Y-m-d");
       if($usertype=='King'){
        $getdownline = User::where("king_id", $userid)->where('banned', '0')->whereDate('date_registered', $date)->count();
        } 
        else if($usertype=='Mayor'){
        $getdownline = User::where("mayor_id", $userid)->where('banned', '0')->whereDate('date_registered', $date)->count();
        } else if($usertype=='Coridor'){
          $getdownline = User::where("coridor_id", $userid)->where('banned', '0')->whereDate('date_registered', $date)->count();
        }
    } else {
       $date = date("m");
       if($usertype=='King'){
        $getdownline = User::where("king_id", $userid)->where('banned', '0')->whereMonth('date_registered', $date)->count();
        } 
        else if($usertype=='Mayor'){
        $getdownline = User::where("mayor_id", $userid)->where('banned', '0')->whereMonth('date_registered', $date)->count();
        } else if($usertype=='Coridor'){
          $getdownline = User::where("coridor_id", $userid)->where('banned', '0')->whereMonth('date_registered', $date)->count();
        }
    }
  
     return $getdownline;
   
  }
} 


if (!function_exists('getTotalEarnings')) {   
  function getTotalEarnings($userid, $usertype) {

    if($usertype == 'King'){
      $getwallet = WalletKing::where('king_id', $userid)->where('event_id','!=','0')->sum('debit');
    } else if($usertype=='Mayor'){
     $getwallet = WalletMayor::where('mayor_id', $userid)->where('event_id','!=','0')->sum('debit');
    } else if($usertype=='Coridor'){
      $getwallet = WalletCoridor::where('coridor_id', $userid)->where('event_id','!=','0')->sum('debit');
    } else if($usertype=='Phakbet'){
      $getwallet = WalletUser::where('user_id', $userid)->where('event_id','!=','0')->sum('debit');
    }
     return $getwallet;
   
  }
}

if (!function_exists('getPotMoney')) {   
  function getPotMoney($kingid) {
     $amount = EventNoWins::where("king_id", $kingid)->sum('balance');
     return $amount;
  }
}
if (!function_exists('getMayors')) {   
  function getMayors($kingid) {
     $mayors = User::where("king_id", $kingid)->where("usertype", "Mayor")->get();
     return $mayors;
  }
}

if (!function_exists('getCoridors')) {   
  function getCoridors($mayorid) {
     $coridors = User::where("mayor_id", $mayorid)->where("usertype", "Coridor")->get();
     return $coridors;
  }
}

if (!function_exists('getPhakbets')) {   
  function getPhakbets($coridorid) {
     $phakbets = User::where("coridor_id", $coridorid)->where("usertype", "Phakbet")->get();
     return $phakbets;
  }
}

if (!function_exists('failsafe_refcode')) {   
  function failsafe_refcode() {  
    do{
      $refcode = generateRandom(7);
      $count = User::where("ref_code", $refcode)->count();
    } while($count>0);

    return  $refcode;
  } 
  
}


if (!function_exists('gamecate_image')) {   
  function gamecate_image($gamecat_id) {
   
      $image_numbers=['numbers1.jpg', 'numbers2.jpg', 'numbers3.jpg'];
      $image_boxing = ['boxing1.jpg','boxing2.jpg','boxing3.jpg','boxing4.jpg','boxing5.jpg'];
      $image_soccer = ['soccer1.jpg','soccer2.jpg','soccer3.jpg','soccer4.jpg','soccer5.jpg'];
      $image_basketball = ['basketball1.jpg','basketball2.jpg','basketball3.jpg','basketball4.jpg','basketball5.jpg'];
      $image_easy = ['easy1.jpg','easy2.jpg','easy3.jpg','easy4.jpg'];

      if($gamecat_id == 1 || $gamecat_id == 2){
        $img_rand = shuffle($image_numbers);
        $img= $image_numbers[0];
      } else if($gamecat_id == 3 || $gamecat_id == 8){
        $img_rand = shuffle($image_boxing);
        $img= $image_boxing[0];
      } else if($gamecat_id == 4 || $gamecat_id == 9){
        $img_rand = shuffle($image_soccer);
        $img= $image_soccer[0];
      } else if($gamecat_id == 5 || $gamecat_id == 7){
        $img_rand = shuffle($image_basketball);
        $img= $image_basketball[0];
      }else if($gamecat_id == 10){
        $img_rand = shuffle($image_easy);
        $img= $image_easy[0];
      }
      return $img;

  } 
  
}

if (!function_exists('getBetsToday')) {   
  function getBetsToday($userid) {  
    $today = date("Y-m-d");
    $countbets = Bets::where('user_id', $userid)->whereDate('bet_date',$today)->count();
    return $countbets;
  } 
}

if (!function_exists('getBetsMonth')) {   
  function getBetsMonth($userid) {  
    $month = date("m");
    $countbets = Bets::where('user_id', $userid)->whereMonth('bet_date',$month)->count();
    return $countbets;
   
  } 
}

if (!function_exists('getAmountWon')) {   
  function getAmountWon($userid, $eventid) {  
    $bet_count = EventWinners::where('user_id', $userid)->where('event_id', $eventid)->count();
    if($bet_count == 0){
      $amount=0;
    } else {
      $bets = EventWinners::where('user_id', $userid)->where('event_id', $eventid)->get();
      $amount = $bets[0]['winning_amount'];
    }
    return $amount;
   
  } 
}


if (!function_exists('checkEventWon')) {   
  function checkEventWon($userid, $eventid) {  
    $win_count = EventWinners::where('user_id', $userid)->where('event_id', $eventid)->count();
  
    return $win_count;
   
  } 
}

if (!function_exists('getEventsCreated')) {   
  function getEventsCreated($userid) {
    $getevents = Events::where("king_id", $userid)->count();
     return $getevents;
   
  }
}

if (!function_exists('getSlotsTaken')) {   
  function getSlotsTaken($eventid) {  
    $countslots = Bets::where('event_id', $eventid)->sum('bet_slots');
    return $countslots;
  } 
}


if (!function_exists('getTotalWins')) {   
  function getTotalWins($userid) {  
    $wins = EventWinners::where('user_id', $userid)->count();
    return $wins;
  } 
}

if (!function_exists('checkMaxSlotsTaken')) {   
  function checkMaxSlotsTaken($choice, $win_order, $event_id) { 
    // $choice = '2, 5, 8';
    // $win_order = '0';
    // $event_id = '20';
    $slotstaken=0;

    $initial_pot = getEventdetails($event_id, 'initial_pot');
    $maxslots = $initial_pot * .10;
    if($win_order == 1){
      $slotstaken = Bets::where('event_id', $event_id)->where('bet_choice', $choice)->count();
    } else {
      $getmatching = Bets::where('event_id', $event_id)->get();
      foreach($getmatching AS $gm){
        $choices = explode(", ", $choice);
        $bets = explode(", ",$gm->bet_choice);

        $get_diff = array_diff($bets, $choices);
            $count_diff = count($get_diff);
            if($count_diff==0){
              $slotstaken++;
            }
      }
    }

    if($slotstaken== $maxslots){
      $message = "error";
    } else{
      $message = "okay";
    }

    return $message;
  } 
}

if (!function_exists('getTotalBettors')) {   
  function getTotalBettors($eventid) {  
    $bettors = Bets::where('event_id', $eventid)->count();
    return $bettors;
  } 
}

if (!function_exists('checkWinners')) {   
  function checkWinners($betid) {
     $wins = EventWinners::where("bet_id",$betid)
                      ->count();
     return $wins;
   
  }
}

function ordinal($number) {
  $ends = array('th','st','nd','rd','th','th','th','th','th','th');
  if ((($number % 100) >= 11) && (($number%100) <= 13))
      return $number. 'th';
  else
      return $number. $ends[$number % 10];
}

if (!function_exists('checkExistingQuestionBank')) {  
  function checkExistingQuestionBank($question) {
    $q = QuestionBank::where("question",$question)
                      ->count();
     return $q;
  }
}

if (!function_exists('getLiaison')) {
  function getLiaison($kingid) {
     $getuser = User::where("king_id",$kingid)->where("usertype","Liaison")->get();
     $output =$getuser[0]['id'];
     return $output;
   
  }
}

if (!function_exists('getOperator')) {
  function getOperator() {
     $getuser = User::where("usertype","Operator")->get();
     $output =$getuser[0]['id'];
     return $output;
   
  }
}

?>