<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletKing extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_date',
        'king_id',
        'bet_id',
        'event_id',
        'transfer_id',
        'transaction_type',
        'debit',
        'credit',
        'transaction_reference'
    ];
    protected $table = 'wallet_king';
}
