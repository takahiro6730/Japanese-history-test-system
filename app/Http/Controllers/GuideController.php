<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test2user;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class GuideController extends Controller
{
    //
    public function notice(){
        return view('notice');
    }

    public function about_site(){
        return view('about_site');
    }
    public function area(){
        return view('area');
    }
    public function my_page(){

        if(!Auth::check()) return redirect()->route('_login');
            $test2users = Test2user::where('user_id', Auth::user()->id)
            ->join('tests', 'tests.id', '=', 'test2users.test_id')
            ->orderBy('tests.test_date')
            ->get();
                    

        $allowed_tests = [];
        foreach($test2users as $test2user){

            if($test2user->allowed_id !== 0 && $test2user->mail_sended === 1){
                array_push($allowed_tests, $test2user);
            }
        }

        return view('my_page', ['allowed_tests'=>$allowed_tests]);
    }
    public function method(){
        return view('method');
    }
    public function question(){
        if(!Auth::check()) return redirect()->route('_login');
        
        return view('question');
    }
    public function privacy(){
        return view('privacy_policy');
    }
    public function site_policy(){
        return view('site_policy');
    }
}
