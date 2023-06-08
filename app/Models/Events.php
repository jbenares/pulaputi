<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    protected $fillable = [
        'king_id',
        'event_name',
        'date_start',
        'date_end',
        'event_description',
        'event_image',
        'initial_pot',
        'slot_price',
        'game_category_id',
        'choice_array',
        'win_order',
        'option_type',
        'no_of_outcomes',
        'win_array',
        'running_balance',
        'win_flag',
        'closed'
    ];
        protected $table = 'events';
}
