<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\UserPlant;

class AppController extends Controller
{
    public function index($page){
        if(auth()->user() != ''){
            if($page == 'home'){
                $devices = Device::where('user_id', auth()->user()->id)->get();
                return view('main', ['page' => $page, 'devices' => $devices]);
            }
            else if($page == 'my-plants'){
                $data = UserPlant::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();
                return view('main', ['page' => $page, 'data' => $data]);
            }
            else{
                return view('main', ['page' => $page]);
            }
            
        }
        else{
            return redirect('/');
        }

    }
}
