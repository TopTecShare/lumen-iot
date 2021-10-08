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
        $input = $request->only('json');
        $sensor = Sensor::where('uuid', $uuid)->first();
        if ($sensor == null) {
            return (new Response('', 404));
        }
        $json = Arr::get($input, 'json', null);


        $response = $sensor->uuid . "\n" . print_r($json, true);

        $raw = new RawData();
        $raw->sensor_id = $sensor->id;
        return (new Response($response, 200));
    }
    public function index()
    {
        $sensors = Sensor::all();
        return view('sensors',['sensors' => $sensors]);
    }
}
