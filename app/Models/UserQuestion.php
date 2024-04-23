<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'user_mail',
        'user_phone',
        'user_contitle',
        'user_context',
        'reply',
    ];
}
