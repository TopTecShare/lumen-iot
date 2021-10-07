<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register($sensorID)
    {
        $sensor = new Sensor;
        $sensor->sensor_number = $sensorID;
        $sensor->uuid = Sensor::guidv4();
        $sensor->save();
        return $sensor;
    }
}
