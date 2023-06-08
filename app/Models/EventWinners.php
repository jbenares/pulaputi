<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventWinners extends Model
{
    use HasFactory;
    protected $fillable = [
        'win_date',
        'user_id',
        'event_id',
        'bet_id',
        'winning_array',
        'winning_amount',
    ];
        protected $table = 'event_winners';
}
