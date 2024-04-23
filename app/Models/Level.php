<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    public function tests()
    {   
        return $this->hasMany('App\Models\Test');
    }
    public function problems()
    {   
        return $this->hasMany('App\Models\Problem');
    }
}
