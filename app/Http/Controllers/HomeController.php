<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Ganre;
use App\Models\Notice;
use App\Models\FreeTest2problem;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $provinces = Province::take(4)->get();
        $free_tests = FreeTest2problem::all()->groupBy('test_id');
        $first_tests = [];
        foreach($free_tests as $free_test){
            $first_test_item = [];
            $first_test_item['ganre'] = 'お試し';
            $first_test_item['count'] =sizeof(FreeTest2problem::where('test_id', $free_test[0]->test_id)->get()); 
            
            $first_test_item['free_id'] = $free_test[0]->test_id;
                        
            if($free_test[0]->test_id == 1){$first_test_item['province'] = '東京';}
            else if($free_test[0]->test_id == 2){$first_test_item['province'] = '長野';}
            else if($free_test[0]->test_id == 3){$first_test_item['province'] = '名古屋';}
            else if($free_test[0]->test_id == 4){$first_test_item['province'] = '沖縄';}
            else if($free_test[0]->test_id == 5){$first_test_item['province'] = '神奈川';}            
            else $first_test_item['province'] = '大阪';

            array_push($first_tests, $first_test_item);
        }

        $ganres = Ganre::get();

        $currentTime = new Carbon();
        $currentTime->setTimezone('Asia/Tokyo'); 
        
        $notices = Notice::where('notice_date', '<=', $currentTime)
                        ->orderByDesc('notice_date')
                        ->get();
        return view('welcome', ['provinces'=>$provinces, 'ganres'=>$ganres, 'notices'=>$notices, 'first_tests'=>$first_tests    ] );
    }
}
