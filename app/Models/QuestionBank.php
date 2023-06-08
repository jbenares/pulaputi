<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionBank extends Model
{
    use HasFactory;
    protected $fillable = [
        'game_category_id',
        'question',
    ];
    protected $table = 'question_bank';
}
