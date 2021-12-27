<?php

namespace App\Http\Controllers;

//use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ResetPasswordController extends Controller
{
    //
    public function form(Request $request)
    {
        $user = null;
        if($request->input("api_token")) $user = User::where('api_token', $request["api_token"])->first();
        return view('reset', ['user' => $user]);
    }

    public function reset()
    {
      $id = $_POST['email'];
      $pwd = $_POST['old'];
      $user = User::where('password', $_POST['old'])->where('email', $id)->first();
      if ($user != null) {
          $user->password = $_POST['password'];
          $user->api_token = hash('sha256', $user->id . $id . $_POST['password']);
          $user->save();
          return redirect('/sensors');
      } else {
          return redirect('/reset-password');
      }
    }
}
