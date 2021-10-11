<?php

namespace App\Http\Controllers;

//use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function form()
    {
        return view('login');
    }

    public function login()
    {
        $id = $_POST['id'];
        $pwd = $_POST['pwd'];
        $user = User::where('password', $pwd)->where('email', $id)->first();
        if ($user != null) {
            $bytes = random_bytes(15);
            $user->session = bin2hex($bytes);
            $user->save();
            $_SESSION['sessionid'] = $user->session;
            return redirect('/sensors');
        } else {
            return redirect('/');
        }
    }
}
