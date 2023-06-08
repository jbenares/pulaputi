<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginLogs extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'login_count',
        'last_login'
    ];
    protected $table = 'login_logs';
}
