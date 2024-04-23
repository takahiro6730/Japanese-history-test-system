<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Province;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'img_url',
    ];

    public function tests()
    {   
        return $this->hasMany('App\Models\Test');
    }
    public function problems()
    {   
        return $this->hasMany('App\Models\Problem');
    }

    public function province_first_test(){
        return $this->tests()->where('test_date', '>=', Carbon::now())->first();
    }
}
