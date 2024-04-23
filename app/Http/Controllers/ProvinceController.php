<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Test;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProvinceController extends Controller
{
    public function index_selected($id){
        if(!Auth::check()) return redirect()->route('_login');
        $province = Province::find($id);
        $tests = Test::where('test_date', '>=', Carbon::today())
            ->where('province_id', $id)
            ->orderBy('test_date')
            ->get();
        return view('prefecture', [
            'province' => $province,
            'tests' => $tests
        ]);
    }

    public function all_area_selected(){
        $tests = Test::where('test_date', '>=', Carbon::today())
            ->orderBy('test_date')
            ->paginate(4);
        $province_name = '';
        return view('area', [
            'tests' => $tests,
            'province_name' => $province_name
        ]);
    }
        
    public function prefecture_search(Request $request){
        $province_name = $request->province_name;
        $province_num = [];
        if(!$province_name == ''){
            $tests = Test::where('test_date', '>=', Carbon::today())->get();
            foreach($tests as $test){
                if( strpos($test->get_province_name(), $province_name) !== false ){
                    array_push($province_num, $test->province_id);
                }
                else {$province_id = -1;}
                
            }
            $testsre = Test::where('test_date', '>=', Carbon::today())
            ->whereIn('province_id', $province_num)
            ->paginate(4);
            return view('area_search', [
                'tests' => $testsre,
                'province_name'=>$province_name
            ]);
        }
        return redirect()->route('search.area');
    }
}