<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Notice extends Model
{
    use HasFactory;
    public function get_notice_date(){
        $date = Carbon::parse($this->notice_date);
        return $date->format('Y年m月d日');
    }
}
