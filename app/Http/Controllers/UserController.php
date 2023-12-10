<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\PlantDiagnose;
use App\Models\UserPlant;
use App\Models\UserPlantActivity;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(){
        validator(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ])->validate();

        if(auth()->attempt(request()->only(['email', 'password']))){
            return redirect('/');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid Credentials!']);
    }

    public function logout(){
        auth()->logout();

        return redirect('/');
    }

    public function add_user_plant(Request $request){
        $user = auth()->user();
        
        $userplant = new UserPlant;
        $userplant -> user_id = $user->id;
        $userplant -> plant_name = $request->plant;
        $userplant -> label = $request->label;
        $userplant -> save();

        $this->create_activity_log($userplant->id, 'Plant Added', $request->label);
    }

    public function search_user_plant(Request $request){
        $query = $request->q;

        $data = UserPlant::where('user_id', '=', auth()->user()->id)
                ->where('plant_name', 'like', '%'.$query.'%')
                ->orWhere('user_id', '=', auth()->user()->id)
                ->where('label', 'like', '%'.$query.'%')->get();
        
        return view('pages.templates.my-plants.search', ['data' => $data]);
    }

    public function get_user_plant_info(Request $request){
        $data = UserPlant::where('plant_id', '=', $request->id)
                    ->where('user_id', '=', auth()->user()->id)->get();

        $device = Device::where('plant_id', '=', $request->id)
                    ->where('user_id', '=', auth()->user()->id)->get();

        return view('main', ['page' => 'user-plant', 'data' => $data, 'device' => $device]);
    }

    public function remove_user_plant(Request $request){
        UserPlant::where('plant_id', '=', $request->id)
                ->where('user_id', '=', auth()->user()->id)->delete();
        
        Device::where('plant_id', '=', $request->id)
                ->update(['plant_id' => '', 'status' => 'idle']);
        return redirect('/my-plants');
    }

    public function register_user_device(Request $request){
        $serial = $request->serial_no;

        $devices = Device::where('serial_no', '=', $serial)->get();

        if(count($devices) == 0){
            $user_device = new Device;
            $user_device -> serial_no = $serial;
            $user_device -> device_name = $serial;
            $user_device -> user_id = auth()->user()->id;
            $user_device -> plant_id = '';
            $user_device -> light_intensity = 0;
            $user_device -> temperature = 0;
            $user_device -> humidity = 0;
            $user_device -> soil_moisture = 0;
            $user_device -> water_level_1 = 0;
            $user_device -> water_level_2 = 0;
            $user_device -> water_level_3 = 0;
            $user_device -> waterpump_status = 0;
            $user_device -> mac_address = '';
            $user_device -> type = '';
            $user_device -> status = 'idle';
            $user_device -> save();

            return 'success';
        }
        else{
            return 'failed';
        }
    }

    public function get_device_params(Request $request){
        $plant_id = $request->plant_id;

        $data = UserPlant::where('plant_id', '=', $plant_id)
                    ->where('user_id', '=', auth()->user()->id)->get();

        $device = Device::where('plant_id', '=', $plant_id)
                    ->where('user_id', '=', auth()->user()->id)->get();

        $jsonString = file_get_contents('plant-database-master/json/' . $data[0]->plant_name . '.json');
        $plant_info = json_decode($jsonString, true);

        return view('pages.templates.my-plants.plant-monitoring', ['data' => $data, 'device' => $device, 'plant_info' => $plant_info]);

    }

    public function get_user_plant_activities(Request $request){
        $activities = UserPlantActivity::where('plant_id', '=', $request->plant_id)->get();

        return view('pages.templates.my-plants.plant-activities', ['activities' => $activities]);
    }

    public function get_user_plant_diagnosis(Request $request){
        $diagnosis = PlantDiagnose::where('plant_id', '=', $request->plant_id)->get();

        return view('pages.templates.my-plants.plant-diagnosis', ['diagnoses' => $diagnosis]);
    }

    public function pair_user_device(Request $request){
        $plant_id = $request->plant_id;
        $device_id = $request->device_id;

        Device::where('serial_no', '=', $device_id)
        ->update(['plant_id' => $plant_id, 'status' => 'offline']);

        $this->create_activity_log($plant_id, 'Paired Device to Plant', $device_id);
    }

    public function unpair_user_device(Request $request){
        $plant_id = $request->plant_id;

        $device = Device::where('plant_id', '=', $plant_id)->get();

        Device::where('serial_no', '=', $device[0]->serial_no)
        ->update(['plant_id' => '', 'status' => 'idle']);

        $this->create_activity_log($plant_id, 'Unpaired Device to Plant', $device[0]->device_name);
    }

    public function remove_device(Request $request){
        $device_id = $request->device_id;

        $device = Device::where('serial_no', '=', $device_id)->get();

        if($device[0]->plant_id != ''){
            return 'device is paired';
        }
        else{
            Device::where('serial_no', '=', $device_id)->delete();
            return 'device deleted';
        }
    }

    public function force_remove_device(Request $request){
        $device_id = $request->device_id;
        Device::where('serial_no', '=', $device_id)->delete();
    }

    public function get_diagnosis_result(Request $request){
        $diagnosis_id = $request->id;
        $plant_diagnosis = PlantDiagnose::where('id', '=', $diagnosis_id)->get();

        $jsonData = json_decode($plant_diagnosis[0]->data);
        return view('main', ['page' => 'diagnose-result', 'jsonData' => $jsonData]);
    }

    function create_activity_log($plant_id, $title, $remarks){
        $userplant_activity = new UserPlantActivity;
        $userplant_activity -> plant_id = $plant_id;
        $userplant_activity -> title = $title;
        $userplant_activity -> remarks = $remarks;
        $userplant_activity -> save();
    }
}
