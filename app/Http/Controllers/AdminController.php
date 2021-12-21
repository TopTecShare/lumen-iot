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
        return view('admin', ['users' => $users, 'admin'=>$request->role == 'admin']);
    }

    public function create(Request $request)
    {
        if(!($_POST['role'] == 'user' || $_POST['role'] == 'admin')) 
        return view('admin', ['users' => USER::all(), 'admin'=>$request->role == 'admin', "error" => "User role is incorrect! Should be admin or user."]);
        $user = User::where('email', $_POST['email'])->first();
        if($user != null) return view('admin', ['users' => USER::all(), 'admin'=>$request->role == 'admin', "error" => "Email address already exists!"]);
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
        if(!($_POST['role'] == 'user' || $_POST['role'] == 'admin')) 
        return view('admin', ['users' => USER::all(), 'admin'=>$request->role == 'admin', "error" => "User role is incorrect! Should be admin or user."]);
        $user1 = User::where('email', $_POST['email'])->first();
        $user = User::where('id', $_POST['id'])->first();
        if($user1 != null && $user->email != $user1->email) 
        return view('admin', ['users' => USER::all(), 'admin'=>$request->role == 'admin', "error" => "Email address already exists!"]);
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
