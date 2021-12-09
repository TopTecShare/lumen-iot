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

    public function auth(Request $request)
    {
        return new Response($request->token, 200);
    }

    public function login()
    {
        $id = $_POST['id'];
        $pwd = $_POST['pwd'];
        $user = User::where('password', $pwd)->where('email', $id)->first();
        if ($user != null) {
            $user->api_token = app('hash')->make($user->id . $id . $pwd);
            $user->session = $user->api_token;
            $user->save();
            $_SESSION['sessionid'] = $user->session;
            return redirect('/sensors');
        } else {
            return redirect('/forgot-password');
        }
    }
}
