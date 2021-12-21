<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Models\RawData;
use App\Models\Sensor;
use App\Models\Dashboard;
class DashboardController extends BaseController
{
    //
    public function index(Request $request)
    {
      $periods = array("-4 hours", "-24 hours", "-7 days");
      $dashboard['Number of sensors registered'] = [];
      $dashboard['Number of all records received'] = [];
      $dashboard['Number of different uuid sending the data'] = [];

      foreach($periods as $period) {
        $date = new \DateTime();
        $date->modify($period);
        $formatted_date = $date->format('Y-m-d H:i:s');
        array_push($dashboard['Number of sensors registered'], Sensor::where('created_at', '>=', $formatted_date)->count());
        array_push($dashboard['Number of all records received'], RawData::where('created_at', '>=', $formatted_date)->count());
        array_push($dashboard['Number of different uuid sending the data'], RawData::where('created_at', '>=', $formatted_date)->distinct('sensor_id')->count());        
      }

      $dashboards = Dashboard::with('sensor')->where('user_id', $request->id)->get();
      $timezone = new \DateTimeZone('Europe/Warsaw');
      return view('dashboard', ['dashboard' => $dashboard, 'dashboards' => $dashboards, 'tz' => $timezone, 'admin'=>$request->role == 'admin']);
    }

}
