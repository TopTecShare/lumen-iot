<?php

namespace App\Http\Controllers;

use App\Models\RawData;
use App\Models\Sensor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\View\View;
//use Illuminate\Support\Facades\View;

class SensorController extends Controller
{
    public function show(Request $request, $uuid)
    {
        $sensor = Sensor::where('uuid', $uuid)->first();
        if ($sensor == null) {
            return (new Response('', 404));
        }
        $timezone = new \DateTimeZone('Europe/Warsaw');

        return view('sensor',['sensor' => $sensor, 'tz' => $timezone]);
    }
    public function index()
    {
        $sensors = Sensor::all();
        return view('sensors',['sensors' => $sensors]);
    }
}
