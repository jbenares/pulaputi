<?php

if (!function_exists('timeRemaining')) {
  function timeRemaining($dateto) {
    $now = new DateTime();
    $future_date = new DateTime($dateto);
    
    $interval = $future_date->diff($now);
    
    return $interval->format("%a days, %h hours, %i minutes");
   
  }
}

?>