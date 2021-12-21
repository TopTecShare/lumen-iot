<?php

namespace App\Http\Controllers;

//use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class ForgotPasswordController extends Controller
{
    //

    public function form()
    {
        return view('forgot');
    }

    public function reset()
    {
        $user = User::where('email', $_POST['email'])->first();

        if(!$user) return redirect('/reset-password');
        $user->api_token = hash($user->password);
        $user->save();
        $arr = explode('/', URL::current());
        array_pop($arr);
        array_push($arr, 'reset-password?api_token=' . $user->api_token);
        $data = array('name'=>$_POST['name'], 'token'=>implode('/', $arr));
        try {
            Mail::send('mail', $data, function($message) {
                $message->to($_POST['email'], $_POST['name'])->subject('You can reset password now!');
            });
        } catch (\Throwable $e) { // For PHP 7
            
        } 
        return redirect('/reset-password');
    }
}
