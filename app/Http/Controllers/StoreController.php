<?php

namespace App\Http\Controllers;

use App\Models\RawData;
use App\Models\Sensor;

//use App\Support\RouteParam;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Log;

class StoreController extends Controller
{
    private function isJson($string)
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }

    public function store(Request $request, $uuid)
    {
//        $input = $request->only('json');
        $sensor = Sensor::where('uuid', $uuid)->first();
        Log ::info(print_r($uuid, true));
        if ($sensor == null) {
            return (new Response('', 404));
        }
        if ($request->isJson()) {
            $json = $request->all();
        } else $json = '';
        Log ::info(print_r($json, true));


//        if (!isJson($json)) {
//            return (new Response('Not a JSON/JSON errors: '.json_last_error(), 422));
//        }

        $response = $sensor->uuid . "\n" . print_r($json, true);

        $raw = new RawData();
        $raw->sensor_id = $sensor->id;
        $raw->json =json_encode($json);
        $raw->save();
        return (new Response($response, 200));
    }


}
