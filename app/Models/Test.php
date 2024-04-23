<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Test2user;
use App\Models\Test2problem;
use Carbon\Carbon;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'test_data',
        'begin_time',
        'end_time',
        'ganre_id',
        'level_id',
        'province_id',
        'price',
    ];

    public function level()
    {
        return $this->belongsTo('App\Models\Level','level_id','id');
    }
    public function ganre()
    {
        return $this->belongsTo('App\Models\Ganre','ganre_id','id');
    }
    public function reservation()
    {   
        return $this->hasMany('App\Models\Reservation');
    }
    public function province()
    {   
        return $this->belongsTo('App\Models\Province', 'province_id','id');
    }




    public function get_level_name()
    {
        return $this->level->level_name;
    }
    public function get_test_date(){
        $date = Carbon::parse($this->test_date);
        return $date->format('Y年m月d日');
    }

    public function get_begin_time(){
        $begin_time = Carbon::parse($this->begin_time);
        return $begin_time->format('H時i分');
    }

    public function get_end_time(){
        $end_time = Carbon::parse($this->end_time);
        return $end_time->format('H時i分');
    }

    public function get_ganre_name(){   
        return $this->ganre->ganre_name;
    }
    public function get_province_name(){
        return $this->province->name;
    }

    public function get_allowed_state(){
        $test_id= $this->id;

        $test2user = Test2user::where([
            'user_id'=>Auth::user()->id,
            'test_id'=>$test_id
        ])->first();
        $reserved = 0;
        if(!is_null($test2user)){
            $reserved = ($test2user->reservation_id)?1:0;
        }        
        return $reserved;
    }
    public function get_problem_count(){
        $test_id = $this->id;
        $test2problems = Test2problem::where('test_id' ,$test_id)->get();
        return sizeof($test2problems);
    }

    public function check_datetime(){
        $endTime = Carbon::create($this->test_date." ".$this->end_time); 
        $currentTIme = Carbon::now(); 
        if ($endTime->isPast()) {
            return 0;
        } else {
            return 1;
        }
    }
}
