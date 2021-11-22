<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoraController extends Controller
{
    public function lora($id)
    {
//        file_put_contents("post.log", $id);
        $postdata = file_get_contents('php://input');
        file_put_contents('post.log', $postdata . PHP_EOL, FILE_APPEND);
    }
    //
}
