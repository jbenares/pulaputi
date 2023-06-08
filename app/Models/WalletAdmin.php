<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletAdmin extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_date',
        'admin_id',
        'transfer_id',
        'cashin_method',
        'source',
        'transaction_type',
        'debit',
        'credit',
        'transaction_reference',
        'remarks',
    ];
    protected $table = 'wallet_admin';
}
