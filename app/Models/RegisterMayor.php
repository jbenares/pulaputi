<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterMayor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'usertype',
        'username',
        'location',
        'user_image',
        'mobile',
        'gcash',
        'maya',
        'coridor_id',
        'mayor_id',
        'king_id',
        'ref_code',
        'curr_wallet',
        'banned',
        'date_banned'
    ];
        protected $table = 'users';

}
