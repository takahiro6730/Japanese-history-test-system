<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FreeTest2problem;
use App\Models\Problem;



class FreeTestController extends Controller
{
    //

    public function free_test($id){
        if(!Auth::check()) return redirect()->route('_login');
        $problems = Problem::all();
        $test = FreeTest2problem::find($id);
        if(!$test){
            $test = new FreeTest2problem();
            $test->test_id = $id;
        }

        return view('admin.free_test', ['test'=>$test, 'problems'=>$problems]);
    }

    public function free_test_problem(Request $request){
        // if(!Auth::check()) return redirect()->route('_login');
        $test_id = $request->sel_test_id;
        FreeTest2problem::where('test_id',$test_id)->delete();
        $problem_ids_text = $request->problem_ids;
        $problem_ids = explode("#", substr($problem_ids_text,1));
        if($problem_ids){
            foreach($problem_ids as $problem_id){
                $test2problem = new FreeTest2problem();
                $test2problem->test_id = $test_id;
                $test2problem->problem_id = $problem_id;
                $test2problem->save();
            }
        }
        // dd($test2problem);
        return redirect()->route('admin.dashboard');
    }


    public function free_test_enter($id){
        $free_test = FreeTest2problem::where('test_id', $id)->get();
        $test = $free_test;
        return view('test_process', ['problem_ids'=>$test, 'test_id'=>$id]);
    }

}
