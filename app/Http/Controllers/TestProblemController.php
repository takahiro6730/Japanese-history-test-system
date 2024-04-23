<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Test2user;
use App\Models\Reservation;
use App\Models\Allowed;
use App\Models\Province;
use App\Models\Level;
use App\Models\Ganre;
use App\Models\Test;
use App\Models\Problem;
use App\Models\Test2problem;
use App\Models\FreeTest2problem;
use App\Mail\EndMail;
use Mail;
use App\Models\Passed;

class TestProblemController extends Controller
{
    //
    public function add_problem_test(Request $request){
        if(!Auth::check()) return redirect()->route('_login');

        $test_id = $request->sel_test_id;
        Test2problem::where('test_id',$test_id)->delete();
        $problem_ids_text = $request->problem_ids;
        $problem_ids = explode("#", substr($problem_ids_text,1));
        if($problem_ids){
            foreach($problem_ids as $problem_id){
                $test2problem = new Test2problem();
                $test2problem->test_id = $test_id;
                $test2problem->problem_id = $problem_id;
                $test2problem->save();
            }
        }


        return redirect()->route('admin.dashboard');
    }

    public function calc_test(Request $request){
        if($request){
        
        $test_id = $request->test_id;
        $total_problem_count = $request->problem_count;
        $mark_total = [];
        for($i=1; $i<=$total_problem_count; $i++){
            $cur_mark = 0;
            $problem = Problem::find($request->get('problem_id_'.$i));
            $sty=$problem->pstyle;
            if($sty == 1){
                if($problem->correct_answer == $request->get("result_answer_".$i)) $cur_mark = 10;
                else $cur_mark = 0;
                array_push($mark_total, $cur_mark);
            }
            elseif($sty == 2){
                $problem_pre_answers = explode("#", $problem->pre_answer); 
                $problem_cor_answers = explode("#", $problem->correct_answer);
                $problem_res_answers = explode("#", substr($request->get("result_answer_".$i),1));
                $mark_count = 0;
                foreach($problem_res_answers as $problem_res_answer){              
                    if(in_array($problem_res_answer, $problem_cor_answers)) $mark_count++;
                    else $mark_count--;
                }
                $cur_mark = 10 * (sizeof($problem_pre_answers) - (sizeof($problem_cor_answers) - $mark_count))/sizeof($problem_pre_answers);
                array_push($mark_total, $cur_mark);
            }
            elseif($sty == 3){
                $problem_cor_answers = explode("#", $problem->correct_answer);
                $problem_res_answer = $request->get("result_answer_".$i);
                if(in_array($problem_res_answer, $problem_cor_answers)) $cur_mark = 10;
                else $cur_mark = 0;
                array_push($mark_total, $cur_mark);
            }
            else{
                
            }    
        }
        $total_score = array_sum($mark_total);
        $avg_score = round($total_score/$total_problem_count, 2);
        $pass_state = ($avg_score > 8)? "合格" : "不合格";
        if(Auth::check()) {
            $passed = new Passed();
            $passed->state = $pass_state;
            $passed->score = $avg_score;
            $passed->save();
            
            $this->end_mail_send($test_id, $avg_score, $pass_state);
            
            return view('test_end');
        }
        if(!Auth::check()){
            return view('test_end', ['avg_score'=>$avg_score, 'pass_state'=>$pass_state, 'indivi_scores'=>$mark_total]);
        }}
        else{
            return view('method');
        }
        
    }

    public function end_mail_send($test_id, $score, $pass_state){
        if(!Auth::check()) return redirect()->route('_login');

        $test = Test::find($test_id);
        $test_name = $test->name;
        $user_name = Auth::user()->name;

        
        $period = $test->get_test_date().
        '：'.$test->get_begin_time().
        '～'.$test->get_end_time();

        $mailData = [
            'test_name'=> $test_name,
            'pass_state' => $pass_state,
            'test_period'=> $period,
            'score' => $score,
            'user_name'=>$user_name
        ];
        Mail::to(Auth::user()->email)->send(new EndMail($mailData));
        return;
    }
    public function test_select(){
        if(!Auth::check()) return redirect()->route('_login');

        $tests = Test::all();
        return view('admin.test_select', ['tests'=>$tests]);
    }

}
