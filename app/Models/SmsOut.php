<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsOut extends Model
{
    use HasFactory;
    protected $fillable = [
        'sms_to',
        'sms_text',
        'sms_from',
        'sms_timestamp',
        'sms_sent_flag'
    ];
    protected $table = 'sms_out';
}
