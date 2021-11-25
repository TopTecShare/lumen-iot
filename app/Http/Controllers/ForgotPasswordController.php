<?php

namespace App\Http\Controllers;

//use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;
// Base files 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

class ForgotPasswordController extends Controller
{
    //
    public function form()
    {
        return view('forgot');
    }

    public function reset()
    {
        $id = $_POST['id'];

        return view('forgot');
    }
}
