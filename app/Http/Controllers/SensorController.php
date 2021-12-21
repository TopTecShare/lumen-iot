<?php

namespace App\Http\Controllers;

use App\Models\RawData;
use App\Models\Sensor;
use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\View\View;
//use Illuminate\Support\Facades\View;

class SensorController extends Controller
{
    public function show(Request $request, $uuid)
    {
        $dashboard = Dashboard::where('user_id', $request->id)->where('uuid', $uuid)->first();
        $sensor = Sensor::where('uuid', $uuid)->first();
        if ($sensor == null) {
            return (new Response('', 404));
        }
        $timezone = new \DateTimeZone('Europe/Warsaw');

        return view('sensor',['sensor' => $sensor, 'tz' => $timezone, 'dashboard' => $dashboard, 'admin'=>$request->role == 'admin']);
    }
    public function index(Request $request)
    {
        $sensors = Sensor::withCount('rawDatapoints')->orderBy('raw_datapoints_count', 'desc')->get();
        return view('sensors',['sensors' => $sensors, 'admin'=>$request->role == 'admin']);
    }
    public function nickname(Request $request)
    {
        $sensors = Sensor::where('uuid', $_POST['uuid'])->first();
        $sensors->nickname = $_POST['nickname'];
        $sensors->save();
        return $this->show($request, $_POST['uuid']);
    }

    public function add(Request $request)
    {
        $dashboard = Dashboard::where('user_id', $request->id)->where('uuid', $_POST['uuid'])->first();
        if(!$dashboard) {
            $dashboard = new Dashboard();
            $dashboard->user_id = $request->id;
            $dashboard->uuid = $_POST['uuid'];
            $dashboard->sensor_id = Sensor::where('uuid', $_POST['uuid'])->first()->id;
            $dashboard->save();
        }
        return $this->show($request, $_POST['uuid']);
    }

    public function delete(Request $request)
    {
        $dashboard = Dashboard::where('user_id', $request->id)->where('uuid', $_POST['uuid'])->first();
        $dashboard->delete();
        return $this->show($request, $_POST['uuid']);
    }
}
