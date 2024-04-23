<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allowed extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_pass_id',
        'test_pass_pwd',
    ];

    public function test2user()
    {   
        return $this->hasMany('App\Models\Test2user');
    }
}
