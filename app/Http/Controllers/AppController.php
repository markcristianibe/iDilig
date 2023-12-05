<?php

namespace App\Http\Controllers;

use App\Models\UserPlant;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index($page){
        if(auth()->user() != ''){
            if($page == 'my-plants'){
                $data = UserPlant::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();
                // dd($data);
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
