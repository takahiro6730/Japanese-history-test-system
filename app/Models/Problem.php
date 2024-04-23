<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Test2problem;

class Problem extends Model
{
    use HasFactory;

    protected $fillable = [
        'pstyle',
        'answer_text',
        'pre_answer',
        'correct_answer',
        'ganre_num',
        'province_num',
        'level_num',
    ];

    public function level()
    {
        return $this->belongsTo('App\Models\Level','level_num','id');
    }
    public function ganre()
    {
        return $this->belongsTo('App\Models\Ganre','ganre_num','id');
    }
    public function province()
    {   
        return $this->belongsTo('App\Models\Province', 'province_num','id');
    }
    public function test2problem()
    {   
        return $this->hasMany('App\Models\Test2problem');
    }
    public function selected_flag($test_id){
        $tp_test2problem = Test2problem::where([
            'test_id'=>$test_id,
            'problem_id'=>$this->id
        ])->first();
        return (is_null($tp_test2problem)) ? "display:block;" : "display:none;";
    }
    public function selected_flag_num($test_id){
        $tp_test2problem = Test2problem::where([
            'test_id'=>$test_id,
            'problem_id'=>$this->id
        ])->first();
        return (is_null($tp_test2problem)) ? 0 : 1;
    }
    public function selected_free_num($test_id){
        $tp_test2problem = FreeTest2problem::where([
            'test_id'=>$test_id,
            'problem_id'=>$this->id
        ])->first();
        return (is_null($tp_test2problem)) ? 0 : 1;
    }
}
