<?php

namespace App\Http\Controllers;

use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Reminder;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    public function showsendemail(){

        return view('email.sendemail');

    }

    public function sendemail(Request $request){
          $inputs=request()->validate([
              'email2'=>['required','email','max:255' ],
          ]);
        $credentials = [
            'login' => $inputs['email2'],
        ];

        $user = Sentinel::findByCredentials($credentials);

        $reminder = Reminder::create($user);

        $data=[
            'user' => $user,
            'code'=>$reminder['code'],
            'email' => $inputs['email2'],
        ];

        Mail::send('email.passwordreset', $data, function ($message) use ($data) {
            $message->from('dusantrivic44@hotmail.com', 'Dusan Trivic');
            $message->sender('dusantrivic44@hotmail.com', 'Dusan Trivic');
            $message->to($data['email'], 'Dusant')->subject('Password Reset');;

        });
        return view('auth.signin');

    }
    public function resetPasswordForm(User $user, $code){
       return view('auth.passwordreset',['user'=>$user,'code'=>$code]);
    }
    public function resetPassword(User $user,$code){
        $inputs=request()->validate([
            'password'=>['confirmed','required','max:255'],
        ]);
        $user = Sentinel::findById($user->id);

if ($reminder = Reminder::complete($user, $code, $inputs['password']))
{
    session()->flash('password_changed','You changed password successifully.');
    return view('auth.signin');

}
else
{
    session()->flash('password_changed_not','Changin password not completed. ');

    return view('auth.signin');


}



    }
}
