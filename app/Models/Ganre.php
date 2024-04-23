<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ganre extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'ganre_id',
        'ganre_name',
    ];

    public function tests()
    {   
        return $this->hasMany('App\Models\Test');
    }
    public function problems()
    {   
        return $this->hasMany('App\Models\Problem');
    }
}
