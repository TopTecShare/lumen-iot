<?php

namespace App\Http\Controllers;

use DB;
use App\Models\RawData;
use App\Models\ProcessString;
use App\Models\ProcessNumber;
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

    public function isNam($string)
    {
        preg_match('/-?([\d]+)(.([\d]+))?/', $string, $matches);
        return $matches && $matches[0] == $string;
    }

    public function process($key, $value, $id) 
    {
        if($this->isNam($value)) {
            // DB::table('process_number')->insert([
            //     'json_id' => $id, 
            //     'key' => $key, 
            //     'value' => $value
            //   ]);
            $number = new ProcessNumber();
            $number->json_id = $id;
            $number->key = $key;
            $number->value = $value;
            $number->save();
        } else {
            $string = new ProcessString();
            $string->json_id = $id;
            $string->key = $key;
            $string->value = $value;
            $string->save();
        }

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
        $raw->json = json_encode($json);
        $raw->processed = 1;
        $raw->save();
        foreach($json as $key=>$value){
            if(is_array($value)) {
                foreach($value as $value_key=>$value_value) {
                    $this->process($key . '_' . $value_key, $value_value, $raw->id);
                }
            } else {
                $this->process($key, $value, $raw->id);
            }


        }

        return (new Response($response, 200));
    }


}
