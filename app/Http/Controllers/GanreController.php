<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ganre;
use App\Models\Province;
use App\Models\Test;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class GanreController extends Controller
{
    //
    public function ganre_selected($id){
        if(!Auth::check()) return redirect()->route('_login');
        
        $ganre = Ganre::find($id);
        $tests = Test::where('test_date', '>=', Carbon::now())
            ->where('ganre_id', $id)
            ->orderBy('test_date')
            ->paginate(4);
        return view('ganre', [
            'tests' => $tests
        ]);
    }

    public function ganre_search(Request $request){
        $ganre_name = $request->province_name;
        $ganre_num = [];
        if(!$ganre_name == ''){
            $tests = Test::where('test_date', '>=', Carbon::today())->get();
            foreach($tests as $test){
                if( strpos($test->get_ganre_name(), $ganre_name) !== false ){
                    array_push($ganre_num, $test->ganre_id);
                }
                else {$province_id = -1;}
                
            }
            $testsre = Test::where('test_date', '>=', Carbon::today())
            ->whereIn('ganre_id', $ganre_num)
            ->paginate(4);
            return view('ganre_search', [
                'tests' => $testsre,
                'province_name'=>$ganre_name
            ]);
        }
        return redirect()->route('search.ganre');
    }

    public function all_ganre_selected(){
        $tests = Test::where('test_date', '>=', Carbon::today())
            ->orderBy('test_date')
            ->paginate(4);
        $province_name = '';
        return view('ganre', [
            'tests' => $tests,
            'province_name' => $province_name
        ]);
    }
}
