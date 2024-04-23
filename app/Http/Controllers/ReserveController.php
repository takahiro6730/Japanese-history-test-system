<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use App\Models\Test2user;

class ReserveController extends Controller
{
    //
    public function add($id){
        if(!Auth::check()) return redirect()->route('_login');
        $reservation_model = new Reservation;
        $reservation_model->test_id = $id;
        $reservation_model->user_id = Auth::user()->id;
        $reservation_model->status = 0;
        $reservation_model->save();

        
        $test2user = new Test2user();        
        $test2user_tp = Test2user::where([
            'user_id'=>Auth::user()->id,
            'test_id'=>$id
        ])->first();
        if(!is_null($test2user_tp)) $test2user=$test2user_tp;
        $test2user->user_id = Auth::user()->id;
        $test2user->test_id = $id;
        $test2user->reservation_id = $reservation_model->id;
        $test2user->save();

        return redirect()->route('home')->with('message', '申請が完了しました');
    }
}
