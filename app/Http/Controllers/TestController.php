<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\Test2user;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class TestController extends Controller
{
    public function apply_test($id){
        if(!Auth::check()) return redirect()->route('_login');
        $test = Test::find($id);
        return view('application', ['test'=>$test]);
    }
}
