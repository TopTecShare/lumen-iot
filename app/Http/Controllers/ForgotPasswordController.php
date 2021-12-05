<?php

namespace App\Http\Controllers;

//use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    //

    public function form()
    {
        return view('forgot');
    }

    public function reset()
    {
        $password = '';
        $user = User::where('email', $_POST['email'])->first();
        
        if($user) $password = $user->password;
        // else return view('forgot');

        $data = array('name'=>$_POST['name'], 'password'=>$password);
        try {
            Mail::send('mail', $data, function($message) {
                $message->to($_POST['email'], $_POST['name'])->subject('Your previous password here!');
            });
        } catch (\Throwable $e) { // For PHP 7
            
        } 
        return redirect('/reset-password');
    }
}
