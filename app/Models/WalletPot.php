<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletPot extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_date',
        'bet_id',
        'event_id',
        'transaction_type',
        'debit',
        'credit',
        'transaction_reference'
    ];
    protected $table = 'wallet_pot';
}
