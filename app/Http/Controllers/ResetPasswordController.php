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
    public function form()
    {
        return view('reset');
    }

    public function reset()
    {
      $id = $_POST['email'];
      $pwd = $_POST['old'];
      $user = User::where('password', $pwd)->where('email', $id)->first();
      if ($user != null) {
          $user->password = $_POST['password'];
          $user->save();
          return redirect('/sensors');
      } else {
          return redirect('/reset-password');
      }
    }
}
