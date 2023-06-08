<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventNoWins extends Model
{
    use HasFactory;
    protected $fillable = [
        'king_id',
        'event_id',
        'amount',
        'transferred_amount',
        'balance',
        'transferred_to',
        'transfer_date',
    ];
    protected $table = 'event_no_wins';
}
