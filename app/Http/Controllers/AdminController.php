<?php

namespace App\Http\Controllers;

//use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function index(Request $request)
    {
        $users = USER::all();
        return view('admin', ['users' => $users]);
    }

    public function create(Request $request)
    {
        if(!($_POST['role'] == 'user' || $_POST['role'] == 'admin')) return redirect('/admin');
        $user = User::where('email', $_POST['email'])->first();
        if($user != null) return redirect('/admin');
        $user = new User();
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->role = $_POST['role'];
        $user->password = $_POST['password'];
        $user->save();
        return redirect('/admin');
    }

    public function update(Request $request)
    {
        if(!($_POST['role'] == 'user' || $_POST['role'] == 'admin')) return redirect('/admin');
        $user = User::where('email', $_POST['email'])->first();
        if($user == null) return redirect('/admin');
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->role = $_POST['role'];
        $user->password = $_POST['password'];
        $user->save();
        return redirect('/admin');    
    }

    public function delete(Request $request)
    {
        $user = User::where('email', $_POST['email'])->first();
        $user->delete();
        return redirect('/admin');
    }
}
