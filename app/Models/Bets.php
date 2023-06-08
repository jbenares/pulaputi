<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bets extends Model
{
    use HasFactory;
    protected $fillable = [
        'bet_date',
        'event_id',
        'user_id',
        'slot_price',
        'bet_amount',
        'bet_slots',
        'bet_total',
        'bet_location',
        'bet_choice',
        'win_order'
    ];
    protected $table = 'bets';
}
