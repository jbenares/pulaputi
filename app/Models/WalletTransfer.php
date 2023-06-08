<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletTransfer extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_date',
        'user_id',
        'ref_code',
        'transfer_to',
        'transfer_amount',
        'remarks',
        'payment_reference',
    ];
    protected $table = 'wallet_transfers';
}
