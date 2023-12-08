<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\UserPlant;
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
        
        return redirect('/my-plants');
    }

    public function register_user_device(Request $request){
        $serial = $request->serial_no;

        $devices = Device::where('serial_no', '=', $serial)->get();

        if(count($devices) == 0){
            $user_device = new Device;
            $user_device -> serial_no = $serial;
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
        
        return view('pages.templates.my-plants.plant-monitoring');

    }
}
