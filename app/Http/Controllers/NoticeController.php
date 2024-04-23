<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;
use App\Models\Test;
use Carbon\Carbon;

class NoticeController extends Controller
{
    //
    public function notice(){
        $currentTime = new Carbon();
        $currentTime->setTimezone('Asia/Tokyo'); 
        
        $notices = Notice::where('notice_date', '<=', $currentTime)
                        ->orderByDesc('notice_date')
                        ->paginate(6);
        return view('notice', ['notices'=>$notices]);
    } 

    public function notice_select($id){
        $notice = Notice::find($id);
    return view('info', [
        'notice' => $notice
    ]);
    }
}
