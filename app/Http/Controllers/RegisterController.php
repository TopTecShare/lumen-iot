<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register($sensorID)
    {
        $sensor = new Sensor;
        $sensor->sensor_number = $sensorID;
        $sensor->uuid = Sensor::guidv4();
        $sensor->nickname = "";
        $sensor->save();
        return(new Response($sensor->uuid,200));
    }
}
