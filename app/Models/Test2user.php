<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test2user extends Model
{
    use HasFactory;

    public function reservation()
    {
        return $this->belongsTo('App\Models\Reservation','reservation_id','id');
    }

    public function allowed()
    {
        return $this->belongsTo('App\Models\Allowed','allowed_id','id');
    }
    public function passed()
    {
        return $this->belongsTo('App\Models\Passed','passed_id','id');
    }

    public function test()
    {
        return $this->belongsTo('App\Models\Test','test_id','id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}
