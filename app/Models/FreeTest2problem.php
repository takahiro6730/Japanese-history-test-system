<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreeTest2problem extends Model
{
    use HasFactory;

    public function free_test_id($id){
        if($id == 1)$free_ganre_name = 'グルメ';
        else if($id == 2)$free_ganre_name = '歴史';
        else if($id == 3)$free_ganre_name = '観光';
        else if($id == 4)$free_ganre_name = '市町村';
        else if($id == 5)$free_ganre_name = '産業';
        else $free_ganre_name = '';
        return  $free_ganre_name;
    }
    public function problem(){  
        return $this->belongsTo('App\Models\Problem', 'problem_id','id');
    }
}
