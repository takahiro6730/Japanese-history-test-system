<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_id',
        'user_id',
        'status',
    ];
    public function test2user()
    {   
        return $this->hasMany('App\Models\Test2user');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function test()
    {
         return $this->belongsTo('App\Models\Test','test_id','id');
    } 

    public function get_reserved_ago_time(){
        $start_datetime =  Carbon::parse($this->updated_at);
        $end_datetime = now();
        $minutes = $end_datetime->diffInMinutes($start_datetime);
        $out_string = "";
        if($minutes < 60){
            $out_string = $minutes.'分前';
        }
        else if($minutes/60 < 24){
            $out_string = floor($minutes/60).'時間前';
        }
        else{
            $out_string = floor($minutes/60/24).'日前';
        }

        return $out_string;
    }

    public function get_reserve_state(){
        $result = '';
        if($this->test2user()->first()->allowed_id == -1){$result = 'キャンセル';}
        else
        $result = ($this->test2user()->first()->allowed_id == 0) ? '未許可' : '許可';
        return $result;
    }
    

    public function get_mail_state(){
        $result = '';
        $result = ($this->test2user()->first()->mail_sended == 0) ? '送信しない' : '送信済み';
        return $result;
    }
}
