<?php

namespace App\Http\Controllers;

//use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use DB;

class InterfaceController extends Controller
{
    //
    public function form(Request $request)
    {
        return view('interface', ['admin'=>$request->role == 'admin']);
    }

    public function concat1($str1, $str2) {
      for($i = 0; $i < strlen($str2); $i++) {
        if($str2[$i] == '(') $str1 = '(' . $str1;
        else return $str1 . substr($str2, $i);               
      }
    }

    public function concat2($str1, $str2) {
      for($i = strlen($str1) - 1; $i >= 0; $i--) {
        if($str1[$i] == ')') $str2 = $str2 . ')';
        else return substr($str1, 0, $i + 1) . $str2;               
      }
    }

    public function get(Request $request)
    {
        $query = $_POST['query'];

        // $tmp = '($SDS_failed > 3 AND $SDS_rd > 100) OR $$SDS_CRCerr';
        $order = array("\r\n", "\n", "\r");
        $query = str_replace($order, " ", $query);
        $subs = explode('$', $query);   
        for ($i = 0; $i < count($subs); $i++) {
          $sub = explode(' ', $subs[$i]);
          if(in_array(strtolower($sub[0]), array("created_at", "date", "uuid", "chipid", "boot"))) continue;
          if($i > 1 && $subs[$i-1] == '') {
            $sub[0] = $this->concat2($this->concat1('id in
            (select json_id from (        
            select * from process
            where (json_id not in (select json_id from process where json_key = "', $sub[0]), '"))) as json)');
          }
          else if(count($sub) > 1 && $i > 0) {
              if(!isset($sub[2])) 
                if(isset($_POST['machine'])) return new Response('Incorrect operator usage', 200);
                else return view('result',['results' => [], 'query' => $_POST['query'], 'error' => 'Incorrect operator usage', 'admin'=>$request->role == 'admin']);
              if(str_starts_with($sub[0], 'b_')){
                
                $sub[0] = $this->concat1('id in (select json_id from process where version_id in 
                (        
                select version_id from process
                where (json_key = "', substr($sub[0], 2)) . '" and json_value';
                $sub[2] = $this->concat2($sub[2], ')))');
              } else {
                $sub[0] = $this->concat1('id in
                (select json_id from (        
                select * from process
                where (json_key = "', $sub[0]) . '" and json_value';

                $sub[2] = $this->concat2($sub[2], ')) as json)');
              }
              
          }
          $subs[$i] = implode(' ', $sub); 
        }
        $query = 'with process as 
        (
        select * from process_numbers
        union
        select * from process_strings)
        select uuid, json, created_at, nickname from (
				select raw_data.id as id, raw_data.created_at as created_at, raw_data.updated_at as updated_at, raw_data.json as json, raw_data.boot as boot, sensors.nickname as nickname, sensors.uuid as uuid from raw_data
				right join sensors
				on raw_data.sensor_id = sensors.id
				) as process_data
        where ' . implode('', $subs);

        // dd($query);
        try {
            $results = DB::select($query);
            if(isset($_POST['machine'])) return new Response($results, 200);
            return view('result',['results' => $results, 'query' => $_POST['query'], 'admin'=>$request->role == 'admin']);
        } catch (\Throwable $e) { // For PHP 7
          if(isset($_POST['machine'])) return new Response('Incorrect query', 200);
            return view('result',['results' => [], 'query' => $_POST['query'], 'error' => 'Incorrect query']);
        } 
        
    }
}
