<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test2user;
use App\Models\Test;
use App\Models\Test2problem;
use App\Models\UserQuestion;
use Illuminate\Support\Facades\Auth;

use App\Mail\QAMail;

use Mail;



class MypageController extends Controller
{
    //
    public function test_login_form($id){
        if(!Auth::check()) return redirect()->route('_login');
        
        return view('test_site_login',['id'=>$id]);
    }

    public function test_login(Request $request){
        if(!Auth::check()) return redirect()->route('_login');
        
        $test2user = Test2user::find($request->allowed_test_id);
        $origin_id = $test2user->allowed->test_pass_id;
        $origin_pwd = $test2user->allowed->test_pass_pwd;
        if($origin_id === $request->test_pass_id && $origin_pwd === $request->test_pass_pwd){
            return $this->go_test_site($request->allowed_test_id);
        }
        else {
            return view('test_site_login',['id'=>$request->allowed_test_id]);
        }
    }

    public function go_test_site($tp_id){
        if(!Auth::check()) return redirect()->route('_login');
        
        $test2user = Test2user::find($tp_id);
        $province = $test2user->test->province;
        $test = $test2user->test;
        return view('test_site', ['province'=>$province, 'test'=>$test]);
    }

    public function test_enter(Request $request){
        if(!Auth::check()) return redirect()->route('_login');
        
        $user_id = Auth::user()->id;
        $test_id = $request->test_id;
        $test = Test::find($test_id);
        $problem_ids = Test2problem::where('test_id', $test_id)->get();
        return view('test_process',[
            'user_id'=>$user_id,
            'test'=>$test,
            'problem_ids'=>$problem_ids
        ]);
    }


    public function question_admin(Request $request){
        if(!Auth::check()) return redirect()->route('_login');

        if(Auth::user()->name != $request->question_name || Auth::user()->email != $request->question_mail_address)

            return redirect()->route('guide.question')->with('waringmessage', '名前またはメールアドレスが正しくありません。');
        $mailData = [
            'user_name'=> $request->question_name,
            'user_mail' => $request->question_mail_address,
            'user_phone' => $request->question_phone,
            'user_contitle' => $request->question_contitle,
            'user_context' => $request->question_context,
            'reply' => '',
        ];
        $question_list = new UserQuestion($mailData);
        $question_list->save();
        Mail::to(config('app.email'))->send(new QAMail($mailData));
        return redirect()->route('welcome_page')->with('message', 'お問い合わせを送信しました。');
    }
}
