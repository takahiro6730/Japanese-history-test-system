<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Support\Facades\Crypt;
use Mail;
use App\Mail\VerifyMail;
use App\Models\User;

class VerificationController extends Controller
{
    public function verifyMailSend(Request $requset){
        $encrypt_address = Crypt::encryptString($requset->email);
        $notifiable = route('getVerifyMail',['hash'=>$encrypt_address]);
        $this->toMail($notifiable, $requset->email);
        return redirect()->route('mailSended');
    }
    public function _verifyMailSend(){
        return view('auth.verify');
    }
    public function toMail($notifiable, $email)
    {
        $actionUrl = $notifiable;     
        $actionText  = '登録画面へ';
        $mailData = [
            'user'=> $email,
            'actionText' => $actionText,
            'actionUrl' => $actionUrl,
        ];
        Mail::to($email)->send(new VerifyMail($mailData));
        return ;
    }
    public function mailSended(){
        return view('auth.mailSended');
    }

    public function getVerifyMail($hash){
        $current_email = Crypt::decryptString($hash);
        $user = User::where('email', $current_email)->first();
        if(isset($user)){
            return redirect()->route('welcome_page')->with('message', 'メールアドレスが既に存在します。');
        }
        else{
            return view('auth.register', ['email'=>$current_email]);
        };
    }

}
