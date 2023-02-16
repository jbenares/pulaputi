<?php
use App\Models\GameCategory;
use App\Models\Events;
use App\Models\User;

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
      $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
      return substr(str_shuffle($str_result),0, $length_of_string);
  }
}

if (!function_exists('getUpline')) {
  function getUpline($upline, $user_id)
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
      $uplinename =$getname[0]['name'];
      return $uplinename;
  }
}
?>