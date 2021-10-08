<?php

namespace App\Http\Controllers;

use App\Models\RawData;
use App\Models\Sensor;
//use App\Support\RouteParam;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class StoreController extends Controller
{
    public function store(Request $request, $uuid)
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
}
