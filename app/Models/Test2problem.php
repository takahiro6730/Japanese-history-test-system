<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test2problem extends Model
{
    use HasFactory;

    public function problem(){  
        return $this->belongsTo('App\Models\Problem', 'problem_id','id');
    }
}
