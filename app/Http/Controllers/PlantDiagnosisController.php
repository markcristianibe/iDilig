<?php

namespace App\Http\Controllers;

use App\Models\PlantDiagnose;
use App\Models\UserPlant;
use App\Models\UserPlantActivity;
use Illuminate\Http\Request;

class PlantDiagnosisController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = $request->jsonResult;
            $jsonData = json_encode($data);
            $jsonData = json_decode($jsonData);

            return view('main', ['page' => 'diagnose-result', 'jsonData' => $jsonData]);
        }
    }

    public function get_user_plant_diagnosis(Request $request){
        $data = $request->jsonResult;
        $jsonData = json_encode($data);
        $jsonData = json_decode($jsonData);

        foreach($jsonData->result->classification->suggestions as $plant)
        {
            $plant_name = $plant->name;

            $userplant = UserPlant::where('plant_id', '=', $request->plant_id)->get();

            if(ucwords($userplant[0]->plant_name) == ucwords($plant_name)){
                $plant_diagnose = new PlantDiagnose;
                $plant_diagnose -> user_id = auth()->user()->id;
                $plant_diagnose -> plant_id = $request->plant_id;
                $plant_diagnose -> data = json_encode($jsonData);
                $plant_diagnose -> is_user_plant = 1;
                $plant_diagnose->save();

                $this->create_activity_log($request->plant_id, 'Plant Diagnosis', $userplant[0]->plant_name);
                return view('main', ['page' => 'diagnose-result', 'jsonData' => $jsonData, 'plantname' => $plant_name]);
                break;
            }
        }

        return '<p class="text-center mt-5">Plant Classification Mismatch.</p><br><center><button class="btn btn-success mt-5" onclick="window.location.reload()">Return</button></center>';
    }

    function create_activity_log($plant_id, $title, $remarks){
        $userplant_activity = new UserPlantActivity;
        $userplant_activity -> plant_id = $plant_id;
        $userplant_activity -> title = $title;
        $userplant_activity -> remarks = $remarks;
        $userplant_activity -> save();
    }
}
